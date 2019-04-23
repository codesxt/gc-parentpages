<?php

// Register settings page. In this case, it's a theme options page
add_filter( 'mb_settings_pages', 'gcparentpages_options_page' );
function gcparentpages_options_page( $settings_pages ) {
    $settings_pages[] = array(
        'id'          => 'gcparentpages_settings',
        'option_name' => 'gcparentpages_options',
        'menu_title'  => 'Great Chile Parent Pages',
        'icon_url'    => 'dashicons-media-code',
        'style'       => 'no-boxes',
        'columns'     => 1,
        'tabs'        => array(
            'general' => 'Opciones Generales'
        ),
        'position'    => 68,
    );
    return $settings_pages;
}

// Register meta boxes and fields for settings page
add_filter( 'rwmb_meta_boxes', 'gcparentpages_options_meta_boxes' );
function gcparentpages_options_meta_boxes( $meta_boxes ) {

    $args = array(
      'public'   => true,
      '_builtin' => false
    );
    $output = 'objects';
    $post_types = get_post_types( $args, $output );
    $types_list = [];
    foreach ( $post_types as $post_type ) {
       $types_list[$post_type->name] =  $post_type->label;
    }
    $meta_boxes[] = array(
        'id'             => 'general',
        'title'          => 'General',
        'settings_pages' => 'gcparentpages_settings',
        'tab'            => 'general',

        'fields' => array(
            array(
              'name'    => 'Tipos de Post',
              'id'      => 'gcparentpages_post_types',
              'type'    => 'checkbox_list',
              'options' => $types_list,
              'select_all_none' => true,
          ),
        ),
    );
    return $meta_boxes;
}
