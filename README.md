# 🎪 TRANG WEB QUẢN LÝ SỰ KIỆN & HỘI NGHỊ - OPEN TECH SUMMIT 2026
> **BÀI TẬP NHÓM MÔN: MÃ NGUỒN MỞ**  
> **NHÓM THỰC HIỆN: NHÓM 2**

---

## 👥 Danh Sách Thành Viên & Bảng Phân Công (WBS)

| STT | Họ và Tên | Mã Sinh Viên | Vai trò chính | Nhánh Git phụ trách |
| :---: | :--- | :---: | :--- | :--- |
| 1 | **[Tên TV1]** | [MSV TV1] | **Trưởng nhóm & Security:** Quản lý Repo Git, Hardening, chạy WPScan, viết Báo cáo Phần 3 | `feature/hardening-and-docs` |
| 2 | **[Tên TV2]** | [MSV TV2] | **Core Theme Backend:** Cấu hình Child Theme, `style.css`, nạp scripts trong `functions.php` | `feature/child-theme-core` |
| 3 | **[Tên TV3]** | [MSV TV3] | **PHP Logic & Secure Code:** Viết Shortcode, xử lý Form sinh mã vé QR, lọc dữ liệu an toàn | `feature/custom-shortcodes` |
| 4 | **[Tên TV4]** | [MSV TV4] | **Frontend & UI/UX:** Countdown thời gian thực, nút Back-to-top, CSS giao diện sự kiện | `feature/frontend-countdown` |
| 5 | **[Tên TV5]** | [MSV TV5] | **Data & Báo cáo HĐH:** Soạn Báo cáo Phần 1 (Ubuntu vs Windows 11), lập bảng `LICENSES.md`, xuất Database | `feature/licenses-and-database` |

---

## 📌 Tổng Quan Dự Án & Các Tính Năng Nghiệp Vụ

Hệ thống được xây dựng trên nền tảng **WordPress (Self-hosted)** kết hợp **Child Theme tùy biến (`event-child`)** và các plugin mã nguồn mở chọn lọc:
1. ⏰ **Đồng hồ đếm ngược (Countdown Timer) thời gian thực:** Đếm ngược từng giây đến ngày khai mạc Hội nghị Khoa học & Công nghệ Mở 2026.
2. 📅 **Lịch trình hội nghị theo giờ & phòng (Agenda):** Phân chia chi tiết theo 3 không gian: *Hội trường A (Keynote)*, *Phòng B (Security Track)*, *Phòng C (AI & Cloud Track)*.
3. 🎤 **Hồ sơ diễn giả chuyên nghiệp (Speakers Directory):** Danh sách diễn giả khách mời, học hàm/học vị và đề tài tham luận.
4. 🗺️ **Bản đồ địa điểm (Venue Map):** Nhúng bản đồ OpenStreetMap / Google Maps dẫn đường tới trung tâm tổ chức hội nghị.
5. 🎟️ **Form đăng ký & Tự động tạo vé QR qua Email:** Tự động tạo mã vé định danh duy nhất (Unique Ticket ID), sinh ảnh mã QR Code và gửi email xác nhận trực tiếp cho người đăng ký tham dự.

---

## 🛠️ Hướng Dẫn Cài Đặt & Chạy Dự Án Cục Bộ (Dành Cho Giảng Viên & Nhóm)

Dự án được khuyến nghị chạy trên môi trường **Laragon** (Windows) hoặc **Docker / LocalWP**.

