<?php
/**
 * Template for displaying video content
 *
 * @package desmo2019
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php get_template_part( 'template-parts/entry', 'header' ); ?>

  <?php if ( get_the_post_thumbnail() !== '' ): ?>
    <a class="post-thumbnail" href="<?php the_permalink() ?>">
      <?php the_post_thumbnail( 'desmo2019-featured-image' ); ?>
    </a><!-- .post-thumbnail -->
  <?php endif; ?>

  <article class="entry-content">
    <?php 
    $desmo2019_video_content = apply_filters( 'the_content', get_the_content() );
    $desmo2019_video = false;

    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $desmo2019_video_content, 'wp-playlist-script' ) ) {
      $desmo2019_video = get_media_embedded_in_content( $desmo2019_video_content, array( 'video', 'object', 'embed', 'iframe' ) );
    }
    
    if ( !is_single() && !empty( $desmo2019_video ) ) {
      
      foreach ( $desmo2019_video as $desmo2019_video_html ) {
        echo $desmo2019_video_html;
      }

    } else {
      
      the_content();

      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'desmo2019' ),
        'after' => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after' => '</span>',
      ) );
    }
    ?>
  </article><!-- .entry-content -->

  <?php
  if ( is_single() ) {
    get_template_part('template-parts/entry', 'footer');
  } ?>
</section>