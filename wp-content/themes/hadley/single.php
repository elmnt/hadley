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

			<?php // Is it a CPT UI post, or just a standard post?

			// Get the standard WordPress post type
			// ( This will include all CPT UI post types )
			$mytype = get_post_type( get_the_ID() );

			// Get all Custom Post Type UI slugs (array)
			$cptui_types = cptui_get_post_type_slugs();

			// Is this post one of the CPT UI post types?
			if ( in_array( $mytype, $cptui_types ) ) {

				// Yes. Get the custom content partial.
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/h/content-single', $mytype );
					the_post_navigation();
				endwhile; // End of the loop.

			} else {

				// No. Get the generic content partial.
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
					the_post_navigation();
				endwhile; // End of the loop.

			}

			?>

		</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- /.col-8 -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
