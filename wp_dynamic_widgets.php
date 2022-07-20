<?php 

  $sidebars = array(
            array( 'name' => __( 'General Sidebar', 'dokan-theme' ), 'id' => 'sidebar-1' ),
            array( 'name' => __( 'Home Sidebar', 'dokan-theme' ), 'id' => 'sidebar-home' ),
            array( 'name' => __( 'Blog Sidebar', 'dokan-theme' ), 'id' => 'sidebar-blog' ),
            array( 'name' => __( 'Header Sidebar', 'dokan-theme' ), 'id' => 'sidebar-header' ),
            array( 'name' => __( 'Shop Archive', 'dokan-theme' ), 'id' => 'sidebar-shop' ),
            array( 'name' => __( 'Single Product', 'dokan-theme' ), 'id' => 'sidebar-single-product' ),
            array( 'name' => __( 'Footer Sidebar - 1', 'dokan-theme' ), 'id' => 'footer-1' ),
            array( 'name' => __( 'Footer Sidebar - 2', 'dokan-theme' ), 'id' => 'footer-2' ),
            array( 'name' => __( 'Footer Sidebar - 3', 'dokan-theme' ), 'id' => 'footer-3' ),
            array( 'name' => __( 'Footer Sidebar - 4', 'dokan-theme' ), 'id' => 'footer-4' ),
            array( 'name' => __( 'Footer Sidebar - 5 (App Images)', 'dokan-theme' ), 'id' => 'footer-5' ),
            array( 'name' => __( 'Footer Sidebar - 6 (Social media)', 'dokan-theme' ), 'id' => 'footer-6' ),
        );

        $args = apply_filters( 'dokan_widget_args', array(
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        foreach ( $sidebars as $sidebar ) {

            $args['name'] = $sidebar['name'];
            $args['id'] = $sidebar['id'];

            register_sidebar( $args );
        }
