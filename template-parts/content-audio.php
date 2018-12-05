<?php
/**
 * Template for displaying audio content
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
    $desmo2019_audio_content = apply_filters( 'the_content', get_the_content() );
    $desmo2019_audio = false;

    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $desmo2019_audio_content, 'wp-playlist-script' ) ) {
      $desmo2019_audio = get_media_embedded_in_content( $desmo2019_audio_content, array( 'audio' ) );
    }

    if ( !is_single() && !empty( $desmo2019_audio ) ) {
      
      foreach ( $desmo2019_audio as $desmo2019_audio_html ) {
        echo $desmo2019_audio_html;
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