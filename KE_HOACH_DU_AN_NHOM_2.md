# 📑 TÀI LIỆU KẾ HOẠCH TỔNG THỂ & HƯỚNG DẪN TRIỂN KHAI DỰ ÁN
## BÀI TẬP NHÓM MÔN HỌC: MÃ NGUỒN MỞ
**NHÓM 2: TRANG WEB QUẢN LÝ SỰ KIỆN & HỘI NGHỊ (EVENT & CONFERENCE PORTAL)**

---

## 📌 I. THÔNG TIN CHUNG & PHẠM VI DỰ ÁN (PROJECT SCOPE)

### 1. Thông tin tổng quan
- **Môn học:** Mã nguồn mở
- **Nhóm thực hiện:** Nhóm 2 (Quy mô: 05 thành viên)
- **Tên đề tài:** Trang web quản lý sự kiện & hội nghị
- **Chủ đề kịch bản mẫu:** **Hội Nghị Khoa Học & Công Nghệ Mở 2026** *(Open Tech Summit 2026)*
- **Nền tảng cốt lõi:** WordPress (Self-hosted) + Child Theme tùy biến + Plugin Mã nguồn mở (GPL/MIT)

### 2. Định nghĩa bản chất & Phạm vi (Scope)
- **Bản chất hệ thống:** Đây là **Website chuyên trang chính thức (Flagship Event Portal)** phục vụ cho một Đại hội nghị/Sự kiện công nghệ quy mô lớn kéo dài ít ngày do chính Ban tổ chức (BTC) vận hành.
- **Không thuộc phạm vi:** Không phải là sàn thương mại/nền tảng trung gian cho bên thứ 3 tự đăng sự kiện (như Ticketbox hay Eventbrite).
- **Quy ước dữ liệu mẫu (Standardized Demo Data):** Sử dụng các thực thể tổng quát, chuẩn hóa để đảm bảo tính chuyên nghiệp, không vi phạm bản quyền và tập trung vào kiến trúc kỹ thuật:
  - *Tên sự kiện:* Hội nghị Khoa học & Công nghệ Mở 2026
  - *Diễn giả mẫu:* GS. Nguyễn Văn A (Security), ThS. Trần Thị B (Open Source Arch), KS. Lê Văn C (AI & Cloud).
  - *Phòng họp/Hội trường:* Hội trường A (Keynote), Phòng Hội thảo B (Security Track), Phòng Hội thảo C (Cloud & AI Track).
  - *Loại vé:* Vé Tiêu chuẩn (Standard - Miễn phí), Vé VIP (Toàn quyền tham dự & Tài liệu).

---

## 🎯 II. CẤU TRÚC ĐIỂM SỐ & CHI TIẾT TỪNG PHẦN

```text
TỔNG ĐIỂM DỰ ÁN: 100% (10 ĐIỂM)
├── PHẦN 1: Báo cáo nghiên cứu Hệ điều hành mã nguồn mở (20%)
├── PHẦN 2: Xây dựng Website & Tùy biến mã nguồn Child Theme (65%)
└── PHẦN 3: An toàn thông tin, Hardening & Rà quét lỗ hổng (15%)
```

---

### PHẦN 1: BÁO CÁO NGHIÊN CỨU HỆ ĐIỀU HÀNH MÃ NGUỒN MỞ (20%)
*Quy cách: Báo cáo kỹ thuật dài 3 – 5 trang A4, lập luận chuyên sâu, có bảng đối chiếu.*

#### 1. So sánh 3 trụ cột kỹ thuật:
1. **Kiến trúc Nhân (Kernel Architecture):**
   - *Ubuntu Linux:* **Monolithic Kernel** (Nhân nguyên khối) — Toàn bộ dịch vụ cốt lõi (VFS, IPC, Network Stack, Drivers) chạy trực tiếp trong không gian nhân (Kernel Space) giúp tối ưu hiệu năng tối đa; hỗ trợ nạp/hủy nạp Module động (Loadable Kernel Modules - `.ko`).
   - *Windows 11:* **Hybrid Kernel (NT Kernel)** — Kết hợp giữa Microkernel và Monolithic; phân tách rõ tầng trừu tượng phần cứng (HAL) và Executive Services. Đạt độ ổn định cách ly tốt nhưng chịu overhead chuyển ngữ cảnh (Context Switching).
