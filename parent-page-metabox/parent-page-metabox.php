<?php

add_filter( 'rwmb_meta_boxes', 'gc_parentpages_register_meta_boxes' );
function gc_parentpages_register_meta_boxes( $meta_boxes ) {
    $post_types_enabled = rwmb_meta( 'gcparentpages_post_types', array( 'object_type' => 'setting' ), 'gcparentpages_options' );

    $meta_boxes[] = array(
        'id'         => 'cpt-parent-page',
        'title'      => 'Página Padre del Post',
        'post_types' => $post_types_enabled,
        'context'    => 'side',
        'priority'   => 'high',

        'fields' => array(
          array(
            'name'        => 'Seleccione una página',
            'id'          => 'post_parent',
            'type'        => 'post',
            'post_type'   => 'page',
            'field_type'  => 'select_advanced',
            'placeholder' => 'Seleccione página',
            'query_args'  => array(
                'post_status'    => 'publish',
                'posts_per_page' => - 1,
            ),
          ),
          array(
            'name' => 'Orden',
            'id'   => 'menu_order',
            'type' => 'number',

            'min'  => 0,
            'step' => 1,
          ),
        )
    );

    return $meta_boxes;
}
