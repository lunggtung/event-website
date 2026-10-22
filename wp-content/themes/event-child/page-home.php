<?php
/**
 * Template Name: Trang Chủ Sự Kiện
 * @package Event_Child_Theme
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$event = event_child_event_data();
$speakers = event_child_speakers();
$days = event_child_schedule();
get_header();
?>
<main id="primary" class="summit-main summit-home">
    <section class="summit-hero">
        <div class="summit-container summit-hero-grid">
            <div class="summit-hero-copy">
                <p class="summit-eyebrow">Hội nghị công nghệ nguồn mở · Hà Nội</p>
                <h1 class="summit-hero-title">OPEN TECH<br>SUMMIT <span>2026</span></h1>
                <p class="summit-hero-lead">Linux, phần mềm nguồn mở và an toàn thông tin. Ba ngày báo cáo chuyên đề, thực hành và trao đổi dành cho lập trình viên, sinh viên và người làm công nghệ.</p>
                <dl class="summit-hero-details"><div><dt>Thời gian</dt><dd>20–22 tháng 11, 2026</dd></div><div><dt>Địa điểm</dt><dd>Trung tâm Hội nghị Quốc gia</dd></div></dl>
                <div class="summit-actions">
                    <a class="summit-button" href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>">Đăng ký miễn phí <span aria-hidden="true">↗</span></a>
                    <a class="summit-text-link" href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>">Khám phá chương trình <span aria-hidden="true">→</span></a>
                </div>
                <p class="summit-hero-note">Tham dự miễn phí · Đăng ký nhận vé QR</p>
            </div>
            <figure class="summit-hero-visual">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/hero-bg.jpg' ); ?>" alt="Không gian hội trường minh họa cho hội nghị công nghệ" width="1536" height="1024" fetchpriority="high">
                <div class="summit-hero-date" aria-hidden="true"><strong>20—22</strong><span>THÁNG 11 / HÀ NỘI</span></div>
                <figcaption>OPEN SOURCE · LINUX · SECURITY</figcaption>
            </figure>
        </div>
    </section>
    <section class="summit-countdown-strip" aria-label="Thời gian khai mạc">
        <div class="summit-container summit-countdown-inner">
            <div><p class="summit-eyebrow">Khai mạc lúc 08:00 · 20/11/2026</p><h2>Sẵn sàng cho ba ngày công nghệ.</h2></div>
            <?php echo do_shortcode( '[event_countdown target="' . $event['start'] . '" end="' . $event['end'] . '" title="Đếm ngược đến khai mạc"]' ); ?>
        </div>
    </section>
    <section class="summit-section summit-programme-section">
        <div class="summit-container">
            <div class="summit-section-heading">
                <div><p class="summit-eyebrow">Chương trình hội nghị</p><h2>Từ kiến thức nền tảng<br>đến thực hành chuyên sâu.</h2></div>
                <p>Ba phòng diễn ra song song: Hội trường A về mã nguồn mở, Phòng B về Linux và Phòng C về bảo mật. Chọn ngày để xem giờ, phòng và nội dung từng phiên.</p>
            </div>
            <div class="summit-programme-preview">
                <?php foreach ( $days as $id => $day ) : ?>
                    <a class="summit-day-preview" href="<?php echo esc_url( home_url( '/lich-trinh/' ) . '#' . $id ); ?>">
                        <div class="summit-day-preview-top"><span><?php echo esc_html( $day['label'] ); ?></span><span><?php echo esc_html( $day['date'] ); ?></span></div>
                        <h3><?php echo esc_html( $day['title'] ); ?></h3>
                        <p><?php echo esc_html( 'day-1' === $id ? 'Mở đầu bằng những điều cốt lõi: giấy phép, hệ điều hành và cách nghĩ về bảo mật.' : ( 'day-2' === $id ? 'Mang laptop, đặt câu hỏi và thử làm. Workshop nhỏ, tập trung vào vấn đề cụ thể.' : 'Chia sẻ điều học được và tìm một bước tiếp theo để bắt đầu sau hội nghị.' ) ); ?></p>
                        <span class="summit-text-link">Xem lịch ngày <?php echo esc_html( substr( $id, -1 ) ); ?> <span aria-hidden="true">↗</span></span>
                    </a>
                <?php endforeach; ?>
            </div>
            <p class="summit-section-footnote">Thời gian trong chương trình được hiển thị theo giờ Việt Nam (UTC+7).</p>
        </div>
    </section>
    <section class="summit-section summit-speakers-section">
        <div class="summit-container">
            <div class="summit-section-heading">
                <div><p class="summit-eyebrow">Diễn giả & chuyên đề</p><h2>Người chia sẻ.<br>Nội dung bạn quan tâm.</h2></div>
                <div><p>Tìm hiểu chuyên môn, chủ đề báo cáo và các phiên trình bày của từng diễn giả.</p><a class="summit-text-link" href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>">Xem hồ sơ diễn giả <span aria-hidden="true">↗</span></a></div>
            </div>
            <div class="summit-speaker-grid">
                <?php foreach ( $speakers as $id => $speaker ) : ?>
                    <a class="summit-speaker-card" href="<?php echo esc_url( home_url( '/dien-gia/' ) . '#' . $id ); ?>">
                        <div class="summit-speaker-image"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/' . $speaker['image'] ); ?>" alt="Ảnh chân dung minh họa cho hồ sơ <?php echo esc_attr( $speaker['name'] ); ?>" width="600" height="600" loading="lazy"><span class="summit-speaker-arrow" aria-hidden="true">↗</span></div>
                        <div class="summit-speaker-copy"><p class="summit-eyebrow"><?php echo esc_html( $speaker['role'] ); ?></p><h3 class="summit-speaker-name"><?php echo esc_html( $speaker['name'] ); ?></h3><p class="summit-speaker-topic"><?php echo esc_html( $speaker['topic'] ); ?></p></div>
                    </a>
                <?php endforeach; ?>
            </div>
            <p class="summit-section-footnote">Các hồ sơ trên là nhân vật minh họa cho nội dung chương trình.</p>
        </div>
    </section>
    <section class="summit-section summit-attend-section">
        <div class="summit-container summit-attend-grid">
            <div><p class="summit-eyebrow">Thông tin tham dự</p><h2>Đăng ký trước.<br>Chuẩn bị cho workshop.</h2><p>Chọn hạng vé, điền thông tin và lưu QR được cấp. Nếu tham gia các phiên thực hành, bạn nên mang laptop và bộ sạc.</p><a class="summit-text-link" href="<?php echo esc_url( home_url( '/dia-diem/' ) ); ?>">Địa điểm & hướng dẫn tham dự <span aria-hidden="true">↗</span></a></div>
            <ol class="summit-attend-steps"><li><span>01</span><div><h3>Chọn vé phù hợp</h3><p>Các hạng vé trong bản minh họa đều miễn phí.</p></div></li><li><span>02</span><div><h3>Nhận vé điện tử</h3><p>Điền email chính xác để nhận thông tin đăng ký và mã QR.</p></div></li><li><span>03</span><div><h3>Lên lịch của riêng bạn</h3><p>Khám phá ba phòng chuyên đề và lưu những phiên muốn tham dự.</p></div></li></ol>
        </div>
    </section>
    <section class="summit-cta"><div class="summit-container summit-cta-inner"><div><p class="summit-eyebrow">20–22.11.2026 / Hà Nội</p><h2>Tham dự Open Tech Summit.</h2></div><div><p>Đăng ký miễn phí và nhận mã QR cho cả ba ngày.</p><a class="summit-button is-light" href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>">Đăng ký tham dự <span aria-hidden="true">↗</span></a></div></div></section>
</main>
<?php get_footer(); ?>