2. **Quản lý phân quyền người dùng (Access Control & Permissions):**
   - *Ubuntu Linux:* **Mô hình POSIX UGO (User/Group/Others)** — Cơ chế phân quyền 3 bit nhị phân `rwx` (Read-4, Write-2, Execute-1), phân cấp quyền `root` và kiểm soát qua `sudo/sudoers` chặt chẽ, tối giản, minh bạch cho máy chủ.
   - *Windows 11:* **Mô hình Windows ACL (Access Control Lists)** — Quản lý dựa trên định danh an ninh SID, phân chia DACL (Discretionary ACL) và SACL (System Access ACL) với quyền chi tiết (Granular Permissions) đến từng đối tượng nhưng cấu hình phức tạp.
3. **Cơ chế cập nhật vá lỗi (Patch Management):**
   - *Ubuntu Linux:* **Quản lý gói tập trung qua `apt` / APT Repositories** — Mọi gói phần mềm và bản vá bảo mật đều được ký số GPG, cập nhật đồng bộ toàn hệ thống chỉ với một lệnh, hỗ trợ tự động hóa vá lỗi không cần khởi động lại máy (Livepatch).
   - *Windows 11:* **Windows Update Service (WUS)** — Phân phối bản cập nhật tích lũy (Cumulative Updates), người dùng thường bị động trước lịch reboot của hệ thống, khó kiểm soát từng thành phần riêng lẻ.

#### 2. Phân tích dưới góc độ An toàn thông tin:
- **Giấy phép bản quyền (GPLv2/v3 vs Commercial Proprietary):** 
  - GPL tôn trọng 4 quyền tự do của FSF, đảm bảo mã nguồn mở vĩnh viễn (Copyleft), tránh nguy cơ bị khóa chặt vào nhà cung cấp độc quyền (Vendor Lock-in).
  - Commercial EULA chỉ cấp quyền sử dụng có điều kiện, mã nguồn đóng kín, người dùng hoàn toàn bị động khi có lỗ hổng.
- **Khả năng kiểm toán & Rà soát mã độc (Auditability & Transparency):**
  - Linux cho phép toàn bộ cộng đồng an ninh mạng trên toàn cầu rà soát (Code Review) từng dòng code của Kernel, loại bỏ Backdoor và phát hiện sớm các lỗ hổng Zero-day theo nguyên tắc Kerckhoffs.

---

### PHẦN 2: XÂY DỰNG WEBSITE & TÙY BIẾN MÃ NGUỒN (65%)

#### 1. 5 Tính năng nghiệp vụ bắt buộc:
1. **Lịch trình theo giờ/phòng (Schedule / Agenda):** Thể hiện chi tiết khung giờ (08:00 - 17:00) chia theo Hội trường A, Phòng B, Phòng C.
2. **Hồ sơ Diễn giả (Speakers Directory):** Thẻ thông tin, ảnh đại diện, học hàm/học vị, chủ đề thuyết trình của các diễn giả.
3. **Bản đồ địa điểm (Venue Location Map):** Nhúng bản đồ OpenStreetMap / Google Maps Iframe chỉ dẫn đường đi.
4. **Form đăng ký & Tự động tạo vé QR qua Email:** Người dùng điền form $\rightarrow$ Hệ thống tự sinh mã vé định danh $\rightarrow$ Tạo ảnh QR Code $\rightarrow$ Gửi email xác nhận kèm vé điện tử.
5. **Đồng hồ đếm ngược (Countdown Timer) thời gian thực:** Hiển thị Ngày : Giờ : Phút : Giây đếm ngược đến lúc khai mạc sự kiện.

