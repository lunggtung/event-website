# GIẤY PHÉP SỬ DỤNG THÀNH PHẦN PHẦN MỀM (LICENSES)

> **Dự án:** Hội Nghị Khoa Học & Công Nghệ Mở 2026 — Website Quản lý Sự kiện (Nhóm 2)  
> **Cập nhật:** 29/10/2026 — đối chiếu với cài đặt thực tế trên máy build.

---

## 1. Mã nguồn do Nhóm 2 tự viết (được phân phối trong repo này)

| Thành phần | Bản | Giấy phép | Vị trí |
|---|---|---|---|
| Event Child Theme | 3.1.1 | GNU General Public License v2 or later | `wp-content/themes/event-child/` |

Child theme kế thừa từ theme cha **Astra**; toàn bộ mã PHP/JS/CSS do Nhóm 2 viết
trong khu vực `wp-content/themes/event-child/` (không sửa trực tiếp theme cha).

---

## 2. Thư viện PHP đóng gói kèm trong child theme

Thư viện được cài đặt qua Composer và commit kèm vào repo để website chạy được
ngay sau khi clone, không cần mạng:

| Thư viện | Bản | Giấy phép | Bản quyền | Vị trí |
|---|---|---|---|---|
| [endroid/qr-code](https://github.com/endroid/qr-code) | 5.x | MIT | Copyright 2023 Jeroen van den Enden | `inc/qr/vendor/endroid/qr-code/` |
| [bacon/bacon-qr-code](https://github.com/Bacon/BaconQrCode) | 4.x | BSD-2-Clause | Copyright (c) 2017-present, Ben Scholzen 'DASPRiD' | `inc/qr/vendor/bacon/bacon-qr-code/` |
| [dasprid/enum](https://github.com/DASPRiD/enum) | 1.x | BSD-2-Clause | Copyright (c) 2017, Ben Scholzen 'DASPRiD' | `inc/qr/vendor/dasprid/enum/` |

Bản quyền gốc của các thư viện nằm trong thư mục tương ứng (file `LICENSE`).
Các thư viện này **không** phải của Nhóm 2 và được giữ nguyên giấy phép gốc.

---

## 3. Theme cha và plugin được cài đặt trên máy chủ (KHÔNG nằm trong repo)

Các thành phần dưới đây được cài từ kho WordPress.org, không commit mã nguồn vào
repo. Repo này chỉ chứa child theme, file cấu hình máy chủ và file `.sql`.

| Thành phần | Bản | Giấy phép | Vai trò trong dự án |
|---|---|---|---|
| [WordPress](https://wordpress.org/) | 7.1.3 | GPLv2 | Nền tảng CMS |
| [Astra](https://wordpress.org/themes/astra/) | 4.13.10 | GPLv2 | Theme cha |
| [Astra Starter Templates](https://wordpress.org/plugins/astra-sites/) | 4.7.6 | GPLv2 | Bộ khung mẫu trang |
| [Elementor](https://wordpress.org/plugins/elementor/) | 4.2.4 | GPLv3 | Trình dựng trang |
| [Header Footer Elementor](https://wordpress.org/plugins/header-footer-elementor/) | 2.9.4 | GPLv3 | Header/Footer dùng chung |
| [SureCookie](https://wordpress.org/plugins/surecookie/) | 1.5.0 | GPL-2.0-or-later | Thông báo cookie |
| [SureForms](https://wordpress.org/plugins/sureforms/) | 2.12.6 | GPLv2 or later | Biểu mẫu liên hệ |
| [SureRank](https://wordpress.org/plugins/surerank/) | 1.10.1 | GPLv2 or later | Tối ưu SEO |
| [Wordfence Security](https://wordpress.org/plugins/wordfence/) | 9.0.2 | GPLv3 | **Plugin bảo mật** (WAF, chống brute-force, quét mã độc) |

---

## 4. Công cụ dùng để kiểm thử và đánh giá bảo mật

| Công cụ | Bản | Giấy phép | Mục đích |
|---|---|---|---|
| [OWASP ZAP](https://www.zaproxy.org/) | 2.17.0 | Apache-2.0 | Quét lỗ hổng (thành phần 3.2) |

ZAP được tải về dưới dạng bản portable và chạy ngoài hệ thống, **không** phân
phối lại trong repo.

---

## 5. Ghi chú

- Giấy phép của toàn bộ plugin WordPress.org nằm trong file `readme.txt` /
  `license.txt` của chính thư mục plugin sau khi cài đặt.
- Child theme kế thừa giấy phép của theme cha: **GPLv2 or later**.
- Khi phân phối lại website, cần giữ nguyên mọi thông báo bản quyền của
  WordPress, Astra và các plugin nêu trên.
