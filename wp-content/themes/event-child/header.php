<?php
/**
 * Header Template for Event Child Theme
 *
 * @package Event_Child_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'event-dark-theme' ); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-wrapper">
    <header id="masthead" class="ots-site-header">
        <div class="event-container ots-nav-container">
            <!-- Brand Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ots-brand-logo">
                <div class="ots-logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                </div>
                <div class="ots-logo-text">
                    <span class="ots-brand-title">OPEN TECH SUMMIT</span>
                    <span class="ots-brand-year">HÀ NỘI 2026 &bull; GPLv2</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav id="site-navigation" class="ots-main-navigation">
                <ul class="ots-nav-menu">
                    <li class="<?php echo is_front_page() ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang Chủ</a></li>
                    <li class="<?php echo is_page( 'lich-trinh' ) ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>">Lịch Trình 3 Phòng</a></li>
                    <li class="<?php echo is_page( 'dien-gia' ) ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/dien-gia/' ) ); ?>">Diễn Giả</a></li>
                    <li class="<?php echo is_page( 'dang-ky-ve' ) ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>">Đăng Ký Vé</a></li>
                    <li class="<?php echo is_page( 'dia-diem' ) ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/dia-diem/' ) ); ?>">Địa Điểm</a></li>
                </ul>
            </nav>

            <!-- Quick Action CTA -->
            <div class="ots-header-actions">
                <a href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>" class="ots-btn-header-cta">
                    <span>Nhận Vé 0đ (QR)</span>
                </a>
            </div>
        </div>
    </header>
