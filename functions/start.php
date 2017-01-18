<?php

//Use this file for wp menus, sidebars, image sizes, loadup scripts.



//enqueue scripts and styles *use production assets. Dev assets are located in  /css and /js
function loadup_scripts() {
	//wp_enqueue_script( 'theme-js', get_template_directory_uri().'/js/mesh.js', array('jquery'), '1.0.0', true );

    //Styles
    //wp_enqueue_style( 'MESH-style', get_stylesheet_uri() );
     wp_enqueue_style('MESH-style',get_stylesheet_directory_uri().'/sass.css');
    wp_enqueue_style('MESH-twentystyle',get_stylesheet_directory_uri().'/assets/css/twentytwenty.css');
    
    //wp_enqueue_style('MESH-justifystyle','//miromannino.github.io/Justified-Gallery/bower_components/justified-gallery/dist/css/justifiedGallery.css');

    //Scripts
    //wp_enqueue_script('MESH-salvattore','//cdnjs.cloudflare.com/ajax/libs/salvattore/1.0.9/salvattore.min.js',array('jquery'));
    wp_enqueue_script('MESH-masonry',get_stylesheet_directory_uri().'/assets/js/masonry.pkgd.min.js',array('jquery'));
    wp_enqueue_script('hammer',get_stylesheet_directory_uri().'/assets/js/jquery.hammer-full.js',array('jquery'));
    wp_enqueue_script('MESH-macy',get_stylesheet_directory_uri().'/assets/js/macy.min.js',array('jquery'));
    wp_enqueue_script('MESH-script',get_stylesheet_directory_uri().'/assets/js/script.js',array('jquery'));
    wp_enqueue_script('MESH-event-move',get_stylesheet_directory_uri().'/assets/js/jquery.event.move.js',array('jquery'));
    wp_enqueue_script('MESH-compare',get_stylesheet_directory_uri().'/assets/js/jquery.twentytwenty.js',array('jquery'));
     
    }
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

// Add Thumbnail Theme Support
add_theme_support('post-thumbnails');
add_image_size('background-fullscreen', 1800, 1200, true);
add_image_size('short-banner', 1800, 800, true);

add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

//Register WP Menus
register_nav_menus(
    array(
        'main_nav' => 'Header and breadcrumb trail heirarchy',
        'social_nav' => 'Social menu used throughout'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );









?>
