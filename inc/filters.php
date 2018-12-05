<?php
/**
 * Various changes to wordpress functions
 *
 * @package desmo2019
 */


/**
 * Custom excerpt more
 *
 * @since 1.0.0
 * @version 1.0.0
 */
function desmo2019_excerpt_more( $more ) {
  if ( is_admin() ) return $more;

  return sprintf(
    '<a class="read-more-link" href="%1$s">%2$s<span class="screen-reader-text">%2$s</span></a>',
    esc_url( get_permalink( get_the_ID() ) ),
    __( 'Read more', 'desmo2019' )
  );
}
add_filter('excerpt_more', 'desmo2019_excerpt_more');

/**
 * Add classes to the body depending on customize settings
 *
 * @since 1.0.0
 * @version 1.0.0
 */
function desmo2019_body_class( $classes ) {

  if ( !is_home() && is_active_sidebar( 'right-sidebar' ) ) {
    $classes[]  = 'has-right-sidebar';
  }

  return $classes;

}
add_filter( 'body_class', 'desmo2019_body_class' );

/**
 * Add custom image sizes
 *
 * @since 1.0.1
 * @version 1.0.1
 */
function desmo2019_image_custom_sizes( $sizes ) {
  return array_merge( $sizes, array(
    'desmo2019-medium-square' => __( 'Medium square', 'desmo2019' ),
    'desmo2019-big-square'    => __( 'Big square', 'desmo2019' ),
  ) );
}
add_filter( 'image_size_names_choose', 'desmo2019_image_custom_sizes' );
?>