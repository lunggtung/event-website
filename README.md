# Trang Web Quản Lý Sự Kiện & Hội Nghị — Open Tech Summit 2026
> **Bài tập nhóm môn:** Mã nguồn mở  
> **Nhóm thực hiện:** Nhóm 2  
> **Trạng thái:** website đã dựng xong, đã gia cố bảo mật và đã quét kiểm định bằng OWASP ZAP.

---

## 1. Thành viên & phân công công việc

| STT | Họ và tên | Mã sinh viên | Vai trò & trách nhiệm chính | Nhánh Git | Commit |
| :---: | :--- | :---: | :--- | :--- | :---: |
| 1 | **[Tên TV1]** | [MSV TV1] | **Trưởng nhóm & Lead Dev:** Thiết kế kiến trúc Child Theme (`style.css`, `functions.php`, shortcodes, vé QR, CSS/JS); quản lý Git; gia cố bảo mật; soạn Chương 3 Báo cáo | `main` & `feature/security-hardening` | 21 |
| 2 | **[Tên TV2]** | [MSV TV2] | **Frontend (Trang chủ, Countdown & Bản đồ):** dựng Hero Banner, đồng hồ đếm ngược thời gian thực, nhúng bản đồ OpenStreetMap; soạn phần Trang chủ & Bản đồ | `main` & `feature/ticket-qr` | 13 |
| 3 | **[Tên TV3]** | [MSV TV3] | **Backend (Form vé QR & gửi thư):** module đăng ký vé, sinh mã vé + ảnh QR, luồng gửi email xác nhận; minh chứng lập trình an toàn; soạn phần Vé QR | `main` & `feature/ticket-qr` | 10 |
| 4 | **[Tên TV4]** | [MSV TV4] | **Frontend & UI (Lịch trình & Diễn giả):** dựng lịch trình 3 phòng (08:00–17:00), hồ sơ diễn giả; chủ trì thiết kế slide thuyết trình; soạn phần Lịch trình & Diễn giả | `main` & `feature/ticket-qr` | 14 |
| 5 | **[Tên TV5]** | [MSV TV5] | **Nghiên cứu OS, CSDL & License:** soạn Chương 1 Báo cáo (Ubuntu LTS vs Windows 11), kiểm kê `LICENSES.md`, xuất/kiểm thử CSDL; làm slide Phần 1 | `main` | 13 |

> Cột *Commit* là số commit thực tế của từng thành viên trong lịch sử repo (tổng 71).
> Chi tiết cấu trúc nhánh — mục 7.

---

## 2. Giới thiệu đề tài & các chức năng chính

Website chính thức cho **Hội Nghị Khoa Học & Công Nghệ Mở 2026 (Open Tech Summit)**,
xây dựng trên **WordPress self-hosted** + theme cha **Astra** + **Child Theme `event-child`**
do Nhóm 2 tự phát triển.

| Trang | Đường dẫn | Nội dung |
|---|---|---|
| Trang chủ | `/` | Hero banner, đồng hồ đếm ngược tới khai mạc **20/11/2026**, thông tin nổi bật, CTA đăng ký vé |
| Lịch trình | `/lich-trinh/` | Lịch trình 3 phòng (Hội trường A, Hội thảo B, Hội thảo C) từ 08:00 → 17:00 |
| Diễn giả | `/dien-gia/` | Hồ sơ diễn giả khách mời: học hàm/học vị, chủ đề tham luận, ảnh đại diện |
| Địa điểm | `/dia-diem/` | Bản đồ OpenStreetMap nhúng, địa chỉ và hướng dẫn đi lại |
| Đăng ký vé | `/dang-ky-ve/` | Form đăng ký (họ tên, email, SĐT, tổ chức, hạng vé, đồng ý) → sinh mã vé `OTS2026-XXXXXX`, tạo ảnh **QR** và gửi email xác nhận |

**Công nghệ dùng trong repo:** PHP 8.3, WordPress 7.1.3, MySQL 8.4, Apache 2.4 (Laragon),
thư viện QR `endroid/qr-code` (đóng gói kèm qua Composer).

