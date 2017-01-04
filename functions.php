<?php
function ares_child_enqueue_styles() {

    $parent_style = 'ares-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    
    //optionsframework-css
    
}
add_action( 'wp_enqueue_scripts', 'ares_child_enqueue_styles' );

function ares_child_eqnueue_admin_styles($hook){
	
	
	wp_enqueue_style( 'optionsframework',  get_stylesheet_directory_uri() . '/inc/css/optionsframework.css', array(),wp_get_theme()->get('Version') );

}

add_action( 'admin_enqueue_scripts', 'ares_child_eqnueue_admin_styles' );

require_once dirname(__FILE__) . '/inc/engine/avenue.php';
require_once dirname(__FILE__) . '/merakii.php';
