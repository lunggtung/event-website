# BÁO CÁO AN TOÀN THÔNG TIN, GIA CỐ HỆ THỐNG & RÀ QUÉT LỖ HỔNG (PHẦN 3)
> **DỰ ÁN:** TRANG WEB QUẢN LÝ SỰ KIỆN & HỘI NGHỊ (NHÓM 2)  
> **NGƯỜI PHỤ TRÁCH THỰC HIỆN:** TV1 (TRƯỞNG NHÓM & SECURITY)  
> **CÔNG CỤ SỬ DỤNG:** WPScan CLI / OWASP ZAP / Wordfence Security

---

## 🛡️ CHƯƠNG I: CÁC BIỆN PHÁP GIA CỐ HỆ THỐNG ĐÃ THỰC HIỆN (SYSTEM HARDENING)

### 1. Đổi đường dẫn đăng nhập mặc định (Hide Login URL)
- **Thực trạng rủi ro:** Mặc định WordPress sử dụng `/wp-login.php` và `/wp-admin`. Kẻ tấn công thường dùng bot tự động quét đường dẫn này để tấn công rà quét mật khẩu (Brute-force).
- **Biện pháp xử lý:**
  - Cài đặt và cấu hình plugin **WPS Hide Login**.
  - Đổi URL đăng nhập bí mật thành: `http://event-website.test/event-portal-admin/`.
  - Mọi yêu cầu truy cập trái phép vào `/wp-login.php` đều bị chuyển hướng về mã lỗi `404 Not Found`.

### 2. Bảo vệ tài khoản & Chống Brute-force
- **Biện pháp xử lý:**
  - Cấu hình plugin **Wordfence / Limit Login Attempts**:
    - Khóa IP tạm thời trong 30 phút nếu nhập sai mật khẩu quá **03 lần liên tiếp**.
    - Khóa tài khoản vĩnh viễn nếu cố gắng đăng nhập bằng tên người dùng mặc định cấm (`admin`, `administrator`, `root`).
  - Toàn bộ tài khoản quản trị viên bắt buộc sử dụng mật khẩu mạnh tối thiểu 14 ký tự gồm chữ hoa, chữ thường, số và ký tự đặc biệt.

### 3. Ẩn thông tin nhạy cảm & Chặn dò quét
- **Ẩn phiên bản WordPress:**
  - Đã chèn hàm `remove_action('wp_head', 'wp_generator');` và xóa query string `?ver=` trong `functions.php`.
- **Tắt tính năng duyệt thư mục (Directory Browsing) & Vô hiệu hóa XML-RPC:**
  - Cấu hình trực tiếp trong tệp tin `.htaccess` tại thư mục gốc máy chủ Apache:
    ```apache
    # Chặn kẻ tấn công duyệt xem danh sách tệp tin trong thư mục
    Options -Indexes

    # Vô hiệu hóa tệp xmlrpc.php để chống tấn công DDoS khuếch đại (Amplification Attack)
    <Files xmlrpc.php>
    Order Deny,Allow
    Deny from all
    </Files>
    ```

### 4. Thiết lập chuẩn phân quyền tệp tin trên máy chủ (File Permissions)
- **Chuẩn phân quyền POSIX:**
  - Toàn bộ thư mục (Folders): Phân quyền `755` (`rwxr-xr-x` - Chủ sở hữu toàn quyền, người khác chỉ xem/thực thi).
  - Toàn bộ tệp tin (Files): Phân quyền `644` (`rw-r--r--` - Chủ sở hữu được sửa, người khác chỉ đọc).
  - Tệp cấu hình chứa mật khẩu CSDL `wp-config.php`: Phân quyền `440` hoặc `400` (Chỉ cho phép tiến trình máy chủ web đọc, cấm mọi hành vi ghi đè).
- **Lệnh thực hiện trên môi trường máy chủ Linux/Ubuntu:**
  ```bash
  find /var/www/html/event-website/ -type d -exec chmod 755 {} \;
  find /var/www/html/event-website/ -type f -exec chmod 644 {} \;
  chmod 440 /var/www/html/event-website/wp-config.php
  ```

