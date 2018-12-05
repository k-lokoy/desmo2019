<?php
/**
 * Template for displaying content
 *
 * @package desmo2019
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php get_template_part('template-parts/entry', 'header'); ?>

  <?php if ( get_the_post_thumbnail() !== '' ): ?>
    <a class="post-thumbnail" href="<?php the_permalink() ?>">
      <?php the_post_thumbnail( 'desmo2019-featured-image' ); ?>
    </a><!-- .post-thumbnail -->
  <?php endif; ?>

  <article class="entry-content">
    <?php the_excerpt(); ?>
  </article><!-- .entry-content -->

</section>