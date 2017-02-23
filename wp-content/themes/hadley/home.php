<?php
/**
 * The template file for the home page
 * Not used while front-page.php exists
 * @package hadley
 */

get_header(); ?>

<div class="container">
<div class="wrap">
<div class="grid">

<p style="color:red;">home.php</p>

	<h1 class="page-title blog__title">Blog</h1>

	<div class="col-8">

		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php /* Get an include to add a select menu to filter Blog subcategories */ ?>
		<?php include( plugin_dir_path( __FILE__ ) . 'inc/blog-filter.php'); ?>

			<?php

			//query_posts('cat=9');

			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header class="page-header">
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- /.col-8 -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
