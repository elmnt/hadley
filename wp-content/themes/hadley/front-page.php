<?php
/**
 * The template for displaying a static front page.
 * @package hadley
 */

get_header('frontpage'); ?>

<div class="container">
<div class="wrap">
<div class="grid">

	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		/*
		We're hiding the overlay text on the front-page image,
		in the header, on mobile, and showing it here.
		*/
		?>
		<div class="site-branding--mobile">
			<?php /*if ( is_front_page() && is_home() ):*/ ?>
			<?php if ( is_front_page() ): ?>
				<h1 class="site-title--mobile"><?php bloginfo( 'name' ); ?></h1>
			<?php else : ?>
				<h4 class="site-title--mobile"><?php bloginfo( 'name' ); ?></h4>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description--mobile"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- /.site-branding--mobile -->

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'front-page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
	</div><!-- #primary -->

<?php /*get_sidebar();*/ ?>

<?php /* Add these closing tags since they're normally in the sidebar, which we've removed. */ ?>
</div><!-- /.grid -->
</div><!-- /.wrap -->
</div><!-- /.container -->

<?php get_footer(); ?>
