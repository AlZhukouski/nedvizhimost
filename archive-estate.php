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

    <main class="archive-estate" id="archive-estate">
        <div class="mb-4">
            <?php $estate = get_posts(array('post_type' => 'estate', 'posts_per_page' => 10, 'orderby' => 'post_title', 'order' => 'ASC'));
            if ($estate) { ?>
            <h1 class="mb-5 text-center">Список всей недвижимости</h1>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <?php foreach ($estate as $item) {
                    $alt = get_post_meta(get_post_thumbnail_id($item->ID), '_wp_attachment_image_alt', true);
                    $term = get_the_terms($item->ID, 'type_of_estate') ?>
                    <div class="card" style="width: 18rem;">
                        <div class="card__img-wrap">
                            <!-- myClassName is defined in my CSS as you defined your container -->
                            <img src="<?php echo get_the_post_thumbnail_url($item->ID) ?>"
                                 class="object-fit-cover w-100 h-100"
                                 alt="<?php echo esc_html($alt) ?>" height="200px">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $item->post_title ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo ($term[0]->name) ?? 'неопределено' ?></h6>
                            <p class="card-text mb-1">
                                Площадь: <?php echo carbon_get_post_meta($item->ID, 'estate_area') ?></p>
                            <p class="card-text mb-1">Жилая
                                площадь: <?php echo carbon_get_post_meta($item->ID, 'estate_living_area') ?></p>
                            <p class="card-text mb-1">
                                Стоимость: <?php echo carbon_get_post_meta($item->ID, 'estate_cost') ?></p>
                            <p class="card-text mb-1">
                                Этаж: <?php echo carbon_get_post_meta($item->ID, 'estate_stage') ?></p>
                            <p class="card-text mb-3">
                                Адрес: <?php echo carbon_get_post_meta($item->ID, 'estate_address') ?></p>
                            <a href="<?php echo get_permalink($item->ID) ?>" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                <?php }
                } else { ?>
                    <h2 class="mb-5 text-center">Недвижимости не найдено</h2>
                <?php } ?>
            </div>
        </div>
    </main>

<?php
get_footer();
