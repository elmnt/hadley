<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package hadley
 */

get_header(); ?>

<div class="container">
<div class="wrap">
<div class="grid">

<p>search.php</p>

	<div class="col-8">

		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<header class="page-header">
					<h3 class="page-title"><?php printf( esc_html__( 'You searched for: %s', 'hadley' ), '<span><em>' . get_search_query() . '</em></span>' ); ?></h3>
					<!--<h3><?php /*printf( get_search_query() );*/ ?></h3>-->
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

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
