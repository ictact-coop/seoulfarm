<?php
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    // wp_enqueue_style( 'child-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
    // wp_enqueue_script( 'child-style','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
