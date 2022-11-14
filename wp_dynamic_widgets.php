<?php 

  $sidebars = array(
            array( 'name' => __( 'General Sidebar', 'theme' ), 'id' => 'sidebar-1' ),
            array( 'name' => __( 'Home Sidebar', 'theme' ), 'id' => 'sidebar-home' ),
            array( 'name' => __( 'Blog Sidebar', 'theme' ), 'id' => 'sidebar-blog' ),
            array( 'name' => __( 'Header Sidebar', 'theme' ), 'id' => 'sidebar-header' ),
            array( 'name' => __( 'Footer Sidebar - 1', 'theme' ), 'id' => 'footer-1' ),
            array( 'name' => __( 'Footer Sidebar - 2', 'theme' ), 'id' => 'footer-2' ),
            array( 'name' => __( 'Footer Sidebar - 3', 'theme' ), 'id' => 'footer-3' ),
            array( 'name' => __( 'Footer Sidebar - 4', 'theme' ), 'id' => 'footer-4' ),
        );

        $args = apply_filters( 'theme_widget_args', array(
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
