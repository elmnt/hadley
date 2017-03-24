<?php
/**
 * Template part for displaying the custom 'articles' feed
 * @package hadley
 */
// Assign the ACF variables
if ( function_exists( 'get_field' ) ) {
	$pr_link          = get_field('press_link');
	$pr_source        = get_field('press_source');
	$pr_source_link   = get_field('press_source_link');
	$pr_date          = get_field('press_date');
	$pr_byline        = get_field('press_byline');
	$pr_byline_link   = get_field('press_byline_link');
	$pr_quote         = get_field('press_quote');
	$pr_excerpt       = get_field('press_excerpt');
	$pr_longer        = get_field('press_longer');
}
?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php // With a safety for disabled ACF plugin
			if( function_exists('get_field') ){
				// option for a print-only title (no link)
				if ( $pr_link ) {
					the_title( '<h3 class="entry-title"><a href="' . $pr_link . '" rel="bookmark">', ' &rarr;</a></h3>' );
				} else {
					// Print-only, so no off-site link. Get the normal WP title/link
					// the_title( '<h3 class="entry-title">', '</h3>' );
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				}
			} else {
				// ACF is off/disabled. Get the normal WP title/link
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}
		?>

	</header>

	<div class="entry-content">
		<div class="grid">

			<?php  // If there's a featured image, use a two-column layout. ?>
			<?php if ( has_post_thumbnail() ) : ?>

			<div class="col-5">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
			</div>

			<div class="col-7">

				<?php
				/*
				We're using this method to grab the additional template part
				because get_template_part( $slug, $name = null ) does not
				carry the variables into the included content.
				*/
				include( locate_template( 'template-parts/h/content-page-press-inc.php' )); ?>

			</div><!-- /.col-7 -->

			<?php else: // If no featured image, use a single column layout for the same content ?>

			<?php include( locate_template( 'template-parts/h/content-page-press-inc.php' )); ?>

			<?php endif; ?>

		</div><!-- /.grid -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
