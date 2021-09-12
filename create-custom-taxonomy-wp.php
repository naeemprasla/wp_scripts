<?php 
$labels = array(
    'name'                => _x( 'Custom Taxonomy name', 'Post Type General Name', 'wp-bootstrap-starter' ),
    'singular_name'       => _x( 'Single Taxonomy name', 'Post Type Singular Name', 'wp-bootstrap-starter' ),

);
register_taxonomy(
    'topics', // Taxonomy name
    array('post'), //On Which Post You Want Custom Taxonomy
    array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 
            'slug' => 'topic' // Taxonomy Slug
        )
)
);