#### 2. Tùy biến mã nguồn Child Theme & Lập trình an toàn:
- **Cấu trúc thư mục Child Theme (`wp-content/themes/event-child/`):**
  ```text
  event-child/
  ├── style.css                  # Khai báo Theme Name, Template: twentytwentyfour / astra
  ├── functions.php              # Nạp styles/scripts, include các module con
  ├── inc/
  │   ├── custom-shortcodes.php  # Shortcode thông báo sự kiện, thống kê vé
  │   └── secure-helpers.php     # Các hàm xử lý dữ liệu chuẩn an toàn
  └── assets/
      ├── css/
      │   └── event-custom.css   # Tùy biến giao diện (Countdown, thẻ diễn giả, lịch trình)
      └── js/
          ├── countdown.js       # Xử lý đếm ngược thời gian thực
          └── main.js            # Xử lý hiệu ứng cuộn trang & nút Back-to-top
  ```
- **Kỹ thuật Lập trình an toàn (Secure Coding Standards):**
  - *Sanitization:* Sử dụng `sanitize_text_field()`, `intval()`, `sanitize_email()` cho mọi dữ liệu đầu vào.
  - *Escaping:* Sử dụng `esc_html()`, `esc_attr()`, `esc_url()` cho mọi dữ liệu xuất ra HTML để chống tấn công XSS.

---

### PHẦN 3: AN TOÀN THÔNG TIN & BẢO MẬT HỆ THỐNG (15%)

#### 1. Danh mục Gia cố hệ thống (Hardening Checklist):
- [x] **Đổi đường dẫn đăng nhập:** Đổi `/wp-login.php` và `/wp-admin` thành URL bí mật (VD: `/event-portal-admin/`) bằng *WPS Hide Login*.
- [x] **Chống Brute-force:** Cài *Limit Login Attempts Reloaded* (Khóa IP tạm thời nếu nhập sai mật khẩu quá 3 lần).
- [x] **Ẩn thông tin phiên bản WordPress:** Loại bỏ thẻ generator trong header bằng `remove_action('wp_head', 'wp_generator');`.
- [x] **Tắt duyệt thư mục & Vô hiệu hóa XML-RPC:** Cấu hình trực tiếp trong tệp `.htaccess`:
  ```apache
  # Chặn duyệt thư mục
  Options -Indexes

  # Chặn XML-RPC chống DDoS & Brute-force
  <Files xmlrpc.php>
  Order Deny,Allow
  Deny from all
  </Files>
  ```
- [x] **Phân quyền tệp tin máy chủ (File Permissions):**
  - Thư mục: `755` (`drwxr-xr-x`)
  - Tệp tin: `644` (`-rw-r--r--`)
  - Tệp cấu hình nhạy cảm `wp-config.php`: `440` hoặc `400`
- [x] **Cài đặt Tường lửa WAF:** Cài đặt và kích hoạt plugin bảo mật *Wordfence Security*.

#### 2. Rà quét lỗ hổng (Vulnerability Assessment) & Báo cáo:
- **Công cụ rà quét:** Sử dụng **WPScan** (hoặc OWASP ZAP).
- **Lệnh thực hiện quét:**
  ```bash
  wpscan --url http://localhost/event-website/ --enumerate p,t,u
  ```
- **Lập bảng Ma trận Lỗ hổng & Biện pháp khắc phục (Remediation Table):**
  Phân loại rõ cảnh báo thuộc Core / Theme / Plugin, mức độ rủi ro (High/Medium/Low) và phương án xử lý đã thực hiện.

---

## 👥 III. BẢNG PHÂN CÔNG CÔNG VIỆC (WBS) & MA TRẬN COMMIT CHO 5 THÀNH VIÊN

