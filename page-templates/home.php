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
        <section class="">
            <h2 class="h2 text-center mb-3">Список городов с недвижимостью</h2>

            <div class="d-flex justify-content-center align-items-baseline gap-3 mb-5">
                <?php
                $cities = get_posts(array('post_type' => 'city', 'posts_per_page' => -1, 'orderby' => 'post_title', 'order' => 'ASC'));

                if ($cities) {
                    foreach ($cities as $city) {

                        echo '<a class="btn btn-primary" href="' . get_permalink($city->ID) . '" role="button">' . $city->post_title . '</a>';
                    }
                    /*print_r($cities);*/
                }
                ?>
                <a class="btn btn-primary" href="<?php echo get_post_type_archive_link('city'); ?>" role="button">Список
                    всех городов</a>
            </div>
        </section>

        <section>
            <h2 class="h2 text-center">Список недвижимости</h2>
            <a href="<?php echo get_post_type_archive_link('estate'); ?>">Список недвижимости</a>

            <?php
            $estate = get_posts(array('post_type' => 'estate', 'posts_per_page' => 2, 'orderby' => 'post_date'));

            if ($estate) {
                foreach ($estate as $item) { ?>
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo get_the_post_thumbnail_url($item->ID) ?>" class="card-img-top"
                             alt="Фото обьекта">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item->post_title ?></h5>
                            <p class="card-text"><?php echo carbon_get_post_meta($item->ID, 'estate_area') ?></p>
                            <p class="card-text"><?php echo carbon_get_post_meta($item->ID, 'estate_area', 'estate') ?></p>
                            <p class="card-text"><?php echo carbon_get_post_meta($item->ID, 'estate_cost') ?></p>

                            <a href="<?php echo get_permalink($item->ID) ?>" class="btn btn-primary">Подробнее</a>

                        </div>
                    </div>
                    <?php
                }
                print_r($estate);
            }
            ?>

            <div class="d-flex justify-content-between gap-1 mb-5"></div>
        </section>

    </div>

    <?php echo do_shortcode('[contact-form-7 id="d531139" title="Контактная форма 1"]') ?>

    <!--    $estate = get_posts(array('post_type' => 'estate', 'post_parent' => 58, 'posts_per_page' => -1, 'orderby' => 'post_title', 'order' => 'ASC'));

        if ($estate) {
        foreach ($estate as $item) {
        echo  '<a href="' . get_permalink($item->ID) . '"<h1>' . $item->post_title . '</h1></a>';
        }
        print_r($estate);
        }
        ?>-->


</main>
<?php get_footer(); ?>

