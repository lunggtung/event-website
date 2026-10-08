# 🤝 QUY CHUẨN CỘNG TÁC & QUY TRÌNH LÀM VIỆC NHÓM (GIT FLOW)
> **Dự án:** Trang web Quản lý Sự kiện & Hội nghị (Nhóm 2)  
> **Mục tiêu:** Đảm bảo 100% thành viên đều có commit hợp lệ trên GitHub, không xảy ra xung đột mã nguồn (Merge Conflict) và giữ lịch sử Git rõ ràng, chuyên nghiệp.

---

## 📌 1. Quy Định Cấu Hình Tài Khoản Git (Bắt buộc)
Trước khi thực hiện commit đầu tiên, mỗi thành viên phải thiết lập đúng thông tin cá nhân trên máy tính của mình (sử dụng email đã đăng ký tài khoản GitHub):

```cmd
git config --global user.name "Nguyen Van A"
git config --global user.email "nguyenvana@gmail.com"
```
> ⚠️ **Lưu ý:** Nếu email trên máy tính không khớp với email tài khoản GitHub, GitHub sẽ không tính biểu đồ đóng góp (Contribution Graph) cho bạn, dẫn đến việc giảng viên không thấy minh chứng commit cá nhân!

---

## 🌿 2. Chiến Lược Phân Nhánh (Branching Strategy)

Dự án áp dụng mô hình nhánh rút gọn:
- **`main`**: Nhánh chính thức, chứa mã nguồn ổn định nhất để nộp bài và chấm điểm. **Không được commit trực tiếp vào `main`**.
- **Nhánh tính năng (`feature/*`)**: Mỗi thành viên tự tạo và làm việc trên nhánh riêng của mình:

| Thành viên | Tên nhánh Git | Trách nhiệm chính (Phân chia cân bằng 20%) |
| :---: | :--- | :--- |
| **TV1** *(Trưởng nhóm)* | `feature/hardening-and-docs` | Cấu hình bảo mật, Hardening, chạy WPScan, viết Chương 3 Báo cáo |
| **TV2** *(Frontend 1)* | `feature/countdown-and-map` | Code JS Countdown thời gian thực, CSS Countdown, nhúng Bản đồ |
| **TV3** *(Backend PHP)* | `feature/custom-shortcodes-and-qr` | Lập trình Shortcode, Form tạo vé QR gửi email, cấu hình WP Mail SMTP |
| **TV4** *(Frontend 2)* | `feature/agenda-speakers-ui` | Code JS Back-to-top, CSS & trang Lịch trình 3 phòng, 3 Diễn giả, Slide |
| **TV5** *(Nghiên cứu & Data)* | `feature/licenses-and-database` | Viết Chương 1 Báo cáo (Ubuntu vs Win 11), bảng License, Database dump |

---

## 🔄 3. Quy Trình 5 Bước Làm Việc Của Từng Thành Viên

### Bước 1: Kéo mã nguồn mới nhất về máy
```cmd
git checkout main
git pull origin main
```

### Bước 2: Chuyển sang nhánh tính năng của bạn
*(Ví dụ đối với TV3 làm về shortcode)*:
```cmd
git checkout -b feature/custom-shortcodes
```
*(Nếu nhánh đã có sẵn từ trước, chỉ cần dùng `git checkout feature/custom-shortcodes`)*.

### Bước 3: Thực hiện công việc & Commit
Chỉ chỉnh sửa các tệp tin thuộc phạm vi phân công của bạn. Khi hoàn thành một tính năng nhỏ, thực hiện commit với thông điệp rõ ràng theo chuẩn:

```cmd
git add .
git commit -m "feat(shortcode): them custom shortcode the ve va loc du lieu dau vao an toan"
```

#### Quy ước đặt tên Commit (Conventional Commits):
- `feat:` Thêm tính năng mới (ví dụ: `feat(countdown): hoan thien script dem nguoc thoi gian thuc`).
- `fix:` Sửa lỗi (ví dụ: `fix(style): can chinh lai padding cho the dien gia`).
- `docs:` Viết hoặc cập nhật tài liệu (ví dụ: `docs(os-report): hoan thien chuong 1 so sanh kernel`).
- `sec:` Cấu hình liên quan đến bảo mật (ví dụ: `sec(hardening): chan xmlrpc va an version wordpress`).

### Bước 4: Đẩy nhánh lên GitHub
```cmd
git push origin feature/custom-shortcodes
```

### Bước 5: Tạo Pull Request (PR)
1. Truy cập vào giao diện GitHub của kho lưu trữ.
2. Nhấn nút **Compare & pull request**.
3. Điền tiêu đề và mô tả ngắn gọn những gì bạn đã làm.
4. Gán **Trưởng nhóm (TV1)** làm Reviewer để duyệt và gộp (Merge) vào nhánh `main`.

---

## 🚫 4. Các Điều Cấm Kỵ Tuyệt Đối
1. ❌ **Không commit file mã nguồn gốc của WordPress:** Không bao giờ `git add wp-admin/` hay `git add wp-includes/`. Tệp `.gitignore` đã chặn sẵn, tuyệt đối không sửa đổi để thêm vào.
2. ❌ **Không commit tệp chứa mật khẩu:** Tệp `wp-config.php` chứa mật khẩu cơ sở dữ liệu thật của máy bạn, tuyệt đối không đưa lên GitHub công khai.
3. ❌ **Không sửa tệp của thành viên khác:** Nếu cần sửa, hãy trao đổi trực tiếp với người phụ trách tệp đó để tránh xung đột mã nguồn.
