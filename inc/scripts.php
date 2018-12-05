<?php
/**
 * Scripts, styles and fonts
 *
 * @package desmo2019
 * @since 1.0.0
 * @version 1.0.0
 */
function desmo2019_scripts() {

  // Theme stylesheet
  wp_enqueue_style( 'desmo2019-style', get_stylesheet_uri() );

  // Fonts from google
  wp_enqueue_style( 'desmo2019-fonts', 'https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i', array(), null);

  // Theme JavaScript
  wp_enqueue_script( 'desmo2019-script', get_template_directory_uri() . '/assets/js/functions.js', false, wp_get_theme()->get('Version'), true );

  // Comment-reply script
  if ( !is_admin() && is_singular() && comments_open() && get_option('thread_comments') ) {
    wp_enqueue_script( 'comment-reply' );
  }

  // Custom styles
  $options = [
    '#' . get_background_color(),
    get_theme_mod( 'color_text',   '#F4EDE7' ),
    get_theme_mod( 'color_anchor', '#9ACEC3' ),
    get_theme_mod( 'color_border', '#F4EDE7' ),
  ];

  $css = '
    :root {
      --color-bg: %1$s; 
      --color-text: %2$s;
      --color-anchor: %3$s;
      --color-border: %4$s;
    }
  ';
  
  wp_add_inline_style( 'desmo2019-style', vsprintf( $css, $options ) );

}
add_action( 'wp_enqueue_scripts', 'desmo2019_scripts' );