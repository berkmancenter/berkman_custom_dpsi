<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>

			<div class="site-info">
          <?php wp_nav_menu( array(
            'theme_location' => 'footer',
          ) ); ?>
        <a href="http://cyber.law.harvard.edu"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="Berkman Center for Internet &amp; Society at Harvard University"  /></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
  <script>
    jQuery(function($) {
      $(document).ready( function() {
        //enabling stickUp on the '.navbar-wrapper' class
        jQuery('#navbar').stickUp();
      });
    });
  </script>
</body>
</html>
