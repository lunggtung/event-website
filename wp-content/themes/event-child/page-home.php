<?php
/**
 * Template Name: Trang Chủ Sự Kiện
 * Description: Mẫu giao diện chuyên trang chính thức cho Hội Nghị Khoa Học & Công Nghệ Mở 2026
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main event-page event-page-home">
    <!-- Hero Banner Section -->
    <section class="event-hero-section">
        <div class="event-container">
            <div class="event-hero-badge">HỘI NGHỊ THƯỜNG NIÊN LẦN THỨ V</div>
            <h1 class="event-hero-title">
                Hội Nghị Khoa Học &amp; Công Nghệ Mở 2026
            </h1>
            <p class="event-hero-subtitle">
                Open Tech Summit 2026 &mdash; Kiến tạo tương lai số với nền tảng Mã Nguồn Mở, Trí Tuệ Nhân Tạo minh bạch và An toàn thông tin.
            </p>

            <div class="event-hero-meta">
                <div class="event-meta-item">
                    <span class="event-meta-icon">&#128197;</span>
                    <span class="event-meta-text"><strong>Thời gian:</strong> 20 &ndash; 22 Tháng 11, 2026</span>
                </div>
                <div class="event-meta-item">
                    <span class="event-meta-icon">&#128205;</span>
                    <span class="event-meta-text"><strong>Địa điểm:</strong> Trung tâm Hội nghị Quốc gia, Hà Nội</span>
                </div>
            </div>

            <div class="event-hero-actions">
                <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="event-btn event-btn-accent">
                    Đăng Ký Vé Tham Dự
                </a>
                <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="event-btn event-btn-outline">
                    Xem Lịch Trình Chi Tiết
                </a>
            </div>
        </div>
    </section>

    <!-- Countdown & Alert Section -->
    <section class="event-countdown-wrapper">
        <div class="event-container">
            <?php
            // Gọi Shortcode đếm ngược thời gian thực
            echo do_shortcode( '[event_countdown date="2026-11-20 08:00:00" title="Thời Gian Đếm Ngược Đến Lễ Khai Mạc"]' );
            ?>

            <div class="event-alert-box">
                <?php
                echo do_shortcode( '[event_alert type="warning"]Cổng đăng ký vé Sinh viên (Miễn phí) giới hạn 500 suất đầu tiên. Vui lòng đăng ký sớm để nhận mã QR check-in tại hội trường.[/event_alert]' );
                ?>
            </div>
        </div>
    </section>

    <!-- Key Metrics Section -->
    <section class="event-metrics-section">
        <div class="event-container">
            <div class="event-metrics-grid">
                <div class="event-metric-card">
                    <div class="event-metric-number">03</div>
                    <div class="event-metric-label">Ngày Hội Thảo &amp; Thực Hành</div>
                </div>
                <div class="event-metric-card">
                    <div class="event-metric-number">30+</div>
                    <div class="event-metric-label">Diễn Giả &amp; Chuyên Gia Đầu Ngành</div>
                </div>
                <div class="event-metric-card">
                    <div class="event-metric-number">1.500+</div>
                    <div class="event-metric-label">Đại Biểu &amp; Khách Tham Dự</div>
                </div>
                <div class="event-metric-card">
                    <div class="event-metric-number">20+</div>
                    <div class="event-metric-label">Phiên Báo Cáo Chuyên Sâu</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3 Tracks Highlights Section -->
    <section class="event-tracks-section">
        <div class="event-container">
            <div class="event-section-header">
                <h2 class="event-section-title">3 Phân Hệ Hội Thảo Trọng Điểm</h2>
                <p class="event-section-desc">
                    Chương trình hội thảo được cấu trúc thành 3 phòng chuyên đề song song phục vụ đa dạng nhu cầu nghiên cứu và ứng dụng.
                </p>
            </div>

            <div class="event-tracks-grid">
                <div class="event-track-card">
                    <div class="event-track-badge track-1">HỘI TRƯỜNG A</div>
                    <h3 class="event-track-title">Trí Tuệ Nhân Tạo &amp; Dữ Liệu Mở</h3>
                    <p class="event-track-desc">
                        Nghiên cứu các mô hình ngôn ngữ lớn nguồn mở (Open LLMs), đạo đức AI, và việc triển khai các giải pháp AI tự lưu trữ trên hạ tầng máy chủ cục bộ.
                    </p>
                    <ul class="event-track-features">
                        <li>Mô hình AI mã nguồn mở &amp; Giấy phép bản quyền</li>
                        <li>Tối ưu hóa Inference trên phần cứng phổ thông</li>
                        <li>Bảo vệ quyền riêng tư trong kỷ nguyên AI</li>
                    </ul>
                </div>

                <div class="event-track-card">
                    <div class="event-track-badge track-2">PHÒNG HỘI THẢO B</div>
                    <h3 class="event-track-title">Điện Toán Đám Mây &amp; Linux</h3>
                    <p class="event-track-desc">
                        Kiến trúc nhân Linux, container hóa với Docker/Kubernetes, giải pháp ảo hóa nguồn mở Proxmox và tự động hóa quy trình DevOps.
                    </p>
                    <ul class="event-track-features">
                        <li>Kiến trúc nhân Linux Monolithic &amp; Mô-đun động</li>
                        <li>Triển khai cụm Kubernetes quy mô lớn</li>
                        <li>Giám sát hạ tầng với Prometheus &amp; Grafana</li>
                    </ul>
                </div>

                <div class="event-track-card">
                    <div class="event-track-badge track-3">PHÒNG HỘI THẢO C</div>
                    <h3 class="event-track-title">An Toàn Thông Tin &amp; Tuân Thủ FOSS</h3>
                    <p class="event-track-desc">
                        Kỹ thuật gia cố hệ thống máy chủ (Hardening), rà quét lỗ hổng ứng dụng với WPScan, và quản trị rủi ro chuỗi cung ứng phần mềm.
                    </p>
                    <ul class="event-track-features">
                        <li>Phòng thủ chiều sâu cho CMS mã nguồn mở</li>
                        <li>Rà soát mã độc và kiểm toán giấy phép GPL</li>
                        <li>Thực hành kỹ thuật pentest an toàn mạng</li>
                    </ul>
                </div>
            </div>

            <div class="event-tracks-cta">
                <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="event-btn event-btn-primary">
                    Xem Lịch Trình Chi Tiết Các Phòng
                </a>
            </div>
        </div>
    </section>

    <!-- FOSS Compliance Banner -->
    <section class="event-compliance-section">
        <div class="event-container">
            <div class="event-compliance-card">
                <div class="event-compliance-content">
                    <h3 class="event-compliance-title">Cam Kết Minh Bạch Mã Nguồn Mở</h3>
                    <p class="event-compliance-desc">
                        Toàn bộ cổng thông tin hội nghị được xây dựng trên nền tảng WordPress và hệ thống Child Theme phát triển tuân thủ đầy đủ giấy phép bản quyền GNU General Public License v2 (GPLv2).
                    </p>
                </div>
                <div class="event-compliance-badge">
                    <span class="badge-icon">&#9878;</span>
                    <span class="badge-text">GNU GPLv2 &amp; MIT Licensed</span>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
