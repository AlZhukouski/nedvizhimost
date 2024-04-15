<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

/*$new_post = array(
    'post_title' => "test-estate",
    'post_type' => 'estate', // Замените 'property' на ваш тип записи
    // Добавьте остальные данные поста, такие как описание, тип недвижимости, цена и т. д.
);

$post_id = wp_insert_post($new_post);*/


?>
<main id="main" class="main">
    <div class="container">
        <h1 class="h1 text-center mb-5"">Добро пожаловать на лучший сайт поиска недвижимости!</h1>
        <section class="mb-5">
            <h2 class="h2 text-center mb-4">Список городов с недвижимостью</h2>
            <div class="d-flex justify-content-center flex-wrap align-items-baseline gap-3 mb-5">
                <?php
                $cities = get_posts(array('post_type' => 'city', 'posts_per_page' => 10, 'orderby' => 'post_title', 'order' => 'ASC'));

                if ($cities) {
                    foreach ($cities as $city) {
                        echo '<a class="btn btn-outline-primary" href="' . get_permalink($city->ID) . '" role="button">' . $city->post_title . '</a>';
                    }
                }
                ?>
                <a class="btn btn-primary" href="<?php echo get_post_type_archive_link('city'); ?>" role="button">Список
                    всех городов</a>
            </div>
        </section>

        <section class="mb-5">
            <h2 class="h2 text-center  mb-4">Список недвижимости</h2>
            <div class="d-flex justify-content-center flex-wrap gap-3 mb-5">
                <?php
                $estate = get_posts(array('post_type' => 'estate', 'posts_per_page' => 10, 'orderby' => 'post_date'));
                if ($estate) {
                    foreach ($estate as $item) {
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
                                <a href="<?php echo get_permalink($item->ID) ?>" class="btn btn-primary">Подробнее</a>

                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="text-center">
                <a class="btn btn-primary mr-auto ml-auto" href="<?php echo get_post_type_archive_link('estate'); ?>"
                   role="button">Список недвижимости</a>
            </div>
        </section>

    </div>

    <h2 class="h2 text-center  mb-4">Заявка на публикацию</h2>
    <?php
    $shortcode = carbon_get_theme_option('form_shortcode');
    echo do_shortcode($shortcode) ?>

</main>
<?php get_footer(); ?>

