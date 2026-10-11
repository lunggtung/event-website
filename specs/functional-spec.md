# TÀI LIỆU ĐẶC TẢ YÊU CẦU CHỨC NĂNG (FUNCTIONAL SPECIFICATION)
## DỰ ÁN: CỔNG THÔNG TIN HỘI NGHỊ KHOA HỌC & CÔNG NGHỆ MỞ 2026 (OPEN TECH SUMMIT 2026)
### MÔN HỌC: MÃ NGUỒN MỞ — NHÓM 2

---

## 1. MỤC TIÊU VÀ PHẠM VI NGHIỆP VỤ

Tài liệu này đặc tả chi tiết các yêu cầu chức năng cho toàn bộ **6 trang thành phần** thuộc Cổng thông tin Hội nghị Khoa học & Công nghệ Mở 2026. Mỗi trang đảm nhiệm một phân hệ nghiệp vụ độc lập, phục vụ khách tham dự, diễn giả và ban tổ chức hội nghị.

---

## 2. ĐẶC TẢ CHI TIẾT 6 TRANG CHỨC NĂNG

### TRANG 1: TRANG CHỦ (HOME PAGE)
- **Đường dẫn (URL):** `/` (Trang tĩnh chính, thiết lập tại `Settings > Reading > A static page`)
- **Mục tiêu:** Cung cấp cái nhìn toàn cảnh về sự kiện, tạo ấn tượng chuyên nghiệp, thúc đẩy người xem đăng ký vé tham dự.
- **Các khối giao diện (Sections) & Yêu cầu chức năng:**
  1. **Hero Banner:**
     - Tiêu đề hội nghị: *"Hội Nghị Khoa Học & Công Nghệ Mở 2026 (Open Tech Summit 2026)"*.
     - Khẩu hiệu (Slogan): *"Kiến tạo Tương lai Số với Nền tảng Mã Nguồn Mở & Trí Tuệ Nhân Tạo Minh Bạch"*.
     - Thời gian & Địa điểm: *20 - 22 Tháng 11, 2026 | Trung tâm Hội nghị Quốc gia, Hà Nội*.
     - Nút kêu gọi hành động (CTA): *"Đăng ký vé ngay"* (chuyển hướng đến `/dang-ky-ve`) và *"Xem lịch trình"* (chuyển hướng đến `/lich-trinh`).
  2. **Đồng hồ đếm ngược thời gian thực (Countdown Timer):**
     - Hiển thị qua Shortcode: `[event_countdown date="2026-11-20 08:00:00" title="Thời Gian Đếm Ngược Đến Lễ Khai Mạc"]`.
     - Xử lý JavaScript: Tệp `assets/js/countdown.js` cập nhật từng giây theo 4 ô: Ngày - Giờ - Phút - Giây.
  3. **Hộp thông báo khẩn cấp (Event Alerts):**
     - Hiển thị qua Shortcode: `[event_alert type="warning"]Thông báo: Cổng đăng ký vé Sinh viên sẽ đóng khi đủ 500 lượt đăng ký đầu tiên.[/event_alert]`.
  4. **Thống kê quy mô sự kiện (Key Metrics):**
     - 4 thông số nổi bật: *3 Ngày hội nghị* | *30+ Diễn giả đầu ngành* | *1.500+ Khách tham dự* | *20+ Phiên thảo luận chuyên sâu*.
  5. **Tóm tắt 3 chủ đề trọng điểm (Tracks Preview):**
     - Track 1: Trí tuệ nhân tạo nguồn mở (Open Source AI & LLMs).
     - Track 2: Điện toán đám mây & Hạ tầng Linux hiện đại (Cloud Native & Linux Infrastructure).
     - Track 3: An toàn thông tin & Mã nguồn mở trong chuyển đổi số quốc gia.
  6. **Đối tác & Đơn vị đồng hành:** Danh sách các tổ chức, hiệp hội phần mềm tự do nguồn mở uy tín.

---

