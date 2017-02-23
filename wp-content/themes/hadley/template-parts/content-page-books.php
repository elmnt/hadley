<?php
/**
 * Template part for displaying the custom 'books' feed
 * @package hadley
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<p style="color:red;">/template-parts/content-books.php</p>

	<header class="entry-header">

		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">','</h1>' );
				echo '<p style="color:red;">single custom post</p>';
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				echo '<p style="color:red;">custom post feed</p>';
			}
		?>

	</header>

	<div class="entry-content">

		<div class="grid">

			<div class="col-4">
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('large'); ?></a>
				<?php endif; ?>
			</div><!-- /.col-4 -->

			<div class="col-8">

			<div class="meta__custom-holder">
				<p class="meta__custom"><span>Publish Date:</span> <?php echo get_post_meta($post->ID, 'Books: Publish Date', true); ?></p>
				<p class="meta__custom"><span>Publisher:</span> <?php echo get_post_meta($post->ID, 'Books: Publisher', true); ?></p>
			</div>

			<?php /* Check for either content or excerpt, and get the right one */ ?>
			<?php get_template_part( 'template-parts/content', 'content-excerpt' ); ?>

			<?php /* Generate a search link for Indie Bound */
			$thistitle = get_the_title();
			$fixtitle = str_replace(" ","+",$thistitle);
			$search_amazon = 'https://www.amazon.com/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords='.$fixtitle;
			$search_indie = 'http://www.indiebound.org/search/book?searchfor='.$fixtitle;
			?>

			<?php
			/*
			Removed the font-awesome library to optimize page speed
			<i class="fa fa-amazon" aria-hidden="true"></i>
			<i class="fa fa-book" aria-hidden="true"></i>
			*/
			?>
			<p>
			<a target="_blank" href="<?php echo $search_amazon; ?>">Buy on Amazon</a><br>
			<a target="_blank" href="<?php echo $search_indie; ?>">Search on Indie Bound</a>
			</p>

			</div><!-- /.col-8 -->

		</div><!-- /.grid -->

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
