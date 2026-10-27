<?php
/**
 * Dat lai mat khau tai khoan quan tri sau khi import file database/database.sql.
 *
 * Dung:  php database/set-admin-password.php <mat-khau-moi> [duong-dan-wp-load.php]
 * Vi du: php database/set-admin-password.php 'OpenTech@2026'
 *
 * Ban xuat database khong chua mat khau dung duoc (chi co chuoi ngau nhien),
 * nen sau khi import phai chay lenh nay truoc khi dang nhap vao trang quan tri.
 */
if ( 'cli' !== PHP_SAPI ) {
    fwrite( STDERR, "Script nay chi chay duoc qua command line (CLI).\n" );
    exit( 1 );
}

$password = isset( $argv[1] ) ? $argv[1] : '';
$wpLoad   = isset( $argv[2] ) ? $argv[2] : '';

if ( '' === $password ) {
    fwrite( STDERR, "Thieu mat khau moi.\nDung: php database/set-admin-password.php <mat-khau-moi> [duong-dan-wp-load.php]\n" );
    exit( 1 );
}

if ( strlen( $password ) < 12 ) {
    fwrite( STDERR, "Mat khau phai co it nhat 12 ky tu.\n" );
    exit( 1 );
}

$candidates = array_filter( array(
    $wpLoad,
    __DIR__ . '/../wp-load.php',
    __DIR__ . '/../../wp-load.php',
    'C:/laragon/www/event-website/wp-load.php',
) );

$loaded = false;
foreach ( $candidates as $candidate ) {
    if ( $candidate && file_exists( $candidate ) ) {
        require $candidate;
        $loaded = true;
        break;
    }
}
if ( ! $loaded ) {
    fwrite( STDERR, "Khong tim thay wp-load.php. Hay truyen duong dan: php database/set-admin-password.php <mat-khau> <duong-dan-wp-load.php>\n" );
    exit( 1 );
}

$users = get_users( array( 'role' => 'administrator', 'number' => 1, 'orderby' => 'ID', 'order' => 'ASC' ) );
if ( ! $users ) {
    fwrite( STDERR, "Khong tim thay tai khoan quan tri nao trong database.\n" );
    exit( 1 );
}

$user = $users[0];
wp_set_password( $password, $user->ID );
wp_set_current_user( $user->ID );
wp_set_auth_cookie( $user->ID, false );
wp_cache_flush();

echo "Da dat lai mat khau cho tai khoan quan tri: " . $user->user_login . PHP_EOL;
echo "Duong dan dang nhap: " . home_url( '/dang-nhap-noi-bo/' ) . PHP_EOL;
