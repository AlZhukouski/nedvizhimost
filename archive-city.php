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
    <main class="archive-city" id="main">
        <div class="mb-4">
            <?php $estate = get_posts(array('post_type' => 'city', 'posts_per_page' => 10, 'orderby' => 'post_title', 'order' => 'ASC'));
            if ($estate) { ?>
            <h2 class="mb-5 text-center">Список всех городов</h2>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <?php foreach ($estate as $item) {
                    $alt = get_post_meta(get_post_thumbnail_id($item->ID), '_wp_attachment_image_alt', true); ?>
                    <div class="card" style="width: 18rem;">
                        <div class="card__img-wrap">
                            <!-- myClassName is defined in my CSS as you defined your container -->
                            <img src="<?php echo get_the_post_thumbnail_url($item->ID) ?>"
                                 class="object-fit-cover w-100 h-100"
                                 alt="<?php echo esc_html($alt) ?>" height="200px">
                        </div>


                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $item->post_title ?></h5>
                            <p class="card-text mb-3 text-muted flex-grow-1">
                                Площадь: <?php echo carbon_get_post_meta($item->ID, 'city_description') ?></p>
                            <a href="<?php echo get_permalink($item->ID) ?>"
                               class="btn btn-primary">Подробнее</a>

                        </div>
                    </div>
                    <?php
                }
                }
                else { ?>
                    <h2 class="mb-5 text-center">Недвижимости в городе <?php echo get_the_title() ?> не найдено</h2>
                <?php } ?>
            </div>
        </div>
    </main>
<?php
get_footer();
