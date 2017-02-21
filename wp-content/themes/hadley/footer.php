<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 * @package hadley
 */
?>

  <?php
  /*
  If the social media widget is active, and IF we're not on the home page,
  then show it here. We're placing it in a different position on the home page.
  */
  ?>
  <?php
  if( !is_front_page() ) {
    dynamic_sidebar( 'social-media-icons' );
  }
  ?>

  <?php /* If the search box widget is active, show it here */ ?>
  <?php dynamic_sidebar( 'search-box' ); ?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

    <div class="container--footer">
    <div class="wrap">
    <div class="grid">

  		<div class="site-info">
  			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'hadley' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'hadley' ), 'WordPress' ); ?></a>
  			<!-- <span class="sep"> | </span> -->
        <br>
        <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'hadley' ), 'Hadley', '<a href="http://elmnt.com" rel="designer">elmnt</a>' ); ?>
  		</div><!-- .site-info -->

      <div class="center mb1 scrollanchor">
        <?php /* Removed font-awesome library for better page speed <i class="fa fa-arrow-circle-up" aria-hidden="true"></i> */ ?>
        <a href="#top" class="button button--trans center">Return to Top</a>
      </div>

    </div><!-- /.grid -->
    </div><!-- /.wrap -->
    </div><!-- /.container -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<?php
/*
Don't show the 'Home' link on the front page.
Update this to use a CSS-only solution.
*/
?>
<?php if( is_front_page() ) { ?>
<style>
  .main-navigation .menu .page-item-69 {
  display: none;
}
</style>
<?php } ?>

</body>
</html>
