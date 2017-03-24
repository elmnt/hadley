<?php
/**
 * Template part for displaying the custom 'books' feed
 * @package hadley
 */
// Assign the ACF variables
if ( function_exists( 'get_field' ) ) {
	$b_published      = get_field('book_published');
	$b_publisher      = get_field('book_publisher');
	$b_publisher_link = get_field('book_publisher_link');
	$b_publisher_book = get_field('book_publisher_book');
	$b_amazon_link    = get_field('book_amazon_link');
}
?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header>

	<div class="entry-content">
		<div class="grid">

		<?php  // If there's a featured image, use a two-column layout ?>
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
				include( locate_template( 'template-parts/h/content-page-books-inc.php' )); ?>

			</div><!-- /.col-7 -->

		<?php else: // If no featured image, use a single column layout for the same content ?>

		<?php include( locate_template( 'template-parts/h/content-page-books-inc.php' )); ?>

		<?php endif; ?>

		</div><!-- /.grid -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
