<?php
/** Hardening rules applied to the public event portal. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! defined( 'EVENT_CHILD_LOGIN_SLUG' ) ) {
    define( 'EVENT_CHILD_LOGIN_SLUG', 'dang-nhap-noi-bo' );
}
if ( ! defined( 'EVENT_CHILD_LOGIN_MAX_ATTEMPTS' ) ) {
    define( 'EVENT_CHILD_LOGIN_MAX_ATTEMPTS', 5 );
}
if ( ! defined( 'EVENT_CHILD_LOGIN_LOCK_MINUTES' ) ) {
    define( 'EVENT_CHILD_LOGIN_LOCK_MINUTES', 15 );
}
if ( ! defined( 'EVENT_CHILD_LOGIN_WINDOW_MINUTES' ) ) {
    define( 'EVENT_CHILD_LOGIN_WINDOW_MINUTES', 60 );
}
if ( ! defined( 'EVENT_CHILD_PASSWORD_MIN_LENGTH' ) ) {
    define( 'EVENT_CHILD_PASSWORD_MIN_LENGTH', 12 );
}

function event_child_login_slug() {
    return apply_filters( 'event_child_login_slug', EVENT_CHILD_LOGIN_SLUG );
}

function event_child_request_path() {
    $uri  = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
    $path = (string) wp_parse_url( $uri, PHP_URL_PATH );
    $path = trim( $path, '/' );
    $home = trim( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ), '/' );
    if ( '' !== $home && str_starts_with( $path, $home . '/' ) ) {
        $path = trim( substr( $path, strlen( $home ) ), '/' );
    }
    return $path;
}

/* Ẩn thông tin phiên bản WordPress và các thẻ generator của plugin */
function event_child_hide_version_banner() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    add_filter( 'the_generator', '__return_empty_string', 99 );
    if ( '1' !== get_option( 'elementor_meta_generator_tag' ) ) {
        update_option( 'elementor_meta_generator_tag', '1' );
    }
}
add_action( 'init', 'event_child_hide_version_banner', 1 );

function event_child_admin_footer_text( $text ) {
    return 'Hệ thống quản lý sự kiện Open Tech Summit 2026';
}
add_filter( 'admin_footer_text', 'event_child_admin_footer_text' );

/* Gửi kèm các tiêu chuẩn bảo mật ở mức HTTP */
function event_child_security_header_values() {
    return array(
        'X-Content-Type-Options' => 'nosniff',
        'X-Frame-Options'        => 'SAMEORIGIN',
        'Referrer-Policy'        => 'strict-origin-when-cross-origin',
        'Permissions-Policy'     => 'geolocation=(), microphone=(), camera=(), payment=()',
        'Content-Security-Policy' => implode( '; ', array(
            "default-src 'self'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'self'",
            "object-src 'none'",
            "img-src 'self' data: blob: https:",
            "font-src 'self' data: https://fonts.gstatic.com",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com",
            "script-src 'self' 'unsafe-inline' 'unsafe-eval'",
            "connect-src 'self'",
            'frame-src https://www.openstreetmap.org https://*.openstreetmap.org',
        ) ) . ';',
    );
}

function event_child_security_headers( $headers ) {
    foreach ( event_child_security_header_values() as $name => $value ) {
        $headers[ $name ] = $value;
    }
    return $headers;
}
add_filter( 'wp_headers', 'event_child_security_headers' );
add_filter( 'admin_headers', 'event_child_security_headers' );

/* Các endpoint hệ thống (admin-ajax, wp-comments-post, xmlrpc) không đi qua wp_headers */
function event_child_security_headers_for_endpoints() {
    if ( headers_sent() ) { return; }
    $script = isset( $_SERVER['SCRIPT_NAME'] ) ? basename( (string) wp_unslash( $_SERVER['SCRIPT_NAME'] ) ) : '';
    if ( in_array( $script, array( 'index.php', 'wp-login.php', 'wp-cron.php' ), true ) ) { return; }
    foreach ( event_child_security_header_values() as $name => $value ) {
        header( $name . ': ' . $value, false );
    }
}
add_action( 'init', 'event_child_security_headers_for_endpoints', 1 );

/* Tắt XML-RPC vì website không dùng kênh này */
function event_child_disable_xmlrpc() {
    add_filter( 'xmlrpc_enabled', '__return_false' );
    add_filter( 'xmlrpc_methods', '__return_empty_array' );
}
add_action( 'init', 'event_child_disable_xmlrpc', 0 );