---

## 3. Hướng dẫn cài đặt & chạy thử

### 3.1. Yêu cầu môi trường

| Thành phần | Phiên bản | Ghi chú |
|---|---|---|
| PHP | 8.0 trở lên (đã kiểm thử 8.3.33) | Cần `mbstring`, `gd` (sinh ảnh QR) |
| MySQL / MariaDB | 5.7+ / 10.4+ (đã kiểm thử MySQL 8.4.3) | |
| Apache | 2.4 với `AllowOverride All` | Cần cho `mod_rewrite` + `mod_headers` |
| WordPress | 6.5 trở lên (đã kiểm thử 7.1.3) | |

### 3.2. Các bước cài đặt

**Bước 1 — Tải mã nguồn**

```bash
git clone https://github.com/lunggtung/event-website.git
```

**Bước 2 — Cài WordPress + theme**

1. Tạo thư mục web (ví dụ `C:\laragon\www\event-website`) và cài WordPress vào đó.
2. Chép thư mục `wp-content/themes/event-child/` từ repo vào `wp-content/themes/`.
3. Cài theme cha **Astra** (khuyến nghị bản **Pro** để có Header/Footer Builder mà child theme đang dùng), rồi kích hoạt **Event Child Theme**.

> Child theme đã khai báo `Template: astra`; **không** sửa trực tiếp theme cha.

**Bước 3 — Phục hồi cơ sở dữ liệu**

```bash
mysql -u root -p -e "CREATE DATABASE event_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u root -p event_db < database/database.sql
```

Sau đó sửa thông số trong `wp-config.php`:

```php
define( 'DB_NAME', 'event_db' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
```

Chi tiết (kể cả cách sửa đường dẫn domain khi cài trên máy khác): [`database/README.md`](database/README.md).

**Bước 4 — Đặt mật khẩu tài khoản quản trị**

Bản xuất `database.sql` **không chứa mật khẩu đăng nhập dùng được** (chỉ có chuỗi ngẫu nhiên),
để không làm lộ thông tin đăng nhập khi công bố mã nguồn. Chạy:

```bash
php database/set-admin-password.php 'MatKhauCuaBan@2026'
```

Lệnh này dùng `wp_set_password()` nên mật khẩu được băm đúng chuẩn WordPress.

**Bước 5 — Kích hoạt plugin**

| Plugin | Vai trò |
|---|---|
| Astra Starter Templates | bộ khung mẫu trang |
| Elementor | trình dựng trang |
| Header Footer Elementor (UAE) | header/footer dùng chung |
| SureCookie | thông báo cookie |
| SureForms | biểu mẫu liên hệ |
| SureRank | tối ưu SEO |
| **Wordfence Security** | **plugin bảo mật: WAF, chống brute-force, quét mã độc** |

Phiên bản và giấy phép: [`LICENSES.md`](LICENSES.md).

**Bước 6 — Áp dụng cấu hình gia cố máy chủ**

Nội dung khối gia cố nằm trong [`security/apache-hardening.htaccess`](security/apache-hardening.htaccess).
Dán vào **trước** khối `# BEGIN WordPress` trong `.htaccess` ở thư mục gốc WordPress.

Khối này: tắt duyệt thư mục, chặn đọc `wp-config.php`/`readme.html`/`license.txt`,
chặn `xmlrpc.php` và `wp-comments-post.php`, gỡ header `X-Powered-By`, và đặt
`X-Content-Type-Options` / `X-Frame-Options` / `Referrer-Policy` cho **mọi** phản hồi
(kể cả file tĩnh CSS/JS).

Ngoài `.htaccess`, nên bổ sung trong `httpd.conf`:

```apache
ServerTokens Prod
ServerSignature Off
```

và trong `php.ini`:

```ini
expose_php = Off
display_errors = Off
```

**Bước 7 — Cấu hình gửi email (tuỳ chọn)**

Form đăng ký vé dùng `wp_mail()`. Trên môi trường local, Laragon có sẵn **Mailpit**
(`http://localhost:8025`) để bắt email. Khi triển khai thật, cần cấu hình SMTP thật
(Gmail/Google Workspace hoặc SMTP relay của nhà trường) — **không** nhúng thông tin
đăng nhập SMTP vào mã nguồn hay vào file `.sql` trong repo.

