# TÀI LIỆU ĐẶC TẢ THIẾT KẾ GIAO DIỆN & WIREFRAME (UI/UX SPECIFICATION)
## DỰ ÁN: CỔNG THÔNG TIN HỘI NGHỊ KHOA HỌC & CÔNG NGHỆ MỞ 2026 (OPEN TECH SUMMIT 2026)
### MÔN HỌC: MÃ NGUỒN MỞ — NHÓM 2

---

## 1. HỆ THỐNG THIẾT KẾ CỐT LÕI (DESIGN SYSTEM TOKENS)

### 1.1. Bảng màu chủ đạo (Color Palette)
Hệ thống sử dụng bảng màu mang phong cách hiện đại, thanh lịch, thể hiện tính chất chuyên nghiệp của một hội nghị khoa học công nghệ:

| Tên màu | Mã màu HEX | Ứng dụng trong giao diện |
| :--- | :--- | :--- |
| **Primary Blue** | `#1e3a8a` | Màu chủ đạo cho Header, Hero Section, Tiêu đề chính `<h1>`, Nút hành động chính |
| **Secondary Teal** | `#0284c7` | Màu bổ trợ cho đường viền, liên kết hover, tiêu đề phụ `<h2>`, thanh tiến trình |
| **Accent Orange** | `#f97316` | Màu điểm nhấn cho nút CTA *"Đăng ký vé ngay"*, nhãn giá vé nổi bật, thẻ VIP |
| **Background Light**| `#f8fafc` | Nền chung toàn trang (off-white dịu mắt, tăng độ tương phản đọc bài) |
| **Card Surface** | `#ffffff` | Nền thẻ nội dung (thẻ Diễn giả, thẻ Vé, khối phiên Lịch trình) |
| **Text Dark** | `#1e293b` | Màu chữ nội dung chính (Slate 800 — sắc nét, dễ đọc trên mọi màn hình) |
| **Text Muted** | `#64748b` | Màu chữ phụ, mô tả ngắn, khung giờ, ghi chú (Slate 500) |
| **Border Light** | `#e2e8f0` | Màu đường kẻ phân cách bảng, khung viền thẻ (Slate 200) |

### 1.2. Thang Phông Chữ (Typography Scale)
- **Họ phông (Font Family):** Kế thừa phông chữ hệ thống hiện đại qua Astra (`system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, sans-serif`).
- **Phân cấp cỡ chữ (Hierarchy):**
  - `h1` (Tiêu đề chính trang / Hero): `32px` – `42px`, `font-weight: 700`, `line-height: 1.2`
  - `h2` (Tiêu đề phân mục chính): `24px` – `30px`, `font-weight: 600`, `line-height: 1.3`
  - `h3` (Tiêu đề thẻ nội dung / Diễn giả): `18px` – `22px`, `font-weight: 600`
  - `body` (Nội dung thông thường): `16px`, `font-weight: 400`, `line-height: 1.6`
  - `caption / small` (Ghi chú, thời gian): `13px` – `14px`, `font-weight: 500`

### 1.3. Khoảng cách & Đổ bóng (Spacing & Shadows)
- **Container Max-width:** `1200px` (căn giữa màn hình).
- **Border Radius:** `8px` cho nút và thẻ thường; `16px` cho khung Hero và Hộp đếm ngược.
- **Box Shadow:** `0 4px 6px -1px rgba(0, 0, 0, 0.08), 0 2px 4px -2px rgba(0, 0, 0, 0.04)` tạo chiều sâu thị giác (card elevation).

---

## 2. BỐ CỤC WIREFRAME CHI TIẾT 6 TRANG

### 2.1. HEADER CHUNG & THANH ĐIỀU HƯỚNG TOÀN HỆ THỐNG
```text
+-----------------------------------------------------------------------------------------+
| [LOGO OTS2026]     [Trang Chủ]  [Lịch Trình]  [Diễn Giả]  [Địa Điểm]  [Giới Thiệu]  [VÉ NGAY] |
+-----------------------------------------------------------------------------------------+
```

---

### 2.2. WIREFRAME TRANG CHỦ (`/`)
```text
+-----------------------------------------------------------------------------------------+
|                                      HERO BANNER                                        |
|                     HỘI NGHỊ KHOA HỌC & CÔNG NGHỆ MỞ 2026                              |
|           "Kiến tạo Tương lai Số với Nền tảng Mã Nguồn Mở & Trí Tuệ Nhân Tạo"           |
|                                                                                         |
|        [ 74 NGÀY ]      [ 16 GIỜ ]      [ 42 PHÚT ]      [ 15 GIÂY ] (Realtime)         |
|                                                                                         |
|                    [ ĐĂNG KÝ VÉ THAM DỰ ]       [ XEM LỊCH TRÌNH ]                      |
+-----------------------------------------------------------------------------------------+
| [!] THÔNG BÁO: Cổng đăng ký vé Sinh viên sẽ đóng khi đủ 500 lượt đăng ký đầu tiên.      |
+-----------------------------------------------------------------------------------------+
|                             THỐNG KÊ QUY MÔ SỰ KIỆN                                     |
|    [ 3 NGÀY HỘI NGHỊ ]    [ 30+ DIỄN GIẢ ]    [ 1500+ ĐẠI BIỂU ]    [ 20+ PHIÊN BÁO CÁO]|
+-----------------------------------------------------------------------------------------+
|                                3 PHÂN HỆ NỘI DUNG CHÍNH                                 |
|  [ Track 1: AI Nguồn Mở ]    [ Track 2: Linux & Cloud ]    [ Track 3: An Toàn Thông Tin]|
|  Thảo luận mô hình mở        Kiến trúc nhân & container    Phát hiện lỗ hổng mã độc     |
+-----------------------------------------------------------------------------------------+
```

