# TÀI LIỆU ĐẶC TẢ KIẾN TRÚC HỆ THỐNG (SYSTEM ARCHITECTURE SPECIFICATION)
## DỰ ÁN: CỔNG THÔNG TIN HỘI NGHỊ KHOA HỌC & CÔNG NGHỆ MỞ 2026 (OPEN TECH SUMMIT 2026)
### MÔN HỌC: MÃ NGUỒN MỞ — NHÓM 2

---

## 1. TỔNG QUAN KIẾN TRÚC HỆ THỐNG

Hệ thống được thiết kế theo mô hình **Website Đa Trang (Multi-Page Event Portal)** hoàn chỉnh, tách bạch rõ ràng giữa tầng nền tảng lõi (Core Engine), tầng giao diện mở rộng (Child Theme), tầng xử lý nghiệp vụ tùy biến (Custom PHP Modules) và tầng cơ sở dữ liệu (MySQL).

```text
+-------------------------------------------------------------------------------+
|                       NGƯỜI DÙNG / KHÁCH THAM DỰ HỘI NGHỊ                     |
|                 (Trình duyệt Web: Desktop / Tablet / Mobile)                  |
+-------------------------------------------------------------------------------+
                                      │
                               HTTP / HTTPS (Port 80/443)
                                      ▼
+-------------------------------------------------------------------------------+
|                    MÁY CHỦ WEB (APACHE HTTPD + PHP 8.x)                       |
|  - Cấu hình .htaccess (Bảo mật, Chặn duyệt thư mục, Tắt XML-RPC)             |
|  - URL Rewriting (Permalinks dạng Post Name: /lich-trinh, /dien-gia...)       |
+-------------------------------------------------------------------------------+
                                      │
                                      ▼
+-------------------------------------------------------------------------------+
|                           WORDPRESS 6.x CORE ENGINE                           |
|  - Quản trị nội dung (Posts, Pages, Navigation Menus, Users)                  |
|  - API Hook System (Actions & Filters)                                        |
+-------------------------------------------------------------------------------+
           │                                            │
           ▼                                            ▼
+──────────────────────────────+           +────────────────────────────────────+
|     THEME CHA (PARENT)       |           |   HỆ THỐNG PLUGIN MÃ NGUỒN MỞ      |
|  Astra Theme (GPLv2)         |           | - Contact Form 7 (GPLv2): Đặt vé   |
|  - Cung cấp lưới layout nền  |           | - WP Mail SMTP (GPLv2): Gửi email  |
|  - Reset CSS & Typography    |           | - WPS Hide Login (GPLv2): Đổi URL  |
+──────────────────────────────+           | - Wordfence Security (GPLv2): WAF  |
           │                               +────────────────────────────────────+
           ▼                                                │
+───────────────────────────────────────────────────────────┴───────────────────+
|                  CHILD THEME TÙY BIẾN (EVENT CHILD THEME)                     |
|  wp-content/themes/event-child/                                               |
|  ├── style.css (Định danh Child Theme, kế thừa Astra)                         |
|  ├── functions.php (Enqueue scripts/styles, Security hooks, Module Loader)    |
|  ├── inc/                                                                     |
|  │   ├── custom-shortcodes.php ([event_countdown], [event_alert], ...)        |
|  │   └── custom-ticket-qr.php (Hook CF7, Sinh mã OTS2026, Tạo QR code vé)    |
|  └── assets/                                                                  |
|      ├── css/event-custom.css (Thiết kế giao diện 6 trang, responsive)        |
|      └── js/countdown.js & main.js (Đếm ngược thời gian thực, Back-to-top)    |
+───────────────────────────────────────────────────────────────────────────────+
                                      │
                                      ▼
+-------------------------------------------------------------------------------+
|                       CƠ SỞ DỮ LIỆU MYSQL (DATABASE)                          |
|  - Bảng wp_posts & wp_postmeta (Lưu trữ nội dung 6 trang)                     |
|  - Bảng wp_options (Cấu hình hệ thống, Active plugins/theme)                  |
|  - Bảng wp_users & wp_usermeta (Phân quyền quản trị viên)                     |
+-------------------------------------------------------------------------------+
```

---

## 2. KIẾN TRÚC THÔNG TIN & SITEMAP ĐA TRANG (INFORMATION ARCHITECTURE)

Hệ thống được tổ chức thành 5 trang độc lập, kết nối với nhau qua Menu điều hướng chính (Primary Header Navigation) và Footer liên kết nhanh. Thông tin bản quyền phần mềm mã nguồn mở và ban tổ chức được tích hợp tại Footer chung toàn hệ thống.

```text
                                  TRANG CHỦ (/)
                                       │
        ┌──────────────┬───────────────┴───────────────┬──────────────┐
        ▼              ▼                               ▼              ▼
   LỊCH TRÌNH      DIỄN GIẢ                        ĐĂNG KÝ VÉ       ĐỊA ĐIỂM
  (/lich-trinh)   (/dien-gia)                     (/dang-ky-ve)    (/dia-diem)
```

### Bảng phân tích phân cấp 5 trang & vai trò kỹ thuật:

