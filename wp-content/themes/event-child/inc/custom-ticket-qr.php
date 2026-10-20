<?php
/** Local QR generation and ticket email. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function event_child_ticket_qr_png( $code ) {
    if ( ! preg_match( '/^OTS2026-[A-F0-9]{12}$/', $code ) ) { return new WP_Error( 'qr_code', 'Mã vé không hợp lệ.' ); }
    $autoload = __DIR__ . '/qr/vendor/autoload.php';
    if ( ! file_exists( $autoload ) ) { return new WP_Error( 'qr_library', 'Thư viện QR chưa sẵn sàng.' ); }
    require_once $autoload;
    try {
        $qr = new \Endroid\QrCode\QrCode( $code );
        $qr->setSize( 360 );
        $qr->setMargin( 24 );
        return ( new \Endroid\QrCode\Writer\PngWriter() )->write( $qr )->getString();
    } catch ( \Throwable $exception ) {
        return new WP_Error( 'qr_render', 'Chưa thể tạo mã QR.' );
    }
}

function event_child_mail_is_local() {
    $settings = get_option( 'event_child_smtp', array() );
    $host = (string) ( $settings['host'] ?? '' );
    if ( $host !== '' ) { return in_array( strtolower( $host ), array( 'localhost', '127.0.0.1', '::1' ), true ); }
    return stripos( (string) ini_get( 'sendmail_path' ), 'mailpit' ) !== false || in_array( ini_get( 'SMTP' ), array( 'localhost', '127.0.0.1' ), true );
}

function event_child_send_ticket( $id ) {
    $ticket = event_child_get_ticket( $id );
    if ( ! $ticket ) { return new WP_Error( 'ticket_missing', 'Không tìm thấy vé.' ); }
    $png = event_child_ticket_qr_png( $ticket['ticket_code'] );
    if ( is_wp_error( $png ) ) { return $png; }
    $file = wp_tempnam( $ticket['ticket_code'] . '.png' );
    if ( ! $file || file_put_contents( $file, $png ) === false ) { return new WP_Error( 'ticket_file', 'Chưa thể tạo tệp vé.' ); }
    $types = event_child_ticket_types();
    $tier = $types[ $ticket['tier'] ]['label'] ?? $ticket['tier'];
    $event = event_child_event_data();
    $subject = 'Vé tham dự Open Tech Summit 2026 — ' . $ticket['ticket_code'];
    $body = '<!doctype html><html lang="vi"><body style="margin:0;background:#f5f3ed;font-family:Arial,sans-serif;color:#20231f"><div style="max-width:580px;margin:32px auto;background:#fff;padding:36px;border-top:5px solid #b9472b">';
    $body .= '<p style="font-size:12px;letter-spacing:2px">OPEN TECH SUMMIT / 2026</p><h1 style="font-size:28px">Vé tham dự của bạn</h1>';
    $body .= '<p>Chào ' . esc_html( $ticket['attendee_name'] ) . ',</p><p>Thông tin đăng ký của bạn đã được lưu. Ảnh QR được đính kèm trong thư này.</p>';
    $body .= '<p><strong>Mã vé:</strong> ' . esc_html( $ticket['ticket_code'] ) . '<br><strong>Hạng vé:</strong> ' . esc_html( $tier ) . '<br><strong>Thời gian:</strong> 20–22/11/2026<br><strong>Địa điểm:</strong> ' . esc_html( $event['venue'] ) . '</p>';
    $body .= '<p>Vui lòng lưu ảnh QR để xuất trình khi đến. Giữ riêng mã vé và không chia sẻ công khai.</p><hr style="border:0;border-top:1px solid #ddd"><p style="font-size:12px;color:#666">Đây là vé minh họa cho website thực hành Open Tech Summit 2026, không phải vé của một sự kiện thương mại.</p></div></body></html>';
    $sent = wp_mail( $ticket['email'], $subject, $body, array( 'Content-Type: text/html; charset=UTF-8' ), array( $file ) );
    wp_delete_file( $file );
    $status = $sent ? ( event_child_mail_is_local() ? 'local' : 'sent' ) : 'failed';
    global $wpdb;
    $wpdb->update( event_child_ticket_table(), array( 'mail_status' => $status, 'sent_at' => $sent ? current_time( 'mysql', true ) : null ), array( 'id' => (int) $id ), array( '%s', '%s' ), array( '%d' ) );
    return $sent ? $status : new WP_Error( 'mail_failed', 'Vé đã được lưu nhưng email chưa gửi được.' );
}

function event_child_configure_smtp( $mailer ) {
    $settings = get_option( 'event_child_smtp', array() );
    if ( empty( $settings['host'] ) ) { return; }
    $mailer->isSMTP();
    $mailer->Host = $settings['host'];
    $mailer->Port = absint( $settings['port'] ?? 587 );
    $mailer->SMTPSecure = $settings['encryption'] ?? 'tls';
    $mailer->SMTPAuth = ! empty( $settings['username'] );
    $mailer->Username = $settings['username'] ?? '';
    $mailer->Password = function_exists( 'event_child_decrypt_smtp_password' ) ? event_child_decrypt_smtp_password( $settings['password'] ?? '' ) : '';
    $mailer->Timeout = 15;
    if ( ! empty( $settings['from'] ) ) { $mailer->setFrom( $settings['from'], 'Open Tech Summit 2026', false ); }
}
add_action( 'phpmailer_init', 'event_child_configure_smtp', 20 );