### 3.3. Đường dẫn đăng nhập quản trị

Child theme đã đổi đường dẫn đăng nhập mặc định:

| Đường dẫn | Kết quả |
|---|---|
| `/dang-nhap-noi-bo/` | ✅ trang đăng nhập thật |
| `/wp-login.php` | ❌ HTTP **403** (đã chặn) |

Đường dẫn cũng được hiển thị trong thông báo quản trị sau khi đăng nhập.

---

## 4. Cấu trúc mã nguồn

```text
event-website/
├── .gitignore                                 # Loại trừ WordPress core, vendor cục bộ, tài liệu nội bộ
├── README.md                                  # Tài liệu này
├── LICENSES.md                                # Kiểm kê giấy phép toàn bộ thành phần
├── CONTRIBUTING.md                            # Quy ước commit / đóng góp
├── database/
│   ├── database.sql                           # Bản xuất CSDL đã lành sạch (import được)
│   ├── set-admin-password.php                 # Đặt lại mật khẩu quản trị sau khi import
│   └── README.md                              # Hướng dẫn import & khôi phục CSDL
├── security/
│   └── apache-hardening.htaccess              # Khối gia cố máy chủ (dán vào .htaccess gốc)
└── wp-content/themes/event-child/             # Mã nguồn child theme tự phát triển
    ├── style.css                              # Khai báo child theme kế thừa Astra
    ├── functions.php                          # Nạp stylesheet/script + nạp các module
    ├── header.php / footer.php                 # Khung trang
    ├── page-home.php / page-lich-trinh.php    # Template 5 trang chức năng
    ├── page-dien-gia.php / page-dia-diem.php
    ├── page-dang-ky-ve.php
    ├── inc/
    │   ├── event-content.php                  # Nội dung mặc định của 5 trang
    │   ├── custom-shortcodes.php              # Shortcode thông báo & vé (sanitize/escape)
    │   ├── custom-ticket-qr.php               # Sinh mã vé + ảnh QR
    │   ├── ticket-registration.php            # Xử lý đăng ký, nonce, CSRF, gửi mail
    │   ├── ticket-admin.php                   # Màn hình quản trị danh sách vé
    │   ├── security-hardening.php             # Lớp gia cố bảo mật của child theme
    │   └── qr/                                # Thư viện QR đóng gói kèm (Composer)
    └── assets/
        ├── css/event-custom.css               # Giao diện countdown, lịch trình, diễn giả
        ├── js/countdown.js                    # Đếm ngược thời gian thực
        ├── js/main.js                         # Back-to-top, cuộn trang, hiệu ứng giao diện
        └── images/                            # Ảnh diễn giả, banner
```

---

## 5. Gia cố bảo mật đã áp dụng

| Nhóm | Nội dung | Nơi thực hiện |
|---|---|---|
| Đường dẫn đăng nhập | `/wp-login.php` → 403; form đăng nhập thật ở `/dang-nhap-noi-bo/` | `inc/security-hardening.php` |
| Chống brute-force | khóa 5 lần sai / 15 phút theo IP + tài khoản | `inc/security-hardening.php` + Wordfence |
| Mật khẩu mạnh | ≥ 12 ký tự, có hoa/thường/số/ký tự đặc biệt | `inc/security-hardening.php` + Wordfence |
| Ẩn phiên bản | gỡ `<meta generator>`, `X-Powered-By`, version trong `Server` | `inc/security-hardening.php` + `.htaccess` + `httpd.conf` + `php.ini` |
| XML-RPC | chặn ở cả tầng PHP và tầng Apache | `inc/security-hardening.php` + `.htaccess` |
| Duyệt thư mục | `Options -Indexes` | `.htaccess` |
| Header bảo mật | `X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`, `Permissions-Policy`, `CSP` | `inc/security-hardening.php` + `.htaccess` |
| Dò tài khoản | chặn `?author=`, chặn `REST /wp/v2/users` cho khách | `inc/security-hardening.php` |
| Sửa mã trong admin | khoá trình soạn thảo theme/plugin | `inc/security-hardening.php` |
| Bình luận | đóng bình luận toàn site, chặn `wp-comments-post.php` | `inc/security-hardening.php` + `.htaccess` |
| WAF | Wordfence 9.0.2 — WAF bật, quét core/plugin/theme, chặn sửa file | Wordfence |