| Thành viên | Vai trò | Trách nhiệm chính | Tệp phụ trách & Commit trên Git | Nhánh Git (Branch) |
| :---: | :--- | :--- | :--- | :--- |
| **TV1** | **Trưởng nhóm & Security** | • Quản lý Repo GitHub, xét duyệt PR.<br>• Viết tài liệu `README.md` (hướng dẫn cài đặt).<br>• Thực hiện Hardening (đổi URL login, phân quyền).<br>• Chạy WPScan và viết báo cáo Phần 3. | • `README.md`<br>• `.gitignore`<br>• `.htaccess`<br>• `docs/wpscan-report.md` | `feature/hardening-and-docs` |
| **TV2** | **Core Backend Theme** | • Khởi tạo thư mục Child Theme (`event-child`).<br>• Khai báo `style.css` chuẩn WordPress.<br>• Viết hàm nạp Stylesheet/Scripts trong `functions.php`.<br>• Tinh chỉnh cấu trúc trang chủ. | • `style.css`<br>• `functions.php` | `feature/child-theme-core` |
| **TV3** | **PHP / Logic Developer** | • Lập trình các Custom Shortcodes trong `inc/`:<br>  - Shortcode hộp thông báo sự kiện khẩn cấp.<br>  - Shortcode thẻ vé & đăng ký sự kiện.<br>• Áp dụng hàm `sanitize_text_field()` và `esc_html()`. | • `inc/custom-shortcodes.php`<br>• `inc/secure-helpers.php` | `feature/custom-shortcodes` |
| **TV4** | **Frontend & UI Effects** | • Viết JavaScript cho **Countdown Timer** thời gian thực.<br>• Viết JS hiệu ứng nút **Back-to-top** và cuộn trang.<br>• Viết CSS tùy biến banner, bảng lịch trình, thẻ diễn giả. | • `assets/js/countdown.js`<br>• `assets/js/main.js`<br>• `assets/css/event-custom.css` | `feature/frontend-countdown` |
| **TV5** | **Data, License & OS Report** | • Soạn thảo nội dung **Báo cáo Phần 1 (Ubuntu vs Win 11)**.<br>• Nhập liệu mẫu: Lịch trình 3 phòng, 3 Diễn giả mẫu.<br>• Lập bảng kiểm kê giấy phép `LICENSES.md`.<br>• Xuất bản sao lưu cơ sở dữ liệu `database.sql`. | • `LICENSES.md`<br>• `database.sql`<br>• `docs/bao-cao-phan-1-os.md` | `feature/licenses-and-database` |

---

## 📦 IV. DANH MỤC SẢN PHẨM BÀN GIAO (DELIVERABLES CHECKLIST)

### 1. Sản phẩm trên GitHub Repository (Công khai):
- [ ] Thư mục `child-theme/` (toàn bộ code `event-child/` tự viết).
- [ ] Tệp `database.sql` (bản sao lưu cơ sở dữ liệu hoàn chỉnh có sẵn bài viết/diễn giả mẫu).
- [ ] Tệp `README.md` (hướng dẫn chi tiết cách dựng lại web từ số 0 cho giảng viên chấm).
- [ ] Tệp `LICENSES.md` (bảng thống kê đầy đủ các Theme/Plugin sử dụng kèm giấy phép GPL/MIT).

### 2. Bộ hồ sơ báo cáo nộp bản mềm (Softcopy):
- [ ] **01 File Báo cáo tổng hợp (Word/PDF):**
  - *Chương 1:* Báo cáo nghiên cứu Hệ điều hành Ubuntu vs Windows 11 (3–5 trang).
  - *Chương 2:* Bảng WBS phân công, Link GitHub, Bảng License, Mô tả chức năng web & Giải thích chi tiết đoạn code PHP/JS tự viết (kèm chứng minh lập trình an toàn).
  - *Chương 3:* Ảnh chụp màn hình các bước Hardening, kết quả xuất từ công cụ WPScan và bảng đánh giá khắc phục lỗ hổng.
- [ ] **01 File Slide thuyết trình (PowerPoint/PDF):** Tóm tắt toàn bộ quá trình thực hiện và kết quả đạt được của Nhóm 2.

---
*Tài liệu này được lập làm kim chỉ nam kỹ thuật cho toàn bộ 5 thành viên Nhóm 2 trong suốt quá trình thực hiện dự án.*
