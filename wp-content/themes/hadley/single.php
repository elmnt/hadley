<?php
/**
 * The template for displaying all single posts
 * @package hadley
 */

get_header(); ?>

<div class="container">
<div class="wrap">
<div class="grid">

	<div class="col-8">

		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

			// Get the post type
			$postid = get_post_type();

			if ( in_array( $postid, $thetypes ) && $postid != 'post' ) {

				// It's a custom post type single post
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-single', 'custom' );
					the_post_navigation();
				endwhile; // End of the loop.

			} else {

				// It's a (generic) single post
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-single' );
				endwhile; // End of the loop.

			}

			?>

		</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- /.col-8 -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
