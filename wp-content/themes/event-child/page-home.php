<?php
/**
 * Template Name: Trang Chủ Sự Kiện
 * Description: Giao diện chuyên trang chính thức chuẩn quốc tế cho Hội Nghị Khoa Học & Công Nghệ Mở 2026 (Open Tech Summit 2026)
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main event-page event-page-home">
    <!-- 1. HERO BANNER CINEMATIC -->
    <section class="summit-hero">
        <div class="summit-hero-bg">
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/hero-bg.jpg' ); ?>" alt="Hội Trường Hội Nghị Quốc Gia" class="hero-bg-img">
            <div class="hero-overlay"></div>
        </div>

        <div class="event-container hero-inner">
            <div class="hero-content">
                <div class="hero-status-pill">
                    <span class="pulse-dot"></span>
                    <span>CỔNG ĐĂNG KÝ VÉ ĐẠI BIỂU ĐANG MỞ &bull; VÉ MIỄN PHÍ 0Đ (GPL)</span>
                </div>

                <h1 class="hero-title">
                    Hội Nghị Khoa Học &amp;<br>
                    <span class="gradient-text">Công Nghệ Mở 2026</span>
                </h1>

                <p class="hero-lead">
                    Định hình tương lai số với <strong>Nền tảng Mã Nguồn Mở</strong>, <strong>Trí Tuệ Nhân Tạo Tự Chủ</strong> và <strong>Hạ Tầng Đám Mây Độc Lập</strong>. Nơi quy tụ hơn 1.500 kỹ sư, nhà khoa học và chuyên gia công nghệ hàng đầu Việt Nam.
                </p>

                <div class="hero-meta-bar">
                    <div class="meta-item">
                        <svg class="meta-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <div>
                            <span class="meta-label">THỜI GIAN</span>
                            <span class="meta-val">20 &ndash; 22 Tháng 11, 2026</span>
                        </div>
                    </div>
                    <div class="meta-item">
                        <svg class="meta-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <div>
                            <span class="meta-label">ĐỊA ĐIỂM</span>
                            <span class="meta-val">Trung tâm Hội nghị Quốc gia, Hà Nội</span>
                        </div>
                    </div>
                    <div class="meta-item">
                        <svg class="meta-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        <div>
                            <span class="meta-label">TIÊU CHUẨN</span>
                            <span class="meta-val">100% Nguồn Mở GPLv2</span>
                        </div>
                    </div>
                </div>

                <div class="hero-actions">
                    <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="btn-brand-cta">
                        <span>Đăng Ký Nhận Vé Điện Tử (0đ QR) &rarr;</span>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="btn-glass-outline">
                        <span>Khám Phá Lịch Trình 3 Phòng</span>
                    </a>
                </div>

                <!-- Live Countdown Container -->
                <div class="hero-countdown-wrap">
                    <?php echo do_shortcode( '[event_countdown target="2026-11-20T08:00:00" title="THỜI GIAN ĐẾM NGƯỢC ĐẾN LỄ KHAI MẠC (20/11/2026)"]' ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. THE SUMMIT OVERVIEW & KEY METRICS -->
    <section class="section-summit-overview">
        <div class="event-container">
            <div class="overview-header">
                <span class="section-kicker">THE SUMMIT 2026</span>
                <h2 class="section-title">Quy Tụ Hệ Sinh Thái Công Nghệ &amp; Mã Nguồn Mở Lớn Nhất Năm</h2>
                <p class="section-desc">
                    Hội Nghị Khoa Học &amp; Công Nghệ Mở 2026 là diễn đàn học thuật và thực chiến chuyên sâu, nơi các công nghệ tiên tiến nhất được mổ xẻ và trình diễn trực tiếp nhằm thúc đẩy tự chủ công nghệ số quốc gia.
                </p>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-number">1.500+</div>
                    <div class="metric-label">KHÁCH THAM DỰ</div>
                    <div class="metric-caption">Đại biểu doanh nghiệp, chuyên gia &amp; sinh viên</div>
                </div>
                <div class="metric-card">
                    <div class="metric-number">30+</div>
                    <div class="metric-label">DIỄN GIẢ &amp; CHUYÊN GIA</div>
                    <div class="metric-caption">Giáo sư, Tiến sĩ, Kỹ sư trưởng hệ thống lớn</div>
                </div>
                <div class="metric-card">
                    <div class="metric-number">03</div>
                    <div class="metric-label">HỘI TRƯỜNG SONG SONG</div>
                    <div class="metric-caption">Hội trường A, Phòng B, Phòng C liên tục 3 ngày</div>
                </div>
                <div class="metric-card">
                    <div class="metric-number">100%</div>
                    <div class="metric-label">MÃ NGUỒN MỞ</div>
                    <div class="metric-caption">Chuẩn giấy phép tự do GNU GPLv2 &amp; MIT</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. THE 3 CORE TECH TRACKS -->
    <section class="section-summit-tracks">
        <div class="event-container">
            <div class="section-header-center">
                <span class="section-kicker">CHƯƠNG TRÌNH HỘI NGHỊ</span>
                <h2 class="section-title">3 Phân Hệ Báo Cáo Chuyên Sâu Song Song</h2>
                <p class="section-desc">
                    Thiết kế dành riêng cho các kỹ sư phần mềm, nhà khoa học dữ liệu, quản trị viên hệ thống và sinh viên ngành CNTT.
                </p>
            </div>

            <div class="tracks-grid">
                <!-- Track 1 -->
                <div class="track-card track-card-ai">
                    <div class="track-top">
                        <span class="hall-badge hall-a">HỘI TRƯỜNG A</span>
                        <div class="track-chips">
                            <span>OpenLLM</span>
                            <span>PyTorch</span>
                            <span>RAG</span>
                        </div>
                    </div>
                    <h3 class="track-title">Trí Tuệ Nhân Tạo &amp; Dữ Liệu Mở</h3>
                    <p class="track-desc">
                        Nghiên cứu các mô hình ngôn ngữ lớn nguồn mở (Llama, Mistral), tối ưu hóa suy luận (Inference) trên máy chủ nội bộ và đạo đức bảo vệ dữ liệu.
                    </p>
                    <ul class="track-points">
                        <li>Xây dựng trợ lý AI cục bộ với Ollama &amp; LangChain</li>
                        <li>Bản quyền dữ liệu huấn luyện &amp; Giấy phép Open Weights</li>
                        <li>Keynote: Tương lai Trí tuệ Nhân tạo Tự chủ</li>
                    </ul>
                    <div class="track-link-wrap">
                        <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="track-link">
                            Xem Lịch Trình Hội Trường A &rarr;
                        </a>
                    </div>
                </div>

                <!-- Track 2 -->
                <div class="track-card track-card-cloud">
                    <div class="track-top">
                        <span class="hall-badge hall-b">PHÒNG HỘI THẢO B</span>
                        <div class="track-chips">
                            <span>Linux 6.x</span>
                            <span>Kubernetes</span>
                            <span>DevOps</span>
                        </div>
                    </div>
                    <h3 class="track-title">Điện Toán Đám Mây &amp; Nhân Linux</h3>
                    <p class="track-desc">
                        Chuyên sâu về kiến trúc nhân Linux Monolithic, quản trị tài nguyên POSIX, ảo hóa hạ tầng với Proxmox và tự động hóa điều phối cụm Kubernetes.
                    </p>
                    <ul class="track-points">
                        <li>Phân tích hiệu năng Linux Kernel vs Hybrid Windows 11</li>
                        <li>Triển khai cụm microservices khả năng tự phục hồi</li>
                        <li>Lưu trữ phân tán Ceph Storage &amp; OpenStack</li>
                    </ul>
                    <div class="track-link-wrap">
                        <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="track-link">
                            Xem Lịch Trình Phòng B &rarr;
                        </a>
                    </div>
                </div>

                <!-- Track 3 -->
                <div class="track-card track-card-security">
                    <div class="track-top">
                        <span class="hall-badge hall-c">PHÒNG HỘI THẢO C</span>
                        <div class="track-chips">
                            <span>WPScan</span>
                            <span>Hardening</span>
                            <span>GPLv2</span>
                        </div>
                    </div>
                    <h3 class="track-title">An Toàn Thông Tin &amp; Tuân Thủ FOSS</h3>
                    <p class="track-desc">
                        Kỹ thuật phòng thủ chiều sâu, rà soát mã độc, kiểm toán bảo mật ứng dụng với WPScan, và quản trị bản quyền phần mềm nguồn mở trong chuyển đổi số.
                    </p>
                    <ul class="track-points">
                        <li>Thực hành kỹ thuật rà quét lỗ hổng với công cụ WPScan</li>
                        <li>Gia cố máy chủ Web: Chặn XML-RPC, ẩn phiên bản, đổi URL</li>
                        <li>Bảo vệ quyền sở hữu trí tuệ và giấy phép Copyleft</li>
                    </ul>
                    <div class="track-link-wrap">
                        <a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>" class="track-link">
                            Xem Lịch Trình Phòng C &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. FEATURED KEYNOTE SPEAKERS (CHUẨN VIETNAM TECH SUMMIT) -->
    <section class="section-featured-speakers">
        <div class="event-container">
            <div class="section-header-center">
                <span class="section-kicker">DIỄN GIẢ &amp; CHUYÊN GIA ĐẦU NGÀNH</span>
                <h2 class="section-title">Gặp Gỡ Các Diễn Giả Khách Mời</h2>
                <p class="section-desc">
                    Các nhà khoa học, kiến trúc sư trưởng và chuyên gia công nghệ định hình tương lai mã nguồn mở tại Việt Nam.
                </p>
            </div>

            <div class="speakers-grid">
                <!-- Speaker 1 -->
                <div class="summit-speaker-card">
                    <div class="speaker-cover">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/speaker-nguyen-van-a.jpg' ); ?>" alt="GS. Nguyễn Văn A" class="speaker-img">
                        <span class="speaker-role-tag tag-keynote">KEYNOTE SPEAKER</span>
                    </div>
                    <div class="speaker-details">
                        <h3 class="speaker-fullname">GS. Nguyễn Văn A <span class="degree-pill">Ph.D</span></h3>
                        <span class="speaker-organization">Viện Trưởng &bull; Viện An Toàn Thông Tin</span>
                        <p class="speaker-talk-title">"Chiến Lược Phòng Thủ Chiều Sâu &amp; Rà Quét Lỗ Hổng Cho Nền Tảng Mã Nguồn Mở"</p>
                        <a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>" class="speaker-bio-link">Xem Hồ Sơ Chi Tiết &rarr;</a>
                    </div>
                </div>

                <!-- Speaker 2 -->
                <div class="summit-speaker-card">
                    <div class="speaker-cover">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/speaker-tran-thi-b.jpg' ); ?>" alt="ThS. Trần Thị B" class="speaker-img">
                        <span class="speaker-role-tag tag-foss">CHUYÊN GIA FOSS</span>
                    </div>
                    <div class="speaker-details">
                        <h3 class="speaker-fullname">ThS. Trần Thị B <span class="degree-pill">M.Sc</span></h3>
                        <span class="speaker-organization">Kiến Trúc Sư Trưởng &bull; Hiệp Hội VFOSSA</span>
                        <p class="speaker-talk-title">"Kiến Trúc Nhân Linux Monolithic &amp; Pháp Lý Giấy Phép Bản Quyền Copyleft GPL"</p>
                        <a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>" class="speaker-bio-link">Xem Hồ Sơ Chi Tiết &rarr;</a>
                    </div>
                </div>

                <!-- Speaker 3 -->
                <div class="summit-speaker-card">
                    <div class="speaker-cover">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/speaker-le-van-c.jpg' ); ?>" alt="KS. Lê Văn C" class="speaker-img">
                        <span class="speaker-role-tag tag-cloud">AI &amp; CLOUD LEAD</span>
                    </div>
                    <div class="speaker-details">
                        <h3 class="speaker-fullname">KS. Lê Văn C <span class="degree-pill">Eng.</span></h3>
                        <span class="speaker-organization">Kỹ Sư Trưởng &bull; Open Cloud Infrastructure</span>
                        <p class="speaker-talk-title">"Triển Khai Mô Hình Ngôn Ngữ Lớn Nguồn Mở Tự Trị Trên Cụm Kubernetes"</p>
                        <a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>" class="speaker-bio-link">Xem Hồ Sơ Chi Tiết &rarr;</a>
                    </div>
                </div>
            </div>

            <div class="section-bottom-action">
                <a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>" class="btn-glass-outline">
                    <span>Xem Toàn Bộ Danh Sách Diễn Giả &rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 5. TICKET PASSES PREVIEW -->
    <section class="section-summit-passes">
        <div class="event-container">
            <div class="section-header-center">
                <span class="section-kicker">THAM GIA HỘI NGHỊ</span>
                <h2 class="section-title">Lựa Chọn Hạng Vé Phù Hợp Với Bạn</h2>
                <p class="section-desc">
                    Hội nghị áp dụng chính sách vé mở và tài trợ 100% chi phí cho các đại biểu đủ điều kiện học thuật.
                </p>
            </div>

            <div class="passes-grid">
                <!-- Pass 1 -->
                <div class="pass-card">
                    <div class="pass-kicker">ƯU ĐÃI HỌC THUẬT</div>
                    <h3 class="pass-title">Vé Sinh Viên</h3>
                    <div class="pass-price">0 <span class="currency">VNĐ</span></div>
                    <p class="pass-desc">Dành riêng cho học sinh, sinh viên các trường Đại học &amp; Cao đẳng khối ngành CNTT.</p>
                    <ul class="pass-features">
                        <li>Tham dự toàn bộ 3 phòng hội thảo trong 3 ngày</li>
                        <li>Cấp mã QR điện tử check-in qua email</li>
                        <li>Bộ tài liệu slide tóm tắt hội thảo dạng PDF</li>
                        <li>Yêu cầu xuất trình thẻ sinh viên tại cửa kiểm soát</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="btn-pass-select">
                        Đăng Ký Vé Sinh Viên &rarr;
                    </a>
                </div>

                <!-- Pass 2 (Featured) -->
                <div class="pass-card pass-featured">
                    <div class="pass-badge-popular">PHỔ BIẾN NHẤT</div>
                    <div class="pass-kicker">CHUẨN MÃ NGUỒN MỞ</div>
                    <h3 class="pass-title">Vé Tiêu Chuẩn (FOSS)</h3>
                    <div class="pass-price">Miễn Phí <span class="currency">(GPL)</span></div>
                    <p class="pass-desc">Dành cho kỹ sư phần mềm, nhà nghiên cứu, quản trị viên hệ thống và doanh nghiệp.</p>
                    <ul class="pass-features">
                        <li>Toàn quyền tham dự 3 phòng chuyên đề trong 3 ngày</li>
                        <li>Trọn bộ Kỷ yếu số hóa đầy đủ các bài báo cáo khoa học</li>
                        <li>Cấp Giấy Chứng Nhận tham dự hội nghị điện tử có mã QR</li>
                        <li>Tiệc trà Teabreak giao lưu giữa các phiên thảo luận</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="btn-brand-cta w-full">
                        Đăng Ký Vé Tiêu Chuẩn &rarr;
                    </a>
                </div>

                <!-- Pass 3 -->
                <div class="pass-card">
                    <div class="pass-kicker">TOÀN QUYỀN VIP</div>
                    <h3 class="pass-title">Vé Khách Mời VIP</h3>
                    <div class="pass-price">Đặc Biệt <span class="currency">Pass</span></div>
                    <p class="pass-desc">Dành cho lãnh đạo doanh nghiệp, đại diện viện nghiên cứu và diễn giả khách mời.</p>
                    <ul class="pass-features">
                        <li>Toàn bộ quyền lợi của Vé Tiêu Chuẩn</li>
                        <li>Hàng ghế danh dự hàng đầu tại Hội Trường Lớn A</li>
                        <li>Tham dự Tiệc trưa Networking Lunch cùng dàn diễn giả</li>
                        <li>Nhận Kỷ yếu in ấn đóng bìa cứng có chỉ số ISBN</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="btn-pass-select">
                        Đăng Ký Vé VIP &rarr;
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. FOSS ECOSYSTEM PARTNERS -->
    <section class="section-summit-partners">
        <div class="event-container">
            <div class="section-header-center">
                <span class="section-kicker">HỆ SINH THÁI ĐỒNG HÀNH</span>
                <h3 class="section-title">Các Tổ Chức &amp; Cộng Đồng Mã Nguồn Mở</h3>
            </div>
            <div class="partners-grid">
                <div class="partner-card">
                    <div class="partner-org-name">VFOSSA</div>
                    <div class="partner-org-desc">Hiệp Hội Phần Mềm Tự Do Nguồn Mở</div>
                </div>
                <div class="partner-card">
                    <div class="partner-org-name">LINUX FOUNDATION</div>
                    <div class="partner-org-desc">Cộng Đồng Nhân Linux Việt Nam</div>
                </div>
                <div class="partner-card">
                    <div class="partner-org-name">WORDPRESS.ORG</div>
                    <div class="partner-org-desc">Cộng Đồng WordPress Mở GPLv2</div>
                </div>
                <div class="partner-card">
                    <div class="partner-org-name">PYTHON VIETNAM</div>
                    <div class="partner-org-desc">Cộng Đồng AI &amp; Khoa Học Dữ Liệu</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. FINAL BOTTOM CTA BANNER -->
    <section class="section-final-cta">
        <div class="event-container">
            <div class="final-cta-card">
                <div class="final-cta-text">
                    <h2 class="final-cta-title">Sẵn Sàng Định Hình Tương Lai Công Nghệ Mở?</h2>
                    <p class="final-cta-sub">
                        Cổng đăng ký vé điện tử hoàn toàn miễn phí. Đăng ký ngay hôm nay để nhận thẻ đại biểu và mã QR check-in qua hòm thư điện tử.
                    </p>
                </div>
                <div class="final-cta-action">
                    <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="btn-brand-cta btn-large">
                        <span>Đăng Ký Nhận Vé Điện Tử Ngay &rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
