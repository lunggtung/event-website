<?php
/** Event display shortcodes. */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function event_child_alert_shortcode( $atts, $content = null ) {
    $atts = shortcode_atts( array( 'type' => 'info', 'title' => 'Thông báo' ), $atts, 'event_alert' );
    $type = sanitize_key( $atts['type'] );
    if ( ! in_array( $type, array( 'info', 'warning', 'success', 'danger' ), true ) ) {
        $type = 'info';
    }
    return '<aside class="summit-notice summit-notice-' . esc_attr( $type ) . '"><strong>' . esc_html( sanitize_text_field( $atts['title'] ) ) . '</strong><p>' . esc_html( trim( (string) $content ) ) . '</p></aside>';
}
add_shortcode( 'event_alert', 'event_child_alert_shortcode' );

function event_child_countdown_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'title'  => 'Đếm ngược đến khai mạc',
            'target' => '2026-11-20T08:00:00+07:00',
            'end'    => '2026-11-22T17:00:00+07:00',
            'date'   => '',
        ),
        $atts,
        'event_countdown'
    );
    $target = sanitize_text_field( $atts['date'] ? $atts['date'] : $atts['target'] );
    $target = str_replace( ' ', 'T', $target );
    if ( preg_match( '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}$/', $target ) ) {
        $target .= '+07:00';
    }
    $end = sanitize_text_field( $atts['end'] );
    ob_start();
    ?>
    <div class="summit-countdown" data-countdown data-target="<?php echo esc_attr( $target ); ?>" data-end="<?php echo esc_attr( $end ); ?>">
        <p class="summit-countdown-title"><?php echo esc_html( sanitize_text_field( $atts['title'] ) ); ?></p>
        <div class="summit-countdown-grid" data-countdown-grid role="timer" aria-label="Thời gian đến khai mạc" aria-live="off">
            <?php foreach ( array( 'days' => 'Ngày', 'hours' => 'Giờ', 'minutes' => 'Phút', 'seconds' => 'Giây' ) as $unit => $label ) : ?>
                <div class="summit-countdown-unit"><span data-unit="<?php echo esc_attr( $unit ); ?>">00</span><span class="summit-countdown-label"><?php echo esc_html( $label ); ?></span></div>
            <?php endforeach; ?>
        </div>
        <p class="summit-countdown-status" data-countdown-status role="status" hidden></p>
        <noscript><p>Khai mạc lúc 08:00 ngày 20/11/2026, giờ Việt Nam.</p></noscript>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'event_countdown', 'event_child_countdown_shortcode' );

function event_child_ticket_card_shortcode( $atts ) {
    $atts = shortcode_atts( array( 'type' => 'Tiêu chuẩn', 'price' => 'Miễn phí', 'slots' => '' ), $atts, 'event_ticket_card' );
    ob_start();
    ?>
    <article class="summit-ticket-option">
        <p class="summit-eyebrow">Vé tham dự</p>
        <h3><?php echo esc_html( sanitize_text_field( $atts['type'] ) ); ?></h3>
        <p class="summit-ticket-price"><?php echo esc_html( sanitize_text_field( $atts['price'] ) ); ?></p>
        <?php if ( '' !== $atts['slots'] ) : ?><p>Số chỗ: <?php echo esc_html( (string) absint( $atts['slots'] ) ); ?></p><?php endif; ?>
        <a class="summit-button is-outline" href="<?php echo esc_url( home_url( '/dang-ky-ve/#register-form-section' ) ); ?>">Đăng ký tham dự <span aria-hidden="true">↗</span></a>
    </article>
    <?php
    return ob_get_clean();
}
add_shortcode( 'event_ticket_card', 'event_child_ticket_card_shortcode' );
