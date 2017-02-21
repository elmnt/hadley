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

<?php
/*
Get the category name, and set it to a variable.
Now we can use this one template to call all the various
template-parts that hold the unique markup for each category.
*/
$categories = get_the_category();
$thecatvar = $categories[0]->cat_name;
// echo '<p style="color:red;">'.$thecatvar.'</p>';

/*
If we're in a child category of the 'Blog' category, identify it,
and assign a variable, so we can display its title.
(The main 'Blog' category feed will use home.php, as per WP's template hierarchy).
*/
foreach( $categories as $childcat) {
	if ( cat_is_ancestor_of(9, $childcat) ) {
		$thisChildCat = $childcat->cat_name;
		// echo '<p style="color:red;">'.$thisChildCat.'</p>';
	}
}
?>

	<div class="col-8">

		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<header class="page-header">

					<?php
					/*
					If we're in a child category of the 'Blog' category, add the child cat's title
					(The main 'Blog' category feed will use home.php, as per WP's template hierarchy).
					*/
					?>
					<?php if( $thecatvar == 'Blog' ): ?>
					<h1 class="page-title title__category-page"><?php echo $thecatvar . ' / ' . $thisChildCat; ?></h1>
					<?php else: ?>
					<h1 class="page-title title__category-page"><?php echo $thecatvar; ?></h1>
					<?php endif; ?>

					<?php
					/*
					Get an include that will add buttons to filter the Blog child categories
					*/
					?>
					<?php
					if( $thecatvar == 'Blog' ){
					include( plugin_dir_path( __FILE__ ) . 'inc/blog-filter.php');
					}

					?>

					<?php
					/*
					We're getting the specific category with the get_the_category() function,
					so we don't need to pull the 'archive' title like this:
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					But we'll still grab the category description (Found in Admin > Caegories > "Description"),
					IF the user has entered it. If they've left it blank, nothing will show up.
					*/
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					Include the Post-Format-specific template for the content.
					If you want to override this in a child theme, then include a file
					called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					/*
					Remove the generic call to post format template:
					get_template_part( 'template-parts/content', get_post_format() );
					and, instead, get the template part based on the get_the_category() function.
					Now we can use this ONE category template to pull in different unique template parts.
					*/
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
