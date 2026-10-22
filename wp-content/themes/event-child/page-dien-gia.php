<?php
/**
 * Template Name: Danh Bạ Diễn Giả
 * @package Event_Child_Theme
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$speakers = event_child_speakers();
$days = event_child_schedule();
get_header();
?>
<main id="primary" class="summit-main summit-speakers-page">
    <section class="summit-page-heading"><div class="summit-container"><p class="summit-eyebrow">Open Tech Summit 2026 / Chuyên môn & báo cáo</p><h1>Diễn giả hội nghị</h1><p class="summit-page-lead">Hồ sơ, chủ đề báo cáo và lịch trình của các diễn giả thuộc ba chuyên đề: mã nguồn mở, Linux và an toàn thông tin.</p><p class="summit-page-note">Tên, tiểu sử và ảnh chân dung là hồ sơ minh họa, không đại diện cho diễn giả đã xác nhận.</p></div></section>
    <section class="summit-section"><div class="summit-container">
        <div class="summit-speaker-filters" aria-label="Lọc theo chuyên đề"><button type="button" class="summit-filter-button is-active" data-filter="all" aria-pressed="true">Tất cả</button><button type="button" class="summit-filter-button" data-filter="foss" aria-pressed="false">Cộng đồng & giấy phép</button><button type="button" class="summit-filter-button" data-filter="linux" aria-pressed="false">Linux & hạ tầng</button><button type="button" class="summit-filter-button" data-filter="security" aria-pressed="false">An toàn thông tin</button></div>
        <div class="summit-speaker-directory">
            <?php foreach ( $speakers as $id => $speaker ) : ?>
                <article class="summit-speaker-profile" id="<?php echo esc_attr( $id ); ?>" data-category="<?php echo esc_attr( $speaker['category'] ); ?>">
                    <div class="summit-speaker-profile-image"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/' . $speaker['image'] ); ?>" alt="Ảnh chân dung minh họa cho hồ sơ <?php echo esc_attr( $speaker['name'] ); ?>" width="600" height="600" loading="lazy"><span>Hồ sơ minh họa</span></div>
                    <div class="summit-speaker-profile-copy"><p class="summit-eyebrow"><?php echo esc_html( $speaker['role'] ); ?></p><h2><?php echo esc_html( $speaker['name'] ); ?></h2><p class="summit-speaker-profile-topic"><?php echo esc_html( $speaker['topic'] ); ?></p><p><?php echo esc_html( $speaker['bio'] ); ?></p><h3>Các phiên tiêu biểu</h3><ul class="summit-speaker-sessions">
                        <?php $shown = 0; foreach ( $days as $day ) : foreach ( $day['sessions'] as $session ) : if ( $session['speaker'] !== $id || $shown >= 3 ) { continue; } $shown++; ?>
                            <li><span><?php echo esc_html( substr( $day['date'], 0, 5 ) . ' · ' . $session['time'] . ' · ' . $session['room'] ); ?></span><a href="<?php echo esc_url( home_url( '/lich-trinh/' ) . '#' . $session['id'] ); ?>"><?php echo esc_html( $session['title'] ); ?> <span aria-hidden="true">↗</span></a></li>
                        <?php endforeach; endforeach; ?>
                    </ul></div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="summit-inline-cta"><div><p class="summit-eyebrow">Từ ý tưởng đến cuộc trò chuyện</p><h2>Chọn phiên bạn muốn bắt đầu.</h2></div><a class="summit-button is-outline" href="<?php echo esc_url( home_url( '/lich-trinh/' ) ); ?>">Xem chương trình <span aria-hidden="true">↗</span></a></div>
    </div></section>
</main>
<?php get_footer(); ?>