function event_child_block_xmlrpc_endpoint() {
    $path = strtolower( event_child_request_path() );
    if ( 'xmlrpc.php' !== $path && ! str_ends_with( $path, '/xmlrpc.php' ) ) { return; }
    status_header( 403 );
    nocache_headers();
    wp_die( 'Dịch vụ XML-RPC không được sử dụng trên website này.', 'Yêu cầu bị từ chối', array( 'response' => 403 ) );
}
add_action( 'init', 'event_child_block_xmlrpc_endpoint', 5 );

/* Đổi đường dẫn đăng nhập mặc định */
function event_child_rewrite_login_url( $url ) {
    if ( ! is_string( $url ) || ! str_contains( $url, 'wp-login.php' ) ) { return $url; }
    return str_replace( 'wp-login.php', event_child_login_slug(), $url );
}
add_filter( 'site_url', 'event_child_rewrite_login_url' );
add_filter( 'network_site_url', 'event_child_rewrite_login_url' );
add_filter( 'home_url', 'event_child_rewrite_login_url' );
add_filter( 'network_home_url', 'event_child_rewrite_login_url' );
add_filter( 'wp_redirect', 'event_child_rewrite_login_url' );

function event_child_login_route() {
    if ( event_child_request_path() !== event_child_login_slug() ) { return; }
    $GLOBALS['event_child_login_route_active'] = true;
    status_header( 200 );
    nocache_headers();
    // wp-login.php gan bien $user_login chi khi co POST "log", khai bao san de khong canh bao PHP.
    $user_login = '';
    require ABSPATH . 'wp-login.php';
    exit;
}
add_action( 'template_redirect', 'event_child_login_route', 1 );

function event_child_block_default_login() {
    if ( ! empty( $GLOBALS['event_child_login_route_active'] ) ) { return; }
    status_header( 403 );
    nocache_headers();
    wp_die(
        'Đường dẫn đăng nhập mặc định đã bị vô hiệu hóa. Vui lòng dùng đường dẫn đăng nhập do ban tổ chức cung cấp.',
        'Yêu cầu bị từ chối',
        array( 'response' => 403 )
    );
}
add_action( 'login_init', 'event_child_block_default_login' );

function event_child_login_admin_notice() {
    if ( ! current_user_can( 'manage_options' ) ) { return; }
    $screen = get_current_screen();
    if ( $screen && ! in_array( $screen->id, array( 'dashboard', 'toplevel_page_event-tickets' ), true ) ) { return; }
    $url = home_url( '/' . event_child_login_slug() . '/' );
    echo '<div class="notice notice-info"><p><strong>Đường dẫn đăng nhập quản trị:</strong> <code>' . esc_url( $url ) . '</code> — đường dẫn <code>/wp-login.php</code> mặc định đã bị chặn.</p></div>';
}
add_action( 'admin_notices', 'event_child_login_admin_notice' );

/* Giới hạn số lần đăng nhập sai */
function event_child_client_address() {
    $ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
    return filter_var( $ip, FILTER_VALIDATE_IP ) ? $ip : '0.0.0.0';
}

function event_child_login_attempt_key( $username ) {
    $username = strtolower( trim( (string) $username ) );
    return 'event_login_fail_' . md5( event_child_client_address() . '|' . $username );
}

function event_child_login_lockout( $user, $username = '', $password = '' ) {
    if ( is_user_logged_in() ) { return $user; }
    $state = get_transient( event_child_login_attempt_key( $username ) );
    if ( ! is_array( $state ) || empty( $state['lock'] ) ) { return $user; }
    if ( (int) $state['lock'] <= time() ) { return $user; }
    $minutes = max( 1, (int) ceil( ( (int) $state['lock'] - time() ) / 60 ) );
    return new WP_Error(
        'event_login_locked',
        sprintf( 'Bạn đã đăng nhập sai quá %d lần liên tiếp. Vui lòng thử lại sau %d phút.', (int) $state['max'], $minutes )
    );
}
add_filter( 'authenticate', 'event_child_login_lockout', 30, 3 );

function event_child_login_record_attempt( $user, $username = '', $password = '' ) {
    $key = event_child_login_attempt_key( $username );
    if ( ! is_wp_error( $user ) ) {
        if ( $user instanceof WP_User ) { delete_transient( $key ); }
        return $user;
    }
    $countable = array( 'incorrect_password', 'invalid_username', 'invalid_email', 'invalidcombo' );
    if ( ! array_intersect( $user->get_error_codes(), $countable ) ) { return $user; }
    $state = get_transient( $key );
    $count = ( is_array( $state ) ? (int) ( $state['count'] ?? 0 ) : 0 ) + 1;
    $lock  = $count >= EVENT_CHILD_LOGIN_MAX_ATTEMPTS ? time() + EVENT_CHILD_LOGIN_LOCK_MINUTES * MINUTE_IN_SECONDS : 0;
    set_transient(
        $key,
        array( 'count' => $count, 'lock' => $lock, 'max' => EVENT_CHILD_LOGIN_MAX_ATTEMPTS ),
        EVENT_CHILD_LOGIN_WINDOW_MINUTES * MINUTE_IN_SECONDS
    );
    return $user;
}
add_filter( 'authenticate', 'event_child_login_record_attempt', 35, 3 );

