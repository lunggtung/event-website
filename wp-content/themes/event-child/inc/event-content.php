<?php
/**
 * Nội dung dùng chung của hội nghị.
 * @package Event_Child_Theme
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function event_child_event_data() {
    return array( 'name' => 'Open Tech Summit 2026', 'start' => '2026-11-20T08:00:00+07:00', 'end' => '2026-11-22T12:00:00+07:00', 'dates' => '20–22 tháng 11, 2026', 'date_short' => '20–22.11.2026', 'city' => 'Hà Nội', 'venue' => 'Trung tâm Hội nghị Quốc gia', 'address' => 'Đường Phạm Hùng, Mễ Trì, Hà Nội' );
}

function event_child_ticket_types() {
    return array(
        'student' => array( 'label' => 'Sinh viên', 'description' => 'Dành cho người đang học, muốn khám phá các hướng đi trong công nghệ mở.', 'features' => array( 'Tham dự các phiên trong chương trình', 'Trao đổi cùng diễn giả và cộng đồng', 'Vé điện tử có mã QR cá nhân' ) ),
        'standard' => array( 'label' => 'Tiêu chuẩn', 'description' => 'Dành cho lập trình viên, người làm hạ tầng và những ai quan tâm đến mã nguồn mở.', 'features' => array( 'Tham dự cả ba ngày hội nghị', 'Lựa chọn các phiên ở ba phòng', 'Vé điện tử có mã QR cá nhân' ) ),
        'guest' => array( 'label' => 'Khách mời', 'description' => 'Dành cho khách tham gia trao đổi chuyên môn và kết nối với cộng đồng.', 'features' => array( 'Tham dự các phiên trong chương trình', 'Tham gia các phiên trao đổi mở', 'Vé điện tử có mã QR cá nhân' ) ),
    );
}

function event_child_speakers() {
    return array(
        'an-minh' => array( 'name' => 'An Minh', 'role' => 'Kỹ sư an toàn thông tin', 'topic' => 'Bảo mật bắt đầu từ những điều cơ bản', 'category' => 'security', 'image' => 'speaker-nguyen-van-a.jpg', 'bio' => 'Hồ sơ minh họa cho chuyên đề bảo mật ứng dụng web: từ kiểm tra đầu vào, quản lý quyền đến đọc kết quả rà quét và ưu tiên khắc phục.' ),
        'bao-tran' => array( 'name' => 'Bảo Trân', 'role' => 'Người thực hành mã nguồn mở', 'topic' => 'Hiểu giấy phép, đóng góp tự tin', 'category' => 'foss', 'image' => 'speaker-tran-thi-b.jpg', 'bio' => 'Hồ sơ minh họa cho chuyên đề cộng đồng và giấy phép: đọc điều khoản sử dụng, ghi nhận đóng góp và bắt đầu một dự án mở có trách nhiệm.' ),
        'khanh-lam' => array( 'name' => 'Khánh Lâm', 'role' => 'Kỹ sư hạ tầng Linux', 'topic' => 'Từ máy chủ đầu tiên đến hệ thống dễ vận hành', 'category' => 'linux', 'image' => 'speaker-le-van-c.jpg', 'bio' => 'Hồ sơ minh họa cho chuyên đề Linux và hạ tầng: phân quyền, quản lý dịch vụ, container và những thói quen giúp hệ thống dễ quan sát, dễ phục hồi.' ),
    );
}

function event_child_schedule() {
    return array(
        'day-1' => array( 'date' => '20/11/2026', 'label' => 'Ngày 01', 'title' => 'Khai mạc & chuyên đề', 'sessions' => array(
            array( 'id' => 'khai-mac', 'time' => '08:00–09:00', 'room' => 'Sảnh chung', 'title' => 'Đón khách & khai mạc', 'speaker' => '', 'category' => 'community', 'description' => 'Nhận thẻ tham dự, làm quen với không gian và giới thiệu chương trình ba ngày.' ),
            array( 'id' => 'giay-phep', 'time' => '09:00–10:30', 'room' => 'Hội trường A', 'title' => 'Giấy phép mở: chọn đúng từ đầu', 'speaker' => 'bao-tran', 'category' => 'foss', 'description' => 'GPL, MIT và Apache khác nhau ở đâu? Những câu hỏi cần đặt ra trước khi sử dụng một thư viện.' ),
            array( 'id' => 'linux-can-ban', 'time' => '09:00–10:30', 'room' => 'Phòng B', 'title' => 'Linux dưới góc nhìn người vận hành', 'speaker' => 'khanh-lam', 'category' => 'linux', 'description' => 'Tiến trình, dịch vụ, nhật ký hệ thống và phân quyền qua các tình huống thực hành.' ),
            array( 'id' => 'bao-mat-web', 'time' => '09:00–10:30', 'room' => 'Phòng C', 'title' => 'Một ứng dụng web an toàn bắt đầu thế nào?', 'speaker' => 'an-minh', 'category' => 'security', 'description' => 'Lập mô hình rủi ro đơn giản và xác định các điểm cần bảo vệ trong một biểu mẫu.' ),
            array( 'id' => 'cong-dong', 'time' => '10:45–12:00', 'room' => 'Hội trường A', 'title' => 'Đóng góp đầu tiên cho một dự án mở', 'speaker' => 'bao-tran', 'category' => 'foss', 'description' => 'Từ đọc hướng dẫn đóng góp đến tạo issue và gửi pull request có ích.' ),
            array( 'id' => 'nghi-trua-1', 'time' => '12:00–13:30', 'room' => 'Sảnh chung', 'title' => 'Nghỉ trưa', 'speaker' => '', 'category' => 'community', 'description' => 'Thời gian nghỉ và tự do trao đổi. Đại biểu tự túc bữa trưa.' ),
            array( 'id' => 'du-an-mo', 'time' => '13:30–15:00', 'room' => 'Hội trường A', 'title' => 'Duy trì một dự án sau phiên bản đầu', 'speaker' => 'bao-tran', 'category' => 'foss', 'description' => 'Tài liệu, quản lý phiên bản và một quy trình review vừa sức với nhóm nhỏ.' ),
            array( 'id' => 'container', 'time' => '13:30–15:00', 'room' => 'Phòng B', 'title' => 'Container cho môi trường phát triển', 'speaker' => 'khanh-lam', 'category' => 'linux', 'description' => 'Đóng gói ứng dụng và cấu hình môi trường để thành viên khác dựng lại được.' ),
            array( 'id' => 'quyen-truy-cap', 'time' => '13:30–15:00', 'room' => 'Phòng C', 'title' => 'Quyền truy cập vừa đủ', 'speaker' => 'an-minh', 'category' => 'security', 'description' => 'Nhận diện các quyền thừa và kiểm tra việc phân quyền ở tầng ứng dụng.' ),
            array( 'id' => 'hoi-dap-1', 'time' => '15:15–17:00', 'room' => 'Hội trường A', 'title' => 'Hỏi đáp mở: mang vấn đề của bạn đến', 'speaker' => '', 'category' => 'community', 'description' => 'Trao đổi các tình huống thực tế và chuẩn bị cho ngày thực hành.' ),
        ) ),
        'day-2' => array( 'date' => '21/11/2026', 'label' => 'Ngày 02', 'title' => 'Workshop thực hành', 'sessions' => array(
            array( 'id' => 'chuan-bi-lab', 'time' => '08:00–09:00', 'room' => 'Sảnh chung', 'title' => 'Chuẩn bị môi trường thực hành', 'speaker' => '', 'category' => 'community', 'description' => 'Kiểm tra laptop, công cụ và tài liệu trước khi vào phòng chuyên đề.' ),
            array( 'id' => 'lab-git', 'time' => '09:00–10:30', 'room' => 'Hội trường A', 'title' => 'Workshop: cùng làm việc với Git', 'speaker' => 'bao-tran', 'category' => 'foss', 'description' => 'Tạo nhánh, mô tả thay đổi và xử lý một xung đột đơn giản theo nhóm.' ),
            array( 'id' => 'lab-linux', 'time' => '09:00–10:30', 'room' => 'Phòng B', 'title' => 'Workshop: dựng một máy chủ Linux', 'speaker' => 'khanh-lam', 'category' => 'linux', 'description' => 'Tạo người dùng, cấu hình SSH và chạy dịch vụ với quyền phù hợp.' ),
            array( 'id' => 'lab-form', 'time' => '09:00–10:30', 'room' => 'Phòng C', 'title' => 'Workshop: kiểm tra một form đăng ký', 'speaker' => 'an-minh', 'category' => 'security', 'description' => 'Thực hành validation, nonce và escaping trên môi trường thử nghiệm.' ),
            array( 'id' => 'review-lab', 'time' => '10:45–12:00', 'room' => 'Hội trường A', 'title' => 'Cùng đọc mã và chia sẻ cách làm', 'speaker' => '', 'category' => 'community', 'description' => 'Các nhóm trình bày kết quả và nhận góp ý về khả năng bảo trì.' ),
            array( 'id' => 'nghi-trua-2', 'time' => '12:00–13:30', 'room' => 'Sảnh chung', 'title' => 'Nghỉ trưa', 'speaker' => '', 'category' => 'community', 'description' => 'Thời gian nghỉ và tự do trao đổi. Đại biểu tự túc bữa trưa.' ),
            array( 'id' => 'lab-tai-lieu', 'time' => '13:30–15:00', 'room' => 'Hội trường A', 'title' => 'Viết hướng dẫn mà người khác làm theo được', 'speaker' => 'bao-tran', 'category' => 'foss', 'description' => 'Thử dựng lại sản phẩm từ README và sửa các bước còn thiếu.' ),
            array( 'id' => 'lab-backup', 'time' => '13:30–15:00', 'room' => 'Phòng B', 'title' => 'Sao lưu là để phục hồi', 'speaker' => 'khanh-lam', 'category' => 'linux', 'description' => 'Xuất dữ liệu, kiểm tra bản sao và phục hồi trên môi trường riêng.' ),
            array( 'id' => 'lab-scan', 'time' => '13:30–15:00', 'room' => 'Phòng C', 'title' => 'Đọc một báo cáo rà quét bảo mật', 'speaker' => 'an-minh', 'category' => 'security', 'description' => 'Phân biệt cảnh báo và lỗ hổng, đánh giá tác động, ghi bằng chứng khắc phục.' ),
            array( 'id' => 'tong-ket-lab', 'time' => '15:15–17:00', 'room' => 'Hội trường A', 'title' => 'Chia sẻ kết quả thực hành', 'speaker' => '', 'category' => 'community', 'description' => 'Trình diễn một luồng hoạt động trọn vẹn và trao đổi bài học từ lỗi gặp phải.' ),
        ) ),
        'day-3' => array( 'date' => '22/11/2026', 'label' => 'Ngày 03', 'title' => 'Thảo luận & bế mạc', 'sessions' => array(
            array( 'id' => 'don-khach-3', 'time' => '08:00–09:00', 'room' => 'Sảnh chung', 'title' => 'Cà phê & gặp gỡ cộng đồng', 'speaker' => '', 'category' => 'community', 'description' => 'Không gian trao đổi tự do trước các phiên tổng kết.' ),
            array( 'id' => 'duy-tri-cong-dong', 'time' => '09:00–10:15', 'room' => 'Hội trường A', 'title' => 'Giữ nhịp đóng góp sau hội nghị', 'speaker' => 'bao-tran', 'category' => 'foss', 'description' => 'Chọn một đóng góp nhỏ và lập kế hoạch thực hiện trong tháng tiếp theo.' ),
            array( 'id' => 'ha-tang-nho', 'time' => '09:00–10:15', 'room' => 'Phòng B', 'title' => 'Hạ tầng vừa đủ cho một nhóm nhỏ', 'speaker' => 'khanh-lam', 'category' => 'linux', 'description' => 'Cân bằng chi phí, vận hành và khả năng khôi phục khi lựa chọn công cụ.' ),
            array( 'id' => 'checklist-bao-mat', 'time' => '09:00–10:15', 'room' => 'Phòng C', 'title' => 'Checklist bảo mật trước khi ra mắt', 'speaker' => 'an-minh', 'category' => 'security', 'description' => 'Chuyển kết quả rà soát thành các đầu việc cụ thể và kiểm tra lại.' ),
            array( 'id' => 'ban-tron', 'time' => '10:30–11:30', 'room' => 'Hội trường A', 'title' => 'Bàn tròn: công nghệ mở trong công việc hằng ngày', 'speaker' => '', 'category' => 'community', 'description' => 'Những việc có thể bắt đầu ngay, những giới hạn cần nhìn nhận và cách học cùng nhau.' ),
            array( 'id' => 'be-mac', 'time' => '11:30–12:00', 'room' => 'Hội trường A', 'title' => 'Tổng kết & hẹn gặp lại', 'speaker' => '', 'category' => 'community', 'description' => 'Điểm lại ba ngày và chia sẻ các bước tiếp theo của từng nhóm.' ),
        ) ),
    );
}
