<?php
/**
 * Template part for displaying the custom 'events' feed
 * @package hadley
 */
?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header>

	<div class="entry-content">
		<div class="grid">

			<?php // Get our ACF field variables for this page
			$published      = get_field('book_published');
			$publisher      = get_field('book_publisher');
			$publisher_link = get_field('book_publisher_link');
			$publisher_book = get_field('book_publisher_book');
			$amazon_link    = get_field('book_amazon_link');
			?>

			<?php
			/*
			If there's a featured image, use a two-column layout.
			We could just allow the user to float (right/left align) the image,
			but this is a cleaner layout, and will look better on multiple screen sizes.
			*/
			?>
			<?php if ( has_post_thumbnail() ) : ?>

				<div class="col-4">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
				</div>

				<div class="col-8">

					<?php // Get the post content ?>
					<?php get_template_part( 'template-parts/content', 'page-events-inc' ); ?>

				</div><!-- /.col-8 -->

			<?php else: // If no featured image, use a single column layout ?>

				<?php // Get the post content ?>
				<?php get_template_part( 'template-parts/content', 'page-events-inc' ); ?>

			<?php endif; ?>

		</div><!-- /.grid -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
