# BÁO CÁO NGHIÊN CỨU: SO SÁNH HỆ ĐIỀU HÀNH MÃ NGUỒN MỞ UBUNTU LINUX VÀ HỆ ĐIỀU HÀNH THƯƠNG MẠI WINDOWS 11
> **HỌC PHẦN:** MÃ NGUỒN MỞ  
> **NHÓM THỰC HIỆN:** NHÓM 2  
> **NGƯỜI PHỤ TRÁCH SOẠN THẢO:** TV5  
> **QUY CÁCH:** 3 – 5 TRANG A4 BÁO CÁO KỸ THUẬT

---

## 📑 MỤC LỤC
1. **Đặt vấn đề & Mục tiêu nghiên cứu**
2. **So sánh 3 trụ cột kỹ thuật nền tảng**
   - 2.1. Kiến trúc Nhân (Kernel Architecture)
   - 2.2. Quản lý phân quyền người dùng (Access Control & Permissions)
   - 2.3. Cơ chế cập nhật và quản lý bản vá (Patch Management)
3. **Phân tích dưới góc độ An toàn thông tin & Bản quyền**
   - 3.1. Giấy phép bản quyền (GPL vs Commercial Proprietary)
   - 3.2. Khả năng kiểm tra mã độc & Tính minh bạch (Auditability & Transparency)
4. **Kết luận & Đánh giá thực tiễn cho môi trường Server**

---

## 1. ĐẶT VẤN ĐỀ & MỤC TIÊU NGHIÊN CỨU
Trong bối cảnh chuyển đổi số và phát triển hạ tầng máy chủ hiện đại, cuộc tranh luận giữa việc lựa chọn hệ điều hành mã nguồn mở (đại diện là **Ubuntu Linux 24.04 LTS / 22.04 LTS**) và hệ điều hành thương mại đóng gói (đại diện là **Microsoft Windows 11 / Windows Server**) luôn là bài toán trọng tâm của các kiến trúc sư hệ thống và chuyên gia an toàn thông tin (ATTT). Báo cáo này đi sâu đối chiếu các khía cạnh kiến trúc lõi và phân tích rủi ro an ninh mạng giữa hai nền tảng.

---

## 2. SO SÁNH 3 TRỤ CỘT KỸ THUẬT NỀN TẢNG

### 2.1. Kiến trúc Nhân (Kernel Architecture)

| Đặc điểm | Ubuntu Linux (Linux Kernel) | Microsoft Windows 11 (NT Kernel) |
| :--- | :--- | :--- |
| **Loại kiến trúc** | **Monolithic Kernel (Nhân nguyên khối)** | **Hybrid Kernel (Nhân lai ghép)** |
| **Không gian chạy dịch vụ** | Toàn bộ VFS, Quản lý bộ nhớ, Network Stack, IPC và IPC Drivers chạy trực tiếp trong **Kernel Space**. | Kết hợp giữa Microkernel và Monolithic. Phân tách Hardware Abstraction Layer (HAL), Kernel và Executive Services. |
| **Khả năng mở rộng** | Sử dụng **Loadable Kernel Modules (LKM)**: Nạp hoặc gỡ bỏ driver/module lúc runtime bằng `insmod`, `rmmod` mà không cần biên dịch lại nhân. | Sử dụng các tệp thư viện `.sys` driver nạp qua Windows I/O Manager; yêu cầu ký số WHQL nghiêm ngặt. |
| **Hiệu năng & Overhead** | **Tối ưu cực đại**: Ít tốn chi phí chuyển ngữ cảnh (Context Switching) giữa User Mode và Kernel Mode. | Tốn chi phí chuyển ngữ cảnh cao hơn khi các hệ thống con giao tiếp với tầng Executive. |
| **Ổn định hệ thống** | Lỗi trong 1 module nhân có thể gây Kernel Panic, nhưng cơ chế kiểm soát mã nguồn cộng đồng giúp code tinh gọn, ít bloatware. | Cơ chế phân lớp cách ly tốt, lỗi driver đồ họa có thể khởi động lại mà không làm sập toàn bộ máy (trừ lỗi màn hình xanh BSOD). |

---

### 2.2. Quản lý phân quyền người dùng (Access Control & Permissions)

#### A. Ubuntu Linux: Mô hình POSIX UGO & Capabilities
- **Cấu trúc cơ bản:** Dựa trên 3 nhóm chủ thể: **User (Chủ sở hữu)**, **Group (Nhóm)**, và **Others (Khác)**.
- **Cơ chế 3 bit nhị phân:** Quyền Đọc (`r=4`), Ghi (`w=2`), Thực thi (`x=1`). Tổng quyền biểu diễn bằng octal (Ví dụ: `chmod 755`, `chmod 644`).
- **Phân cấp đặc quyền:** Người dùng `root` (Superuser) có quyền tối thượng. Ubuntu mặc định khóa tài khoản root trực tiếp, ép buộc quản trị viên thực thi lệnh nhạy cảm thông qua cơ chế `sudo` được cấu hình chi tiết tại `/etc/sudoers`.
- **Mở rộng nâng cao:** Hỗ trợ POSIX ACLs (`setfacl`, `getfacl`) và hệ thống tăng cường an ninh bắt buộc (MAC) như **AppArmor** hoặc **SELinux**.

#### B. Windows 11: Mô hình Windows Security Descriptor & Access Control Lists (ACL)
- **Cấu trúc:** Mỗi đối tượng (File, Registry Key, Process) được gắn một Security Descriptor chứa:
  - **DACL (Discretionary Access Control List):** Danh sách các ACE (Access Control Entries) quy định rõ User/Group nào có quyền (Allow) hoặc bị cấm (Deny).
  - **SACL (System Access Control List):** Phục vụ việc ghi nhật ký kiểm toán (Audit Logging).
