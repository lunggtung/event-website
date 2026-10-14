<?php
/**
 * Template Name: Lịch Trình Hội Nghị
 * Description: Mẫu giao diện thời gian biểu 3 phòng họp song song từ 08:00 đến 17:00
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main event-page event-page-schedule">
    <!-- Page Header Banner -->
    <section class="event-page-header">
        <div class="event-container">
            <h1 class="event-page-title">Lịch Trình Hội Nghị Chi Tiết</h1>
            <p class="event-page-subtitle">
                Chương trình 3 ngày hội nghị với hơn 20 phiên báo cáo chuyên sâu tại 3 phòng hội thảo song song.
            </p>
        </div>
    </section>

    <div class="event-container event-main-content">
        <!-- Day Selection Tabs -->
        <div class="event-schedule-tabs">
            <button class="event-tab-btn active" data-day="day-1">
                <span class="tab-day">NGÀY 01</span>
                <span class="tab-date">20/11/2026 &bull; Khai Mạc &amp; Toàn Thể</span>
            </button>
            <button class="event-tab-btn" data-day="day-2">
                <span class="tab-day">NGÀY 02</span>
                <span class="tab-date">21/11/2026 &bull; Chuyên Đề Kỹ Thuật</span>
            </button>
            <button class="event-tab-btn" data-day="day-3">
                <span class="tab-day">NGÀY 03</span>
                <span class="tab-date">22/11/2026 &bull; Tọa Đàm &amp; Bế Mạc</span>
            </button>
        </div>

        <!-- Room Legend / Track Indicators -->
        <div class="event-room-legend">
            <div class="legend-item"><span class="legend-badge badge-room-a"></span> Hội Trường A (Keynotes &amp; Toàn thể)</div>
            <div class="legend-item"><span class="legend-badge badge-room-b"></span> Phòng B (Cloud, DevOps &amp; Linux)</div>
            <div class="legend-item"><span class="legend-badge badge-room-c"></span> Phòng C (AI, Bảo Mật &amp; FOSS Edu)</div>
        </div>

        <!-- Day 1 Schedule Content -->
        <div id="day-1" class="event-schedule-day-panel active">
            <div class="event-timetable">
                <!-- 08:00 - 09:00 -->
                <div class="timetable-row highlight-row">
                    <div class="time-col">08:00 &ndash; 09:00</div>
                    <div class="session-col full-width">
                        <div class="session-title">Đón Tiếp Đại Biểu, Check-in Mã QR &amp; Phát Kỷ Yếu Hội Nghị</div>
                        <div class="session-meta">Khu vực Tiền sảnh Đại hội &bull; Ban Tổ Chức đón tiếp</div>
                    </div>
                </div>

                <!-- 09:00 - 10:30 -->
                <div class="timetable-row">
                    <div class="time-col">09:00 &ndash; 10:30</div>
                    <div class="session-col room-a">
                        <span class="room-tag tag-a">Hội Trường A</span>
                        <div class="session-title">Phiên Toàn Thể: Xu Hướng Phát Triển Mã Nguồn Mở &amp; AI Toàn Cầu</div>
                        <div class="session-speaker">Báo cáo viên: <a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>">GS. Nguyễn Văn A</a> (Viện Công Nghệ)</div>
                        <p class="session-desc">Định hướng chiến lược nguồn mở trong hạ tầng số quốc gia và các thách thức về bảo mật.</p>
                    </div>
                    <div class="session-col room-b">
                        <span class="room-tag tag-b">Phòng B</span>
                        <div class="session-title">Kiến Trúc Nhân Linux Hiện Đại &amp; Quản Trị Module Động</div>
                        <div class="session-speaker">Báo cáo viên: <a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>">ThS. Trần Thị B</a> (FOSS Specialist)</div>
                        <p class="session-desc">So sánh nhân Monolithic vs Hybrid Kernel và cơ chế phân quyền POSIX UGO.</p>
                    </div>
                    <div class="session-col room-c">
                        <span class="room-tag tag-c">Phòng C</span>
                        <div class="session-title">Mô Hình Ngôn Ngữ Lớn Nguồn Mở: Triển Khai Thực Tế</div>
                        <div class="session-speaker">Báo cáo viên: <a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>">KS. Lê Văn C</a> (AI Architect)</div>
                        <p class="session-desc">Xây dựng hệ thống RAG và LLMs cục bộ không phụ thuộc dịch vụ đám mây đóng.</p>
                    </div>
                </div>

                <!-- 10:30 - 12:00 -->
                <div class="timetable-row">
                    <div class="time-col">10:30 &ndash; 12:00</div>
                    <div class="session-col room-a">
                        <span class="room-tag tag-a">Hội Trường A</span>
                        <div class="session-title">Toạ Đàm: Giấy Phép Bản Quyền Phần Mềm (GPLv2, MIT, Apache)</div>
                        <div class="session-speaker">Điều phối: Ban Chuyên Môn Bản Quyền FOSS</div>
                        <p class="session-desc">Phân tích tính kế thừa Copyleft, bảo vệ quyền tác giả và nghĩa vụ công khai mã nguồn.</p>
                    </div>
                    <div class="session-col room-b">
                        <span class="room-tag tag-b">Phòng B</span>
                        <div class="session-title">Thực Hành Container Hóa Ứng Dụng Với Docker &amp; Kubernetes</div>
                        <div class="session-speaker">Báo cáo viên: Đội ngũ Kỹ sư DevOps</div>
                        <p class="session-desc">Triển khai cụm microservices an toàn, tự động cân bằng tải và giám sát tài nguyên.</p>
                    </div>
                    <div class="session-col room-c">
                        <span class="room-tag tag-c">Phòng C</span>
                        <div class="session-title">Gia Cố Bảo Mật Máy Chủ Web &amp; Chống Tấn Công Dò Quét</div>
                        <div class="session-speaker">Báo cáo viên: Chuyên gia An toàn thông tin</div>
                        <p class="session-desc">Kỹ thuật chặn XML-RPC, ẩn phiên bản CMS và rà quét lỗ hổng với công cụ WPScan.</p>
                    </div>
                </div>

                <!-- 12:00 - 13:30 -->
                <div class="timetable-row highlight-row">
                    <div class="time-col">12:00 &ndash; 13:30</div>
                    <div class="session-col full-width">
                        <div class="session-title">Nghỉ Trưa &amp; Tiệc Giao Lưu Mạng Lưới (Networking Lunch)</div>
                        <div class="session-meta">Nhà hàng Trung tâm Hội nghị Quốc gia &bull; Dành cho đại biểu có vé VIP và vé Tiêu chuẩn</div>
                    </div>
                </div>

                <!-- 13:30 - 15:00 -->
                <div class="timetable-row">
                    <div class="time-col">13:30 &ndash; 15:00</div>
                    <div class="session-col room-a">
                        <span class="room-tag tag-a">Hội Trường A</span>
                        <div class="session-title">Diễn Đàn Chuyển Đổi Số Giáo Dục Dựa Trên Nền Tảng Mở</div>
                        <div class="session-speaker">Báo cáo viên: Đại diện các Trường Đại học khối CNTT</div>
                        <p class="session-desc">Chia sẻ kinh nghiệm đưa hệ điều hành Linux và phần mềm tự do vào giảng dạy.</p>
                    </div>
                    <div class="session-col room-b">
                        <span class="room-tag tag-b">Phòng B</span>
                        <div class="session-title">Hạ Tầng Điện Toán Đám Mây Mở: OpenStack &amp; Ceph Storage</div>
                        <div class="session-speaker">Báo cáo viên: Kỹ sư Hạ tầng Đám mây</div>
                        <p class="session-desc">Tự chủ hạ tầng lưu trữ phân tán, tiết kiệm chi phí bản quyền doanh nghiệp.</p>
                    </div>
                    <div class="session-col room-c">
                        <span class="room-tag tag-c">Phòng C</span>
                        <div class="session-title">Thực Hành Lập Trình An Toàn: Lọc Dữ Liệu &amp; Chống Tấn Công XSS/SQLi</div>
                        <div class="session-speaker">Báo cáo viên: Chuyên gia Phát triển Phần mềm An toàn</div>
                        <p class="session-desc">Áp dụng nguyên tắc Sanitize Input, Escape Output trong kiến trúc Child Theme.</p>
                    </div>
                </div>

                <!-- 15:00 - 17:00 -->
                <div class="timetable-row">
                    <div class="time-col">15:00 &ndash; 17:00</div>
                    <div class="session-col full-width">
                        <div class="session-title">Phiên Thảo Luận Bàn Tròn: Hỏi Đáp Với Các Chuyên Gia &amp; Tổng Kết Ngày 1</div>
                        <div class="session-meta">Hội Trường Lớn A &bull; Toàn thể diễn giả và khách tham dự tham gia trực tiếp</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Day 2 & 3 Placeholder Panels -->
        <div id="day-2" class="event-schedule-day-panel" style="display: none;">
            <div class="event-alert-box">
                <p><strong>Chương trình Ngày 02 (21/11/2026):</strong> Tập trung vào các buổi Workshop thực hành chuyên sâu (Hands-on Labs) và Hackathon Mã Nguồn Mở. Chi tiết khung giờ sẽ được cập nhật đồng bộ trước ngày khai mạc 1 tuần.</p>
            </div>
        </div>

        <div id="day-3" class="event-schedule-day-panel" style="display: none;">
            <div class="event-alert-box">
                <p><strong>Chương trình Ngày 03 (22/11/2026):</strong> Tọa đàm bàn tròn lãnh đạo công nghệ, Trao giải thưởng Dự án Mã Nguồn Mở Xuất Sắc 2026 và Lễ Bế Mạc Hội Nghị.</p>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="event-schedule-cta">
            <div class="cta-box">
                <h3>Bạn Đã Chọn Được Phiên Hội Thảo Phù Hợp?</h3>
                <p>Đăng ký nhận vé điện tử ngay hôm nay để nhận mã QR tham dự và giữ chỗ trong hội trường.</p>
                <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="event-btn event-btn-accent">
                    Đăng Ký Vé Ngay Bây Giờ
                </a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
