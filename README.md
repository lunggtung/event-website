# Trang Web Quản Lý Sự Kiện & Hội Nghị - Open Tech Summit 2026
> **Bài tập nhóm môn:** Mã nguồn mở  
> **Nhóm thực hiện:** Nhóm 2  

---

## 1. Thành Viên & Phân Công Công Việc

| STT | Họ và Tên | Mã Sinh Viên | Vai trò & Nhiệm vụ chính | Nhánh Git |
| :---: | :--- | :---: | :--- | :--- |
| 1 | **[Tên TV1]** | [MSV TV1] | **Trưởng nhóm & Security:** Cấu hình bảo mật, Hardening, chạy WPScan, viết báo cáo bảo mật | `feature/hardening-and-docs` |
| 2 | **[Tên TV2]** | [MSV TV2] | **Frontend (Countdown & Map):** Code JS Countdown, CSS Countdown, nhúng Bản đồ địa điểm | `feature/countdown-and-map` |
| 3 | **[Tên TV3]** | [MSV TV3] | **Backend PHP & Secure Code:** Code Shortcode, Form tạo vé QR qua email, cấu hình SMTP | `feature/custom-shortcodes-and-qr` |
| 4 | **[Tên TV4]** | [MSV TV4] | **Frontend (Agenda & Speakers):** Code JS Back-to-top, CSS & Dựng trang Lịch trình 3 phòng, 3 Diễn giả | `feature/agenda-speakers-ui` |
| 5 | **[Tên TV5]** | [MSV TV5] | **Nghiên cứu & Cơ sở dữ liệu:** Nghiên cứu so sánh HĐH, lập bảng `LICENSES.md`, xuất CSDL | `feature/licenses-and-database` |

---

## 2. Giới Thiệu Đề Tài & Các Chức Năng Chính

Dự án xây dựng trang web chính thức cho **Hội nghị Khoa học & Công nghệ Mở 2026 (Open Tech Summit)** dựa trên nền tảng **WordPress (Self-hosted)** kết hợp **Astra Theme** và **Child Theme (`event-child`)** tự phát triển:

- **Đồng hồ đếm ngược (Countdown Timer):** Hiển thị thời gian thực (Ngày : Giờ : Phút : Giây) đến ngày khai mạc 20/11/2026.
- **Lịch trình hội nghị theo giờ & phòng (Agenda):** Lịch trình chi tiết từ 08:00 - 17:00 chia theo 3 phòng (Hội trường A, Phòng Hội thảo B, Phòng Hội thảo C).
- **Hồ sơ diễn giả (Speakers):** Danh sách diễn giả khách mời, học hàm/học vị và chủ đề tham luận.
- **Bản đồ địa điểm (Venue Map):** Nhúng bản đồ OpenStreetMap dẫn đường tới trung tâm tổ chức hội nghị.
- **Form đăng ký nhận vé QR qua Email:** Tự động sinh mã định danh vé (`OTS2026-XXXXXX`), tạo ảnh mã QR và gửi email xác nhận cho người tham dự.

---

## 3. Hướng Dẫn Cài Đặt & Chạy Thử (Dành Cho Giảng Viên)

### Yêu cầu môi trường
- Máy chủ web: Apache hoặc Nginx (khuyến nghị dùng **Laragon** trên Windows hoặc XAMPP).
- PHP: Phiên bản 8.0 trở lên.
- MySQL / MariaDB: 5.7+ hoặc 10.4+.

### Các bước cài đặt
1. **Tải mã nguồn:**
   - Clone kho lưu trữ về thư mục `www` của Laragon:
     ```bash
     git clone https://github.com/lunggtung/event-website.git
     ```
2. **Cài đặt WordPress & Theme:**
   - Cài đặt bản WordPress mới nhất vào thư mục trên (giữ nguyên thư mục `wp-content/themes/event-child/`).
   - Cài đặt theme cha **Astra** từ kho giao diện WordPress.
   - Kích hoạt giao diện **Event Child Theme**.
3. **Phục hồi Cơ sở dữ liệu mẫu:**
   - Tạo một database mới tên là `event_db` trong phpMyAdmin hoặc HeidiSQL.
   - Nhập tệp tin `database/database.sql` vào cơ sở dữ liệu `event_db`.
   - Cấu hình thông số trong `wp-config.php`:
     ```php
     define( 'DB_NAME', 'event_db' );
     define( 'DB_USER', 'root' );
     define( 'DB_PASSWORD', '' );
     define( 'DB_HOST', 'localhost' );
     ```
4. **Kích hoạt các Plugin:**
   - Kích hoạt các plugin mã nguồn mở theo danh mục trong [LICENSES.md](LICENSES.md): *Contact Form 7*, *WP Mail SMTP*, *WPS Hide Login*, *Wordfence Security*.

### Tài khoản quản trị mẫu
- **Tên đăng nhập:** `ots_admin`
- **Mật khẩu:** `OpenTechSummit@2026!`
- **Đường dẫn đăng nhập quản trị:** `/wp-login.php` (hoặc `/event-portal-admin/` khi bật WPS Hide Login).

---

## 4. Cấu Trúc Mã Nguồn

```text
event-website/
├── .gitignore                          # Cấu hình loại trừ WordPress Core
├── README.md                           # Hướng dẫn cài đặt & tổng quan dự án
├── LICENSES.md                         # Bảng kiểm kê giấy phép phần mềm mã nguồn mở
├── database/
│   └── database.sql                    # Bản sao lưu cơ sở dữ liệu hoàn chỉnh
└── wp-content/themes/event-child/      # Mã nguồn Child Theme tự phát triển
    ├── style.css                       # Khai báo Child Theme kế thừa Astra
    ├── functions.php                   # Nạp stylesheet/scripts và hook bảo mật
    ├── inc/
    │   ├── custom-shortcodes.php       # Shortcode thông báo và vé (áp dụng sanitize/escape)
    │   └── custom-ticket-qr.php        # Logic sinh mã vé duy nhất và mã QR qua email
    └── assets/
        ├── css/
        │   └── event-custom.css        # CSS giao diện Countdown, Lịch trình, Diễn giả
        └── js/
            ├── countdown.js            # Script đếm ngược thời gian thực
            └── main.js                 # Script nút Back-to-top và cuộn trang
```
