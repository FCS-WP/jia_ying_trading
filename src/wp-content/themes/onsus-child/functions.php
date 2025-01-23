<?php
if ( ! function_exists( 'onsus_child_enqueue_child_styles' ) ) {
	function onsus_child_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'onsus-theme-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'onsus-theme-style' );
	    // loading child style
	    wp_register_style(
	      'onsus-child-theme-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'onsus-child-theme-style');
	 }
}
add_action( 'wp_enqueue_scripts', 'onsus_child_enqueue_child_styles' );

add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
/*
 * Define Variables
 */
if (!defined('THEME_DIR'))
    define('THEME_DIR', get_template_directory());
if (!defined('THEME_URL'))
    define('THEME_URL', get_template_directory_uri());


/*
 * Include framework files
 */
foreach (glob(THEME_DIR.'-child' . "/includes/*.php") as $file_name) {
    require_once ( $file_name );
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);




