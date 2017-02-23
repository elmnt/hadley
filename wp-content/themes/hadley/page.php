<?php
/**
 * The template for displaying all pages
 * @package hadley
 */

get_header(); ?>

<div class="container">
<div class="wrap">
<div class="grid">

<p style="color:red;">template: page.php</p>

	<div class="col-8">

		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/*
			Get the unique page ID.
			If it's a page assigned to hold custom posts, the ID will be our custom post type name.
			If it's just a normal page, then we'll just get the normal page ID.
			This will give us what we need for our custom WP_Query, to get the content partial for that custom post feed.
			Now we can use this one template to get all the content partials, no matter what kind of page it is. KABOOM.
			*/
			$pageid = get_page_uri( $page_id );
			echo '<p style="color:red;">page_id: '.$pageid.'</p>';

			/*
			Now create an array of all our post types. Since all of our custom post types will be in the array,
			we'll have array values that match page IDs, to single out our custom post types.
			Now we can check against the array, and get custom content partials for the custom post types,
			OR just get the normal content-page partial for normal pages. SHAZAM.
			*/
			$thetypes = get_post_types();

			if ( in_array( $pageid, $thetypes ) ) {
				// It's a custom post holder
				// WP_Query based on the id (our custom post type)
				$args = array(
					'post_type' => $pageid
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
					get_template_part( 'template-parts/content-page', $pageid );
				endwhile; endif; wp_reset_postdata(); // End of the loop.
			} else {
				// It's a normal page
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
			}

			/*
			// It's a normal page
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop
			*/

			?>

		</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- /.col-8 -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
