<?php
/**
 * Template for displaying quote content
 *
 * @package desmo2019
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php if ( is_single() ): ?>

    <?php get_template_part( 'template-parts/entry', 'header' ); ?>

  <?php else: ?>

    <header class="entry-header">
      <div class="entry-meta">
        <?php
        printf(
          '<span><a href="%1$s">%2$s</a></span>',
          esc_url( get_permalink() ),
          get_the_date()
        );
        ?>

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
    </header><!-- .entry-header -->
  <?php endif; ?> 

  <?php if ( get_the_post_thumbnail() !== '' ): ?>
    <a class="post-thumbnail" href="<?php the_permalink() ?>">
      <?php the_post_thumbnail( 'desmo2019-featured-image' ); ?>
    </a><!-- .post-thumbnail -->
  <?php endif; ?>

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

  <?php
  if ( is_single() ) {
    get_template_part('template-parts/entry', 'footer');
  } ?>
</section>