/* Yêu cầu mật khẩu mạnh */
function event_child_password_issues( $password ) {
    $password = (string) $password;
    $issues   = array();
    if ( strlen( $password ) < EVENT_CHILD_PASSWORD_MIN_LENGTH ) {
        $issues[] = 'ít nhất ' . EVENT_CHILD_PASSWORD_MIN_LENGTH . ' ký tự';
    }
    if ( ! preg_match( '/[a-z]/', $password ) ) { $issues[] = 'có chữ thườơ'; }
    if ( ! preg_match( '/[A-Z]/', $password ) ) { $issues[] = 'có chữ hoa'; }
    if ( ! preg_match( '/[0-9]/', $password ) ) { $issues[] = 'có chữ số'; }
    if ( ! preg_match( '/[^a-zA-Z0-9]/', $password ) ) { $issues[] = 'có ký tự đặc biệt'; }
    return $issues;
}

function event_child_validate_reset_password( $errors, $user ) {
    $password = isset( $_POST['pass1'] ) ? (string) wp_unslash( $_POST['pass1'] ) : '';
    $issues   = event_child_password_issues( $password );
    if ( $issues ) {
        $errors->add( 'event_password_policy', 'Mật khẩu mới phải ' . implode( ', ', $issues ) . '.' );
    }
    return $errors;
}
add_filter( 'validate_password_reset', 'event_child_validate_reset_password', 10, 2 );

function event_child_profile_password_errors( $errors, $update, $user ) {
    if ( ! isset( $_POST['pass1'] ) ) { return; }
    $password = (string) wp_unslash( $_POST['pass1'] );
    if ( '' === $password ) { return; }
    $issues = event_child_password_issues( $password );
    if ( $issues ) {
        $errors->add( 'event_password_policy', 'Mật khẩu phải ' . implode( ', ', $issues ) . '.' );
    }
}
add_action( 'user_profile_update_errors', 'event_child_profile_password_errors', 10, 3 );

function event_child_registration_password_errors( $errors, $sanitized_user_login = '', $user_email = '' ) {
    if ( ! isset( $_POST['user_pass'] ) ) { return $errors; }
    $issues = event_child_password_issues( (string) wp_unslash( $_POST['user_pass'] ) );
    if ( $issues ) {
        $errors->add( 'event_password_policy', 'Mật khẩu phải ' . implode( ', ', $issues ) . '.' );
    }
    return $errors;
}
add_filter( 'registration_errors', 'event_child_registration_password_errors', 10, 3 );

/* Website sự kiện không mở bình luận ở mọi nội dung */
function event_child_disable_comments() {
    add_filter( 'comments_open', '__return_false', 20 );
    add_filter( 'pings_open', '__return_false', 20 );
    add_filter( 'comments_array', '__return_empty_array', 20 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
}
add_action( 'init', 'event_child_disable_comments', 2 );

/* Hạn chế việc dò danh sách người dùng */
function event_child_restrict_user_endpoints( $endpoints ) {
    if ( is_user_logged_in() ) { return $endpoints; }
    foreach ( array_keys( (array) $endpoints ) as $route ) {
        if ( preg_match( '#^/wp/v2/users#', (string) $route ) ) {
            unset( $endpoints[ $route ] );
        }
    }
    return $endpoints;
}
add_filter( 'rest_endpoints', 'event_child_restrict_user_endpoints' );

function event_child_remove_author_queries( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) { return; }
    if ( $query->get( 'author' ) || $query->get( 'author_name' ) ) {
        $query->set( 'author', 0 );
        $query->set( 'author_name', '' );
    }
}
add_action( 'pre_get_posts', 'event_child_remove_author_queries' );

/* Khóa trình soạn thảo mã theme và plugin trong trang quản trị */
function event_child_block_file_editors( $caps ) {
    if ( apply_filters( 'event_child_allow_file_editing', false ) ) { return $caps; }
    foreach ( array( 'edit_themes', 'edit_plugins', 'edit_files' ) as $cap ) {
        if ( in_array( $cap, (array) $caps, true ) ) {
            return array( 'do_not_allow' );
        }
    }
    return $caps;
}
add_filter( 'map_meta_cap', 'event_child_block_file_editors', 10, 2 );
