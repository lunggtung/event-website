<?php
/** Registration storage and submission handling. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function event_child_ticket_table() {
    global $wpdb;
    return $wpdb->prefix . 'event_tickets';
}

function event_child_install_ticket_table() {
    if ( get_option( 'event_child_ticket_schema' ) === '1.0' ) { return; }
    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    $table = event_child_ticket_table();
    $collate = $wpdb->get_charset_collate();
    dbDelta( "CREATE TABLE {$table} (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        ticket_code varchar(32) NOT NULL,
        request_key varchar(64) NOT NULL,
        attendee_name varchar(120) NOT NULL,
        email varchar(254) NOT NULL,
        phone varchar(30) NOT NULL,
        organization varchar(180) NOT NULL DEFAULT '',
        tier varchar(20) NOT NULL,
        mail_status varchar(20) NOT NULL DEFAULT 'pending',
        created_at datetime NOT NULL,
        sent_at datetime DEFAULT NULL,
        PRIMARY KEY  (id),
        UNIQUE KEY ticket_code (ticket_code),
        UNIQUE KEY request_key (request_key),
        UNIQUE KEY email (email)
    ) {$collate};" );
    if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table ) ) ) === $table ) {
        update_option( 'event_child_ticket_schema', '1.0', false );
    }
}
add_action( 'init', 'event_child_install_ticket_table', 5 );

function event_child_validate_registration( $input ) {
    $errors = new WP_Error();
    foreach ( array( 'attendee_name', 'attendee_email', 'attendee_phone', 'attendee_org', 'ticket_tier', 'attendee_consent', 'website' ) as $key ) {
        if ( isset( $input[ $key ] ) && ! is_scalar( $input[ $key ] ) ) {
            return new WP_Error( 'invalid_input', 'Thông tin gửi lên không hợp lệ. Vui lòng nhập lại biểu mẫu.' );
        }
    }
    $name = sanitize_text_field( $input['attendee_name'] ?? '' );
    $raw_email = trim( (string) ( $input['attendee_email'] ?? '' ) );
    $email = strtolower( sanitize_email( $raw_email ) );
    $phone = sanitize_text_field( $input['attendee_phone'] ?? '' );
    $organization = sanitize_text_field( $input['attendee_org'] ?? '' );
    $tier = sanitize_key( $input['ticket_tier'] ?? '' );
    $types = function_exists( 'event_child_ticket_types' ) ? event_child_ticket_types() : array_fill_keys( array( 'student', 'standard', 'guest' ), array() );
    if ( mb_strlen( $name ) < 2 || mb_strlen( $name ) > 120 ) { $errors->add( 'attendee_name', 'Nhập họ tên từ 2 đến 120 ký tự.' ); }
    if ( ! is_email( $raw_email ) || $email !== strtolower( $raw_email ) || strlen( $email ) > 254 ) { $errors->add( 'attendee_email', 'Nhập địa chỉ email hợp lệ để nhận vé.' ); }
    if ( ! preg_match( '/^\+?[0-9 ().-]{8,25}$/', $phone ) || strlen( preg_replace( '/\D/', '', $phone ) ) < 8 ) { $errors->add( 'attendee_phone', 'Nhập số điện thoại hợp lệ, tối thiểu 8 chữ số.' ); }
    if ( mb_strlen( $organization ) > 180 ) { $errors->add( 'attendee_org', 'Tên đơn vị không vượt quá 180 ký tự.' ); }
    if ( ! isset( $types[ $tier ] ) ) { $errors->add( 'ticket_tier', 'Vui lòng chọn một hạng vé trong danh sách.' ); }
    if ( ( $input['attendee_consent'] ?? '' ) !== '1' ) { $errors->add( 'attendee_consent', 'Cần đồng ý sử dụng thông tin để xử lý đăng ký và gửi vé.' ); }
    if ( ! empty( $input['website'] ) ) { $errors->add( 'invalid_input', 'Không thể xử lý đăng ký này.' ); }
    if ( $errors->has_errors() ) { return $errors; }
    return array( 'name' => $name, 'email' => $email, 'phone' => $phone, 'organization' => $organization, 'tier' => $tier );
}

function event_child_register_attendee( $input, $request_key = '' ) {
    $data = event_child_validate_registration( $input );
    if ( is_wp_error( $data ) ) { return $data; }
    if ( ! preg_match( '/^[a-f0-9]{48}$/', $request_key ) ) { return new WP_Error( 'request', 'Phiên đăng ký không hợp lệ. Vui lòng tải lại trang.' ); }
    global $wpdb;
    $table = event_child_ticket_table();
    $existing = $wpdb->get_row( $wpdb->prepare( "SELECT id, email FROM {$table} WHERE request_key = %s", $request_key ) );
    if ( $existing && hash_equals( $existing->email, $data['email'] ) ) {
        return array( 'id' => (int) $existing->id, 'created' => false );
    }
    if ( $wpdb->get_var( $wpdb->prepare( "SELECT id FROM {$table} WHERE email = %s", $data['email'] ) ) ) {
        return new WP_Error( 'duplicate', 'Email này đã được đăng ký. Vui lòng kiểm tra thư đã nhận hoặc liên hệ ban tổ chức để được gửi lại vé.' );
    }
    $inserted = $wpdb->insert( $table, array(
        'ticket_code' => 'OTS2026-' . strtoupper( bin2hex( random_bytes( 6 ) ) ), 'request_key' => $request_key,
        'attendee_name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone'],
        'organization' => $data['organization'], 'tier' => $data['tier'], 'created_at' => current_time( 'mysql', true ),
    ), array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' ) );
    if ( ! $inserted ) {
        $retry = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM {$table} WHERE request_key = %s AND email = %s", $request_key, $data['email'] ) );
        if ( $retry ) { return array( 'id' => (int) $retry, 'created' => false ); }
        return new WP_Error( 'storage', 'Chưa thể lưu đăng ký. Vui lòng thử lại sau ít phút.' );
    }
    return array( 'id' => (int) $wpdb->insert_id, 'created' => true );
}

function event_child_get_ticket( $id ) {
    global $wpdb;
    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . event_child_ticket_table() . ' WHERE id = %d', absint( $id ) ), ARRAY_A );
}

function event_child_receipt_token( $id ) {
    $token = bin2hex( random_bytes( 24 ) );
    set_transient( 'event_receipt_' . hash( 'sha256', $token ), absint( $id ), 30 * MINUTE_IN_SECONDS );
    return $token;
}

function event_child_receipt_ticket( $token ) {
    if ( ! is_string( $token ) || ! preg_match( '/^[a-f0-9]{48}$/', $token ) ) { return null; }
    $id = get_transient( 'event_receipt_' . hash( 'sha256', $token ) );
    return $id ? event_child_get_ticket( $id ) : null;
}

function event_child_registration_submission() {
    if ( ! is_page( 'dang-ky-ve' ) ) { return; }
    nocache_headers();
    header( 'Referrer-Policy: no-referrer' );
    header( 'X-Robots-Tag: noindex, nofollow' );
    $GLOBALS['event_registration_errors'] = new WP_Error();
    $GLOBALS['event_registration_values'] = array();
    if ( ( $_SERVER['REQUEST_METHOD'] ?? 'GET' ) !== 'POST' ) { return; }
    $input = wp_unslash( $_POST );
    $nonce = isset( $input['event_register_nonce'] ) && is_string( $input['event_register_nonce'] ) ? $input['event_register_nonce'] : '';
    if ( ! wp_verify_nonce( $nonce, 'event_ticket_register' ) ) {
        $GLOBALS['event_registration_errors']->add( 'nonce', 'Phiên đăng ký đã hết hạn. Vui lòng tải lại trang rồi thử lại.' );
        return;
    }
    $GLOBALS['event_registration_values'] = $input;
    $ip = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? '' );
    $rate_key = 'event_rate_' . hash_hmac( 'sha256', $ip, wp_salt( 'nonce' ) );
    $attempts = (int) get_transient( $rate_key );
    if ( $attempts >= 10 ) {
        $GLOBALS['event_registration_errors']->add( 'rate', 'Bạn đã gửi nhiều yêu cầu. Vui lòng thử lại sau 15 phút.' );
        return;
    }
    set_transient( $rate_key, $attempts + 1, 15 * MINUTE_IN_SECONDS );
    $request_key = isset( $input['request_key'] ) && is_string( $input['request_key'] ) ? $input['request_key'] : '';
    $result = event_child_register_attendee( $input, $request_key );
    if ( is_wp_error( $result ) ) { $GLOBALS['event_registration_errors'] = $result; return; }
    if ( $result['created'] ) { event_child_send_ticket( $result['id'] ); }
    $receipt = event_child_receipt_token( $result['id'] );
    wp_safe_redirect( add_query_arg( 'receipt', $receipt, get_permalink() ) . '#registration-result', 303 );
    exit;
}
add_action( 'template_redirect', 'event_child_registration_submission', 5 );

function event_child_download_ticket() {
    $token = isset( $_GET['receipt'] ) && is_string( $_GET['receipt'] ) ? sanitize_text_field( wp_unslash( $_GET['receipt'] ) ) : '';
    $ticket = event_child_receipt_ticket( $token );
    if ( ! $ticket ) { wp_die( 'Liên kết đã hết hạn. Vui lòng sử dụng mã QR trong email hoặc liên hệ ban tổ chức.', 'Vé không khả dụng', array( 'response' => 403 ) ); }
    $png = event_child_ticket_qr_png( $ticket['ticket_code'] );
    if ( is_wp_error( $png ) ) { wp_die( 'Chưa thể tạo ảnh vé. Vui lòng thử lại sau.', 'Lỗi tạo vé', array( 'response' => 503 ) ); }
    nocache_headers();
    header( 'Content-Type: image/png' );
    header( 'X-Content-Type-Options: nosniff' );
    header( 'Referrer-Policy: no-referrer' );
    header( 'Content-Disposition: attachment; filename="' . sanitize_file_name( $ticket['ticket_code'] ) . '.png"' );
    echo $png;
    exit;
}
add_action( 'admin_post_event_ticket_download', 'event_child_download_ticket' );
add_action( 'admin_post_nopriv_event_ticket_download', 'event_child_download_ticket' );
