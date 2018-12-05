<?php
/**
 * Template for displaying entry footers
 *
 * @package desmo2019
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<footer class="entry-footer">
  <?php
  $desmo2019_tags_list = get_the_tag_list();
  if ( $desmo2019_tags_list ) : ?>
    <div class="post-tags"><?php echo $desmo2019_tags_list; ?></div><!-- .post-tags -->
  <?php endif; ?>


  <?php
  the_post_navigation( array(
    'prev_text' => 
      '<span class="screen-reader-text">' . __( 'Previous post', 'desmo2019' ) . '</span>
       <span>' . __( 'Previous', 'desmo2019' ) . '</span>
       <span>%title</span>',
    'next_text' => 
      '<span class="screen-reader-text">' . __( 'Next post', 'desmo2019' ) . '</span>
       <span>' . __( 'Next', 'desmo2019' ) . '</span>
       <span>%title</span>',
  ) );
  ?>
</footer><!-- .entry-footer -->