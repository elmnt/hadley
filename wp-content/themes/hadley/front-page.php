<?php
/**
 * The template for displaying a static front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hadley
 */

get_header('frontpage'); ?>

<div class="container">
<div class="wrap">
<div class="grid">

	<!-- <div class="single-column"> -->

		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

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

	<!-- </div>/.single-column -->

<?php /*get_sidebar();*/ ?>

<!-- add these closing tags since they're normally in the sidebar, which we've removed -->
</div><!-- /.grid -->
</div><!-- /.wrap -->
</div><!-- /.container -->

<?php get_footer(); ?>
