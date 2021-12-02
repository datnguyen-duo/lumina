<?php
function register_post_types() {
    register_post_type('galleries',array(
        'labels' => array(
            'name' => _x('Galleries', 'post type general name'),
            'singular_name' => _x('Gallery', 'post type singular name'),
            'menu_name' => 'Galleries'
        ),
        'rewrite' => array(
            'slug' => 'galleries',
            'with_front' => false
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => false,
//        'hierarchical' => true,
        'supports' => array('title','thumbnail'),
        'menu_icon' => 'dashicons-format-gallery',
    ));

    register_post_type('events',array(
        'labels' => array(
            'name' => _x('Events', 'post type general name'),
            'singular_name' => _x('Event', 'post type singular name'),
            'menu_name' => 'Events'
        ),
        'rewrite' => array(
            'slug' => 'events',
            'with_front' => false
        ),
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => false,
//        'hierarchical' => true,
        'supports' => array('title','thumbnail'),
        'menu_icon' => 'dashicons-calendar-alt',
    ));

    register_post_type('members',array(
        'labels' => array(
            'name' => _x('Members', 'post type general name'),
            'singular_name' => _x('Member', 'post type singular name'),
            'menu_name' => 'Members'
        ),
        'rewrite' => array(
            'slug' => 'members',
            'with_front' => false
        ),
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => false,
//        'hierarchical' => true,
        'supports' => array('title','thumbnail'),
        'menu_icon' => 'dashicons-admin-users',
    ));
}
add_action('init','register_post_types');