<?php
/**
 * Template Name: Lịch Trình Hội Nghị
 * @package Event_Child_Theme
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$days = event_child_schedule();
$speakers = event_child_speakers();
$room_keys = array( 'Hội trường A' => 'hall-a', 'Phòng B' => 'room-b', 'Phòng C' => 'room-c', 'Sảnh chung' => 'common' );
get_header();
?>
<main id="primary" class="summit-main summit-schedule-page">
    <section class="summit-page-heading"><div class="summit-container"><p class="summit-eyebrow">Open Tech Summit 2026 / 20–22.11</p><h1>Chương trình hội nghị</h1><p class="summit-page-lead">Báo cáo, workshop và thảo luận trong ba ngày. Chọn ngày và lọc phòng để tìm phiên phù hợp; các phiên cùng giờ diễn ra song song.</p><p class="summit-page-note">Chương trình minh họa · Giờ Việt Nam (UTC+7)</p></div></section>
    <section class="summit-section summit-schedule-content"><div class="summit-container">
        <div class="summit-day-tabs" role="tablist" aria-label="Ngày hội nghị">
            <?php foreach ( $days as $day_id => $day ) : $selected = 'day-1' === $day_id; ?>
                <button class="summit-day-tab<?php echo $selected ? ' is-active' : ''; ?>" id="tab-<?php echo esc_attr( $day_id ); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr( $day_id ); ?>" aria-selected="<?php echo $selected ? 'true' : 'false'; ?>" tabindex="<?php echo $selected ? '0' : '-1'; ?>" data-day="<?php echo esc_attr( $day_id ); ?>"><span><?php echo esc_html( $day['label'] ); ?></span><strong><?php echo esc_html( $day['date'] ); ?></strong><small><?php echo esc_html( $day['title'] ); ?></small></button>
            <?php endforeach; ?>
        </div>
        <div class="summit-room-filters" aria-label="Lọc theo phòng">
            <span>Xem theo phòng</span>
            <button class="summit-filter-button is-active" type="button" data-room-filter="all" aria-pressed="true">Tất cả</button>
            <button class="summit-filter-button" type="button" data-room-filter="hall-a" aria-pressed="false">Hội trường A</button>
            <button class="summit-filter-button" type="button" data-room-filter="room-b" aria-pressed="false">Phòng B</button>
            <button class="summit-filter-button" type="button" data-room-filter="room-c" aria-pressed="false">Phòng C</button>
        </div>
        <?php foreach ( $days as $day_id => $day ) : ?>
            <section id="<?php echo esc_attr( $day_id ); ?>" class="summit-day-panel<?php echo 'day-1' === $day_id ? ' is-active' : ''; ?>" data-day-panel role="tabpanel" aria-labelledby="tab-<?php echo esc_attr( $day_id ); ?>" tabindex="0">
                <div class="summit-schedule-day-heading"><div><p class="summit-eyebrow"><?php echo esc_html( $day['date'] ); ?></p><h2><?php echo esc_html( $day['title'] ); ?></h2></div><span><?php echo esc_html( 'day-3' === $day_id ? '08:00–12:00' : '08:00–17:00' ); ?></span></div>
                <div class="summit-schedule-labels" aria-hidden="true"><span>Thời gian</span><span>Không gian</span><span>Nội dung phiên</span></div>
                <div class="summit-session-list">
                    <?php foreach ( $day['sessions'] as $session ) : ?>
                        <article class="summit-session" id="<?php echo esc_attr( $session['id'] ); ?>" data-room="<?php echo esc_attr( $room_keys[ $session['room'] ] ); ?>">
                            <div class="summit-session-time"><?php echo esc_html( $session['time'] ); ?></div>
                            <div class="summit-session-room"><span class="summit-room-label is-<?php echo esc_attr( $room_keys[ $session['room'] ] ); ?>"><?php echo esc_html( $session['room'] ); ?></span></div>
                            <div class="summit-session-body"><h3><?php echo esc_html( $session['title'] ); ?></h3><p><?php echo esc_html( $session['description'] ); ?></p>
                                <?php if ( isset( $speakers[ $session['speaker'] ] ) ) : ?><a class="summit-session-speaker" href="<?php echo esc_url( home_url( '/dien-gia/' ) . '#' . $session['speaker'] ); ?>"><?php echo esc_html( $speakers[ $session['speaker'] ]['name'] ); ?> <span aria-hidden="true">↗</span></a><?php else : ?><span class="summit-session-speaker">Phiên chung</span><?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
        <div class="summit-schedule-note"><p><strong>Chuẩn bị cho workshop</strong><br>Mang laptop và bộ sạc nếu bạn dự định tham gia thực hành. Không cần tham dự liên tục tất cả các phiên.</p><a class="summit-button is-outline" href="<?php echo esc_url( home_url( '/dang-ky-ve/' ) ); ?>">Đăng ký tham dự <span aria-hidden="true">↗</span></a></div>
    </div></section>
</main>
<?php get_footer(); ?>
