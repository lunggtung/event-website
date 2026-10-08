<?php
/**
 * Custom Shortcodes Module
 * 
 * Lập trình viên phụ trách: TV3 (PHP Logic & Secure Coding)
 * Chức năng: Cung cấp các Shortcode tùy biến hiển thị giao diện sự kiện,
 *            tuân thủ tuyệt đối chuẩn Lập trình an toàn của WordPress (Phần 3).
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. SHORTCODE: [event_alert] - HỘP THÔNG BÁO SỰ KIỆN KHẨN CẤP
 *
 * Cú pháp mẫu:
 * [event_alert type="warning" title="Thay đổi phòng thuyết trình!"]
 * Diễn giả GS. Nguyễn Văn A sẽ chuyển từ Hội trường A sang Phòng Hội thảo B lúc 09:30.
 * [/event_alert]
 *
 * Áp dụng Lập trình an toàn:
 * - Sanitization: sanitize_text_field() cho thuộc tính type, title.
 * - Escaping: esc_attr() cho class CSS, esc_html() cho tiêu đề và nội dung.
 */
function event_child_alert_shortcode( $atts, $content = null ) {
    // 1. Phân tích và gán giá trị mặc định cho thuộc tính
    $raw_atts = shortcode_atts(
        array(
            'type'  => 'info', // Hỗ trợ: info, warning, success, danger
            'title' => 'Thông báo từ Ban Tổ Chức',
        ),
        $atts,
        'event_alert'
    );

    // 2. SANITIZATION: Lọc sạch dữ liệu đầu vào
    $clean_type  = sanitize_text_field( $raw_atts['type'] );
    $clean_title = sanitize_text_field( $raw_atts['title'] );

    // Kiểm tra tính hợp lệ (Validation whitelist) của loại thông báo
    $allowed_types = array( 'info', 'warning', 'success', 'danger' );
    if ( ! in_array( $clean_type, $allowed_types, true ) ) {
        $clean_type = 'info';
    }

    // 3. ESCAPING: Xử lý dữ liệu đầu ra chống tấn công XSS (Cross-Site Scripting)
    $safe_class = 'ots-alert ots-alert-' . esc_attr( $clean_type );
    $safe_title = esc_html( $clean_title );
    $safe_body  = esc_html( trim( (string) $content ) );

    // Trả về chuỗi HTML an toàn
    ob_start();
    ?>
    <div class="<?php echo $safe_class; ?>" role="alert">
        <div class="ots-alert-header">
            <span class="ots-alert-icon">📢</span>
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
 * 2. SHORTCODE: [event_countdown] - KHỐI ĐỒNG HỒ ĐẾM NGƯỢC THỜI GIAN THỰC
 *
 * Cú pháp mẫu:
 * [event_countdown title="Đếm ngược đến giờ khai mạc Open Tech Summit 2026" target="2026-11-20T08:00:00"]
 *
 * Áp dụng Lập trình an toàn:
 * - Sanitization: sanitize_text_field() cho chuỗi ngày tháng và tiêu đề.
 * - Escaping: esc_html() và esc_attr() khi in ra DOM cho JavaScript đọc.
 */
function event_child_countdown_shortcode( $atts ) {
    $raw_atts = shortcode_atts(
        array(
            'title'  => 'Thời Gian Đếm Ngược Đến Khai Mạc',
            'target' => '2026-11-20T08:00:00', // Ngày khai mạc hội nghị
        ),
        $atts,
        'event_countdown'
    );

    // Sanitization
    $clean_title  = sanitize_text_field( $raw_atts['title'] );
    $clean_target = sanitize_text_field( $raw_atts['target'] );

    // Escaping
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
