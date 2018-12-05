<?php
/**
 * Template for displaying search results
 *
 * @package desmo2019
 * @since 1.0.0
 * @version 1.0.0
 */
?>

<?php get_header(); ?>

<main id="site-main" role="main">
  
  <header class="page-header">
    <?php
    if ( have_posts() ) {
      printf(
        '<h1>' . __( 'Search results for: %s', 'desmo2019' ) . '</h1>',
        '<span>' . esc_html( get_search_query() ) . '</span>'
      );
    } else {
      printf(
        '<h1>' . __( 'Nothing found', 'desmo2019' ) . '</h1>'
      );
    }
    ?>
  </header>

  <?php
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      get_template_part( 'template-parts/content', 'excerpt');
    }

    the_posts_pagination( array(
      'prev_text' => __( 'Prev', 'desmo2019' ) . '<span class="screen-reader-text">' . __( 'Previous page', 'desmo2019' ) . '</span>',
      'next_text' => __( 'Next', 'desmo2019' ) . '<span class="screen-reader-text">' . __( 'Next page', 'desmo2019' ) . '</span>',
      'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'desmo2019' ) . '</span>'
    ) );
  
  } else {
    
    get_template_part( 'template-parts/content', 'none');
  
  }
  ?>
</main><!-- #site-main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>