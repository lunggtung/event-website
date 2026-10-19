<?php
/**
 * Template Name: Địa Điểm & Bản Đồ
 * Description: Mẫu giao diện thông tin địa điểm tổ chức và nhúng bản đồ OpenStreetMap
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main event-page event-page-venue">
    <!-- Page Header Banner -->
    <section class="event-page-header">
        <div class="event-container">
            <h1 class="event-page-title">Địa Điểm Tổ Chức &amp; Bản Đồ Chỉ Dẫn</h1>
            <p class="event-page-subtitle">
                Trung tâm Hội nghị Quốc gia Hà Nội (NCC) &mdash; Cơ sở vật chất đẳng cấp quốc tế, thuận tiện kết nối giao thông.
            </p>
        </div>
    </section>

    <div class="event-container event-main-content">
        <!-- Venue Overview Info Card -->
        <div class="event-venue-card">
            <div class="venue-info-block">
                <div class="venue-badge">ĐỊA ĐIỂM CHÍNH THỨC</div>
                <h2 class="venue-name">Trung Tâm Hội Nghị Quốc Gia Hà Nội (NCC)</h2>
                <div class="venue-address">
                    <span class="addr-icon">&#128205;</span>
                    <span class="addr-text">Cổng số 1, Đại lộ Thăng Long, Phường Mễ Trì, Quận Nam Từ Liêm, TP. Hà Nội</span>
                </div>
                <p class="venue-desc">
                    Tọa lạc tại vị trí đắc địa ở cửa ngõ phía Tây Thủ đô, Trung tâm Hội nghị Quốc gia là tổ hợp công trình đa năng hiện đại hàng đầu Việt Nam. Nơi đây sở hữu các hội trường lớn với hệ thống phiên dịch đa ngôn ngữ, mạng Internet cáp quang băng thông rộng và khuôn viên cây xanh thoáng đãng.
                </p>
                <div class="venue-highlights">
                    <div class="highlight-item">
                        <span class="highlight-icon">&#128101;</span>
                        <span class="highlight-text">Sức chứa hơn 3.500 đại biểu</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon">&#128246;</span>
                        <span class="highlight-text">Mạng Wi-Fi mở diện rộng</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon">&#128663;</span>
                        <span class="highlight-text">Bãi đỗ xe ngầm 1.000 ô tô</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- OpenStreetMap Open Source Map Section -->
        <div class="event-map-section">
            <div class="map-header">
                <h3 class="map-title">Bản Đồ Tương Tác Trực Tuyến</h3>
                <span class="map-source-tag">Nền tảng Mã Nguồn Mở &bull; OpenStreetMap</span>
            </div>
            <div class="map-responsive-container">
                <!-- Bản đồ vị trí Trung tâm Hội nghị Quốc gia Hà Nội -->
                <iframe 
                    title="Bản đồ Trung tâm Hội nghị Quốc gia Hà Nội"
                    src="https://maps.google.com/maps?q=Trung+t%C3%A2m+H%E1%BB%99i+ngh%E1%BB%8B+Qu%E1%BB%91c+gia+H%C3%A0+N%E1%BB%99i&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed" 
                    loading="lazy" 
                    class="event-osm-iframe">
                </iframe>
            </div>
            <div class="map-footer-actions">
                <a href="https://www.openstreetmap.org/?mlat=21.0062&amp;mlon=105.7891#map=16/21.0062/105.7891" target="_blank" rel="noopener" class="event-btn event-btn-outline map-external-btn">
                    Mở Bản Đồ Khổ Lớn Trên OpenStreetMap &#8599;
                </a>
            </div>
        </div>

        <!-- Transportation & Transit Guide -->
        <div class="event-transit-guide">
            <h3 class="guide-title">Hướng Dẫn Lộ Trình Phương Tiện Di Chuyển</h3>
            <div class="transit-grid">
                <!-- Bus -->
                <div class="transit-card">
                    <div class="transit-icon">&#128652;</div>
                    <h4 class="transit-type">Xe Buýt Công Cộng</h4>
                    <p class="transit-desc">Nhiều tuyến xe buýt chạy thẳng qua trạm dừng ngay trước Cổng số 1 của Trung tâm:</p>
                    <ul class="transit-routes">
                        <li><strong>Tuyến 50:</strong> Long Biên &ndash; Sân vận động Quốc gia Mỹ Đình</li>
                        <li><strong>Tuyến 107:</strong> Kim Mã &ndash; Làng Văn hóa Du lịch các dân tộc</li>
                        <li><strong>Tuyến 74:</strong> Bến xe Mỹ Đình &ndash; Xuân Khanh (dừng Đại lộ Thăng Long)</li>
                    </ul>
                </div>

                <!-- Personal Vehicles -->
                <div class="transit-card">
                    <div class="transit-icon">&#128663;</div>
                    <h4 class="transit-type">Ô Tô &amp; Xe Máy Cá Nhân</h4>
                    <p class="transit-desc">Đại biểu di chuyển theo hướng đường Phạm Hùng hoặc Đại lộ Thăng Long:</p>
                    <ul class="transit-routes">
                        <li><strong>Cổng vào:</strong> Đi vào qua Cổng số 1 (mặt đường Đại lộ Thăng Long)</li>
                        <li><strong>Bãi đỗ xe:</strong> Gửi xe tại tầng hầm tòa nhà chính hoặc bãi đỗ ngoài trời</li>
                        <li><strong>Quy định:</strong> Xuất trình vé điện tử hội nghị để được ưu đãi gửi xe</li>
                    </ul>
                </div>

                <!-- Accommodations -->
                <div class="transit-card">
                    <div class="transit-icon">&#127976;</div>
                    <h4 class="transit-type">Lưu Trú Dành Cho Đại Biểu</h4>
                    <p class="transit-desc">Các khách sạn tiêu chuẩn lân cận trung tâm dành cho khách tham dự ở xa:</p>
                    <ul class="transit-routes">
                        <li><strong>JW Marriott Hotel Hanoi:</strong> Nằm liền kề trong khuôn viên hồ điều hòa NCC</li>
                        <li><strong>Khách sạn Mễ Trì &amp; The Garden:</strong> Cách hội trường 500m &ndash; 1km</li>
                        <li>Liên hệ Ban Lễ Tân nếu cần hỗ trợ đặt phòng đoàn hội nghị</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
