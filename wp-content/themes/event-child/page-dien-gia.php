<?php
/**
 * Template Name: Hồ Sơ Diễn Giả
 * Description: Mẫu giao diện danh bạ chuyên gia, diễn giả khách mời của hội nghị
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main event-page event-page-speakers">
    <!-- Page Header Banner -->
    <section class="event-page-header">
        <div class="event-container">
            <h1 class="event-page-title">Đội Ngũ Diễn Giả Chuyên Môn</h1>
            <p class="event-page-subtitle">
                Gặp gỡ và trao đổi trực tiếp với các nhà khoa học, chuyên gia bảo mật và kiến trúc sư hệ thống mã nguồn mở hàng đầu.
            </p>
        </div>
    </section>

    <div class="event-container event-main-content">
        <!-- Topic Filter Buttons -->
        <div class="event-filter-bar">
            <button class="filter-btn active" data-filter="all">Tất Cả Lĩnh Vực</button>
            <button class="filter-btn" data-filter="security">An Toàn Thông Tin</button>
            <button class="filter-btn" data-filter="cloud">Linux &amp; Đám Mây</button>
            <button class="filter-btn" data-filter="ai">Trí Tuệ Nhân Tạo</button>
        </div>

        <!-- Speakers Grid -->
        <div class="event-speakers-grid">
            <!-- Speaker 1 -->
            <div class="event-speaker-card" data-category="security">
                <div class="speaker-avatar-wrapper">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/speaker-nguyen-van-a.jpg' ); ?>" alt="GS. Nguyễn Văn A" class="speaker-avatar-img">
                    <span class="speaker-badge">KEYNOTE SPEAKER</span>
                </div>
                <div class="speaker-info">
                    <h3 class="speaker-name">GS. Nguyễn Văn A <span class="speaker-degree">Ph.D</span></h3>
                    <div class="speaker-title">Viện Trưởng &bull; Viện An Toàn Thông Tin &amp; Hệ Thống Mở</div>
                    <div class="speaker-topic">
                        <strong>Chủ đề tham luận:</strong>
                        "Chiến Lược Phòng Thủ Chiều Sâu &amp; Rà Quét Lỗ Hổng Cho Nền Tảng Mã Nguồn Mở"
                    </div>
                    <p class="speaker-bio">
                        Hơn 20 năm kinh nghiệm nghiên cứu trong lĩnh vực an toàn mạng, kiến trúc hệ điều hành và kiểm toán mã độc. Chủ trì nhiều đề tài cấp nhà nước về an ninh không gian mạng.
                    </p>
                    <div class="speaker-links">
                        <span class="speaker-link-item">GitHub: <a href="https://github.com" target="_blank" rel="noopener">@prof-nguyenvana</a></span>
                        <span class="speaker-link-item">LinkedIn: <a href="https://linkedin.com" target="_blank" rel="noopener">/in/prof-nguyen-van-a</a></span>
                    </div>
                </div>
            </div>

            <!-- Speaker 2 -->
            <div class="event-speaker-card" data-category="cloud">
                <div class="speaker-avatar-wrapper">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/speaker-tran-thi-b.jpg' ); ?>" alt="ThS. Trần Thị B" class="speaker-avatar-img">
                    <span class="speaker-badge badge-blue">CHUYÊN GIA FOSS</span>
                </div>
                <div class="speaker-info">
                    <h3 class="speaker-name">ThS. Trần Thị B <span class="speaker-degree">M.Sc</span></h3>
                    <div class="speaker-title">Kiến Trúc Sư Trưởng &bull; Hiệp Hội Phần Mềm Tự Do Nguồn Mở</div>
                    <div class="speaker-topic">
                        <strong>Chủ đề tham luận:</strong>
                        "Kiến Trúc Nhân Linux Monolithic &amp; Pháp Lý Giấy Phép Bản Quyền Copyleft GPL"
                    </div>
                    <p class="speaker-bio">
                        Chuyên gia cố vấn pháp lý công nghệ và giấy phép mã nguồn mở cho các dự án chuyển đổi số. Tác giả nhiều bài báo khoa học về phân quyền bảo mật POSIX và Linux Kernel.
                    </p>
                    <div class="speaker-links">
                        <span class="speaker-link-item">GitHub: <a href="https://github.com" target="_blank" rel="noopener">@tranthib-foss</a></span>
                        <span class="speaker-link-item">LinkedIn: <a href="https://linkedin.com" target="_blank" rel="noopener">/in/tran-thi-b</a></span>
                    </div>
                </div>
            </div>

            <!-- Speaker 3 -->
            <div class="event-speaker-card" data-category="ai">
                <div class="speaker-avatar-wrapper">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/speaker-le-van-c.jpg' ); ?>" alt="KS. Lê Văn C" class="speaker-avatar-img">
                    <span class="speaker-badge badge-green">KỸ SƯ HỆ THỐNG</span>
                </div>
                <div class="speaker-info">
                    <h3 class="speaker-name">KS. Lê Văn C <span class="speaker-degree">Eng.</span></h3>
                    <div class="speaker-title">Kỹ Sư Trưởng AI &amp; Cloud &bull; Open Cloud Infrastructure</div>
                    <div class="speaker-topic">
                        <strong>Chủ đề tham luận:</strong>
                        "Triển Khai Mô Hình Ngôn Ngữ Lớn Nguồn Mở Tự Trị Trên Cụm Kubernetes"
                    </div>
                    <p class="speaker-bio">
                        Có nhiều năm vận hành các cụm máy chủ siêu tính toán và trung tâm dữ liệu mở. Chuyên sâu về container hóa microservices, tối ưu hóa inference AI và công nghệ ảo hóa nguồn mở.
                    </p>
                    <div class="speaker-links">
                        <span class="speaker-link-item">GitHub: <a href="https://github.com" target="_blank" rel="noopener">@levanc-k8s</a></span>
                        <span class="speaker-link-item">LinkedIn: <a href="https://linkedin.com" target="_blank" rel="noopener">/in/le-van-c</a></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call for Papers (CFP) Section -->
        <section class="event-cfp-section">
            <div class="event-cfp-card">
                <div class="cfp-content">
                    <h3 class="cfp-title">Bạn Muốn Trở Thành Diễn Giả Tại Hội Nghị?</h3>
                    <p class="cfp-desc">
                        Ban Chuyên Môn luôn mở rộng cơ hội cho các nhà nghiên cứu, giảng viên, kỹ sư và sinh viên xuất sắc đệ trình bài tham luận khoa học hoặc demo dự án mã nguồn mở.
                    </p>
                    <div class="cfp-requirements">
                        <span>&#10003; Đề tài nghiên cứu ứng dụng phần mềm tự do nguồn mở</span>
                        <span>&#10003; Toàn bộ mã nguồn minh họa công khai theo giấy phép GPL/MIT</span>
                        <span>&#10003; Thời hạn gửi tóm tắt: Trước ngày 15/10/2026</span>
                    </div>
                </div>
                <div class="cfp-action">
                    <a href="mailto:chuyenmon@ots2026.vn" class="event-btn event-btn-primary">
                        Gửi Đề Xuất Tham Luận (CFP)
                    </a>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
get_footer();
