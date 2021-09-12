<?php 
/* Post Type: Custom Post Type Function. */
function custom_post_type_custompost() {

    $labels = array(
        'name'                => _x( 'Custom post name', 'Post Type General Name', 'wp-bootstrap-starter' ),
        'singular_name'       => _x( 'Single custom post name', 'Post Type Singular Name', 'wp-bootstrap-starter' ),

    );
    $args = array(
        'label'               => __( 'custompostlabel', 'wp-bootstrap-starter' ),
        'description'         => __( 'Custom Post Description', 'wp-bootstrap-starter' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'category','post_tag' ),
        'public'      => true,
        'has_archive' => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-cart',
    );
    register_post_type( 'custompostslug', $args );
    
 
} 
add_action( 'init', 'custom_post_type_custompost');
