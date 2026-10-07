# 🗄️ HƯỚNG DẪN QUẢN LÝ VÀ PHỤC HỒI CƠ SỞ DỮ LIỆU (DATABASE GUIDE)
> **Dự án:** Trang web Quản lý Sự kiện & Hội nghị (Nhóm 2)  
> **Người phụ trách:** TV5 (Data & Backup)

---

## ⚠️ VẤN ĐỀ QUAN TRỌNG KHI NỘP BÀI CƠ SỞ DỮ LIỆU WORDPRESS
WordPress lưu trữ tên miền tuyệt đối (ví dụ: `http://localhost/event-website` hoặc `http://event-website.test`) trong bảng `wp_options`.  
Khi Giảng viên hoặc thành viên khác nhập (import) tệp `database.sql` vào máy tính cá nhân, nếu tên miền hoặc cổng (Port) khác nhau thì giao diện web sẽ bị **vỡ CSS, mất ảnh hoặc không click được link**.

Tài liệu này hướng dẫn cách xuất dữ liệu sạch và cách khắc phục lỗi trên chỉ trong 1 phút.

---

## 📤 1. HƯỚNG DẪN XUẤT (EXPORT) DATABASE CHUẨN
1. Mở công cụ quản lý CSDL (phpMyAdmin tại `http://localhost/phpmyadmin` hoặc HeidiSQL trong Laragon).
2. Chọn cơ sở dữ liệu `event_db`.
3. Nhấn vào tab **Export (Xuất)** $\rightarrow$ Chọn phương thức **Quick (Nhanh)** $\rightarrow$ Định dạng **SQL**.
4. Lưu tệp với tên chính xác: `database/database.sql`.

---

## 📥 2. HƯỚNG DẪN NHẬP (IMPORT) VÀ SỬA ĐƯỜNG DẪN CHO GIẢNG VIÊN / THÀNH VIÊN

### Cách 1: Chạy câu lệnh SQL cập nhật Domain (Nhanh nhất & Đơn giản nhất)
Sau khi import file `database.sql` vào database máy mới, vào tab **SQL** trong phpMyAdmin và chạy 3 dòng lệnh sau (thay thế bằng đường dẫn thực tế trên máy bạn):

```sql
-- Cập nhật đường dẫn website chính
UPDATE wp_options SET option_value = 'http://localhost/event-website' WHERE option_name = 'siteurl';
UPDATE wp_options SET option_value = 'http://localhost/event-website' WHERE option_name = 'home';

-- Cập nhật đường dẫn trong các bài viết và trang nội dung
UPDATE wp_posts SET guid = REPLACE(guid, 'http://event-website.test', 'http://localhost/event-website');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://event-website.test', 'http://localhost/event-website');
```

---

### Cách 2: Sử dụng Plugin Better Search Replace (Khuyên dùng nếu có giao diện Admin)
1. Cài đặt plugin mã nguồn mở miễn phí **Better Search Replace** từ kho WordPress.
2. Vào **Tools (Công cụ)** $\rightarrow$ **Better Search Replace**.
3. Tại ô **Search for**: Điền URL cũ (ví dụ: `http://event-website.test`).
4. Tại ô **Replace with**: Điền URL mới trên máy bạn (ví dụ: `http://localhost/event-website`).
5. Chọn tất cả các bảng và bấm **Run Search/Replace**.

---

## 🔐 3. THÔNG TIN TÀI KHOẢN QUẢN TRỊ MẪU (DEMO CREDENTIALS)
Khi nộp bài cho Giảng viên, nhóm cung cấp tài khoản quản trị mẫu đã được cấp quyền trong database:
- **Tên đăng nhập:** `ots_admin`
- **Mật khẩu:** `OpenTechSummit@2026!`
- **Đường dẫn đăng nhập quản trị:** `http://[domain-cua-ban]/event-portal-admin/` *(hoặc `/wp-login.php` nếu chưa kích hoạt WPS Hide Login)*.