---

### 2.3. WIREFRAME TRANG LỊCH TRÌNH (`/lich-trinh`)
```text
+-----------------------------------------------------------------------------------------+
|                                 LỊCH TRÌNH CHI TIẾT                                     |
|           [ Ngày 1: Khai Mạc ]      [ Ngày 2: Chuyên Đề ]      [ Ngày 3: Bế Mạc ]       |
+-----------------------------------------------------------------------------------------+
| KHUNG GIỜ  | HỘI TRƯỜNG LỚN A           | PHÒNG CHUYÊN ĐỀ B       | PHÒNG CHUYÊN ĐỀ C   |
|------------|----------------------------|-------------------------|---------------------|
| 08:00-09:00| Đón tiếp đại biểu & Checkin| Đón tiếp & Tài liệu     | Đón tiếp & Trao đổi |
| 09:00-10:30| Keynote: Tương lai FOSS    | Workshop: Kernel Module | Case study: FOSS Edu|
| 10:30-12:00| Toạ đàm: Giấy phép GPL/MIT | Thực hành: Hardening OS | Khởi nghiệp Nguồn Mở|
| 12:00-13:30|               NGHỈ TRƯA & TIỆC GIAO LƯU NETWORKING LUNCH                   |
| 13:30-15:00| Diễn đàn AI & Dữ liệu mở   | Phòng thủ hệ thống Cloud| Rà quét WPScan      |
| 15:00-17:00| Thảo luận bàn tròn & Q&A   | Kiểm thử bảo mật        | Tổng kết ngày 1     |
+-----------------------------------------------------------------------------------------+
```

---

### 2.4. WIREFRAME TRANG DIỄN GIẢ (`/dien-gia`)
```text
+-----------------------------------------------------------------------------------------+
|                               ĐỘI NGŨ DIỄN GIẢ CHUYÊN MÔN                               |
|                     [ Tất Cả ]   [ Bảo Mật ]   [ Điện Toán Đám Mây ]   [ AI & Big Data ]|
+-----------------------------------------------------------------------------------------+
|  +------------------------+  +------------------------+  +------------------------+     |
|  |       [ẢNH CHÂN DUNG]  |  |       [ẢNH CHÂN DUNG]  |  |       [ẢNH CHÂN DUNG]  |     |
|  | GS. NGUYỄN VĂN A       |  | ThS. TRẦN THỊ B        |  | KS. LÊ VĂN C           |     |
|  | Chuyên gia An toàn Mạng|  | Kiến trúc sư FOSS      |  | Kỹ sư Trưởng Cloud     |     |
|  | Đề tài: Hardening OS   |  | Đề tài: Giấy phép FOSS |  | Đề tài: Kubernetes K8s |     |
|  | [GitHub] [LinkedIn]    |  | [GitHub] [LinkedIn]    |  | [GitHub] [LinkedIn]    |     |
|  +------------------------+  +------------------------+  +------------------------+     |
+-----------------------------------------------------------------------------------------+
|                   BẠN MUỐN TRỞ THÀNH DIỄN GIẢ? GỬI BÀI NGHIÊN CỨU (CFP)                 |
|                   [ Đệ trình đề tài báo cáo tại hội nghị ]                              |
+-----------------------------------------------------------------------------------------+
```

---

### 2.5. WIREFRAME TRANG ĐĂNG KÝ VÉ (`/dang-ky-ve`)
```text
+-----------------------------------------------------------------------------------------+
|                                LỰA CHỌN HẠNG VÉ THAM DỰ                                 |
+-----------------------------------------------------------------------------------------+
|  +----------------------+    +----------------------+    +-----------------------+      |
|  |    VÉ SINH VIÊN      |    |    VÉ TIÊU CHUẨN     |    |        VÉ VIP         |      |
|  |       0 VNĐ          |    |      MIỄN PHÍ        |    |     TOÀN QUYỀN        |      |
|  | - Tham dự 3 ngày     |    | - Toàn bộ phiên mở   |    | - Chỗ ngồi hàng đầu   |      |
|  | - Thẻ sinh viên hợp lệ|   | - Kỷ yếu PDF số hóa  |    | - Tiệc VIP Networking |      |
|  | - Nhận chứng nhận    |    | - Chứng nhận điện tử |    | - Kỷ yếu in ấn ISBN   |      |
|  |      [ CHỌN VÉ ]     |    |      [ CHỌN VÉ ]     |    |      [ CHỌN VÉ ]      |      |
|  +----------------------+    +----------------------+    +-----------------------+      |
+-----------------------------------------------------------------------------------------+
|                               FORM ĐĂNG KÝ NHẬN VÉ ĐIỆN TỬ                              |
|                                                                                         |
|   Họ và tên:          [____________________________________________________]            |
|   Địa chỉ Email:      [____________________________________________________]            |
|   Số điện thoại:      [____________________________________________________]            |
|   Đơn vị công tác/Trường: [________________________________________________]            |
|   Loại vé đăng ký:    [ [V] Vé Tiêu chuẩn / Vé Sinh viên / Vé VIP          ]            |
|                                                                                         |
|                       [ XÁC NHẬN ĐĂNG KÝ & NHẬN MÃ QR ]                                 |
+-----------------------------------------------------------------------------------------+
```

