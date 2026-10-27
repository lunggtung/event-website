<?php
/** Theme bootstrap. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
define( 'EVENT_CHILD_VERSION', '3.1.1' );

function event_child_enqueue_scripts() {
    wp_enqueue_style( 'event-child-style', get_stylesheet_uri(), array(), EVENT_CHILD_VERSION );
    wp_enqueue_style( 'event-custom-css', get_stylesheet_directory_uri() . '/assets/css/event-custom.css', array( 'event-child-style' ), EVENT_CHILD_VERSION );
    wp_enqueue_script( 'event-countdown-js', get_stylesheet_directory_uri() . '/assets/js/countdown.js', array(), EVENT_CHILD_VERSION, true );
    wp_enqueue_script( 'event-main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), EVENT_CHILD_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'event_child_enqueue_scripts', 20 );
foreach ( array( 'event-content.php', 'custom-shortcodes.php', 'custom-ticket-qr.php', 'ticket-registration.php', 'ticket-admin.php', 'security-hardening.php' ) as $event_module ) {
    $event_module_path = get_stylesheet_directory() . '/inc/' . $event_module;
    if ( file_exists( $event_module_path ) ) { require_once $event_module_path; }
}
function event_child_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'event_child_setup', 20 );
