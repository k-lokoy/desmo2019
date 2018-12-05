<?php
/**
 * Theme functions and definitions
 *
 * @package desmo2019
 */

if ( !function_exists( 'desmo2019_setup' ) ) {
  /**
   * Set up theme defaults and registers support for various WordPress features
   *
   * @since  1.0.0
   * @version 1.0.0
   */
  function desmo2019_setup() {
    // Support for translation files
    // https://codex.wordpress.org/Function_Reference/load_theme_textdomain
    load_theme_textdomain( 'desmo2019', get_template_directory() . '/languages' );

    // Main content width
    // https://codex.wordpress.org/Content_Width
    if ( ! isset( $content_width ) ) $content_width = 1024;

    /* 
     * Register support for various WordPress features
     */
    
    // https://codex.wordpress.org/Automatic_Feed_Links
    add_theme_support( 'automatic-feed-links' );
    
    // https://codex.wordpress.org/Title_Tag
    add_theme_support( 'title-tag' );
    
    // https://codex.wordpress.org/Theme_Logo
    add_theme_support( 'custom-logo', array(
      'height'      => 100,
      'width'       => 400,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'site-title', 'site-tagline' ),
    ) );

    // https://codex.wordpress.org/Post_Thumbnails
    add_theme_support( 'post-thumbnails' );

    // https://codex.wordpress.org/Custom_Backgrounds
    add_theme_support( 'custom-background', array(
      'default-color'          => '222222',
      'default-image'          => '',
      'default-repeat'         => 'repeat',
      'default-position-x'     => 'left',
      'default-position-y'     => 'top',
      'default-size'           => 'auto',
      'default-attachment'     => 'scroll',
      'wp-head-callback'       => '_custom_background_cb',
      'admin-head-callback'    => '',
      'admin-preview-callback' => ''
    ) );

    // https://codex.wordpress.org/Theme_Markup
    add_theme_support( 'html5', array(
      'search-form', 
      'comment-form',
      'comment-list',
      'gallery', 
      'caption'
    ) );

    // https://codex.wordpress.org/Post_Formats
    add_theme_support( 'post-formats', array(
      'aside',
      'gallery',
      'link',
      'quote',
      'status',
      'video',
      'audio',
      'chat',
    ) );

    // https://codex.wordpress.org/Custom_Headers
    add_theme_support( 'custom-header', array(
      'default-image'      => '%s/assets/images/header.jpg',
      'default-text-color' => '000000',
      'random-default'     => false,
      'width'              => 1500,
      'height'             => 1000,
      'flex-height'        => false,
      'flex-width'         => false,
      'header-text'        => false,
      'uploads'            => true,
    ) );


    //https://developer.wordpress.org/reference/functions/add_image_size/
    add_image_size( 'desmo2019-featured-image', 1024, 500, true );

    // https://codex.wordpress.org/Function_Reference/register_default_headers
    register_default_headers( array(
      'header_image_name' => array(
        'url'           => '%s/assets/images/header.jpg',
        'thumbnail_url' => '%s/assets/images/header.jpg',
        'description'   => _x( 'Header Image', 'Header_image', 'desmo2019' )
      )
    ) );

    // Navigation
    register_nav_menus( array(
      'header' => __( 'Header', 'desmo2019' ),
      'footer' => __( 'Footer', 'desmo2019' ),
    ) );

    add_editor_style( array( 'editor-style.css' ) );
  }
  add_action( 'after_setup_theme', 'desmo2019_setup' );

}

// Scripts and styles
require_once get_template_directory() . '/inc/scripts.php';

// Widgets areas
require_once get_template_directory() . '/inc/widget-areas.php';

// Filters
require_once get_template_directory() . '/inc/filters.php';

// WP Customizer settings
require_once get_template_directory() . '/inc/customizer.php';