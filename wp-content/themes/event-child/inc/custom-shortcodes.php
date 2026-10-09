<?php
/**
 * Custom Shortcodes Module
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. Shortcode hiển thị hộp thông báo: [event_alert]
 *
 * Cú pháp: [event_alert type="warning" title="Thông báo"]Nội dung[/event_alert]
 */
function event_child_alert_shortcode( $atts, $content = null ) {
    $raw_atts = shortcode_atts(
        array(
            'type'  => 'info',
            'title' => 'Thông báo từ Ban Tổ Chức',
        ),
        $atts,
        'event_alert'
    );

    // Lọc dữ liệu đầu vào
    $clean_type  = sanitize_text_field( $raw_atts['type'] );
    $clean_title = sanitize_text_field( $raw_atts['title'] );

    $allowed_types = array( 'info', 'warning', 'success', 'danger' );
    if ( ! in_array( $clean_type, $allowed_types, true ) ) {
        $clean_type = 'info';
    }

    // Xử lý dữ liệu an toàn trước khi in ra HTML
    $safe_class = 'ots-alert ots-alert-' . esc_attr( $clean_type );
    $safe_title = esc_html( $clean_title );
    $safe_body  = esc_html( trim( (string) $content ) );

    ob_start();
    ?>
    <div class="<?php echo $safe_class; ?>" role="alert">
        <div class="ots-alert-header">
            <strong><?php echo $safe_title; ?></strong>
        </div>
        <div class="ots-alert-content">
            <?php echo $safe_body; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'event_alert', 'event_child_alert_shortcode' );


/**
 * 2. Shortcode đồng hồ đếm ngược: [event_countdown]
 *
 * Cú pháp: [event_countdown title="..." target="2026-11-20T08:00:00"]
 */
function event_child_countdown_shortcode( $atts ) {
    $raw_atts = shortcode_atts(
        array(
            'title'  => 'Thời Gian Đếm Ngược Đến Khai Mạc',
            'target' => '2026-11-20T08:00:00',
        ),
        $atts,
        'event_countdown'
    );

    // Lọc dữ liệu đầu vào
    $clean_title  = sanitize_text_field( $raw_atts['title'] );
    $clean_target = sanitize_text_field( $raw_atts['target'] );

    // Xử lý dữ liệu an toàn
    $safe_title  = esc_html( $clean_title );
    $safe_target = esc_attr( $clean_target );

    ob_start();
    ?>
    <div class="ots-countdown-container" data-target="<?php echo $safe_target; ?>">
        <h3 class="ots-countdown-title"><?php echo $safe_title; ?></h3>
        <div class="ots-countdown-grid">
            <div class="ots-cd-box">
                <span id="cd-days" class="ots-cd-number">00</span>
                <span class="ots-cd-label">Ngày</span>
            </div>
            <div class="ots-cd-separator">:</div>
            <div class="ots-cd-box">
                <span id="cd-hours" class="ots-cd-number">00</span>
                <span class="ots-cd-label">Giờ</span>
            </div>
            <div class="ots-cd-separator">:</div>
            <div class="ots-cd-box">
                <span id="cd-minutes" class="ots-cd-number">00</span>
                <span class="ots-cd-label">Phút</span>
            </div>
            <div class="ots-cd-separator">:</div>
            <div class="ots-cd-box">
                <span id="cd-seconds" class="ots-cd-number">00</span>
                <span class="ots-cd-label">Giây</span>
            </div>
        </div>
        <p id="cd-expired-msg" class="ots-cd-expired" style="display: none;">
            🎉 Hội nghị Khoa học & Công nghệ Mở 2026 đang diễn ra!
        </p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'event_countdown', 'event_child_countdown_shortcode' );


/**
 * 3. SHORTCODE: [event_ticket_card] - THẺ LOẠI VÉ HỘI NGHỊ
 *
 * Cú pháp mẫu:
 * [event_ticket_card type="VIP" price="Miễn phí" slots="50"]
 */
function event_child_ticket_card_shortcode( $atts ) {
    $raw_atts = shortcode_atts(
        array(
            'type'  => 'Tiêu Chuẩn',
            'price' => '0 VNĐ (Miễn Phí)',
            'slots' => '200',
        ),
        $atts,
        'event_ticket_card'
    );

    // Sanitization
    $clean_type  = sanitize_text_field( $raw_atts['type'] );
    $clean_price = sanitize_text_field( $raw_atts['price'] );
    $clean_slots = absint( $raw_atts['slots'] ); // Ép kiểu số nguyên dương an toàn

    // Escaping
    $safe_type  = esc_html( $clean_type );
    $safe_price = esc_html( $clean_price );
    $safe_slots = esc_html( (string) $clean_slots );

    ob_start();
    ?>
    <div class="ots-ticket-card">
        <div class="ots-ticket-badge">Vé Tham Dự</div>
        <h4 class="ots-ticket-type"><?php echo $safe_type; ?></h4>
        <div class="ots-ticket-price"><?php echo $safe_price; ?></div>
        <p class="ots-ticket-slots">Số lượng chỗ giới hạn: <strong><?php echo $safe_slots; ?></strong> vé</p>
        <a href="#register-form-section" class="ots-btn-register">Đăng Ký Nhận Vé QR</a>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'event_ticket_card', 'event_child_ticket_card_shortcode' );
