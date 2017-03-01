<?php
/**
 * The header for our theme
 * @package hadley
 */

/*
Displays a subtle message on the front-end, anywhere there is ACF content,
if the ACF plugin has been turned off. Normally we'd avoid showing any
kind of error message on the front-end, but if ACF has been turned off,
for any reason, we're loosing most of our content.
*/
$GLOBALS[ 'noacf' ] = '<p class="noacf">Please activate the <em>Advanced Custom Fields</em> plugin</p>';

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<style>
/* always show window width */
/*
#checkw {
  position: absolute;
  top: 5px;
  right: 5px;
  border: 1px solid red;
  background: yellow;
  color: red;
  padding: 10px 15px;
  z-index: 99999 !important;
  font-size: 13px;
  line-height: 1em;
}
*/
</style>

</head>

<body <?php body_class(); ?>>

<!-- <div id="checkw"></div> -->

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'hadley' ); ?></a>

	<header id="masthead" class="site-header header" role="banner">

	<div class="container--nav">
	<div class="wrap wrap--nav">
	<div class="grid">

		<div class="navmobile-trigger">
		<button class="hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="primary-menu" aria-expanded="false">
		  <span class="hamburger-box">
		    <span class="hamburger-inner"></span>
		  </span>
		</button>
		</div>

		<nav id="site-navigation" class="main-navigation navmain" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>

		<nav class="navmobile cf"></nav>

	</div><!-- /.grid -->
	</div><!-- /.wrap -->
	</div><!-- /.container -->

	<?php /* Get the optional 'Book Tour' button, as long as we're not on the Bio page */
  	if ( !is_page('bio') ) {
  		dynamic_sidebar( 'book-tour' );
  	}
	?>

	<div class="container--branding">
	<div class="wrap">
	<div class="grid">

		<div class="site-branding">

			<?php if ( is_front_page() && is_home() ) : ?>

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) {
					echo '<p class="site-description">'.$description.'</p>';
					/* WPCS: xss ok. */
				}
				?>

			<?php elseif ( is_page('bio') ) : ?>

				<?php
				/*
				The masthead image uses our secondary Featured Image from the Bio page,
				with the (REQUIRED) plugin multiple-post-thumbnails
				*/
				if (class_exists('MultiPostThumbnails')){
					$secondary_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(),'secondary-image');
				}
				?>
				<img src="<?php echo $secondary_image_url ?>" alt="<?php bloginfo( 'name' ); ?>">

			<?php else : ?>

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) {
					echo '<p class="site-description">'.$description.'</p>';
					/* WPCS: xss ok. */
				}
				?>

			<?php endif; ?>

		</div><!-- .site-branding -->

	</div>
	</div>
	</div><!-- /.container -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
