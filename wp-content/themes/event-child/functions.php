<?php
/**
 * Event Child Theme Functions & Definitions
 *
 * Môn học: Mã nguồn mở - Nhóm 2
 * Đề tài: Trang web quản lý sự kiện & hội nghị (Open Tech Summit 2026)
 *
 * @package Event_Child_Theme
 */

// Chặn truy cập trực tiếp vào tệp qua URL để đảm bảo an toàn
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Định nghĩa phiên bản Child Theme để quản lý cache tài nguyên
define( 'EVENT_CHILD_VERSION', '1.0.0' );

/**
 * 1. NẠP TOÀN BỘ STYLESHEET & JAVASCRIPT CỦA DỰ ÁN (ENQUEUE ASSETS)
 */
function event_child_enqueue_scripts() {
    // 1.1. Nạp CSS của Theme Cha (Astra)
    wp_enqueue_style(
        'astra-parent-theme-css',
        get_template_directory_uri() . '/style.css',
        array(),
        EVENT_CHILD_VERSION
    );

    // 1.2. Nạp CSS chính của Child Theme
    wp_enqueue_style(
        'event-child-style',
        get_stylesheet_uri(),
        array( 'astra-parent-theme-css' ),
        EVENT_CHILD_VERSION
    );

    // 1.3. Nạp CSS tùy biến giao diện Sự kiện (Countdown, Lịch trình, Diễn giả)
    wp_enqueue_style(
        'event-custom-css',
        get_stylesheet_directory_uri() . '/assets/css/event-custom.css',
        array( 'event-child-style' ),
        EVENT_CHILD_VERSION
    );

    // 1.4. Nạp JavaScript Countdown thời gian thực
    wp_enqueue_script(
        'event-countdown-js',
        get_stylesheet_directory_uri() . '/assets/js/countdown.js',
        array(),
        EVENT_CHILD_VERSION,
        true // Nạp ở cuối trang (footer) để tối ưu tốc độ tải trang
    );

    // 1.5. Nạp JavaScript hiệu ứng tương tác (Nút Back-to-top)
    wp_enqueue_script(
        'event-main-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array(),
        EVENT_CHILD_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'event_child_enqueue_scripts' );


/**
 * 2. GIA CỐ BẢO MẬT HỆ THỐNG CƠ BẢN QUA HOOKS (SYSTEM HARDENING - PHẦN 3)
 */

// 2.1. Ẩn thông tin phiên bản WordPress trong mã nguồn HTML (Chống kẻ tấn công quét version để tìm lỗ hổng CVE)
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// 2.2. Xóa phiên bản WordPress đính kèm sau đuôi các file css/js (?ver=6.x)
function event_child_remove_wp_version_strings( $src ) {
    global $wp_version;
    parse_str( (string) wp_parse_url( $src, PHP_URL_QUERY ), $query );
    if ( ! empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'event_child_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'event_child_remove_wp_version_strings' );

// 2.3. Vô hiệu hóa XML-RPC (Chống tấn công DDoS và Brute-force khuếch đại)
add_filter( 'xmlrpc_enabled', '__return_false' );


/**
 * 3. NẠP CÁC MODULE CHỨC NĂNG CON (MODULAR CODE STRUCTURE)
 */

// Nạp các Custom Shortcode (Khối thông báo khẩn cấp, Thẻ vé sự kiện, Lịch trình)
$shortcodes_path = get_stylesheet_directory() . '/inc/custom-shortcodes.php';
if ( file_exists( $shortcodes_path ) ) {
    require_once $shortcodes_path;
}

// Nạp logic xử lý Form đăng ký, sinh mã vé định danh duy nhất và gửi email đính kèm QR Code
$ticket_qr_path = get_stylesheet_directory() . '/inc/custom-ticket-qr.php';
if ( file_exists( $ticket_qr_path ) ) {
    require_once $ticket_qr_path;
}
