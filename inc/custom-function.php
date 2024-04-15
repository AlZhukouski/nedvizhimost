<?php

function register_estate_post_type()
{
    $labels = array(
        'name' => 'Объекты',
        'singular_name' => 'Объект',
        'menu_name' => 'Каталог недвижимости',
        'name_admin_bar' => 'Каталог недвижимости',
        'archives' => 'Архив объектов',
        'attributes' => 'Аттрибуты объекта',
        'parent_item_colon' => 'Город обьекта',
        'all_items' => 'Все объекты',
        'add_new_item' => 'Добавить новый объект',
        'add_new' => 'Добавить объект',
        'new_item' => 'Новый объект',
        'edit_item' => 'Редактировать объект',
        'update_item' => 'Обновить объект',
        'view_item' => 'Смотреть объект',
        'view_items' => 'Смотреть объекты',
        'search_items' => 'Найти объект',
        'not_found' => 'Не найдено',
        'not_found_in_trash' => 'В корзине пусто',
        'featured_image' => 'Изображение обьекта',
        'set_featured_image' => 'Установить изображение объекта',
        'remove_featured_image' => 'Удалить изображение объекта',
        'use_featured_image' => 'Использовать в качестве изображение объекта',
        'insert_into_item' => 'Добавить к объекту',
        'uploaded_to_this_item' => 'Добавить к этому объекту',
        'items_list' => 'Список объектов',
        'items_list_navigation' => 'Навигация по списку обьектов',
        'filter_items_list' => 'Фильтровать список объектов',
    );
    $rewrite = array(
        'slug' => 'список-обьектов',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $args = array(
        'label' => 'Объект',
        'description' => 'Описание обьекта недвижимости',
        'labels' => $labels,
        'supports' => array('title', 'thumbnail'),
        'taxonomies' => array('estate'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => $rewrite,
        'capability_type' => 'page',
        'show_in_rest' => true, // Важно!
        'rest_base' => 'estate',
    );
    register_post_type('estate', $args);

}

add_action('init', 'register_estate_post_type');

function register_type_of_estate_taxonomy()
{

    $labels = array(
        'name' => 'Типы недвижимости',
        'singular_name' => 'Тип',
        'menu_name' => 'Типы недвижимости',
        'all_items' => 'Все типы',
        'parent_item' => 'Главный тип',
        'parent_item_colon' => 'Родительский тип:',
        'new_item_name' => 'Название нового типа',
        'add_new_item' => 'Добавить тип',
        'edit_item' => 'Редактировать тип',
        'update_item' => 'Обновить тип',
        'view_item' => 'Смотреть тип',
        'separate_items_with_commas' => 'Добавление типов через запятую',
        'add_or_remove_items' => 'Добавить или удалить тип',
        'choose_from_most_used' => 'Выбрать из наиболее популярных',
        'popular_items' => 'Популярные типы',
        'search_items' => 'Найти тип',
        'not_found' => 'типов нет.',
        'no_terms' => 'Такого типа нет.',
        'items_list' => 'Список типов',
        'items_list_navigation' => 'Навигация по списку типов недвижимости',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_in_rest' => true,
        'meta_box_cb' => 'post_categories_meta_box',
    );
    register_taxonomy('type_of_estate', array('estate'), $args);

}

add_action('init', 'register_type_of_estate_taxonomy', 0);

function register_city_post_type()
{
    $labels = array(
        'name' => 'Города',
        'singular_name' => 'Город',
        'menu_name' => 'Список городов',
        'name_admin_bar' => 'Список городов',
        'archives' => 'Архив городов',
        'attributes' => 'Аттрибуты города',
        'parent_item_colon' => 'Главный город',
        'all_items' => 'Все города',
        'add_new_item' => 'Добавить новый город',
        'add_new' => 'Добавить город',
        'new_item' => 'Новый город',
        'edit_item' => 'Редактировать город',
        'update_item' => 'Обновить город',
        'view_item' => 'Смотреть город',
        'view_items' => 'Смотреть города',
        'search_items' => 'Найти город',
        'not_found' => 'Не найдено городов',
        'not_found_in_trash' => 'В корзине пусто',
        'featured_image' => 'Изображение города',
        'set_featured_image' => 'Установить изображение города',
        'remove_featured_image' => 'Удалить изображение города',
        'use_featured_image' => 'Использовать в качестве изображение города',
        'insert_into_item' => 'Добавить к городу',
        'uploaded_to_this_item' => 'Добавить к этому городу',
        'items_list' => 'Список городов',
        'items_list_navigation' => 'Навигация по списку городов',
        'filter_items_list' => 'Фильтровать список городов',
    );
    $rewrite = array(
        'slug' => 'список-городов',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $args = array(
        'label' => 'Город',
        'description' => 'Описание города',
        'labels' => $labels,
        'supports' => array('title', 'thumbnail'),
        /*'taxonomies' => array('estate'),*/
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => $rewrite,
        'capability_type' => 'page',
    );
    register_post_type('city', $args);

}

add_action('init', 'register_city_post_type');

function city_metabox($post)
{
    $cities = get_posts(array('post_type' => 'city', 'posts_per_page' => -1, 'orderby' => 'post_title', 'order' => 'ASC'));
    if ($cities) {
        // чтобы портянка пряталась под скролл...
        echo '
		<div  style="max-height:200px; overflow-y:auto;">
			<select name="post_parent" >
			<option value="0">Не выбрано</option>
		';
        foreach ($cities as $city) {
            echo '
				<option value="' . $city->ID . '" ' . selected($city->ID, $post->post_parent, 0) . '> ' . esc_html($city->post_title) . '</option>';
        }
        echo '
			</select>
		</div>';
    } else
        echo 'Городов нет...';
}

add_action('add_meta_boxes', function () {
    add_meta_box('city', 'Выбор города', 'city_metabox', 'estate', 'normal', 'low');
}, 1);

//cf7 hook - dynamically adding cities to the  selector in the main form
add_filter('wpcf7_form_tag_data_option', function ($data, $options, $args) {
    $data = [];
    $cities = get_posts(array('post_type' => 'city', 'posts_per_page' => -1, 'orderby' => 'post_title', 'order' => 'ASC'));
    foreach ($options as $option) {
        if ($option === 'select_options') {
            $data[] = 'Не выбрано';
            foreach ($cities as $city) {
                $data[] = $city->post_title;
            }
        }
    }
    return $data;
}, 10, 3);
