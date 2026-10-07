# 📜 BẢNG THỐNG KÊ GIẤY PHÉP MÃ NGUỒN MỞ (OPEN SOURCE LICENSES)
> **Dự án:** Trang web Quản lý Sự kiện & Hội nghị (Nhóm 2)  
> **Học phần:** Mã nguồn mở  
> **Người phụ trách:** TV5 (Kiểm kê & Báo cáo)

---

## 1. Bảng Kiểm Kê Tổng Hợp Thành Phần Hệ Thống

| STT | Thành phần | Tên phần mềm / Gói | Phiên bản | Mục đích sử dụng | Loại Giấy phép (License) | Nguồn lưu trữ mã nguồn |
| :---: | :--- | :--- | :---: | :--- | :--- | :--- |
| 1 | **Core CMS** | WordPress | 6.x | Hệ quản trị nội dung mã nguồn mở làm nền tảng toàn bộ website | **GPLv2 (hoặc mới hơn)** | [WordPress Trac / GitHub](https://github.com/WordPress/WordPress) |
| 2 | **Parent Theme** | Astra | 4.x | Giao diện gốc chuẩn SEO, tối ưu tốc độ và hỗ trợ hook cho Child Theme | **GPLv2** | [Brainstorm Force / WP Repository](https://wordpress.org/themes/astra/) |
| 3 | **Child Theme** | Event Child Theme | 1.0.0 | Giao diện và mã nguồn tùy biến mở rộng do Nhóm 2 tự lập trình | **GPLv2 (hoặc mới hơn)** | *Public Repo GitHub của Nhóm 2* |
| 4 | **Plugin Nghiệp vụ** | Contact Form 7 | 5.9+ | Xây dựng biểu mẫu đăng ký tham dự hội nghị và thu thập thông tin | **GPLv2 (hoặc mới hơn)** | [Rock Lobster / WP Repository](https://wordpress.org/plugins/contact-form-7/) |
| 5 | **Plugin Tiện ích** | WP Mail SMTP | 4.x | Cấu hình giao thức gửi email xác nhận và vé điện tử qua Google SMTP | **GPLv2** | [WPForms / WP Repository](https://wordpress.org/plugins/wp-mail-smtp/) |
| 6 | **Plugin Bảo mật** | WPS Hide Login | 1.9+ | Đổi đường dẫn đăng nhập mặc định (`/wp-login.php`) chống dò quét tự động | **GPLv2** | [WPServeur / WP Repository](https://wordpress.org/plugins/wps-hide-login/) |
| 7 | **Plugin Bảo mật** | Wordfence Security | 7.x | Cung cấp tường lửa ứng dụng web (WAF) và ngăn chặn tấn công Brute-force | **GPLv2** | [Defiant / WP Repository](https://wordpress.org/plugins/wordfence/) |
| 8 | **Thư viện JS** | Vanilla JS Countdown | Custom | Script đếm ngược thời gian thực do nhóm tự viết | **MIT License** | *Nằm trong `assets/js/countdown.js`* |

---

## 2. Phân Tích Ý Nghĩa Các Loại Giấy Phép Được Sử Dụng

### 2.1. Giấy phép GNU General Public License v2 (GPLv2)
- **Bản chất:** Giấy phép có tính chất **Copyleft (mã nguồn mở lan truyền)** mạnh mẽ.
- **Quyền hạn:** Cho phép người dùng tự do sao chép, phân phối, sửa đổi mã nguồn.
- **Ràng buộc:** Mọi tác phẩm phái sinh (Derivative Works) từ phần mềm sử dụng GPLv2 (bao gồm Child Theme của Nhóm 2 kế thừa từ WordPress Core và Astra) **bắt buộc cũng phải được phát hành dưới giấy phép GPLv2 hoặc tương thích**, không được đóng mã nguồn thương mại độc quyền.

### 2.2. Giấy phép MIT License
- **Bản chất:** Giấy phép mã nguồn mở có tính chất **Cấp phép dễ dãi (Permissive License)**.
- **Quyền hạn:** Cho phép sử dụng, sửa đổi, sáp nhập, xuất bản, phân phối và thậm chí bán lại mã nguồn mà hầu như không có bất kỳ ràng buộc nào, chỉ cần giữ nguyên dòng thông báo bản quyền và miễn trừ trách nhiệm pháp lý gốc.
- **Áp dụng:** Nhóm sử dụng cho các module JavaScript giao diện tự viết (`countdown.js`, `main.js`) để đảm bảo tính gọn nhẹ và tự do tái sử dụng.

---

## 3. Cam Kết Tuân Thủ Bản Quyền Của Nhóm 2
- 100% các thành phần Theme, Plugin và Thư viện được tích hợp trong dự án đều là phần mềm mã nguồn mở chính thống, được tải trực tiếp từ kho chính thức `WordPress.org`.
- Tuyệt đối không sử dụng các bản lậu (Nulled Plugins/Themes), tránh rủi ro chứa Backdoor, mã độc và vi phạm đạo đức trong phát triển phần mềm mã nguồn mở.
