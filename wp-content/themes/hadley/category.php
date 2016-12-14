<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hadley
 */

get_header(); ?>

<div class="container">
<div class="wrap">
<div class="grid">

<p>category.php</p>

<?php
/*
Get the category name, and set it to a variable.
Now we can use this one template to call all the various 
template-parts that hold the unique markup for each category.
*/
$categories = get_the_category();
$thecatvar = $categories[0]->cat_name;

/* Grab the sub-category name if we're in the Blog section */
foreach( $categories as $childcat) {
	if ( cat_is_ancestor_of(9, $childcat) ) {
		$thisChildCat = $childcat->cat_name;
	}
}
?>

	<div class="col-8">

		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<header class="page-header">
					
					<?php if( $thecatvar == 'Blog' ): ?>
					<h1 class="page-title title__category-page"><?php echo $thecatvar . ' / ' . $thisChildCat; ?></h1>
					<?php else: ?>
					<h1 class="page-title title__category-page"><?php echo $thecatvar; ?></h1>
					<?php endif; ?>

					<?php
						/* 
						We're getting the specific category with the get_the_category() function, 
						so we don't need to pull the 'archive' title like this:
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						But we'll still grab the category description (Found in Admin > Caegories > "Description")
						*/
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php /* Get an include to add a select menu to filter Blog subcategories */ ?>
				<?php 
				if( $thecatvar == 'Blog' ){
				include( plugin_dir_path( __FILE__ ) . 'inc/blog-filter.php'); 
				}
				?>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					/*
					Remove the generic call to post format template, 
					and get the template part based on the get_the_category() function. 
					Now we can use ONE category template to pull in different unique template parts.
					*/
					//get_template_part( 'template-parts/content', get_post_format() );
					get_template_part( 'template-parts/content', $thecatvar );

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
