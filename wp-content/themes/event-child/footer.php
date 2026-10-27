<?php
/**
 * Footer chung của hội nghị.
 * @package Event_Child_Theme
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$event = event_child_event_data();
?>
    <footer class="summit-footer" id="colophon">
        <div class="summit-container">
            <div class="summit-footer-grid">
                <div class="summit-footer-intro">
                    <a class="summit-footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">Open Tech Summit<span>2026</span></a>
                    <p>Hội nghị về Linux, phần mềm nguồn mở và an toàn thông tin.</p>
                </div>
                <div>
                    <h2>Khám phá</h2>
                    <ul class="summit-footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>">Chương trình ba ngày</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>">Gặp gỡ diễn giả</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>">Đăng ký & nhận vé QR</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/dia-diem/' ) ); ?>">Địa điểm & hướng dẫn</a></li>
                    </ul>
                </div>
                <div>
                    <h2>Hẹn gặp tại Hà Nội</h2>
                    <p><?php echo esc_html( $event['dates'] ); ?><br><?php echo esc_html( $event['venue'] ); ?><br><?php echo esc_html( $event['address'] ); ?></p>
                    <a class="summit-text-link" href="<?php echo esc_url( home_url( '/dia-diem/' ) ); ?>">Xem địa điểm <span aria-hidden="true">↗</span></a>
                </div>
            </div>
            <div class="summit-footer-bottom">
                <span>© 2026 Open Tech Summit · Website minh họa</span>
                <p>Sự kiện, chương trình và hồ sơ diễn giả là dữ liệu mẫu. Vé cấp tại đây phục vụ trải nghiệm thử, không có giá trị vào cửa một sự kiện thực tế.</p>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