### Bước 1: Chuẩn bị môi trường Laragon
1. Tải và cài đặt [Laragon Wamp](https://laragon.org/download/) (Hỗ trợ sẵn Apache, MySQL, PHP 8.1+).
2. Khởi động Laragon và nhấn nút **Start All**.

### Bước 2: Tải mã nguồn & Cài đặt WordPress
1. Clone hoặc tải mã nguồn dự án này vào thư mục:
   ```text
   C:\laragon\www\event-website\
   ```
2. Tải mã nguồn [WordPress bản mới nhất](https://wordpress.org/download/) và giải nén vào thư mục `event-website` trên (giữ nguyên thư mục `wp-content/themes/event-child` của nhóm).
3. Cài đặt **Parent Theme (Astra)**:
   - Vào Trang Quản trị WordPress $\rightarrow$ **Giao diện (Appearance)** $\rightarrow$ **Giao diện** $\rightarrow$ **Thêm mới (Add New)**.
   - Tìm kiếm theme **Astra** và nhấn **Cài đặt (Install)** (Lưu ý: Không kích hoạt Astra, mà kích hoạt Child Theme).
4. Kích hoạt **Child Theme**:
   - Chọn kích hoạt giao diện **Event Child Theme**.

### Bước 3: Phục hồi Cơ sở dữ liệu mẫu (Database Restore)
1. Mở công cụ quản lý cơ sở dữ liệu (HeidiSQL có sẵn trong Laragon hoặc phpMyAdmin tại `http://localhost/phpmyadmin`).
2. Tạo mới một database tên: `event_db`.
3. Nhập (Import) tệp tin: `database/database.sql` vào cơ sở dữ liệu `event_db`.
4. Mở tệp `wp-config.php` tại thư mục gốc và khai báo thông số kết nối:
   ```php
   define( 'DB_NAME', 'event_db' );
   define( 'DB_USER', 'root' );
   define( 'DB_PASSWORD', '' );
   define( 'DB_HOST', 'localhost' );
   ```
5. *(Xem thêm hướng dẫn xử lý lệch tên miền/cổng tại [database/README.md](database/README.md))*.

### Bước 4: Kích hoạt các Plugin Mã nguồn mở phụ trợ
Vào trang quản trị WordPress và kích hoạt các plugin theo danh mục trong [LICENSES.md](LICENSES.md):
- **Contact Form 7:** Plugin tạo biểu mẫu đăng ký vé.
- **WP Mail SMTP:** Cấu hình gửi mail qua SMTP Gmail.
- **WPS Hide Login:** Đổi đường dẫn đăng nhập quản trị (Phần Hardening).
- **Wordfence Security:** Tường lửa bảo vệ hệ thống.

---

## 🛡️ Tiêu Chuẩn Bảo Mật & Lập Trình An Toàn (Phần 3)

1. **System Hardening:**
   - Đổi đường dẫn `/wp-login.php` mặc định thành `/event-portal-admin/`.
   - Chống tấn công dò quét Brute-force với cơ chế khóa IP.
   - Chặn xem cấu trúc thư mục (`Options -Indexes`) và chặn `xmlrpc.php` trong file `.htaccess`.
   - Phân quyền tệp tin: `755` cho thư mục, `644` cho tệp tin, `440` cho `wp-config.php`.
2. **Lập trình an toàn (Secure Coding):**
   - Lọc dữ liệu đầu vào: `sanitize_text_field()`, `sanitize_email()`, `absint()`.
   - Thoát dữ liệu đầu ra chống tấn công XSS: `esc_html()`, `esc_attr()`, `esc_url()`.
3. **Rà quét lỗ hổng (WPScan):**
   - Kết quả rà quét và bảng ma trận khắc phục lỗ hổng được lưu chi tiết tại [docs/wpscan-report.md](docs/wpscan-report.md).

---

## 📂 Cấu Trúc Thư Mục Kho Mã Nguồn

```text
event-website/
├── .gitignore                          # Cấu hình loại trừ WordPress Core
├── README.md                           # Tài liệu tổng quan & hướng dẫn cài đặt
├── CONTRIBUTING.md                     # Quy chuẩn Git flow & hướng dẫn làm việc nhóm
├── LICENSES.md                         # Bảng kiểm kê giấy phép bản quyền mã nguồn mở
├── KE_HOACH_DU_AN_NHOM_2.md            # Kế hoạch chi tiết toàn bộ dự án
├── database/
│   ├── README.md                       # Hướng dẫn Import/Export Database sạch
│   └── database.sql                    # Bản sao lưu CSDL hoàn chỉnh
├── docs/
│   ├── bao-cao-phan-1-os.md            # Báo cáo Phần 1: Nghiên cứu Ubuntu vs Windows 11
│   └── wpscan-report.md                # Báo cáo Phần 3: Rà quét an ninh mạng với WPScan
└── wp-content/themes/event-child/      # Mã nguồn Child Theme tự phát triển
    ├── style.css                       # Khai báo Child Theme cho Astra
    ├── functions.php                   # Hàm nạp CSS/JS và hook hệ thống
    ├── inc/
    │   ├── custom-shortcodes.php       # Shortcode thông báo & thẻ vé (kèm sanitize/escape)
    │   └── custom-ticket-qr.php        # Logic tạo Unique Ticket ID & ảnh mã QR gửi email
    └── assets/
        ├── css/
        │   └── event-custom.css        # Tùy biến giao diện Countdown, Lịch trình, Diễn giả
        └── js/
            ├── countdown.js            # JavaScript đếm ngược thời gian thực
            └── main.js                 # JS nút Back-to-top & tương tác cuộn trang
```
