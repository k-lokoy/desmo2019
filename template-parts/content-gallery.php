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
  
  <?php get_template_part( 'template-parts/entry', 'header' ); ?>

  <article class="entry-content">
    <?php
    $desmo2019_gallery = get_post_gallery();
    
    if ( !is_single() && $desmo2019_gallery ) {   
      
      echo $desmo2019_gallery;
    
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