| STT | Tên Trang | URL Slug | Mục tiêu chính | Phân công phụ trách | Thành phần kỹ thuật chính |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | **Trang Chủ** | `/` | Giới thiệu tổng quan, đếm ngược, tin khẩn cấp, điểm nhấn sự kiện | TV1 (Lead Dev) | Shortcode `[event_countdown]`, `[event_alert]`, Hero banner, Bản quyền FOSS |
| 2 | **Lịch Trình** | `/lich-trinh` | Chi tiết lịch hội thảo theo giờ cho 3 phòng họp song song | TV2 (Frontend/Content) | Bảng Timetable 3 Tracks (08:00 - 17:00), Filter theo phòng |
| 3 | **Diễn Giả** | `/dien-gia` | Danh bạ hồ sơ diễn giả, chủ đề thuyết trình, liên kết mạng xã hội | TV3 (Frontend/Content) | Speaker Cards Grid, Modal/Chi tiết tiểu sử chuyên gia |
| 4 | **Đăng Ký Vé** | `/dang-ky-ve` | Bảng giá các hạng vé, form đặt vé, tự động sinh mã QR gửi email | TV4 (Plugin/Backend) | Shortcode `[event_ticket_card]`, Form CF7, Hook PHP tạo QR |
| 5 | **Địa Điểm** | `/dia-diem` | Địa chỉ tổ chức, bản đồ OpenStreetMap, hướng dẫn đi lại | TV5 (Tester/Content) | Iframe OpenStreetMap mã nguồn mở, Hướng dẫn lộ trình bus/metro |

---

## 3. LUỒNG DỮ LIỆU NGHIỆP VỤ ĐẶT VÉ & TẠO MÃ QR (DATA FLOW DIAGRAM)

Quy trình đăng ký vé tham dự và xác thực mã QR tại cổng hội nghị diễn ra theo chu trình khép kín:

```text
[Khách tham dự]
       │
       │ 1. Truy cập /dang-ky-ve, chọn loại vé (Standard/Student/VIP)
       ▼
[Form Đăng Ký (Contact Form 7)]
       │
       │ 2. Điền Họ tên, Email, Số điện thoại, Đơn vị công tác
       ▼
[Xác thực dữ liệu (Child Theme Hook - custom-ticket-qr.php)]
       │
       │ 3. Kiểm tra tính hợp lệ & Lọc dữ liệu an toàn (Sanitization)
       │ 4. Tạo mã định danh duy nhất (Ví dụ: OTS2026-A8F2K9)
       ▼
[Tạo mã phản hồi nhanh QR Code (QR Generation Engine)]
       │
       │ 5. Mã hóa chuỗi định danh vé thành ảnh QR Code độ phân giải cao
       ▼
[Gửi Email Xác Nhận (WP Mail SMTP)]
       │
       │ 6. Gửi thư xác nhận kèm thông tin vé và ảnh mã QR vào hòm thư khách
       ▼
[Khách nhận vé điện tử qua Email]
       │
       │ 7. Khách xuất trình mã QR tại bàn Check-in Hội nghị vào ngày 20/11/2026
       ▼
[Ban Tổ Chức quét mã xác thực tại cổng]
```

---

## 4. QUY CHUẨN MÃ NGUỒN & CÁC LỚP BẢO VỆ (SECURITY HARDENING ARCHITECTURE)

Hệ thống áp dụng kiến trúc phòng thủ theo chiều sâu (Defense-in-Depth) với 4 lớp bảo vệ:

1. **Lớp 1 — Máy chủ Web & Cấu hình môi trường (`.htaccess`):**
   - Vô hiệu hóa duyệt danh mục thư mục (`Options -Indexes`).
   - Chặn đứng mọi yêu cầu truy vấn đến tệp `xmlrpc.php` để triệt tiêu nguy cơ tấn công dò quét mật khẩu và tấn công từ chối dịch vụ khuếch đại (Amplification DDoS).
   - Bảo vệ tệp cấu hình lõi `wp-config.php` với phân quyền tập tin `440`.

2. **Lớp 2 — Che giấu định danh hệ thống (Security through Obscurity):**
   - Ẩn thẻ `generator` phiên bản WordPress trên mã nguồn HTML trả về (`remove_action('wp_head', 'wp_generator');`).
   - Loại bỏ chuỗi truy vấn phiên bản `?ver=x.x.x` trên các tệp tĩnh CSS/JS để ngăn công cụ rà quét tự động nhận diện lỗ hổng theo version.
   - Thay đổi đường dẫn đăng nhập mặc định `/wp-login.php` sang URL tùy biến bí mật bằng plugin WPS Hide Login.

3. **Lớp 3 — Lập trình an toàn tầng Ứng dụng (Secure Application Layer):**
   - Áp dụng triệt để nguyên tắc: *"Lọc dữ liệu đầu vào (Sanitize Input), Thoát dữ liệu đầu ra (Escape Output)"*.
   - Sử dụng các hàm chuẩn của WordPress API: `sanitize_text_field()`, `sanitize_email()`, `intval()`, `esc_html()`, `esc_attr()`, `esc_url()`.
   - Toàn bộ tham số truyền vào shortcode đều có giá trị mặc định an toàn thông qua hàm `shortcode_atts()`.

4. **Lớp 4 — Tường lửa ứng dụng WAF & Kiểm soát truy cập (Access Control):**
   - Giới hạn số lần thử đăng nhập sai bằng plugin chuyên dụng (khóa IP sau 3 lần nhập sai).
   - Thiết lập tường lửa Wordfence Security để giám sát và ngăn chặn các hành vi injection, quét tệp và truy cập trái phép.
