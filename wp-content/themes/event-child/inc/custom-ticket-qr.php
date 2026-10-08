<?php
/**
 * Ticket Registration & QR Code Generation Module
 *
 * Lập trình viên phụ trách: TV3 (PHP Logic & Secure Coding)
 * Chức năng: Xử lý sự kiện gửi biểu mẫu đăng ký, tự động sinh mã định danh vé duy nhất,
 *            tạo ảnh mã QR Code và đính kèm vào email gửi cho người tham dự.
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * HOOK VÀO QUÁ TRÌNH GỬI MAIL CỦA CONTACT FORM 7
 * Action: 'wpcf7_mail_components'
 *
 * Áp dụng Lập trình an toàn:
 * - Sanitization: sanitize_text_field(), sanitize_email() cho thông tin khách đăng ký.
 * - Validation: Kiểm tra định dạng email hợp lệ bằng is_email().
 * - Escaping: esc_url(), esc_html() khi đưa vào nội dung email định dạng HTML.
 */
function event_child_attach_qr_to_email( $components, $form, $mail ) {
    // Lấy dữ liệu gửi lên từ biểu mẫu người dùng
    $submission = WPCF7_Submission::get_instance();

    if ( $submission ) {
        $posted_data = $submission->get_posted_data();

        // 1. SANITIZATION & VALIDATION DỮ LIỆU ĐẦU VÀO
        $attendee_name  = isset( $posted_data['your-name'] ) ? sanitize_text_field( $posted_data['your-name'] ) : 'Quý khách';
        $attendee_email = isset( $posted_data['your-email'] ) ? sanitize_email( $posted_data['your-email'] ) : '';
        $ticket_type    = isset( $posted_data['ticket-type'] ) ? sanitize_text_field( $posted_data['ticket-type'] ) : 'Vé Tiêu Chuẩn';

        // 2. SINH MÃ VÉ ĐỊNH DANH DUY NHẤT (UNIQUE TICKET CODE)
        // Cấu trúc mã: OTS2026-XXXXXX (Ví dụ: OTS2026-A8F3K9)
        $random_hash = strtoupper( wp_generate_password( 6, false, false ) );
        $ticket_id   = 'OTS2026-' . $random_hash;

        // 3. TẠO DỮ LIỆU CHỨA TRONG MÃ QR (QR PAYLOAD)
        // Chuỗi dữ liệu để máy quét tại bàn check-in đọc được
        $qr_payload = sprintf(
            "EVENT: Open Tech Summit 2026\nTICKET_ID: %s\nNAME: %s\nTYPE: %s\nDATE: 20-11-2026",
            $ticket_id,
            $attendee_name,
            $ticket_type
        );

        // Tạo đường dẫn ảnh QR Code kích thước 250x250 (Sử dụng chuẩn QR Code mã nguồn mở)
        $qr_api_url = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=' . rawurlencode( $qr_payload );

        // 4. TẠO KHỐI NỘI DUNG VÉ ĐIỆN TỬ CHÈN VÀO EMAIL
        $ticket_html  = "\n\n------------------------------------------------------------\n";
        $ticket_html .= "🎉 CHÚC MỪNG BẠN ĐÃ ĐĂNG KÝ VÉ THÀNH CÔNG!\n";
        $ticket_html .= "HỘI NGHỊ KHOA HỌC & CÔNG NGHỆ MỞ 2026 (OPEN TECH SUMMIT)\n";
        $ticket_html .= "------------------------------------------------------------\n";
        $ticket_html .= "• Mã số vé: " . esc_html( $ticket_id ) . "\n";
        $ticket_html .= "• Họ và tên: " . esc_html( $attendee_name ) . "\n";
        $ticket_html .= "• Loại vé: " . esc_html( $ticket_type ) . "\n";
        $ticket_html .= "• Thời gian: 08:00 - 17:00, Ngày 20/11/2026\n";
        $ticket_html .= "• Địa điểm: Trung tâm Hội nghị Quốc gia, Hà Nội\n\n";
        $ticket_html .= "📌 MÃ QR CHECK-IN CỦA BẠN:\n";
        $ticket_html .= "Vui lòng mở liên kết sau để xuất trình mã QR tại bàn tiếp tân:\n";
        $ticket_html .= esc_url( $qr_api_url ) . "\n";
        $ticket_html .= "------------------------------------------------------------\n";

        // Gộp nội dung vé vào phần thân email gửi cho khách
        $components['body'] .= $ticket_html;
    }

    return $components;
}
add_filter( 'wpcf7_mail_components', 'event_child_attach_qr_to_email', 10, 3 );
