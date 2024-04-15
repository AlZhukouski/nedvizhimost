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
    <main class="single-city" id="single-city">
        <div class="container">
            <div class="mb-5">
                <a href="<?php echo home_url(); ?>" class="btn btn-primary mb-5"><i class="bi bi-arrow-left me-2"></i>
                    Назад на главную</a>
                <h1 class="h1 mb-5">  <?php echo get_the_title() ?></h1>
                <img class="w-100 rounded mb-3" src="<?php the_post_thumbnail_url(); ?>"
                     alt="<?php echo esc_html($alt) ?>" width="300" height="300">
                <p class="text"><?php echo carbon_get_the_post_meta('city_description') ?></p>
            </div>


            <div class="mb-4">
                <?php $estate = get_posts(array('post_type' => 'estate', 'post_parent' => get_the_ID(), 'posts_per_page' => 10, 'orderby' => 'post_title', 'order' => 'ASC'));
                if ($estate) { ?>
                <h2 class="mb-5 text-center">Недвижимость в городе <?php echo get_the_title() ?></h2>
                <div class="d-flex justify-content-center flex-wrap gap-3">
                    <?php foreach ($estate as $item) {
                        $term = get_the_terms($item->ID, 'type_of_estate') ?>
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo get_the_post_thumbnail_url($item->ID) ?>" class="card-img-top"
                                 alt="Фото обьекта">
                            <div class="card-body">
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
                                <a href="<?php echo get_permalink($item->ID) ?>"
                                   class="btn btn-primary">Подробнее</a>

                            </div>
                        </div>
                        <?php
                    }
                    }
                    else {?>
                    <h2 class="mb-5 text-center">Недвижимости в городе <?php echo get_the_title() ?> не найдено</h2>
                        <?php } ?>
                </div>
            </div>

        </div>
    </main>

<?php
get_footer();
