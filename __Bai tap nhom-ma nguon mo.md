**BÀI TẬP NHÓM** 

**Phần 1: Tìm hiểu hệ điều hành mã nguồn mở (20%)** 

Mỗi nhóm nghiên cứu và viết một báo cáo so sánh ngắn (3-5 trang) giữa Ubuntu Linux (LTS mới nhất) và Windows 11: 

\- So sánh về: Kiến trúc Nhân (Kernel), Quản lý phân quyền người dùng (Linux  Permission vs Windows ACL), và Cơ chế cập nhật vá lỗi (Patch Management). \- Phân tích: Giấy phép bản quyền (GPL vs Commercial) và Khả năng kiểm tra mã  nguồn độc (Auditability) dưới góc độ An toàn thông tin. 

**Phần 2: Xây dựng website và tùy biến mã nguồn (65%)** 

Xây dựng trang web trên nền tảng WordPress. 

***Nhóm 2: Trang web quản lý sự kiện & hội nghị*** 

*Mục tiêu:* quảng bá sự kiện, bán vé/đăng ký tham gia trực tuyến. 

*Yêu cầu:* lịch trình theo giờ/phòng, thông tin diễn giả, bản đồ địa điểm, Form  đăng ký nhận mã QR vé qua Email và tính năng đếm ngược (Countdown) theo  thời gian thực. 

**Yêu cầu kỹ thuật mã nguồn mở** 

\- *Quản lý mã nguồn:* tạo 01 Public Repository trên GitHub. Tất cả thành viên phải  commit phần việc của mình. 

\- *Thống kê License:* lập bảng danh sách toàn bộ Theme/Plugin đã cài đặt kèm loại  Giấy phép mã nguồn mở của chúng (GPLv2, MIT, Apache...). 

\- *Tùy biến Code đơn giản:* tạo 01 Child Theme và viết thêm ít nhất 1 tính năng nhỏ trong file *functions.php* hoặc CSS/JS tự viết (Ví dụ: tạo 1 Custom Shortcode hiển  thị thông báo, thêm nút Back-to-top, hoặc tùy chỉnh giao diện trang Login). 

**Phần 3: ATTT và bảo mật hệ thống (15%)** 

1\. Gia cố hệ thống (System Hardening) 

*\- Đổi URL đăng nhập mặc định:* thay đổi đường dẫn /wp-admin hoặc /wp-login.php để tránh bị scan tự động. 

*\- Bảo vệ tài khoản:* bật tính năng Giới hạn số lần đăng nhập sai (Limit Login  Attempts) chống Brute-force và cấu hình Mật khẩu mạnh. 

*\- Ẩn thông tin nhạy cảm:* tắt/ẩn hiển thị phiên bản WordPress, tắt tính năng duyệt  thư mục (Directory Browsing) và tắt xmlrpc.php nếu không sử dụng. *\- Phân quyền file:* phân quyền chuẩn trên Server *(644 cho file, 755 cho folder, 400 hoặc 440 cho wp-config.php)*. 

*\- Cài đặt Plugin Bảo mật:* cài đặt và cấu hình 01 Plugin uy tín *(Wordfence, iThemes  Security, hoặc Sucuri)*. 

2\. Rà quét lỗ hổng và lập báo cáo (Vulnerability Assessment) 

\- Sử dụng công cụ WPScan (hoặc OWASP ZAP / Nmap) quét trang web sau khi đã  dựng hoàn chỉnh.  
\- Chụp màn hình kết quả quét, liệt kê các lỗ hổng/cảnh báo tìm được (nếu có) và  đưa ra đánh giá: 

\+ Cảnh báo đó thuộc về thành phần nào (Core, Theme, hay Plugin)? \+ Mức độ nguy hiểm (High/Medium/Low) và cách khắc phục (Update, gỡ  plugin, hoặc đổi cấu hình). 

3\. Lập trình an toàn căn bản (áp dụng cho code tự viết ở Phần 2\) 

Đoạn code/shortcode nhỏ mà nhóm tự viết trong *functions.php* cần áp dụng ít nhất 01 kỹ  thuật lập trình an toàn của WordPress: 

\- *Sanitization/Validation:* Lọc dữ liệu đầu vào (dùng sanitize\_text\_field(),  intval(),...). 

\- *Escaping:* Xử lý dữ liệu đầu ra chống XSS (dùng esc\_html(), esc\_attr(),...). 

**SẢN PHẨM NỘP** 

**Tài liệu nộp (bản Softcopy)** 

*\- Link GitHub Repo:* Chứa source code Child Theme, file functions.php tự viết, file .sql database và file README.md hướng dẫn cài đặt. 

*\- 01 File Báo cáo Docx/PDF:* 

\+ Nội dung Phần 1 

\+ Nội dung Phần 2 (Bảng phân công WBS, Link Git, Bảng kiểm kê License, Mô tả  trang web và Đoạn code tự viết) 

\+ Nội dung Phần 3 (minh chứng hình ảnh các bước Hardening, kết quả xuất từ công  cụ WPScan, Báo cáo xử lý lỗ hổng). 

*\- 01 Slide Báo cáo (PowerPoint/PDF):* Trình bày kết quả.