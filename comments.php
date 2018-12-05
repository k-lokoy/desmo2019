<?php
/**
 * Template for displaying comments
 *
 * @package desmo2019
 * @since 1.0.0
 * @version  1.0.0
 */
?>

<?php if ( post_password_required() ) return; ?>

<div id="comments" class="comments-area">
  
  <h3 class="comments-title">
    
    <?php
    $desmo2019_comments_number = get_comments_number();

    printf(
      _nx(
        '%1$s thought on &ldquo;%2$s&rdquo;',
        '%1$s thoughts on &ldquo;%2$s&rdquo;',
        $desmo2019_comments_number,
        'comments title',
        'desmo2019'
      ),
      number_format_i18n( $desmo2019_comments_number ),
      get_the_title()
    );
    ?>

  </h3><!-- #comments-title -->

  <?php
  the_comments_navigation( array(
    'prev_text'  =>  __( 'Older comments', 'desmo2019' ) . '<span class="screen-reader-text">' . __( 'Older comments', 'desmo2019' ) . '</span>',
    'next_text'  =>  __( 'Newer comments', 'desmo2019' ) . '<span class="screen-reader-text">' . __( 'Newer comments', 'desmo2019' ) . '</span>',
  ) );
  ?>

  <ol class="comment-list">
    
    <?php
    wp_list_comments( array(
      'style'       => 'ol',
      'short_ping'  => true,
      'avatar_size' => 60,
    ) );
    ?>

  </ol><!-- .comment-list -->

  <?php
  comment_form( array(
    'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
    'title_reply_after'  => '</h2>',
  ) );
  ?>

</div><!-- #comments .comments-area -->