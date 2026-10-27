<?php
/**
 * Header chung của hội nghị.
 * @package Event_Child_Theme
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$event = event_child_event_data();
$navigation = array( '' => 'Trang chủ', 'lich-trinh' => 'Lịch trình', 'dien-gia' => 'Diễn giả', 'dia-diem' => 'Địa điểm' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'summit-site' ); ?>>
<?php wp_body_open(); ?>
<a class="summit-skip-link" href="#primary">Đến nội dung chính</a>
<div id="page" class="summit-site-wrapper">
    <header class="summit-header" id="masthead">
        <div class="summit-container summit-header-inner">
            <a class="summit-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Open Tech Summit 2026 — Trang chủ">
                <span class="summit-brand-mark" aria-hidden="true">[o]</span>
                <span class="summit-brand-copy">OPEN TECH SUMMIT<strong>HÀ NỘI <span>2026</span></strong></span>
            </a>
            <button class="summit-menu-toggle" id="summit-menu-toggle" type="button" data-nav-toggle aria-controls="summit-navigation" aria-expanded="false"><span>Menu</span><span class="summit-menu-lines" aria-hidden="true"></span></button>
            <nav class="summit-nav" id="summit-navigation" aria-label="Điều hướng chính">
                <ul class="summit-nav-list">
                    <?php foreach ( $navigation as $slug => $label ) : ?>
                        <?php $current = '' === $slug ? is_front_page() : is_page( $slug ); ?>
                        <li><a href="<?php echo esc_url( home_url( '/' . ( $slug ? $slug . '/' : '' ) ) ); ?>"<?php if ( $current ) : ?> aria-current="page"<?php endif; ?>><?php echo esc_html( $label ); ?></a></li>
                    <?php endforeach; ?>
                    <li class="summit-nav-register"><a class="summit-button is-small" href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>"<?php if ( is_page( 'dang-ky-ve' ) ) : ?> aria-current="page"<?php endif; ?>>Đăng ký tham dự <span aria-hidden="true">↗</span></a></li>
                </ul>
            </nav>
        </div>
    </header>
