<?php
/** Private ticket management and email configuration. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function event_child_smtp_secret_key() { return hash( 'sha256', wp_salt( 'auth' ), true ); }
function event_child_encrypt_smtp_password( $password ) {
    if ( $password === '' ) { return ''; }
    $nonce = random_bytes( SODIUM_CRYPTO_SECRETBOX_NONCEBYTES );
    return base64_encode( $nonce . sodium_crypto_secretbox( $password, $nonce, event_child_smtp_secret_key() ) );
}
function event_child_decrypt_smtp_password( $encrypted ) {
    if ( ! is_string( $encrypted ) || $encrypted === '' ) { return ''; }
    $decoded = base64_decode( $encrypted, true );
    if ( $decoded === false || strlen( $decoded ) <= SODIUM_CRYPTO_SECRETBOX_NONCEBYTES ) { return ''; }
    $plaintext = sodium_crypto_secretbox_open( substr( $decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES ), substr( $decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES ), event_child_smtp_secret_key() );
    return $plaintext === false ? '' : $plaintext;
}

function event_child_admin_menu() {
    add_menu_page( 'Vé tham dự', 'Vé tham dự', 'manage_options', 'event-tickets', 'event_child_admin_tickets', 'dashicons-tickets-alt', 26 );
    add_submenu_page( 'event-tickets', 'Cấu hình email', 'Cấu hình email', 'manage_options', 'event-email', 'event_child_admin_email' );
}
add_action( 'admin_menu', 'event_child_admin_menu' );

function event_child_admin_tickets() {
    if ( ! current_user_can( 'manage_options' ) ) { return; }
    global $wpdb;
    $table = event_child_ticket_table();
    $page = max( 1, absint( $_GET['paged'] ?? 1 ) );
    $search = isset( $_GET['s'] ) && is_string( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';
    $where = '';
    if ( $search !== '' ) {
        $like = '%' . $wpdb->esc_like( $search ) . '%';
        $where = $wpdb->prepare( ' WHERE attendee_name LIKE %s OR email LIKE %s OR ticket_code LIKE %s', $like, $like, $like );
    }
    $total = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table}{$where}" );
    $rows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table}{$where} ORDER BY id DESC LIMIT %d OFFSET %d", 25, ( $page - 1 ) * 25 ), ARRAY_A );
    $types = event_child_ticket_types();
    $statuses = array( 'pending' => 'Chờ gửi', 'failed' => 'Gửi lỗi', 'local' => 'Đã nhận tại Mailpit local', 'sent' => 'Máy chủ thư đã chấp nhận' );
    ?>
    <div class="wrap"><h1>Vé tham dự <span class="title-count"><?php echo esc_html( $total ); ?></span></h1>
    <p>Thông tin đăng ký chỉ dành cho quản trị viên. Trạng thái máy chủ chấp nhận thư không đảm bảo thư đã vào hộp thư người nhận.</p>
    <?php if ( isset( $_GET['resent'] ) ) : ?><div class="notice notice-info"><p><?php echo sanitize_key( $_GET['resent'] ) === 'failed' ? 'Gửi lại chưa thành công. Kiểm tra cấu hình email.' : 'Đã xử lý gửi lại. Xem trạng thái của vé bên dưới.'; ?></p></div><?php endif; ?>
    <form method="get"><input type="hidden" name="page" value="event-tickets"><label class="screen-reader-text" for="event-search">Tìm vé</label><input id="event-search" type="search" name="s" value="<?php echo esc_attr( $search ); ?>" placeholder="Tên, email hoặc mã vé"><button class="button">Tìm kiếm</button></form><br>
    <table class="widefat striped"><thead><tr><th>Mã vé</th><th>Người tham dự</th><th>Liên hệ</th><th>Hạng vé</th><th>Trạng thái email</th><th>Đăng ký (UTC)</th><th>Thao tác</th></tr></thead><tbody>
    <?php if ( ! $rows ) : ?><tr><td colspan="7">Chưa có đăng ký phù hợp.</td></tr><?php endif; ?>
    <?php foreach ( $rows as $row ) : ?><tr>
    <td><code><?php echo esc_html( $row['ticket_code'] ); ?></code></td><td><?php echo esc_html( $row['attendee_name'] ); ?><br><small><?php echo esc_html( $row['organization'] ); ?></small></td>
    <td><?php echo esc_html( $row['email'] ); ?><br><?php echo esc_html( $row['phone'] ); ?></td><td><?php echo esc_html( $types[ $row['tier'] ]['label'] ?? $row['tier'] ); ?></td><td><?php echo esc_html( $statuses[ $row['mail_status'] ] ?? $row['mail_status'] ); ?></td><td><?php echo esc_html( $row['created_at'] ); ?></td>
    <td><form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post"><?php wp_nonce_field( 'event_resend_' . $row['id'] ); ?><input type="hidden" name="action" value="event_ticket_resend"><input type="hidden" name="ticket_id" value="<?php echo esc_attr( $row['id'] ); ?>"><button class="button">Gửi lại vé</button></form></td></tr><?php endforeach; ?>
    </tbody></table>
    <?php $links = paginate_links( array( 'base' => add_query_arg( 'paged', '%#%' ), 'current' => $page, 'total' => max( 1, (int) ceil( $total / 25 ) ) ) ); if ( $links ) { echo '<div class="tablenav"><div class="tablenav-pages">' . wp_kses_post( $links ) . '</div></div>'; } ?>
    <p><a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=event_ticket_export' ), 'event_export' ) ); ?>" class="button">Xuất danh sách CSV</a> <a href="<?php echo esc_url( admin_url( 'admin.php?page=event-email' ) ); ?>">Cấu hình gửi email</a></p></div>
    <?php
}

function event_child_admin_email() {
    if ( ! current_user_can( 'manage_options' ) ) { return; }
    $settings = get_option( 'event_child_smtp', array() );
    ?>
    <div class="wrap"><h1>Cấu hình gửi vé qua email</h1>
    <p>Hiện tại: <strong><?php echo event_child_mail_is_local() ? 'hộp thư thử nghiệm local; chưa gửi ra Gmail hoặc dịch vụ bên ngoài' : 'máy chủ gửi thư bên ngoài'; ?></strong>.</p>
    <p>Gmail: SMTP <code>smtp.gmail.com</code>, cổng <code>587</code>, STARTTLS, tài khoản gửi đầy đủ và mật khẩu ứng dụng. Không dùng mật khẩu đăng nhập thông thường. Nhập trực tiếp tại đây; không đưa mật khẩu vào mã nguồn.</p>
    <?php if ( isset( $_GET['saved'] ) ) : ?><div class="notice notice-success"><p>Đã lưu cấu hình. Hãy gửi thư thử để xác nhận.</p></div><?php endif; ?>
    <?php if ( isset( $_GET['invalid'] ) ) : ?><div class="notice notice-error"><p>Cấu hình chưa hợp lệ. Kiểm tra hostname, cổng, mã hóa và địa chỉ gửi.</p></div><?php endif; ?>
    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
    <?php wp_nonce_field( 'event_save_smtp' ); ?><input type="hidden" name="action" value="event_save_smtp">
    <table class="form-table"><tbody>
    <tr><th><label for="smtp-host">SMTP Host</label></th><td><input class="regular-text" id="smtp-host" name="smtp[host]" value="<?php echo esc_attr( $settings['host'] ?? '' ); ?>" placeholder="smtp.gmail.com"><p class="description">Để trống để dùng cấu hình email của máy chủ.</p></td></tr>
    <tr><th><label for="smtp-port">Cổng</label></th><td><input id="smtp-port" name="smtp[port]" type="number" min="1" max="65535" value="<?php echo esc_attr( $settings['port'] ?? 587 ); ?>"></td></tr>
    <tr><th><label for="smtp-encryption">Mã hóa</label></th><td><select id="smtp-encryption" name="smtp[encryption]"><?php foreach ( array( 'tls' => 'STARTTLS (587)', 'ssl' => 'SSL/TLS (465)', '' => 'Không mã hóa (chỉ local)' ) as $value => $label ) : ?><option value="<?php echo esc_attr( $value ); ?>" <?php selected( $settings['encryption'] ?? 'tls', $value ); ?>><?php echo esc_html( $label ); ?></option><?php endforeach; ?></select></td></tr>
    <tr><th><label for="smtp-username">Tài khoản SMTP</label></th><td><input class="regular-text" id="smtp-username" name="smtp[username]" autocomplete="off" value="<?php echo esc_attr( $settings['username'] ?? '' ); ?>"></td></tr>
    <tr><th><label for="smtp-password">Mật khẩu ứng dụng</label></th><td><input class="regular-text" id="smtp-password" name="smtp[password]" type="password" autocomplete="new-password" value=""><p class="description"><?php echo ! empty( $settings['password'] ) ? 'Đã lưu mật khẩu mã hóa. Để trống để giữ nguyên.' : 'Chưa lưu mật khẩu.'; ?></p></td></tr>
    <tr><th><label for="smtp-from">Email người gửi</label></th><td><input class="regular-text" id="smtp-from" name="smtp[from]" type="email" value="<?php echo esc_attr( $settings['from'] ?? '' ); ?>"></td></tr>
    </tbody></table><?php submit_button( 'Lưu cấu hình' ); ?></form></div>
    <?php
}

function event_child_save_smtp() {
    if ( ! current_user_can( 'manage_options' ) ) { wp_die( 'Không có quyền truy cập.', '', array( 'response' => 403 ) ); }
    check_admin_referer( 'event_save_smtp' );
    $input = isset( $_POST['smtp'] ) && is_array( $_POST['smtp'] ) ? wp_unslash( $_POST['smtp'] ) : array();
    foreach ( $input as $value ) { if ( ! is_scalar( $value ) ) { wp_die( 'Cấu hình không hợp lệ.', '', array( 'response' => 400 ) ); } }
    $old = get_option( 'event_child_smtp', array() );
    $host = strtolower( trim( sanitize_text_field( $input['host'] ?? '' ) ) );
    $port = absint( $input['port'] ?? 587 );
    $encryption = sanitize_key( $input['encryption'] ?? 'tls' );
    $from = sanitize_email( $input['from'] ?? '' );
    $local = in_array( $host, array( 'localhost', '127.0.0.1', '::1' ), true );
    $invalid = $host !== '' && ( ! preg_match( '/^[a-z0-9.:-]+$/', $host ) || $port < 1 || $port > 65535 || ! in_array( $encryption, array( 'tls', 'ssl', '' ), true ) || ( ! $local && $encryption === '' ) || ! is_email( $from ) );
    if ( $invalid ) { wp_safe_redirect( admin_url( 'admin.php?page=event-email&invalid=1' ) ); exit; }
    $password = (string) ( $input['password'] ?? '' );
    $settings = array( 'host' => $host, 'port' => $port, 'encryption' => $encryption, 'username' => sanitize_text_field( $input['username'] ?? '' ), 'from' => $from, 'password' => $password !== '' ? event_child_encrypt_smtp_password( $password ) : ( $old['password'] ?? '' ) );
    update_option( 'event_child_smtp', $settings, false );
    wp_safe_redirect( admin_url( 'admin.php?page=event-email&saved=1' ) ); exit;
}
add_action( 'admin_post_event_save_smtp', 'event_child_save_smtp' );

function event_child_resend_ticket() {
    if ( ! current_user_can( 'manage_options' ) ) { wp_die( 'Không có quyền truy cập.', '', array( 'response' => 403 ) ); }
    $id = absint( $_POST['ticket_id'] ?? 0 );
    check_admin_referer( 'event_resend_' . $id );
    $result = event_child_send_ticket( $id );
    wp_safe_redirect( admin_url( 'admin.php?page=event-tickets&resent=' . ( is_wp_error( $result ) ? 'failed' : 'ok' ) ) ); exit;
}
add_action( 'admin_post_event_ticket_resend', 'event_child_resend_ticket' );

function event_child_export_tickets() {
    if ( ! current_user_can( 'manage_options' ) ) { wp_die( 'Không có quyền truy cập.', '', array( 'response' => 403 ) ); }
    check_admin_referer( 'event_export' );
    nocache_headers();
    header( 'Content-Type: text/csv; charset=UTF-8' );
    header( 'Content-Disposition: attachment; filename="ots2026-attendees.csv"' );
    header( 'X-Content-Type-Options: nosniff' );
    $stream = fopen( 'php://output', 'w' );
    fwrite( $stream, "\xEF\xBB\xBF" );
    fputcsv( $stream, array( 'Mã vé', 'Họ tên', 'Email', 'Điện thoại', 'Đơn vị', 'Hạng vé', 'Trạng thái thư', 'Ngày đăng ký UTC' ) );
    global $wpdb;
    $offset = 0;
    do {
        $rows = $wpdb->get_results( $wpdb->prepare( 'SELECT ticket_code,attendee_name,email,phone,organization,tier,mail_status,created_at FROM ' . event_child_ticket_table() . ' ORDER BY id LIMIT %d OFFSET %d', 200, $offset ), ARRAY_A );
        foreach ( $rows as $row ) {
            $safe = array_map( function ( $value ) { return preg_match( '/^[\s]*[=+@-]/', (string) $value ) ? "'" . $value : $value; }, array_values( $row ) );
            fputcsv( $stream, $safe );
        }
        $offset += 200;
    } while ( count( $rows ) === 200 );
    fclose( $stream ); exit;
}
add_action( 'admin_post_event_ticket_export', 'event_child_export_tickets' );
