<?php
/**
 * Template for displaying landing page (home)
 *
 * @package desmo2019
 * @since 1.0.0
 * @version 1.0.0
 */
?>

<?php get_header(); ?>

<main id="site-main" role="main">

  <div id="site-branding">
    <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>">
      <?php bloginfo( 'name' ); ?>
    </a><!-- .site-title -->

    <?php if ( function_exists( 'the_custom_logo' ) ) the_custom_logo(); ?>

    <div id="dog">
      <span class="dog-line"></span>
      <img src="<?php echo get_template_directory_uri() . '/assets/images/dog.svg'; ?>" />
      <span class="dog-line"></span>
    </div>

    <span class="site-tagline">
      <?php bloginfo( 'description' ); ?>
    </span><!-- .site-tagline -->
  </div><!-- #site-branding -->

</main><!-- #site-main -->

<?php get_footer(); ?>