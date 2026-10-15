<?php
/**
 * Template Name: Trang Chủ Sự Kiện
 * Description: Mẫu giao diện chuyên trang chính thức chuẩn công nghệ cao cho Open Tech Summit 2026
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main event-page event-page-home">
    <!-- 1. LIVE TECH ANNOUNCEMENT TICKER -->
    <div class="tech-ticker-bar">
        <div class="event-container ticker-inner">
            <span class="ticker-badge"><span class="pulse-indicator"></span> TRỰC TUYẾN</span>
            <span class="ticker-text">Cổng đăng ký vé đại biểu <strong>Open Tech Summit 2026</strong> đã chính thức mở. Hội nghị diễn ra từ ngày 20 &ndash; 22/11/2026 tại NCC Hà Nội.</span>
            <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="ticker-link">Đăng ký giữ chỗ &rarr;</a>
        </div>
    </div>

    <!-- 2. HERO BANNER SECTION (TECH GRID MATRIX BACKGROUND) -->
    <section class="tech-hero-section">
        <div class="tech-grid-overlay"></div>
        <div class="event-container tech-hero-container">
            <div class="tech-hero-content">
                <div class="hero-top-tag">
                    <svg class="tech-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    <span>HỘI NGHỊ KHOA HỌC &amp; CÔNG NGHỆ THƯỜNG NIÊN 2026</span>
                </div>

                <h1 class="tech-hero-title">
                    Hội Nghị Khoa Học &amp;<br>
                    <span class="gradient-text">Công Nghệ Mở 2026</span>
                </h1>

                <p class="tech-hero-lead">
                    Định hình tương lai số với <strong>Nền tảng Mã Nguồn Mở</strong>, <strong>Trí Tuệ Nhân Tạo Tự Chủ</strong> và <strong>Hạ Tầng Đám Mây Độc Lập</strong>. Nơi hội tụ hơn 1.500 chuyên gia, kỹ sư và nhà nghiên cứu công nghệ hàng đầu Việt Nam.
                </p>

                <div class="tech-hero-info-pills">
                    <div class="info-pill">
                        <svg class="pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <span><strong>Thời gian:</strong> 20 &ndash; 22 Tháng 11, 2026</span>
                    </div>
                    <div class="info-pill">
                        <svg class="pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span><strong>Địa điểm:</strong> Trung tâm Hội nghị Quốc gia, Hà Nội</span>
                    </div>
                    <div class="info-pill">
                        <svg class="pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        <span><strong>Tiêu chuẩn:</strong> 100% Mã Nguồn Mở GPLv2</span>
                    </div>
                </div>

                <div class="tech-hero-actions">
                    <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="btn-glow-accent">
                        <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Đăng Ký Nhận Vé Điện Tử (Mã QR)
                    </a>
                    <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="btn-glass-primary">
                        <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                        Khám Phá Lịch Trình 3 Phòng
                    </a>
                </div>
            </div>

            <!-- Terminal Code Box Display (Vibe Công Nghệ Cực Mạnh) -->
            <div class="tech-terminal-box">
                <div class="terminal-header">
                    <div class="terminal-dots">
                        <span class="dot red"></span>
                        <span class="dot yellow"></span>
                        <span class="dot green"></span>
                    </div>
                    <span class="terminal-title">bash &mdash; ots2026-connect &bull; 80&times;24</span>
                </div>
                <div class="terminal-body">
                    <div class="cli-line"><span class="cli-prompt">developer@server:~$</span> <span class="cli-cmd">curl -s https://ots2026.vn/api/summit-status</span></div>
                    <div class="cli-output json-output">
{
  <span class="json-key">"status"</span>: <span class="json-str">"ACTIVE_REGISTRATION"</span>,
  <span class="json-key">"event"</span>: <span class="json-str">"Open Tech Summit 2026"</span>,
  <span class="json-key">"date"</span>: <span class="json-str">"2026-11-20T08:00:00+07:00"</span>,
  <span class="json-key">"venue"</span>: <span class="json-str">"National Convention Center Hanoi"</span>,
  <span class="json-key">"tracks"</span>: [<span class="json-str">"Open-AI"</span>, <span class="json-str">"Linux-Cloud"</span>, <span class="json-str">"Cyber-Security"</span>],
  <span class="json-key">"license"</span>: <span class="json-str">"GNU General Public License v2"</span>,
  <span class="json-key">"tickets_left"</span>: <span class="json-num">482</span>
}
                    </div>
                    <div class="cli-line"><span class="cli-prompt">developer@server:~$</span> <span class="cli-cmd">ots-cli ticket --register --tier=Standard</span></div>
                    <div class="cli-output success-text">[OK] Verified GPL compliance. Ticket ID generated: OTS2026-DEMO</div>
                    <div class="cli-line"><span class="cli-prompt">developer@server:~$</span> <span class="cli-cursor">_</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. LIVE COUNTDOWN & URGENT ALERT -->
    <section class="tech-countdown-section">
        <div class="event-container">
            <div class="countdown-card-glass">
                <div class="countdown-header-area">
                    <div class="countdown-badge-live">
                        <span class="pulse-dot-green"></span>
                        THỜI GIAN THỰC
                    </div>
                    <h2 class="countdown-heading">Thời Gian Đếm Ngược Đến Lễ Khai Mạc Hội Nghị</h2>
                    <p class="countdown-caption">Sự kiện sẽ chính thức bắt đầu vào lúc 08:00 sáng Thứ Sáu, ngày 20/11/2026 tại Hội trường Lớn A.</p>
                </div>

                <?php
                echo do_shortcode( '[event_countdown date="2026-11-20 08:00:00" title=""]' );
                ?>

                <div class="countdown-urgent-alert">
                    <div class="alert-icon-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                    </div>
                    <div class="alert-content-wrap">
                        <strong>Lưu ý quan trọng dành cho đại biểu:</strong> Cổng đăng ký vé Sinh viên (0 VNĐ) có số lượng giới hạn 500 suất. Hệ thống sẽ tự động đóng cổng đăng ký khi đủ số lượng để đảm bảo chất lượng tiếp đón và kỷ yếu.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. KEY METRICS STATS BANNER -->
    <section class="tech-metrics-section">
        <div class="event-container">
            <div class="metrics-card-grid">
                <div class="metric-box">
                    <div class="metric-num">03</div>
                    <div class="metric-title">Ngày Hội Thảo &amp; Lab</div>
                    <div class="metric-sub">Từ 20/11 đến 22/11/2026</div>
                </div>
                <div class="metric-box">
                    <div class="metric-num">30+</div>
                    <div class="metric-title">Diễn Giả Đầu Ngành</div>
                    <div class="metric-sub">Giáo sư, Tiến sĩ, Kỹ sư trưởng</div>
                </div>
                <div class="metric-box">
                    <div class="metric-num">1.500+</div>
                    <div class="metric-title">Khách Tham Dự</div>
                    <div class="metric-sub">Đại biểu doanh nghiệp &amp; Sinh viên</div>
                </div>
                <div class="metric-box">
                    <div class="metric-num">20+</div>
                    <div class="metric-title">Phiên Chuyên Đề</div>
                    <div class="metric-sub">Song song tại 3 Hội trường</div>
                </div>
                <div class="metric-box">
                    <div class="metric-num">100%</div>
                    <div class="metric-title">Mã Nguồn Mở</div>
                    <div class="metric-sub">Chuẩn GNU GPLv2 &amp; MIT</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. 3 CHUYÊN ĐỀ TRỌNG ĐIỂM (THE 3 CORE TECH TRACKS) -->
    <section class="tech-tracks-section">
        <div class="event-container">
            <div class="tech-section-header">
                <span class="section-tag">CHƯƠNG TRÌNH NỘI DUNG</span>
                <h2 class="section-main-title">3 Phân Hệ Hội Thảo Song Song</h2>
                <p class="section-lead-desc">
                    Thiết kế dành riêng cho các kỹ sư, nhà khoa học dữ liệu, quản trị viên hệ thống và sinh viên ngành CNTT.
                </p>
            </div>

            <div class="tracks-cards-grid">
                <!-- Track 1 -->
                <div class="track-card-tech track-ai">
                    <div class="track-card-header">
                        <span class="track-hall-badge hall-a">HỘI TRƯỜNG A</span>
                        <div class="track-tech-tags">
                            <span class="tech-chip">OpenLLM</span>
                            <span class="tech-chip">PyTorch</span>
                            <span class="tech-chip">RAG</span>
                        </div>
                    </div>
                    <h3 class="track-card-title">Trí Tuệ Nhân Tạo &amp; Dữ Liệu Mở</h3>
                    <p class="track-card-desc">
                        Nghiên cứu các mô hình ngôn ngữ lớn nguồn mở (Llama, Mistral), tối ưu hóa suy luận (Inference) trên máy chủ nội bộ và đạo đức bảo vệ dữ liệu.
                    </p>
                    <div class="track-highlights-list">
                        <div class="highlight-row">
                            <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Xây dựng trợ lý AI cục bộ với Ollama &amp; LangChain</span>
                        </div>
                        <div class="highlight-row">
                            <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Bản quyền dữ liệu huấn luyện &amp; Giấy phép Open Weights</span>
                        </div>
                        <div class="highlight-row">
                            <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Keynote: Tương lai Trí tuệ Nhân tạo Tự chủ</span>
                        </div>
                    </div>
                    <div class="track-card-footer">
                        <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="track-explore-link">
                            Xem lịch trình Hội trường A &rarr;
                        </a>
                    </div>
                </div>

                <!-- Track 2 -->
                <div class="track-card-tech track-cloud">
                    <div class="track-card-header">
                        <span class="track-hall-badge hall-b">PHÒNG HỘI THẢO B</span>
                        <div class="track-tech-tags">
                            <span class="tech-chip">Linux 6.x</span>
                            <span class="tech-chip">Kubernetes</span>
                            <span class="tech-chip">DevOps</span>
                        </div>
                    </div>
                    <h3 class="track-card-title">Điện Toán Đám Mây &amp; Nhân Linux</h3>
                    <p class="track-card-desc">
                        Chuyên sâu về kiến trúc nhân Linux Monolithic, quản trị tài nguyên POSIX, ảo hóa hạ tầng với Proxmox và tự động hóa điều phối cụm Kubernetes.
                    </p>
                    <div class="track-highlights-list">
                        <div class="highlight-row">
                            <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Phân tích hiệu năng Linux Kernel vs Hybrid Windows 11</span>
                        </div>
                        <div class="highlight-row">
                            <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Triển khai cụm microservices khả năng tự phục hồi (Self-healing)</span>
                        </div>
                        <div class="highlight-row">
                            <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Lưu trữ phân tán Ceph Storage &amp; OpenStack</span>
                        </div>
                    </div>
                    <div class="track-card-footer">
                        <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="track-explore-link">
                            Xem lịch trình Phòng B &rarr;
                        </a>
                    </div>
                </div>

                <!-- Track 3 -->
                <div class="track-card-tech track-security">
                    <div class="track-card-header">
                        <span class="track-hall-badge hall-c">PHÒNG HỘI THẢO C</span>
                        <div class="track-tech-tags">
                            <span class="tech-chip">WPScan</span>
                            <span class="tech-chip">Hardening</span>
                            <span class="tech-chip">GPLv2</span>
                        </div>
                    </div>
                    <h3 class="track-card-title">An Toàn Thông Tin &amp; Tuân Thủ FOSS</h3>
                    <p class="track-card-desc">
                        Kỹ thuật phòng thủ chiều sâu, rà soát mã độc, kiểm toán bảo mật ứng dụng với WPScan, và quản trị bản quyền phần mềm nguồn mở trong chuyển đổi số.
                    </p>
                    <div class="track-highlights-list">
                        <div class="highlight-row">
                            <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Thực hành kỹ thuật rà quét lỗ hổng với công cụ WPScan</span>
                        </div>
                        <div class="highlight-row">
                            <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Gia cố máy chủ Web: Chặn XML-RPC, ẩn phiên bản, đổi URL</span>
                        </div>
                        <div class="highlight-row">
                            <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Bảo vệ quyền sở hữu trí tuệ và giấy phép Copyleft</span>
                        </div>
                    </div>
                    <div class="track-card-footer">
                        <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="track-explore-link">
                            Xem lịch trình Phòng C &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. WHY ATTEND / GIÁ TRỊ CỐT LÕI (PROMOTIONAL SECTION) -->
    <section class="tech-value-section">
        <div class="event-container">
            <div class="value-box-glass">
                <div class="value-content-col">
                    <span class="value-subtitle">VÌ SAO BẠN NÊN THAM DỰ?</span>
                    <h2 class="value-main-title">Kết Nối Với Hệ Sinh Thái Mã Nguồn Mở Lớn Nhất Năm</h2>
                    <p class="value-paragraph">
                        Hội Nghị Khoa Học &amp; Công Nghệ Mở 2026 không chỉ là một sự kiện lý thuyết, mà là một không gian học thuật thực chiến, nơi các công nghệ tiên tiến nhất được mổ xẻ và trình diễn trực tiếp:
                    </p>
                    <div class="value-perks-grid">
                        <div class="perk-item">
                            <div class="perk-icon-wrap">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            <div class="perk-text">
                                <h4>Giao Lưu Trực Tiếp Cùng Chuyên Gia</h4>
                                <p>Cơ hội đối thoại 1-1 với các Giáo sư đầu ngành và các Kỹ sư trưởng hệ thống lớn.</p>
                            </div>
                        </div>
                        <div class="perk-item">
                            <div class="perk-icon-wrap">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            </div>
                            <div class="perk-text">
                                <h4>Kỷ Yếu Khoa Học Chuẩn ISBN</h4>
                                <p>Nhận trọn bộ tài liệu số hóa và kỷ yếu in ấn phục vụ học tập, nghiên cứu.</p>
                            </div>
                        </div>
                        <div class="perk-item">
                            <div class="perk-icon-wrap">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            </div>
                            <div class="perk-text">
                                <h4>Chứng Nhận Điện Tử Xác Thực</h4>
                                <p>Được cấp Giấy Chứng Nhận tham dự hội nghị khoa học có mã QR định danh.</p>
                            </div>
                        </div>
                        <div class="perk-item">
                            <div class="perk-icon-wrap">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                            </div>
                            <div class="perk-text">
                                <h4>Tiệc Trà &amp; Networking Lunch</h4>
                                <p>Không gian kết nối mở rộng mạng lưới quan hệ công việc và học bổng nghiên cứu.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. FOSS ECOSYSTEM PARTNERS SECTION -->
    <section class="tech-partners-section">
        <div class="event-container">
            <div class="partners-header">
                <span class="partners-subtitle">HỆ SINH THÁI ĐỒNG HÀNH</span>
                <h3 class="partners-title">Các Cộng Đồng &amp; Tổ Chức Mã Nguồn Mở</h3>
            </div>
            <div class="partners-logo-grid">
                <div class="partner-badge-card">
                    <span class="partner-org">VFOSSA</span>
                    <span class="partner-desc">Hiệp Hội Phần Mềm Tự Do Nguồn Mở</span>
                </div>
                <div class="partner-badge-card">
                    <span class="partner-org">LINUX FOUNDATION</span>
                    <span class="partner-desc">Cộng Đồng Nhân Linux Việt Nam</span>
                </div>
                <div class="partner-badge-card">
                    <span class="partner-org">WORDPRESS.ORG</span>
                    <span class="partner-desc">Cộng Đồng WordPress Mở GPLv2</span>
                </div>
                <div class="partner-badge-card">
                    <span class="partner-org">PYTHON VIETNAM</span>
                    <span class="partner-desc">Cộng Đồng AI &amp; Khoa Học Dữ Liệu</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. FINAL BOTTOM CTA BANNER -->
    <section class="tech-bottom-cta">
        <div class="event-container">
            <div class="cta-inner-card">
                <div class="cta-text-side">
                    <h2 class="cta-heading">Sẵn Sàng Tham Gia Cùng Chúng Tôi?</h2>
                    <p class="cta-subheading">Đăng ký giữ chỗ ngay hôm nay để nhận vé điện tử có mã QR check-in qua hòm thư điện tử của bạn.</p>
                </div>
                <div class="cta-btn-side">
                    <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="btn-glow-accent btn-large">
                        Đăng Ký Nhận Vé Ngay
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
