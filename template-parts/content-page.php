<?php
/**
 * Template for displaying content on pages
 *
 * @package desmo2019
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="page-header">
    <div class="entry-meta">
      <?php
      edit_post_link(
        sprintf(
          '%1$s<span class="screen-reader-text">%1$s "%2$s"</span>',
          __( 'Edit', 'desmo2019' ),
          get_the_title()
        )
      );
      ?>
    </div><!-- .entry-meta -->

    <?php the_title( '<h1>', '</h1>' ); ?>
  </header><!-- .entry-header -->
  
  <article class="entry-content">
    <?php 
    the_content();

    wp_link_pages( array(
      'before' => '<div class="page-links">' . __( 'Pages:', 'desmo2019' ),
      'after' => '</div>',
      'link_before' => '<span class="page-number">',
      'link_after' => '</span>',
    ) );
    ?>
  </article><!-- .entry-content -->
</section>