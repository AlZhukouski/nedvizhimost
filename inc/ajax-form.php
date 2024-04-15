<?php
add_action('wp_ajax_handle_estate_submission', 'handle_estate_submission');
add_action('wp_ajax_nopriv_handle_estate_submission', 'handle_estate_submission');

function handle_estate_submission() {
    // Получите данные формы из $_POST
    $formData = $_POST;

    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    // Загрузка главного изображения
    $movefile = wp_handle_upload($_FILES['estate-main-image'], array('test_form' => false));
    $filename = $movefile['file'];
    $filetype = wp_check_filetype(basename($filename), null);
    $wp_upload_dir = wp_upload_dir();
    $attachment = array(
        'guid'           => $wp_upload_dir['url'] . '/' . basename($filename),
        'post_mime_type' => $filetype['type'],
        'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename)),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );

    // Вставка прикрепленного изображения
    $attachment_id = wp_insert_attachment($attachment, $filename);
    $attachment_data = wp_generate_attachment_metadata($attachment_id, $filename);
    wp_update_attachment_metadata($attachment_id, $attachment_data);

    // Создание новой записи в кастомном посте "estate"
    $post_id = wp_insert_post(array(
        'post_type'   => 'estate',
        'post_status' => 'publish',
        'post_title'  => $formData['estate-name'],
    ));

    // Установка изображения как миниатюры записи
    set_post_thumbnail($post_id, $attachment_id);

    // Обновление метаполей с использованием Carbon Fields
    \Carbon_Fields\Carbon_Fields::boot();
    $container = \Carbon_Fields\Container::make('post_meta', __('Информация об объекте'))
        ->where('post_id', '=', $post_id)
        ->get_container();
    $container->set_data($formData);

    if ($post_id && $movefile && !isset($movefile['error'])) {
        echo 'success';
    } else {
        echo 'error';
    }

    wp_die();
}
