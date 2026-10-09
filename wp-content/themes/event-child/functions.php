<?php
/**
 * Event Child Theme Functions & Definitions
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'EVENT_CHILD_VERSION', '1.0.0' );

/**
 * 1. Nạp Stylesheet & Script
 */
function event_child_enqueue_scripts() {
    // CSS Theme Cha (Astra)
    wp_enqueue_style(
        'astra-parent-theme-css',
        get_template_directory_uri() . '/style.css',
        array(),
        EVENT_CHILD_VERSION
    );

    // CSS Child Theme
    wp_enqueue_style(
        'event-child-style',
        get_stylesheet_uri(),
        array( 'astra-parent-theme-css' ),
        EVENT_CHILD_VERSION
    );

    // CSS tùy biến giao diện sự kiện
    wp_enqueue_style(
        'event-custom-css',
        get_stylesheet_directory_uri() . '/assets/css/event-custom.css',
        array( 'event-child-style' ),
        EVENT_CHILD_VERSION
    );

    // JavaScript đếm ngược thời gian thực
    wp_enqueue_script(
        'event-countdown-js',
        get_stylesheet_directory_uri() . '/assets/js/countdown.js',
        array(),
        EVENT_CHILD_VERSION,
        true
    );

    // JavaScript tương tác và nút back-to-top
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
 * 2. Bảo mật hệ thống (Security Hardening)
 */

// Ẩn phiên bản WordPress trong header
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// Xóa query string phiên bản WordPress sau file css/js
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

// Vô hiệu hóa XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );


/**
 * 3. Nạp các module chức năng
 */

// Module shortcode sự kiện
$shortcodes_path = get_stylesheet_directory() . '/inc/custom-shortcodes.php';
if ( file_exists( $shortcodes_path ) ) {
    require_once $shortcodes_path;
}

// Module vé điện tử & tạo mã QR
$ticket_qr_path = get_stylesheet_directory() . '/inc/custom-ticket-qr.php';
if ( file_exists( $ticket_qr_path ) ) {
    require_once $ticket_qr_path;
}
