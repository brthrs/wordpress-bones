<?php
/**
 * Wordpress Bones functions and definitions
 *
 * If you're building a theme based on bones, use a find and replace
 * to change 'bones' to the name of your theme in all the template files.
 */

/*
 * Theme defaults and registered support for various WordPress features.
 */
function theme_setup() {

  // Make theme available for translation.
  //load_theme_textdomain( 'bones', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  //add_theme_support( 'automatic-feed-links' );

  // Disable support for Windows Live Writer.
  remove_action( 'wp_head', 'wlwmanifest_link' );

  // Disable the Really Simple Discovery service endpoint.
  remove_action( 'wp_head', 'rsd_link' );

  // Disable the Wordpress generator tag.
  remove_action( 'wp_head', 'wp_generator' );

  // Enable support for Post Thumbnails on posts and pages.
  add_theme_support( 'post-thumbnails' );

  /* Don't compress uploaded photos */
  function jpeg_full_quality( $quality ) {
    return 100;
  }
  add_filter( 'jpeg_quality', 'jpeg_full_quality' );

}
add_action( 'after_setup_theme', 'theme_setup' );


/*
 * Defining Navigation
 */
function add_navigation() {

  // Register our wp_nav_menu() in two locations.
  register_nav_menus( array(
    'navbar' => __( 'Navbar', 'bones' ),
    'navbar-right'  => __( 'Navbar Right', 'bones' ),
  ) );

  // Custom WordPress nav walker class to implement Bootstrap 3.0+ navigation style.
  require_once( get_stylesheet_directory() . '/vendor/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php' );

}
add_action( 'after_setup_theme', 'add_navigation' );


/*
 * Enqueue Styles & Javascripts
 */
function add_custom_scripts() {

  // Queue our own styles
  wp_enqueue_style( 'application', get_stylesheet_directory_uri() . '/assets/css/application.css' );

  // Deregister the defailt jQuery script
  wp_deregister_script( 'jquery' );

  // Queue our own scripts
  wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js' );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js' );
  wp_enqueue_script( 'application', get_template_directory_uri() . '/assets/js/application.js' );

}
add_action( 'wp_enqueue_scripts', 'add_custom_scripts' );

?>
