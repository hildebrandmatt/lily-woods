<?php

function lily_register_custom_post_types() {

    // register Stories CPT
    $labels = array(
        'name'               => _x( 'Projects', 'post type general name'  ),
        'singular_name'      => _x( 'Project', 'post type singular name'  ),
        'menu_name'          => _x( 'Projects', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Projects', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'project' ),
        'add_new_item'       => __( 'Add New Project' ),
        'new_item'           => __( 'New project' ),
        'edit_item'          => __( 'Edit Project' ),
        'view_item'          => __( 'View Project'  ),
        'all_items'          => __( 'All Projects' ),
        'search_items'       => __( 'Search Projects' ),
        'parent_item_colon'  => __( 'Parent Project:' ),
        'not_found'          => __( 'No projects found.' ),
        'not_found_in_trash' => __( 'No projects found in Trash.' ),
        'archives'           => __( 'Project Archives' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'our-projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'thumbnail'),
        'template_lock'      => 'all'
    );
    register_post_type( 'lily-projects', $args );

    // register Packages CPT
    $labels = array(
        'name'               => _x( 'Packages', 'post type general name'  ),
        'singular_name'      => _x( 'Package', 'post type singular name'  ),
        'menu_name'          => _x( 'Packages', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Packages', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'package' ),
        'add_new_item'       => __( 'Add New Package' ),
        'new_item'           => __( 'New package' ),
        'edit_item'          => __( 'Edit Package' ),
        'view_item'          => __( 'View Package'  ),
        'all_items'          => __( 'All Packages' ),
        'search_items'       => __( 'Search Packages' ),
        'parent_item_colon'  => __( 'Parent Package:' ),
        'not_found'          => __( 'No packages found.' ),
        'not_found_in_trash' => __( 'No packages found in Trash.' ),
        'archives'           => __( 'Package Archives' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'our-packages' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-money-alt',
        'supports'           => array( 'title'),
        'template_lock'      => 'all'
    );
    register_post_type( 'lily-packages', $args );

    // register Testimonials CPT
    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name'  ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name'  ),
        'menu_name'          => _x( 'Testimonials', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Testimonials', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Testimonial' ),
        'add_new_item'       => __( 'Add New Testimonial' ),
        'new_item'           => __( 'New Testimonial' ),
        'edit_item'          => __( 'Edit Testimonial' ),
        'view_item'          => __( 'View Testimonial'  ),
        'all_items'          => __( 'All Testimonials' ),
        'search_items'       => __( 'Search Testimonials' ),
        'parent_item_colon'  => __( 'Parent Testimonial:' ),
        'not_found'          => __( 'No Testimonials found.' ),
        'not_found_in_trash' => __( 'No Testimonials found in Trash.' ),
        'archives'           => __( 'Testimonial Archives' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'our-testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array( 'title'),
        'template_lock'      => 'all'
    );
    register_post_type( 'lily-testimonials', $args );
}
add_action( 'init', 'lily_register_custom_post_types' );


function lily_register_taxonomies(){
    //add Project Type taxonomy
    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Project Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Project Categories' ),
        'all_items'         => __( 'All Project Category' ),
        'parent_item'       => __( 'Parent Project Category' ),
        'parent_item_colon' => __( 'Parent Project Category:' ),
        'edit_item'         => __( 'Edit Project Category' ),
        'view_item'         => __( 'View Project Category' ),
        'update_item'       => __( 'Update Project Category' ),
        'add_new_item'      => __( 'Add New Project Category' ),
        'new_item_name'     => __( 'New Project Category Name' ),
        'menu_name'         => __( 'Project Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-types' ),
    );

    register_taxonomy( 'lily-project-type', array( 'lily-projects' ), $args );
}
add_action( 'init', 'lily_register_taxonomies');

function lily_rewrite_flush() {
    lily_register_custom_post_types();
    lily_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'lily_rewrite_flush' );