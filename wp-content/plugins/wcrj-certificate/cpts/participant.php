<?php

function register_cpt_participant() {
 
    $labels = array(
        'name' => _x( 'Participants', 'participant' ),
        'singular_name' => _x( 'Participant', 'participant' ),
        'add_new' => _x( 'Add New', 'participant' ),
        'add_new_item' => _x( 'Add New Participant', 'participant' ),
        'edit_item' => _x( 'Edit Participant', 'participant' ),
        'new_item' => _x( 'New Participant', 'participant' ),
        'view_item' => _x( 'View Participant', 'participant' ),
        'search_items' => _x( 'Search Participants', 'participant' ),
        'not_found' => _x( 'No participant found', 'participant' ),
        'not_found_in_trash' => _x( 'No participants found in Trash', 'participant' ),
        'parent_item_colon' => _x( 'Parent Participant:', 'participant' ),
        'menu_name' => _x( 'Participants', 'participant' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Participants ',
        //'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'supports' => array( 'title', 'custom-fields' ),
        'taxonomies' => array( 'editions' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-users',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'participant', $args );
}
 
add_action( 'init', 'register_cpt_participant' );

function editions_taxonomy() {
    register_taxonomy(
        'editions',
        'participant',
        array(
            'hierarchical' => true,
            'label' => 'Editions',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'edition',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'editions_taxonomy');