---

### 2.6. WIREFRAME TRANG ĐỊA ĐIỂM & BẢN ĐỒ (`/dia-diem`)
```text
+-----------------------------------------------------------------------------------------+
|                                 ĐỊA ĐIỂM TỔ CHỨC HỘI NGHỊ                               |
|        TRUNG TÂM HỘI NGHỊ QUỐC GIA (NCC) - CỔNG SỐ 1, ĐẠI LỘ THĂNG LONG, HÀ NỘI         |
+-----------------------------------------------------------------------------------------+
|                                                                                         |
|          +-------------------------------------------------------------------+          |
|          |                                                                   |          |
|          |           KHUNG BẢN ĐỒ OPENSTREETMAP TƯƠNG TÁC                    |          |
|          |           (Mã nguồn mở, hiển thị chính xác toạ độ NCC)            |          |
|          |                                                                   |          |
|          +-------------------------------------------------------------------+          |
|                                                                                         |
+-----------------------------------------------------------------------------------------+
|                                HƯỚNG DẪN DI CHUYỂN CHI TIẾT                             |
|  [ XE BUÝT CÔNG CỘNG ]         [ TÀU ĐIỆN ĐÔ THỊ ]           [ PHƯƠNG TIỆN CÁ NHÂN ]    |
|  Tuyến 50, 107, BRT01          Trạm kết nối gần nhất         Bãi xe tầng hầm Cổng số 1  |
+-----------------------------------------------------------------------------------------+
```

---

### 2.7. WIREFRAME TRANG GIỚI THIỆU & GIẤY PHÉP (`/gioi-thieu`)
```text
+-----------------------------------------------------------------------------------------+
|                                SỨ MỆNH & GIÁ TRỊ CỐT LÕI                                |
|        Lan toả tri thức mở - Kết nối cộng đồng - Minh bạch công nghệ số                 |
+-----------------------------------------------------------------------------------------+
|                               BAN TỔ CHỨC HỘI NGHỊ                                      |
|    Khoa Công Nghệ Thông Tin | Nhóm Nghiên Cứu Phần Mềm Tự Do Nguồn Mở | Đối tác Công nghệ|
+-----------------------------------------------------------------------------------------+
|                       BẢNG ĐỐI CHIẾU GIẤY PHÉP MÃ NGUỒN MỞ (FOSS)                       |
|   Thành phần hệ thống        | Giấy phép áp dụng    | Điều kiện phân phối & Bản quyền   |
|   WordPress Core             | GNU GPLv2            | Tự do phân phối, mở nguồn kế thừa |
|   Theme cha Astra            | GNU GPLv2            | Kế thừa GPL, không cài mã độc     |
|   Event Child Theme (Nhóm 2) | GNU GPLv2            | Tự do cải tiến, tôn trọng tác giả |
|   Contact Form 7 & Plugins   | GNU GPLv2 / MIT      | Minh bạch thư viện bên thứ 3      |
|   Tài liệu & Kỷ yếu hội nghị | CC BY-SA 4.0         | Chia sẻ tương đương có ghi nguồn  |
+-----------------------------------------------------------------------------------------+
```

---

### 2.8. FOOTER CHUNG TOÀN HỆ THỐNG
```text
+-----------------------------------------------------------------------------------------+
| [LOGO OTS2026]              [LIÊN KẾT NHANH]            [BẢN QUYỀN & MÃ NGUỒN MỞ]       |
| Cổng thông tin Hội nghị     - Lịch trình hội nghị       Toàn bộ mã nguồn mở theo giấy   |
| Khoa học & Công nghệ Mở     - Danh bạ diễn giả          phép GNU GPLv2.                 |
| Liên hệ: btc@ots2026.vn     - Đăng ký vé tham dự        Thực hiện bởi: Nhóm 2           |
| Điện thoại: (024) 3888-xxxx - Giấy phép phần mềm        Môn học: Mã Nguồn Mở            |
+-----------------------------------------------------------------------------------------+
| (c) 2026 Open Tech Summit. All rights reserved under GPLv2 & CC BY-SA 4.0.              |
+-----------------------------------------------------------------------------------------+
```
