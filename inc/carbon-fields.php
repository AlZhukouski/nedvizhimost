<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    Container::make('post_meta', __('Информация об обьекте'))
        ->where('post_type', '=', 'estate')
        ->add_fields(array(
            Field::make('media_gallery', 'estate_media_gallery', __('Галерея'))
                ->set_type('image'),
            Field::make('text', 'estate_area', __('Площадь'))
                ->set_width('25'),
            Field::make('text', 'estate_cost', __('Стоимость'))
                ->set_width('25'),
            Field::make('text', 'estate_living_area', __('Жилая площадь'))
                ->set_width('25'),
            Field::make('text', 'estate_stage', __('Этаж'))
                ->set_width('25'),
            Field::make('text', 'estate_address', __('Адрес')),
        ));

    Container::make('post_meta', __('Информация об обьекте'))
        ->where('post_type', '=', 'city')
        ->add_fields(array(
            Field::make('textarea', 'city_description', __('Описание Города')),
        ));

    Container::make( 'theme_options', 'Theme Options' )
        ->add_fields( array(
            Field::make( 'text', 'form_shortcode')
        ) );
}
