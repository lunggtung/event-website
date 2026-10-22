<?php
/** Template Name: Đăng ký tham dự */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$types = event_child_ticket_types();
$event = event_child_event_data();
$errors = $GLOBALS['event_registration_errors'] ?? new WP_Error();
$values = $GLOBALS['event_registration_values'] ?? array();
$receipt = isset( $_GET['receipt'] ) && is_string( $_GET['receipt'] ) ? sanitize_text_field( wp_unslash( $_GET['receipt'] ) ) : '';
$ticket = $receipt !== '' ? event_child_receipt_ticket( $receipt ) : null;
$requested_tier = isset( $_GET['tier'] ) && is_string( $_GET['tier'] ) ? sanitize_key( wp_unslash( $_GET['tier'] ) ) : 'standard';
$value = static function ( $key, $default = '' ) use ( $values ) { return isset( $values[ $key ] ) && is_scalar( $values[ $key ] ) ? sanitize_text_field( $values[ $key ] ) : $default; };
$selected_tier = $value( 'ticket_tier', isset( $types[ $requested_tier ] ) ? $requested_tier : 'standard' );
$request_key = $value( 'request_key' );
if ( ! preg_match( '/^[a-f0-9]{48}$/', $request_key ) ) { $request_key = bin2hex( random_bytes( 24 ) ); }
get_header();
?>
<main id="primary" class="summit-main summit-tickets-page">
    <header class="summit-page-header summit-container">
        <p class="summit-eyebrow">Hẹn gặp bạn tại Hà Nội / 20–22.11.2026</p>
        <h1>Đăng ký tham dự hội nghị</h1>
        <p class="summit-lead">Chọn hạng vé phù hợp và để lại thông tin. Mỗi đăng ký hợp lệ có một mã vé riêng, dùng xuyên suốt ba ngày hội nghị.</p>
    </header>

    <?php if ( $ticket ) : ?>
    <section class="summit-container summit-section" id="registration-result" aria-labelledby="receipt-heading" tabindex="-1">
        <div class="summit-confirmation">
            <div>
                <p class="summit-eyebrow">Đăng ký đã được lưu</p>
                <h2 id="receipt-heading">Hẹn gặp bạn,<br><?php echo esc_html( $ticket['attendee_name'] ); ?>.</h2>
                <?php if ( $ticket['mail_status'] === 'sent' ) : ?>
                    <p>Máy chủ thư đã tiếp nhận email gửi đến <strong><?php echo esc_html( $ticket['email'] ); ?></strong>. Hãy kiểm tra cả hộp thư rác; bạn cũng có thể tải mã QR bên dưới.</p>
                <?php else : ?>
                    <div class="summit-notice" role="status">Vé đã được tạo. Email chưa được chuyển tới hộp thư của bạn; hãy tải mã QR bên dưới để giữ vé.</div>
                <?php endif; ?>
                <dl class="summit-ticket-summary">
                    <div><dt>Mã vé</dt><dd><code><?php echo esc_html( $ticket['ticket_code'] ); ?></code></dd></div>
                    <div><dt>Hạng vé</dt><dd><?php echo esc_html( $types[ $ticket['tier'] ]['label'] ?? $ticket['tier'] ); ?></dd></div>
                    <div><dt>Thời gian</dt><dd><?php echo esc_html( $event['dates'] ); ?></dd></div>
                    <div><dt>Địa điểm</dt><dd><?php echo esc_html( $event['venue'] ); ?>, Hà Nội</dd></div>
                </dl>
                <div class="summit-actions">
                    <a class="summit-button summit-button-primary" href="<?php echo esc_url( add_query_arg( array( 'action' => 'event_ticket_download', 'receipt' => $receipt ), admin_url( 'admin-post.php' ) ) ); ?>">Tải mã QR <span aria-hidden="true">↓</span></a>
                    <a class="summit-button summit-button-secondary" href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>">Chọn phiên tham dự →</a>
                </div>
                <p class="summit-small">Liên kết xác nhận có hiệu lực trong 30 phút. Hãy lưu QR và giữ riêng mã vé của bạn.</p>
            </div>
            <div class="summit-qr-panel">
                <?php $png = event_child_ticket_qr_png( $ticket['ticket_code'] ); if ( ! is_wp_error( $png ) ) : ?>
                    <img class="summit-ticket-qr" src="data:image/png;base64,<?php echo esc_attr( base64_encode( $png ) ); ?>" width="360" height="360" alt="Mã QR vé <?php echo esc_attr( $ticket['ticket_code'] ); ?>">
                <?php else : ?><p>Ảnh QR tạm thời chưa khả dụng. Hãy lưu mã vé và liên hệ ban tổ chức.</p><?php endif; ?>
                <p>Vé điện tử · Open Tech Summit 2026</p>
            </div>
        </div>
    </section>
    <?php else : ?>

    <?php if ( $receipt !== '' ) : ?><div class="summit-container"><p class="summit-notice" role="status">Liên kết xác nhận đã hết hạn hoặc không hợp lệ. Nếu đã đăng ký, vui lòng kiểm tra email hoặc liên hệ ban tổ chức; không cần đăng ký lại.</p></div><?php endif; ?>

    <section class="summit-container summit-section summit-ticket-options" aria-labelledby="ticket-options-heading">
        <div class="summit-section-heading"><div><p class="summit-eyebrow">Hạng vé tham dự</p><h2 id="ticket-options-heading">Chọn vé phù hợp với bạn</h2></div><p>Các hạng vé đều miễn phí trong chương trình minh họa. Một vé dùng cho cả ba ngày hội nghị.</p></div>
        <div class="summit-ticket-grid">
            <?php $index = 0; foreach ( $types as $key => $type ) : $index++; ?>
            <article class="summit-ticket-option<?php echo $key === $selected_tier ? ' is-selected' : ''; ?>">
                <p class="summit-eyebrow"><?php echo esc_html( sprintf( '%02d', $index ) ); ?> / <?php echo $key === 'standard' ? 'Dành cho mọi người' : 'Tham gia cộng đồng'; ?></p>
                <h3><?php echo esc_html( $type['label'] ); ?></h3><p class="summit-ticket-price">Miễn phí</p>
                <p><?php echo esc_html( $type['description'] ); ?></p>
                <ul><?php foreach ( $type['features'] as $feature ) : ?><li><?php echo esc_html( $feature ); ?></li><?php endforeach; ?></ul>
                <a href="#register-form-section" class="summit-button summit-button-secondary select-ticket-btn" data-tier="<?php echo esc_attr( $key ); ?>">Chọn vé <?php echo esc_html( mb_strtolower( $type['label'] ) ); ?> <span aria-hidden="true">↗</span></a>
            </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="summit-container summit-section" id="register-form-section" aria-labelledby="registration-heading">
        <div class="summit-form-layout">
            <aside class="summit-form-intro">
                <p class="summit-eyebrow">02 / Thông tin tham dự</p>
                <h2 id="registration-heading">Thông tin đăng ký</h2>
                <p>Thông tin giúp chúng tôi chuẩn bị danh sách tham dự và gửi vé đến đúng người. Các mục có dấu * là bắt buộc.</p>
                <div class="summit-attendance-note"><h3>Sau khi đăng ký</h3><ol><li>Lưu mã vé và ảnh QR được cấp.</li><li>Kiểm tra email để nhận bản sao.</li><li>Mở QR khi đến bàn đón tiếp.</li></ol></div>
                <p class="summit-small">Website thực hành với dữ liệu sự kiện minh họa. Không thu phí hoặc yêu cầu thông tin thanh toán.</p>
            </aside>
            <form class="summit-form" method="post" action="<?php echo esc_url( get_permalink() . '#register-form-section' ); ?>">
                <?php wp_nonce_field( 'event_ticket_register', 'event_register_nonce' ); ?>
                <input type="hidden" name="request_key" value="<?php echo esc_attr( $request_key ); ?>">
                <div class="summit-honeypot" aria-hidden="true"><label for="event-website">Để trống mục này</label><input type="text" id="event-website" name="website" value="" tabindex="-1" autocomplete="off"></div>
                <?php if ( $errors->has_errors() ) : ?><div class="summit-notice summit-notice-error" role="alert" tabindex="-1"><strong>Chưa thể hoàn tất đăng ký.</strong><ul><?php foreach ( $errors->get_error_messages() as $message ) : ?><li><?php echo esc_html( $message ); ?></li><?php endforeach; ?></ul></div><?php endif; ?>
                <div class="summit-form-grid">
                <?php foreach ( array( 'attendee_name' => array( 'Họ và tên', 'text', 'name', 'Nguyễn Minh Anh', 120 ), 'attendee_email' => array( 'Email nhận vé', 'email', 'email', 'ban@example.com', 254 ), 'attendee_phone' => array( 'Số điện thoại', 'tel', 'tel', '09xx xxx xxx', 25 ), 'attendee_org' => array( 'Đơn vị / trường học', 'text', 'organization', 'Không bắt buộc', 180 ) ) as $key => $field ) :
                    $error = $errors->get_error_message( $key ); ?>
                    <div class="summit-field"><label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field[0] ); ?><?php if ( $key !== 'attendee_org' ) : ?> <span aria-hidden="true">*</span><?php endif; ?></label>
                    <input type="<?php echo esc_attr( $field[1] ); ?>" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" autocomplete="<?php echo esc_attr( $field[2] ); ?>" maxlength="<?php echo esc_attr( $field[4] ); ?>" value="<?php echo esc_attr( $value( $key ) ); ?>" placeholder="<?php echo esc_attr( $field[3] ); ?>" <?php echo $key !== 'attendee_org' ? 'required' : ''; ?> <?php if ( $error ) : ?>aria-invalid="true" aria-describedby="<?php echo esc_attr( $key ); ?>-error"<?php endif; ?>>
                    <?php if ( $error ) : ?><p class="summit-field-error" id="<?php echo esc_attr( $key ); ?>-error"><?php echo esc_html( $error ); ?></p><?php endif; ?></div>
                <?php endforeach; ?>
                <div class="summit-field summit-field-full"><label for="ticket_tier">Hạng vé *</label><select name="ticket_tier" id="ticket_tier" required <?php if ( $errors->get_error_message( 'ticket_tier' ) ) : ?>aria-invalid="true" aria-describedby="ticket_tier-error"<?php endif; ?>><?php foreach ( $types as $key => $type ) : ?><option value="<?php echo esc_attr( $key ); ?>" <?php selected( $selected_tier, $key ); ?>><?php echo esc_html( $type['label'] ); ?> — miễn phí</option><?php endforeach; ?></select><?php if ( $errors->get_error_message( 'ticket_tier' ) ) : ?><p id="ticket_tier-error" class="summit-field-error"><?php echo esc_html( $errors->get_error_message( 'ticket_tier' ) ); ?></p><?php endif; ?></div>
                </div>
                <label class="summit-consent"><input name="attendee_consent" type="checkbox" value="1" required <?php checked( $value( 'attendee_consent' ), '1' ); ?>><span>Tôi đồng ý sử dụng thông tin trên để xử lý đăng ký và gửi vé tham dự. Thông tin không được công khai trên website.</span></label>
                <?php if ( $errors->get_error_message( 'attendee_consent' ) ) : ?><p class="summit-field-error"><?php echo esc_html( $errors->get_error_message( 'attendee_consent' ) ); ?></p><?php endif; ?>
                <button type="submit" class="summit-button summit-button-primary">Xác nhận đăng ký <span aria-hidden="true">↗</span></button>
                <p class="summit-small">Mỗi email đăng ký một vé cho sự kiện. Bạn có thể lưu QR ngay sau khi hoàn tất.</p>
            </form>
        </div>
    </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
