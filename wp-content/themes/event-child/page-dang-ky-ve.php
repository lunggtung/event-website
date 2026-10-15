<?php
/**
 * Template Name: Đăng Ký Vé Tham Dự
 * Description: Mẫu giao diện bảng giá vé và form đăng ký trực tuyến tự động sinh mã QR
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Xử lý gửi form đăng ký nội bộ nếu khách submit form
$registration_success = false;
$ticket_code = '';
$attendee_name = '';
$attendee_email = '';
$ticket_tier = '';

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['event_register_nonce'] ) ) {
    if ( wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['event_register_nonce'] ) ), 'event_ticket_register' ) ) {
        $attendee_name  = isset( $_POST['attendee_name'] ) ? sanitize_text_field( wp_unslash( $_POST['attendee_name'] ) ) : '';
        $attendee_email = isset( $_POST['attendee_email'] ) ? sanitize_email( wp_unslash( $_POST['attendee_email'] ) ) : '';
        $ticket_tier    = isset( $_POST['ticket_tier'] ) ? sanitize_text_field( wp_unslash( $_POST['ticket_tier'] ) ) : 'Standard';

        if ( ! empty( $attendee_name ) && ! empty( $attendee_email ) && is_email( $attendee_email ) ) {
            // Sinh mã định danh vé duy nhất
            $ticket_code = 'OTS2026-' . strtoupper( wp_generate_password( 6, false ) );
            $registration_success = true;
        }
    }
}
?>

<main id="primary" class="site-main event-page event-page-tickets">
    <!-- Page Header Banner -->
    <section class="event-page-header">
        <div class="event-container">
            <h1 class="event-page-title">Đăng Ký Vé Tham Dự Hội Nghị</h1>
            <p class="event-page-subtitle">
                Nhận vé điện tử chính thức và mã QR Code cá nhân hóa để check-in nhanh tại bàn tiếp đón đại biểu.
            </p>
        </div>
    </section>

    <div class="event-container event-main-content">
        <!-- Ticket Pricing Table -->
        <div class="event-pricing-table">
            <div class="pricing-card card-student">
                <div class="pricing-badge">ƯU ĐÃI HỌC THUẬT</div>
                <h3 class="pricing-title">Vé Sinh Viên</h3>
                <div class="pricing-cost">0 <span class="currency">VNĐ</span></div>
                <p class="pricing-desc">Dành riêng cho học sinh, sinh viên các trường Đại học &amp; Cao đẳng.</p>
                <ul class="pricing-features">
                    <li>&#10003; Tham dự toàn bộ các phiên hội thảo chung</li>
                    <li>&#10003; Cấp mã QR điện tử check-in qua email</li>
                    <li>&#10003; Tài liệu tóm tắt hội thảo dạng PDF</li>
                    <li>&#10003; Yêu cầu xuất trình thẻ sinh viên tại cửa</li>
                </ul>
                <a href="#register-form-section" class="event-btn event-btn-outline select-ticket-btn" data-tier="Sinh Viên">Chọn Hạng Vé Này</a>
            </div>

            <div class="pricing-card card-standard featured">
                <div class="pricing-badge badge-popular">PHỔ BIẾN NHẤT</div>
                <h3 class="pricing-title">Vé Tiêu Chuẩn</h3>
                <div class="pricing-cost">Miễn Phí <span class="currency">(GPL)</span></div>
                <p class="pricing-desc">Dành cho kỹ sư phần mềm, giảng viên và người làm công nghệ.</p>
                <ul class="pricing-features">
                    <li>&#10003; Toàn quyền tham dự 3 phòng chuyên đề trong 3 ngày</li>
                    <li>&#10003; Bộ kỷ yếu số hóa đầy đủ các bài báo cáo khoa học</li>
                    <li>&#10003; Cấp Giấy Chứng Nhận tham dự hội nghị điện tử</li>
                    <li>&#10003; Teabreak trà chiều giữa các phiên thảo luận</li>
                </ul>
                <a href="#register-form-section" class="event-btn event-btn-accent select-ticket-btn" data-tier="Tiêu Chuẩn">Chọn Hạng Vé Này</a>
            </div>

            <div class="pricing-card card-vip">
                <div class="pricing-badge badge-gold">TOÀN QUYỀN VIP</div>
                <h3 class="pricing-title">Vé Khách Mời VIP</h3>
                <div class="pricing-cost">Đặc Biệt <span class="currency">Pass</span></div>
                <p class="pricing-desc">Dành cho lãnh đạo doanh nghiệp, đại diện viện nghiên cứu và nhà tài trợ.</p>
                <ul class="pricing-features">
                    <li>&#10003; Toàn bộ quyền lợi của Vé Tiêu Chuẩn</li>
                    <li>&#10003; Vị trí ghế ngồi danh dự tại hàng đầu Hội Trường A</li>
                    <li>&#10003; Tham gia tiệc Networking Lunch cùng dàn Diễn giả</li>
                    <li>&#10003; Nhận trọn bộ Kỷ yếu in ấn đóng bìa cứng có chỉ số ISBN</li>
                </ul>
                <a href="#register-form-section" class="event-btn event-btn-outline select-ticket-btn" data-tier="VIP">Chọn Hạng Vé Này</a>
            </div>
        </div>

        <!-- Registration Success Notice & QR Box -->
        <?php if ( $registration_success ) : ?>
            <div class="event-registration-success-box">
                <div class="success-header">
                    <span class="success-icon">&#10004;</span>
                    <h3>ĐĂNG KÝ VÉ THÀNH CÔNG!</h3>
                </div>
                <p>Cảm ơn bạn <strong><?php echo esc_html( $attendee_name ); ?></strong> đã đăng ký tham dự Hội Nghị Khoa Học &amp; Công Nghệ Mở 2026.</p>
                
                <div class="ticket-result-card">
                    <div class="ticket-result-details">
                        <p><strong>Mã vé định danh:</strong> <span class="ticket-code-highlight"><?php echo esc_html( $ticket_code ); ?></span></p>
                        <p><strong>Hạng vé:</strong> <?php echo esc_html( $ticket_tier ); ?></p>
                        <p><strong>Email nhận vé:</strong> <?php echo esc_html( $attendee_email ); ?></p>
                        <p><strong>Thời gian:</strong> 20 &ndash; 22/11/2026 &bull; Trung tâm Hội nghị Quốc gia</p>
                    </div>
                    <div class="ticket-result-qr">
                        <?php
                        $qr_data = 'OTS2026|CODE:' . $ticket_code . '|NAME:' . rawurlencode( $attendee_name );
                        $qr_url  = 'https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=' . rawurlencode( $qr_data );
                        ?>
                        <img src="<?php echo esc_url( $qr_url ); ?>" alt="Mã QR Vé Tham Dự <?php echo esc_attr( $ticket_code ); ?>" class="ticket-qr-img">
                        <span class="qr-caption">Xuất trình mã này tại cổng</span>
                    </div>
                </div>
                <p class="success-footer-note">Hệ thống thư điện tử SMTP đã ghi nhận và gửi bản sao lưu vé điện tử kèm mã QR về hòm thư của bạn.</p>
            </div>
        <?php endif; ?>

        <!-- Registration Form Section -->
        <div id="register-form-section" class="event-registration-form-wrapper">
            <div class="form-card-container">
                <div class="form-header">
                    <h2 class="form-title">Form Đăng Ký Nhận Vé Điện Tử &amp; Mã QR</h2>
                    <p class="form-desc">Vui lòng điền chính xác thông tin cá nhân để ban tổ chức chuẩn bị thẻ đại biểu và gửi mã QR tham dự qua email.</p>
                </div>

                <form method="post" action="<?php echo esc_url( get_permalink() ); ?>" class="event-register-form">
                    <?php wp_nonce_field( 'event_ticket_register', 'event_register_nonce' ); ?>

                    <div class="form-row">
                        <div class="form-group col-half">
                            <label for="attendee_name">Họ và Tên Đại Biểu <span class="required">*</span></label>
                            <input type="text" id="attendee_name" name="attendee_name" required placeholder="Ví dụ: Nguyễn Văn Bình" class="form-control">
                        </div>
                        <div class="form-group col-half">
                            <label for="attendee_email">Địa Chỉ Email Nhận Vé <span class="required">*</span></label>
                            <input type="email" id="attendee_email" name="attendee_email" required placeholder="nguyenbinh@gmail.com" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-half">
                            <label for="attendee_phone">Số Điện Thoại Liên Hệ <span class="required">*</span></label>
                            <input type="tel" id="attendee_phone" name="attendee_phone" required placeholder="0987 654 321" class="form-control">
                        </div>
                        <div class="form-group col-half">
                            <label for="attendee_org">Đơn Vị Công Tác / Trường Đại Học</label>
                            <input type="text" id="attendee_org" name="attendee_org" placeholder="Đại học Quốc Gia / Viện Nghiên Cứu..." class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ticket_tier">Lựa Chọn Hạng Vé <span class="required">*</span></label>
                        <select id="ticket_tier" name="ticket_tier" class="form-control select-control">
                            <option value="Sinh Viên">Vé Sinh Viên (0 VNĐ - Xuất trình thẻ SV tại cổng)</option>
                            <option value="Tiêu Chuẩn" selected>Vé Tiêu Chuẩn (Miễn phí theo chuẩn GPL)</option>
                            <option value="VIP">Vé VIP (Toàn quyền tham dự &amp; Tiệc Networking Lunch)</option>
                        </select>
                    </div>

                    <div class="form-group checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" required checked>
                            Tôi đồng ý nhận thông tin cập nhật lịch trình và mã vé QR qua email từ Ban Tổ Chức Hội Nghị Open Tech Summit 2026.
                        </label>
                    </div>

                    <div class="form-submit-group">
                        <button type="submit" class="event-btn event-btn-accent form-submit-btn">
                            Xác Nhận Đăng Ký &amp; Tạo Mã Vé QR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
// Tự động gán loại vé khi bấm nút Chọn Hạng Vé trên bảng giá
document.addEventListener('DOMContentLoaded', function() {
    var selectBtns = document.querySelectorAll('.select-ticket-btn');
    var tierSelect = document.getElementById('ticket_tier');
    if (selectBtns && tierSelect) {
        selectBtns.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                var tier = this.getAttribute('data-tier');
                if (tier) {
                    tierSelect.value = tier;
                }
            });
        });
    }
});
</script>

<?php
get_footer();
