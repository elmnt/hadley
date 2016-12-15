<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hadley
 */


// echo esc_url( get_template_directory_uri() )

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i|Open+Sans:600" rel="stylesheet">

<?php wp_head(); ?>

<style>
/* always show window width
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

		<?php /* main-navigation is core WordPress navigation class */ ?>
		<nav id="site-navigation" class="main-navigation navmain" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			<?php /* wp_nav_menu( array( 'theme_location' => 'primary', 'link_before' => '<span>', 'link_after' => '</span>' ) ); */ ?>
		</nav>

		<nav class="navmobile cf"></nav>

		<!-- <img class="header__searchicon" src="<?php /*echo esc_url( get_template_directory_uri() );*/ ?>/images/search-icon.svg" onerror="this.src='<?php /*echo esc_url( get_template_directory_uri() );*/ ?>/images/search-icon.png'"> -->

	</div><!-- /.grid -->
	</div><!-- /.wrap -->
	</div><!-- /.container -->
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">

	<div class="container--full">
	<div class="wrap--front-page">

		<?php /* Show the optional 'Book Tour' button */ ?>
		<?php dynamic_sidebar( 'book-tour' ); ?>

		<?php /* If the Header Image was added in the Customizer */ ?>
		<?php if ( get_header_image() ): ?>
		<img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>">
		<?php else: ?>
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/unsplash-1400x700-3.jpg" alt="<?php bloginfo( 'name' ); ?>">
		<?php endif; ?>
		
		<?php /* Hide this on mobile, mobile version is in front-page.php */ ?>
		<div class="site-branding">
			<?php /*if ( is_front_page() && is_home() ):*/ ?>
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
			<?php else : ?>
				<p class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><span><?php echo $description; /* WPCS: xss ok. */ ?></span></p>
			<?php
			endif; ?>
		</div><!-- /.site-branding -->

	</div><!-- /.wrap--front-page -->
	</div><!-- /.container--branding -->
