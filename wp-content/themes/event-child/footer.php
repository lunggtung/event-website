<?php
/**
 * Footer Template for Event Child Theme
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

    <footer id="colophon" class="ots-site-footer">
        <div class="event-container">
            <div class="ots-footer-grid">
                <!-- Cột 1: Thông tin sự kiện -->
                <div class="ots-footer-col footer-col-about">
                    <div class="ots-footer-brand">
                        <div class="ots-logo-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                        </div>
                        <span class="ots-footer-brand-title">OPEN TECH SUMMIT 2026</span>
                    </div>
                    <p class="ots-footer-desc">
                        Hội nghị Khoa học &amp; Công nghệ Mở Quốc gia thường niên. Diễn đàn kết nối cộng đồng nghiên cứu, kỹ sư phần mềm và sinh viên công nghệ thông tin trên toàn quốc.
                    </p>
                    <div class="ots-footer-license-badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        <span>100% Free &amp; Open Source Software (GPLv2)</span>
                    </div>
                </div>

                <!-- Cột 2: Điều hướng nhanh -->
                <div class="ots-footer-col footer-col-links">
                    <h4 class="ots-footer-heading">Điều Hướng Nhanh</h4>
                    <ul class="ots-footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">&rarr; Trang Chủ Sự Kiện</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>">&rarr; Lịch Trình 3 Phòng Hội Thảo</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>">&rarr; Danh Sách Diễn Giả Khách Mời</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>">&rarr; Cổng Đăng Ký Vé Nhận Mã QR</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/dia-diem/' ) ); ?>">&rarr; Bản Đồ Vị Trí &amp; Đường Đi</a></li>
                    </ul>
                </div>

                <!-- Cột 3: Ban tổ chức -->
                <div class="ots-footer-col footer-col-committee">
                    <h4 class="ots-footer-heading">Ban Tổ Chức</h4>
                    <p class="ots-footer-text">
                        <strong>Dự án Môn học:</strong> Công nghệ Mã Nguồn Mở<br>
                        <strong>Đơn vị thực hiện:</strong> Nhóm 2<br>
                        <strong>Quy mô đại biểu:</strong> 1.500+ Khách tham dự<br>
                        <strong>Thời gian:</strong> 20 &ndash; 22/11/2026
                    </p>
                </div>

                <!-- Cột 4: Liên hệ & Địa điểm -->
                <div class="ots-footer-col footer-col-contact">
                    <h4 class="ots-footer-heading">Địa Điểm &amp; Liên Hệ</h4>
                    <p class="ots-footer-text">
                        <strong>Trung tâm Hội nghị Quốc gia Hà Nội (NCC)</strong><br>
                        Cổng số 1, Đại lộ Thăng Long, Mễ Trì, Nam Từ Liêm, Hà Nội.<br>
                        <strong>Email BTC:</strong> ban-to-chuc@ots2026.vn<br>
                        <strong>Hotline:</strong> 1900 6868 (Giờ hành chính)
                    </p>
                </div>
            </div>

            <!-- Bottom Copyright Bar -->
            <div class="ots-footer-bottom">
                <div class="footer-copyright-text">
                    &copy; 2026 Hội Nghị Khoa Học &amp; Công Nghệ Mở (Open Tech Summit). Mọi tài liệu và mã nguồn được phân phối theo giấy phép GPLv2.
                </div>
                <div class="footer-bottom-badge">
                    Phát triển bởi <strong>Nhóm 2</strong> &bull; Khoa Công Nghệ Thông Tin
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