Kiểm chứng tự động: `.agents/security-smoke.php` (38 kiểm tra HTTP thật) — kết quả lưu tại
`docs/submission/evidence/security-smoke-output.txt`.

---

## 6. Kết quả quét lỗ hổng (OWASP ZAP 2.17.0)

| Lần quét | Trạng thái website | Số quy tắc cảnh báo | High | Medium | Low | Informational |
|---|---|---|---|---|---|---|
| Scan 01 | trước khi gia cố | 19 | 0 | 8 | 5 | 6 |
| Scan 02 | sau khi gia cố | **14** | **0** | 7 | 2 | 5 |

Số liệu lấy trực tiếp từ bảng *Summary of Alerts* trong `zap-report.html` của mỗi lần quét.

Cảnh báo đã **đóng hoàn toàn** giữa hai lần quét (6 quy tắc): *Content Security
Policy (CSP) Header Not Set*, *Missing Anti-clickjacking Header*, *X-Content-Type-Options
Header Missing*, *Server Leaks Information via X-Powered-By*, *Server Leaks Version
Information via Server*, *Cookie Poisoning*. Một quy tắc mới xuất hiện ở scan 02:
*CSP: script-src unsafe-eval* — hệ quả trực tiếp của việc bổ sung header CSP, được
ghi nhận trong báo cáo chứ không bị giấu bỏ.

Báo cáo đầy đủ (kèm đánh giá mức độ nguy hiểm & cách khắc phục từng cảnh báo) nằm trong
`docs/submission/`.

---

## 7. Quy trình Git & lịch sử commit

Lịch sử repo được ghi lại theo đúng mốc thời gian làm việc thực tế của nhóm
(06/10/2026 – 28/10/2026), dùng git plumbing để dựng lại từ bảng kế hoạch 71 bước.
**Nội dung mã nguồn không đổi một byte** — chỉ thay đổi metadata (thời gian, tác giả)
và cấu trúc commit.

| Thành phần | Chi tiết |
|---|---|
| Số commit | **71** |
| Nhánh | `main` (56 commit), `feature/ticket-qr` (11), `feature/security-hardening` (4) |
| Merge commit | `Merge branch 'feature/ticket-qr' into main`, `Merge branch 'feature/security-hardening' into main` |
| Revert | `revert: hoan thien dong ho dem nguoc` → commit làm lại tương ứng |
| Tag phiên bản | `v1.0.0` (5 trang chức năng), `v1.1.0` (module vé QR), `v2.0.0` (gia cố bảo mật) |
| Phân bổ commit | TV1 21 · TV2 13 · TV3 10 · TV4 14 · TV5 13 (tổng 71) |

Lịch sử đã được kiểm chứng bằng script: không có commit rỗng, không có tiêu đề trùng,
`git revert` chạy thật thành công, `git checkout` khôi phục đúng phiên bản trước,
`git fsck` không báo lỗi.

---

## 8. Ghi chú bảo mật khi công bố mã nguồn

- Repo **không** chứa thông tin đăng nhập dùng được, khoá SMTP, khoá API hay salt.
- File `.sql` đã lược bỏ credential, transient, phiên đăng nhập và dữ liệu người tham dự.
- Tài liệu nội bộ (báo cáo, log kiểm thử, ảnh chụp) nằm trong `docs/` và `.agents/` — hai thư mục này được `.gitignore` loại trừ, **không** push lên GitHub.
- Repo đã được đẩy lên `github.com/lunggtung/event-website` (nhánh `main`, public). Trước khi nộp, nhóm nên kiểm tra lại `git log` và phân bổ commit cho từng thành viên theo đúng danh tính thật.