### TRANG 2: LỊCH TRÌNH HỘI NGHỊ (AGENDA / SCHEDULE)
- **Đường dẫn (URL):** `/lich-trinh`
- **Mục tiêu:** Cung cấp chương trình chi tiết của hội nghị theo từng khung giờ và phòng họp song song, giúp người tham dự dễ dàng lựa chọn nội dung phù hợp.
- **Các khối giao diện & Yêu cầu chức năng:**
  1. **Thanh điều hướng chuyển ngày (Day Tabs):**
     - Ngày 1 (20/11/2026): Lễ Khai Mạc & Phiên Toàn Thể (Plenary Keynote).
     - Ngày 2 (21/11/2026): Các Phiên Chuyên Đề Song Song (Technical Deep-Dive Sessions).
     - Ngày 3 (22/11/2026): Tọa Đàm Bàn Tròn & Lễ Bế Mạc (Panel Discussion & Closing).
  2. **Bảng phân chia 3 Hội trường / Phòng họp song song:**
     - **Hội trường A (Main Hall):** Chủ đề Định hướng chiến lược, Giấy phép bản quyền, Xu hướng FOSS toàn cầu.
     - **Phòng Chuyên đề B (Room B):** Kỹ thuật chuyên sâu về Linux Kernel, Container, Kubernetes, DevOps.
     - **Phòng Chuyên đề C (Room C):** Ứng dụng Open Source trong Giáo dục, Y tế, và Công nghệ bảo mật mạng.
  3. **Cấu trúc mỗi phiên hội thảo (Session Block):**
     - Khung giờ bắt đầu - kết thúc (ví dụ: `08:30 - 10:00`).
     - Tên bài thuyết trình / Chuyên đề.
     - Tên diễn giả trình bày (có liên kết nhảy sang hồ sơ diễn giả tương ứng tại `/dien-gia`).
     - Tóm tắt ngắn nội dung bài trình bày (Abstract).
     - Thẻ gắn nhãn định loại (Tags): *Keynote*, *Technical*, *Workshop*, *Security*.

---

### TRANG 3: DANH BẠ DIỄN GIẢ (SPEAKERS DIRECTORY)
- **Đường dẫn (URL):** `/dien-gia`
- **Mục tiêu:** Tôn vinh và giới thiệu đội ngũ học giả, chuyên gia hàng đầu tham gia báo cáo tại hội nghị.
- **Các khối giao diện & Yêu cầu chức năng:**
  1. **Lưới thẻ thông tin Diễn giả (Speaker Cards Grid):**
     - Ảnh chân dung chuyên nghiệp chuẩn kích thước.
     - Họ và tên, Học hàm/Học vị (ví dụ: *GS. Nguyễn Văn A*, *ThS. Trần Thị B*, *KS. Lê Văn C*).
     - Chức vụ và Đơn vị công tác (Viện nghiên cứu, Trường Đại học, Doanh nghiệp công nghệ).
     - Tên đề tài báo cáo tại hội nghị.
     - Liên kết hồ sơ chuyên môn (GitHub, LinkedIn, Website cá nhân).
  2. **Bộ lọc diễn giả theo chuyên đề (Topic Filter):**
     - Lọc nhanh theo lĩnh vực: *Tất cả*, *An toàn thông tin*, *Điện toán đám mây*, *AI & Dữ liệu lớn*.
  3. **Lời mời tham gia làm Diễn giả / Đệ trình báo cáo (Call for Papers - CFP):**
     - Khối thông tin hướng dẫn nộp bài nghiên cứu và liên hệ ban chuyên môn hội nghị.

---

### TRANG 4: ĐĂNG KÝ VÉ THAM DỰ (TICKETS & REGISTRATION)
- **Đường dẫn (URL):** `/dang-ky-ve`
- **Mục tiêu:** Cung cấp thông tin các gói vé tham dự và form đăng ký trực tuyến, tự động cấp mã vé định danh kèm mã QR Code xác thực.
- **Các khối giao diện & Yêu cầu chức năng:**
  1. **Bảng so sánh các hạng vé (Pricing Table):**
     - Sử dụng Shortcode: `[event_ticket_card type="standard" ...]` và `[event_ticket_card type="vip" ...]`.
     - *Hạng 1: Vé Sinh Viên (Student Pass) — 0 VNĐ:* Dành riêng cho sinh viên các trường ĐH, tiếp cận toàn bộ phiên hội thảo chung.
     - *Hạng 2: Vé Tiêu Chuẩn (Standard Pass) — Miễn phí:* Tiếp cận tất cả các phiên hội thảo, tài liệu tóm tắt dạng số.
     - *Hạng 3: Vé VIP (Full Access Pass) — Quyền lợi đặc biệt:* Tiếp cận phiên thảo luận bàn tròn với diễn giả, tiệc giao lưu networking, nhận trọn bộ kỷ yếu hội nghị có ISBN.
  2. **Form đăng ký thông tin (Contact Form 7 Integration):**
     - Các trường bắt buộc: Họ và tên (`text`), Email nhận vé (`email`), Số điện thoại (`tel`), Đơn vị học tập/công tác (`text`), Hạng vé chọn tham gia (`select`).
     - Cam kết bảo mật thông tin theo nguyên tắc bảo vệ quyền riêng tư.
  3. **Module xử lý mã vé & Sinh mã QR (`inc/custom-ticket-qr.php`):**
     - Bắt sự kiện `wpcf7_before_send_mail`.
     - Sinh chuỗi mã định danh duy nhất theo cú pháp: `OTS2026-XXXXXX` (trong đó X là ký tự ngẫu nhiên mã hóa an toàn).
     - Gọi hàm tạo ảnh mã QR chứa chuỗi định danh vé.
     - Tự động chèn thông tin mã vé và ảnh QR vào nội dung email gửi đến người đăng ký.