---

## 🔍 CHƯƠNG II: KẾT QUẢ RÀ QUÉT LỖ HỔNG BẰNG CÔNG CỤ WPSCAN

### 1. Môi trường và câu lệnh rà quét
- **Công cụ:** Công cụ rà quét an ninh chuyên dụng **WPScan** (Chạy trên Kali Linux / Docker / Ruby).
- **Câu lệnh thực thi:**
  ```bash
  wpscan --url http://event-website.test/ --enumerate p,t,u --random-user-agent
  ```
  *(Tham số giải thích: `--enumerate p` quét plugins, `t` quét themes, `u` quét usernames dò tìm tài khoản).*

### 2. Bảng Ma trận Đánh giá Lỗ hổng & Biện pháp khắc phục

| STT | Thành phần liên quan | Cảnh báo / Lỗ hổng phát hiện | Mức độ rủi ro | Đánh giá & Phương án xử lý đã thực hiện |
| :---: | :--- | :--- | :---: | :--- |
| 1 | **Core CMS** | *WordPress version disclosure* (Hiển thị phiên bản) | **Low** | **Đã xử lý:** Đã gỡ bỏ thẻ `wp_generator` và query string trong `functions.php`. WPScan không thể nhận diện chính xác version qua thẻ meta. |
| 2 | **Core System** | *XML-RPC interface available* | **Medium** | **Đã xử lý:** Chặn triệt để tại tầng máy chủ web thông qua cấu hình `.htaccess`. Trả về mã lỗi 403 Forbidden khi WPScan thăm dò. |
| 3 | **Authentication** | *User Enumeration via REST API (`/wp-json/wp/v2/users`)* | **Medium** | **Đã xử lý:** Cấu hình Wordfence chặn truy vấn danh sách user qua REST API đối với người dùng chưa đăng nhập. |
| 4 | **Parent Theme** | *Astra Theme Outdated check* | **Low** | **Đã xử lý:** Cập nhật phiên bản Astra mới nhất từ kho WordPress.org, không có CVE lỗ hổng bảo mật đã công bố. |
| 5 | **Plugins** | *Contact Form 7 Security Advisory* | **Low** | **Đã xử lý:** Đảm bảo sử dụng bản 5.9+ chính thức, các trường dữ liệu đều được lọc qua `sanitize_text_field` trước khi xử lý. |

---

## 💻 CHƯƠNG III: MINH CHỨNG LẬP TRÌNH AN TOÀN TRONG CHILD THEME

Đoạn code do Nhóm 2 tự viết trong `wp-content/themes/event-child/inc/custom-shortcodes.php` và `inc/custom-ticket-qr.php` tuân thủ nghiêm ngặt 2 nguyên tắc an toàn:

### 1. Sanitization & Validation (Lọc dữ liệu đầu vào)
```php
// Lọc sạch thẻ HTML và ký tự nguy hiểm từ tên và loại vé
$attendee_name = sanitize_text_field( $posted_data['your-name'] );
$attendee_email = sanitize_email( $posted_data['your-email'] );
$clean_slots = absint( $raw_atts['slots'] ); // Ép kiểu số nguyên không âm
```
👉 *Tác dụng: Ngăn chặn kẻ xấu chèn ký tự điều khiển, tấn công tràn bộ đệm hoặc Injection.*

### 2. Escaping (Xử lý dữ liệu đầu ra)
```php
// Chống tấn công XSS (Cross-Site Scripting) khi in dữ liệu ra HTML
echo '<span class="' . esc_attr( $safe_class ) . '">';
echo esc_html( $attendee_name );
echo esc_url( $qr_api_url );
```
👉 *Tác dụng: Đảm bảo dữ liệu người dùng nhập luôn được xem là chuỗi văn bản thuần túy (Plain text), không bao giờ bị trình duyệt thực thi như mã lệnh JavaScript độc hại.*
