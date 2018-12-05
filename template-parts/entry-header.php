<?php
/**
 * Template for displaying entry headers
 *
 * @package desmo2019
 * @since 1.0.0
 * @version 1.0.0
 */
?>
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
    $desmo2019_categories_list = get_the_category_list( ', ' );
    if ( $desmo2019_categories_list && !is_archive() ): ?>
      <div class="post-categories-container">
        <?php echo $desmo2019_categories_list; ?>
      </div><!-- .post-categories-container -->
    <?php endif; ?>

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

  <?php
  if ( is_single() ) {
    printf(
      '<h1>%s</h1>',
      get_the_title() === '' ? __( 'Untitled post', 'desmo2019' ) : get_the_title()
    );
  } else {
    printf(
      '<h3><a href="%2$s">%1$s</a></h3>',
      get_the_title() === '' ? __( 'Untitled post', 'desmo2019' ) : get_the_title(), 
      esc_url( get_permalink() )
    );
  }
  ?>
</header><!-- .entry-header -->