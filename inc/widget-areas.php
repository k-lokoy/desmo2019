<?php
/**
 * Widget areas
 *
 * @package desmo2019
 * @since  1.0.0
 * @version 1.0.0
 */

function desmo2019_widgets_init() {

  register_sidebar( array(
    'name'          => __( 'Right sidebar', 'desmo2019' ),
    'id'            => 'right-sidebar',
    'description'   => __( 'Widget area on the right side of the content', 'desmo2019' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'desmo2019_widgets_init' );