---

### TRANG 5: ĐỊA ĐIỂM & BẢN ĐỒ (VENUE & LOCATION)
- **Đường dẫn (URL):** `/dia-diem`
- **Mục tiêu:** Cung cấp thông tin vị trí địa lý, bản đồ tương tác mã nguồn mở và hướng dẫn chi tiết phương tiện di chuyển cho khách tham dự.
- **Các khối giao diện & Yêu cầu chức năng:**
  1. **Thông tin trung tâm tổ chức sự kiện:**
     - Tên địa điểm: *Trung tâm Hội nghị Quốc gia Hà Nội (NCC)*.
     - Địa chỉ chính xác: *Cổng số 1, Đại lộ Thăng Long, Mễ Trì, Nam Từ Liêm, Hà Nội*.
     - Quy mô cơ sở vật chất: Các phòng hội thảo hiện đại, hệ thống âm thanh ánh sáng chuẩn quốc tế, mạng Wi-Fi băng thông rộng.
  2. **Bản đồ tương tác mã nguồn mở (OpenStreetMap Iframe):**
     - Nhúng bản đồ thông qua iframe OpenStreetMap (tuân thủ tiêu chí phần mềm tự do nguồn mở, không dùng API trả phí có theo dõi người dùng của Google).
     - Có sẵn nút mở chỉ đường trực tiếp trên bản đồ.
  3. **Hướng dẫn phương tiện di chuyển (Transportation Guide):**
     - *Tuyến xe buýt công cộng:* Tuyến 50, Tuyến 107, Tuyến BRT01 dừng ngay trước cổng trung tâm.
     - *Tuyến tàu điện đô thị (Metro):* Hướng dẫn trạm dừng kết nối gần nhất.
     - *Phương tiện cá nhân (Ô tô, Xe máy):* Vị trí cổng vào bãi đỗ xe và quy định gửi xe của ban quản lý.
  4. **Khách sạn và lưu trú lân cận:**
     - Gợi ý danh sách 3 khách sạn lân cận dành cho đại biểu, diễn giả từ xa đến tham dự.

---

### TRANG 6: GIỚI THIỆU & GIẤY PHÉP BẢN QUYỀN (ABOUT & LICENSES)
- **Đường dẫn (URL):** `/gioi-thieu`
- **Mục tiêu:** Tuyên bố sứ mệnh của hội nghị, giới thiệu ban tổ chức, và công khai minh bạch toàn bộ các giấy phép mã nguồn mở (FOSS Licenses) được ứng dụng trong dự án.
- **Các khối giao diện & Yêu cầu chức năng:**
  1. **Sứ mệnh & Giá trị cốt lõi (Mission & Vision):**
     - Thúc đẩy việc nghiên cứu, ứng dụng và phát triển phần mềm mã nguồn mở tại Việt Nam.
     - Tạo không gian kết nối bình đẳng giữa sinh viên, giảng viên, nhà nghiên cứu và doanh nghiệp công nghệ.
  2. **Đội ngũ Ban tổ chức & Hội đồng chuyên môn:**
     - Giới thiệu thành phần Ban Giám hiệu, Khoa CNTT và các nhóm chuyên trách.
  3. **Bảng đối chiếu Giấy phép Mã Nguồn Mở (FOSS License Compliance):**
     - Trích xuất và trình bày rõ ràng thông tin từ tệp `LICENSES.md` của dự án:
       + *WordPress Core:* GNU General Public License v2 (GPLv2).
       + *Theme cha Astra:* GNU General Public License v2 (GPLv2).
       + *Child Theme (Mã nguồn Nhóm 2 tùy biến):* GNU General Public License v2 (GPLv2).
       + *Các thư viện JavaScript/CSS bổ trợ:* Giấy phép MIT / Apache License 2.0.
       + *Nội dung văn bản và hình ảnh minh họa:* Creative Commons Attribution-ShareAlike 4.0 International (CC BY-SA 4.0).
     - Phân tích quyền và nghĩa vụ theo quy định giấy phép copyleft (đảm bảo tính minh bạch, không giữ độc quyền mã phái sinh).
