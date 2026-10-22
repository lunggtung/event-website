<?php
/**
 * Template Name: Địa Điểm Hội Nghị
 * @package Event_Child_Theme
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$event = event_child_event_data();
get_header();
?>
<main id="primary" class="summit-main summit-venue-page">
    <section class="summit-page-heading"><div class="summit-container"><p class="summit-eyebrow">Open Tech Summit 2026 / Hà Nội</p><h1>Địa điểm & hướng dẫn tham dự</h1><p class="summit-page-lead">Địa chỉ hội nghị, bản đồ và những thông tin cần chuẩn bị trước khi đến. Chương trình được tổ chức tại Hội trường A, Phòng B và Phòng C.</p><p class="summit-page-note">Địa điểm dự kiến trong kịch bản minh họa; không phải thông báo tổ chức sự kiện thực tế.</p></div></section>
    <section class="summit-section summit-venue-section"><div class="summit-container">
        <div class="summit-venue-grid">
            <div class="summit-venue-info"><p class="summit-eyebrow">Nơi diễn ra hội nghị</p><h2><?php echo esc_html( $event['venue'] ); ?></h2><p class="summit-venue-address"><?php echo esc_html( $event['address'] ); ?></p><dl class="summit-venue-facts"><div><dt>Thời gian</dt><dd><?php echo esc_html( $event['dates'] ); ?></dd></div><div><dt>Ngày 1 & 2</dt><dd>08:00–17:00</dd></div><div><dt>Ngày 3</dt><dd>08:00–12:00</dd></div><div><dt>Không gian</dt><dd>Hội trường A · Phòng B · Phòng C</dd></div></dl><a class="summit-button" href="https://www.openstreetmap.org/?mlat=21.0062&amp;mlon=105.7891#map=16/21.0062/105.7891" target="_blank" rel="noopener noreferrer">Mở bản đồ <span aria-hidden="true">↗</span></a></div>
            <div class="summit-map"><iframe title="Bản đồ Trung tâm Hội nghị Quốc gia Hà Nội" src="https://www.openstreetmap.org/export/embed.html?bbox=105.7800%2C21.0000%2C105.8000%2C21.0130&amp;layer=mapnik&amp;marker=21.0062%2C105.7891" loading="lazy" referrerpolicy="no-referrer" allowfullscreen></iframe><p>Dữ liệu bản đồ © <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener noreferrer">OpenStreetMap contributors</a>. Bản đồ cần kết nối internet.</p></div>
        </div>
    </div></section>
    <section class="summit-section summit-arrival-section"><div class="summit-container">
        <div class="summit-section-heading"><div><p class="summit-eyebrow">Trước khi tham dự</p><h2>Hướng dẫn đến hội nghị</h2></div><p>Kiểm tra lộ trình, lưu vé điện tử và chuẩn bị laptop nếu bạn tham gia workshop.</p></div>
        <div class="summit-arrival-grid">
            <article class="summit-arrival-item"><span class="summit-arrival-number">01</span><h3>Lên kế hoạch di chuyển</h3><p>Tra cứu lộ trình đến Trung tâm Hội nghị Quốc gia trên ứng dụng bản đồ bạn thường dùng. Kiểm tra lại tuyến, điểm dừng và tình hình giao thông trước khi đi.</p></article>
            <article class="summit-arrival-item"><span class="summit-arrival-number">02</span><h3>Chuẩn bị vé điện tử</h3><p>Lưu email và mã QR sau khi đăng ký. Bạn có thể giữ một bản trên điện thoại để mở nhanh khi cần đối chiếu thông tin.</p></article>
            <article class="summit-arrival-item"><span class="summit-arrival-number">03</span><h3>Mang theo đồ cần thiết</h3><p>Laptop, bộ sạc và tai nghe sẽ hữu ích cho workshop. Có mặt sớm khoảng 20 phút để sẵn sàng trước phiên bạn chọn.</p></article>
        </div>
    </div></section>
    <section class="summit-section summit-faq-section"><div class="summit-container summit-faq-grid"><div><p class="summit-eyebrow">Thông tin tham dự</p><h2>Câu hỏi thường gặp</h2></div><div class="summit-faq-list">
        <details><summary>Tôi có cần tham dự đủ cả ba ngày không?<span aria-hidden="true">+</span></summary><p>Không. Chương trình được chia theo ngày và phòng để bạn chọn những phiên quan tâm. Các phiên cùng giờ diễn ra song song.</p></details>
        <details><summary>Tham dự workshop cần chuẩn bị gì?<span aria-hidden="true">+</span></summary><p>Mang laptop, bộ sạc và một trình duyệt đang hoạt động. Xem mô tả từng phiên trong lịch trình để biết nội dung thực hành.</p></details>
        <details><summary>Tôi tìm mã QR ở đâu?<span aria-hidden="true">+</span></summary><p>Mã QR được hiển thị sau khi đăng ký hợp lệ và gửi kèm email nếu hệ thống gửi thư hoạt động. Trang xác nhận sẽ cho biết trạng thái gửi thực tế.</p></details>
        <details><summary>Vé trên website có dùng cho một sự kiện thật không?<span aria-hidden="true">+</span></summary><p>Không. Đây là website minh họa. Chương trình, hồ sơ diễn giả và vé điện tử phục vụ trải nghiệm chức năng, không có giá trị vào cửa một sự kiện thực tế.</p></details>
    </div></div></section>
    <section class="summit-cta"><div class="summit-container summit-cta-inner"><div><p class="summit-eyebrow">Hẹn gặp tại Hà Nội</p><h2>Lên lịch.<br>Sẵn sàng khám phá.</h2></div><div><p>Khám phá chương trình và nhận vé trải nghiệm miễn phí.</p><a class="summit-button is-light" href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>">Đăng ký tham dự <span aria-hidden="true">↗</span></a></div></div></section>
</main>
<?php get_footer(); ?>