- **Định danh:** Sử dụng chuỗi định danh an ninh duy nhất **SID (Security Identifier)** thay vì UID/GID dạng số nguyên như Linux.
- **Cơ chế kiểm soát:** Hỗ trợ phân quyền cực kỳ chi tiết (Granular Permissions: Read Data, Write Attributes, Take Ownership, Traverse Folder), kế thừa quyền thư mục cha (Inheritance). Tuy nhiên, độ phức tạp rất cao, dễ dẫn đến cấu hình sai lệch (Misconfiguration).

---

### 2.3. Cơ chế cập nhật và quản lý bản vá (Patch Management)

| Tiêu chí so sánh | Ubuntu Linux (APT / Snap) | Windows 11 (Windows Update Service) |
| :--- | :--- | :--- |
| **Mô hình phân phối** | **Quản lý gói tập trung (Centralized Repositories)** qua `apt`, `dpkg`. | Phân phối qua dịch vụ đám mây Windows Update (WUS / WSUS cho doanh nghiệp). |
| **Xác thực an toàn** | Mọi gói phần mềm đều được **ký số bằng khóa GPG** của nhà phát hành. Lệnh `apt update && apt upgrade -y` cập nhật đồng bộ toàn bộ HĐH và ứng dụng bên thứ 3. | Sử dụng bản cập nhật tích lũy (Cumulative Updates). Các ứng dụng bên thứ 3 thường phải tự có cơ chế updater riêng lẻ. |
| **Khả năng vá lỗi trực tiếp** | Hỗ trợ công nghệ **Canonical Livepatch**: Vá các lỗ hổng nhân nghiêm trọng ngay khi hệ thống đang chạy **mà không cần khởi động lại máy (Zero-Downtime)**. | Thường xuyên yêu cầu khởi động lại máy tính (Reboot) để thay thế các tệp tin hệ thống đang bị khóa (Locked Files), gây gián đoạn dịch vụ. |
| **Tính chủ động của Quản trị viên** | Toàn quyền kiểm soát lịch cập nhật qua `unattended-upgrades` hoặc Cronjob; không có hiện tượng máy tự ý khởi động lại ép buộc. | Người dùng phổ thông thường bị động trước chính sách tự động khởi động lại của Windows Update. |

---

## 3. PHÂN TÍCH DƯỚI GÓC ĐỘ AN TOÀN THÔNG TIN & BẢN QUYỀN

### 3.1. Giấy phép bản quyền (GPL vs Commercial EULA)
- **Giấy phép GNU GPL (General Public License v2/v3) trên Ubuntu:**
  - Bảo vệ quyền tự do nghiên cứu, chỉnh sửa và tái phân phối mã nguồn.
  - Ngăn ngừa hoàn toàn nguy cơ **Bị khóa chặt vào nhà cung cấp (Vendor Lock-in)**. Nếu Canonical ngừng hỗ trợ, cộng đồng hoàn toàn có quyền duy trì hoặc phân nhánh (Fork) hệ thống độc lập.
- **Thỏa thuận người dùng cuối (EULA) thương mại của Windows 11:**
  - Người dùng chỉ mua quyền sử dụng (License to use), không sở hữu phần mềm.
  - Mã nguồn đóng kín (Closed Source / Proprietary). Khách hàng phụ thuộc 100% vào lộ trình vá lỗi và chính sách vòng đời sản phẩm của Microsoft.

### 3.2. Khả năng kiểm toán & Rà soát mã độc (Auditability & Transparency)
- **Nguyên lý Kerckhoffs & Quy luật Linus:** *"Given enough eyeballs, all bugs are shallow"* (Khi có đủ người quan sát, mọi lỗi đều trở nên nông cạn).
- **Trên Ubuntu Linux:**
  - Mọi chuyên gia an ninh mạng độc lập trên toàn thế giới đều có quyền soi rà từng dòng mã lệnh của Kernel và thư viện lõi (`glibc`, `openssl`).
  - Khả năng cài cắm Cửa hậu (Backdoor) hoặc các module thu thập dữ liệu gián điệp (Telemetry) trái phép gần như bằng không vì sẽ bị cộng đồng phát hiện và loại bỏ ngay lập tức.
- **Trên Windows 11:**
  - Đóng kín mã nguồn khiến việc kiểm toán độc lập phải dựa vào kỹ thuật dịch ngược (Reverse Engineering) vô cùng tốn kém và khó khăn.
  - Tích hợp sẵn nhiều dịch vụ thu thập hành vi người dùng (Diagnostic Telemetry), tiềm ẩn rủi ro rò rỉ dữ liệu nhạy cảm của tổ chức.

---

## 4. KẾT LUẬN
Từ các phân tích trên, **Ubuntu Linux** thể hiện sự vượt trội rõ rệt khi đóng vai trò là **Hệ điều hành máy chủ (Server OS)** cho các hệ thống web như WordPress: Kiến trúc Monolithic tối ưu tài nguyên, cơ chế phân quyền POSIX tinh gọn minh bạch, tính năng Livepatch đảm bảo Uptime 99.99%, và giấy phép GPL bảo vệ tính minh bạch an ninh thông tin. Trong khi đó, **Windows 11** sở hữu giao diện đồ họa thân thiện và hệ sinh thái phần mềm văn phòng, tương thích tuyệt vời cho môi trường máy trạm người dùng cuối (End-user Workstation).
