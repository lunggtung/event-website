# HƯỚNG DẪN QUẢN LÝ & PHỤC HỒI CƠ SỞ DỮ LIỆU
> **Dự án:** Website Quản lý Sự kiện & Hội nghị — Open Tech Summit 2026 (Nhóm 2)  
> **Cập nhật:** 29/10/2026

---

## 1. File trong thư mục này

| File | Mô tả |
|---|---|
| `database.sql` | Bản xuất CSDL đã **làm sạch** — import trực tiếp được (MySQL 8.x) |
| `set-admin-password.php` | Script CLI đặt lại mật khẩu tài khoản quản trị sau khi import |

---

## 2. Bản xuất đã loại bỏ những gì?

`database.sql` được xuất từ database local `event-website`
(WordPress 7.1.3 · PHP 8.3.33 · MySQL 8.4.3) và **đã lược bỏ** để không làm lộ thông tin
khi công bố mã nguồn:

| Đã loại bỏ | Chi tiết |
|---|---|
| Credential & khoá bí mật | `mailserver_url`, `mailserver_login`, `mailserver_pass`, `mailserver_port`, `auth_key`, `auth_salt`, `logged_in_key`, `logged_in_salt`, `nonce_key`, `nonce_salt`, `secure_auth_key`, `secure_auth_salt`, `elementor_connect_site_key`, `srfm_db_owner_token` |
| Giá trị tạm thời | toàn bộ `_transient_*` và `_site_transient_*` |
| Phiên đăng nhập | `session_tokens` của tài khoản quản trị |
| Dữ liệu riêng tư | các bản ghi đăng ký vé trong `wp_event_tickets` |
| Nhật ký plugin | dữ liệu chạy nền của Wordfence / SureForms / SureCookie / Action Scheduler (**cấu trúc bảng vẫn được giữ**, plugin tự tạo lại dữ liệu) |
| Mật khẩu quản trị | thay bằng chuỗi ngẫu nhiên → **không đăng nhập được**, phải chạy `set-admin-password.php` |

Nội dung website (5 trang chức năng, bài viết, taxonomy, menu, tuỳ biến giao diện) được
giữ nguyên đầy đủ.

---

## 3. Cách import

### Cách 1 — dòng lệnh (khuyến nghị)

```bash
mysql -u root -p -e "CREATE DATABASE event_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u root -p event_db < database/database.sql
```

### Cách 2 — phpMyAdmin / HeidiSQL

1. Tạo database mới (ví dụ `event_db`), charset `utf8mb4`.
2. Chọn database → tab **Import** → chọn `database/database.sql` → **Import**.

> **Lưu ý MySQL 8.x:** file đã có sẵn dòng
> `SQL_MODE='NO_AUTO_VALUE_ON_ZERO,NO_ZERO_IN_DATE,NO_ZERO_DATE'`.
> Nếu phiên bản của bạn vẫn báo lỗi `Invalid default value for 'post_date'`, hãy chạy
> `SET GLOBAL sql_mode='NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';`
> rồi import lại.

---

## 4. Sửa đường dẫn website cho máy của bạn

WordPress lưu tuyệt đối địa chỉ website trong bảng `wp_options`. Nếu máy bạn không dùng
domain `event-website.test`, chạy 3 câu lệnh sau trong phpMyAdmin (thay URL bằng URL
thật của bạn):

```sql
UPDATE wp_options SET option_value = 'http://localhost/event-website' WHERE option_name = 'siteurl';
UPDATE wp_options SET option_value = 'http://localhost/event-website' WHERE option_name = 'home';
UPDATE wp_posts SET guid = REPLACE(guid, 'http://event-website.test', 'http://localhost/event-website');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://event-website.test', 'http://localhost/event-website');
```

Cách thay thế: dùng plugin **Better Search Replace** (Tools → Better Search Replace).

---

## 5. Đặt mật khẩu quản trị sau khi import

Bản xuất cố tình **không** chứa mật khẩu đăng nhập dùng được. Sau khi import, chạy:

```bash
php database/set-admin-password.php 'MatKhauCuaBan@2026'
```

Script sẽ:

1. nạp `wp-load.php` (tự dò trong `../wp-load.php`, `../../wp-load.php`, hoặc tham số thứ 2);
2. tìm tài khoản có vai trò `administrator`;
3. gọi `wp_set_password()` — mật khẩu được băm đúng chuẩn WordPress;
4. in ra đường dẫn đăng nhập (`/dang-nhap-noi-bo/`).

Đăng nhập tại `http://<domain-của-bạn>/dang-nhap-noi-bo/`
(đường dẫn `/wp-login.php` đã bị chặn 403 nhằm tránh bị quét tự động).

---

## 6. Quy trình xuất lại (khi nhóm phát triển thêm)

1. Dọn dữ liệu thử trong bảng vé: `DELETE FROM wp_event_tickets;`
2. Xóa tài khoản thử nghiệm trong **Users → All Users**.
3. Xuất bằng Laragon/HeidiSQL/phpMyAdmin → đặt tên `database.sql`.
4. **Bắt buộc:** kiểm tra lại file có chứa `mailserver_pass`, `auth_key`, `nonce_salt`,
   `elementor_connect_site_key`, `srfm_db_owner_token` hay không — và xóa các dòng đó.
5. Đặt lại mật khẩu tài khoản quản trị thành chuỗi ngẫu nhiên trước khi commit.
6. Nén lại file `.sql` trước khi đẩy lên GitHub (file xuất thô khoảng 1,5 MB).

---

## 7. Kiểm thử sau khi import

| Kiểm tra | Kết quả mong đợi |
|---|---|
| Số bảng | 47 |
| Trang đã xuất bản | 6 (Trang chủ, Lịch trình, Diễn giả, Địa điểm, Đăng ký vé + Trang mẫu) |
| Bài viết | 1 (bài "Chào tất cả mọi người!") |
| Tài khoản quản trị | 1, `user_activation_key` rỗng |
| Transient còn lại | 0 |
| Option chứa secret | 0 |

Lệnh kiểm tra nhanh:

```sql
SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'event_db';
SELECT COUNT(*) FROM wp_posts WHERE post_type = 'page' AND post_status = 'publish';
SELECT COUNT(*) FROM wp_options WHERE option_name LIKE '\_transient\_%';
```
