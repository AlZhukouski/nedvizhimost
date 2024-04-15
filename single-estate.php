<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>


<?php
$alt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true); ?>
    <main class="single-estate" id="single-estate">
        <div class="container">
            <div class="mb-5">
                <a href="<?php echo home_url(); ?>" class="btn btn-primary mb-5"><i class="bi bi-arrow-left me-2"></i>
                    Назад на главную</a>
                <h1 class="h1 mb-5">  <?php echo get_the_title() ?></h1>
                <img class="w-100 rounded mb-5" src="<?php the_post_thumbnail_url(); ?>"
                     alt="<?php echo esc_html($alt) ?>" width="300" height="300">
                <h2 class="h2 mb-3">Иображения обьекта</h2>
                <div class="d-flex flex-wrap gap-3 mb-5">
                    <?php
                    $gallery = carbon_get_post_meta(get_the_ID(), 'estate_media_gallery');
                    if ($gallery) { ?>
                        <?php foreach ($gallery as $image_ID) { ?>
                            <img class="rounded" src="<?php echo wp_get_attachment_image_url($image_ID, 'large'); ?>"
                                 alt="<?php echo esc_html($alt) ?>" width="300" height="300">
                        <?php }
                    } else { ?>
                        <p class="mb-2 text-muted">Изображиний обьекта не найдено</p>
                    <?php } ?>
                </div>

                <h2 class="h2 mb-3">Характеристики обьекта</h2>
                <div class="mb-5">
                    <p class="card-text mb-1">
                        Площадь: <?php echo carbon_get_post_meta(get_the_ID(), 'estate_area') ?></p>
                    <p class="card-text mb-1">Жилая
                        площадь: <?php echo carbon_get_post_meta(get_the_ID(), 'estate_living_area') ?></p>
                    <p class="card-text mb-1">
                        Стоимость: <?php echo carbon_get_post_meta(get_the_ID(), 'estate_cost') ?></p>
                    <p class="card-text mb-1">Этаж: <?php echo carbon_get_post_meta(get_the_ID(), 'estate_stage') ?></p>
                    <p class="card-text mb-3">
                        Адрес: <?php echo carbon_get_post_meta(get_the_ID(), 'estate_address') ?></p>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();
