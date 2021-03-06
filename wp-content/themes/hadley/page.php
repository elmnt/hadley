<?php
/**
 * The template for displaying all pages
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
			/*
			Determine if it's a page template for one of the Custom Post Type UI
			collections ( books, articles, etc. ), or just a standard page.
			*/

			// Get the page ID
			$pageid = get_page_uri( $page_id );

			// Get all Custom Post Type UI slugs (array)
			$cptui_types = cptui_get_post_type_slugs();

			// Is this page ID one of the Custom Post Type UI post types?
			if ( in_array( $pageid, $cptui_types ) ) {

				// Yes. Run a custom query to grab that feed.
				// All template parts specific to Hadley's custom post types are in template-parts/h/
				$args = array(
					'post_type' => $pageid
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
					get_template_part( 'template-parts/h/content-page', $pageid );
				endwhile; endif; wp_reset_postdata(); // End of the loop.

			// No. It's a normal page.
			} else {

				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
			}

			?>

		</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- /.col-8 -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
