<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hadley
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
		
		<div class="entry-meta">
			<?php hadley_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>

		<?php
			if( is_search() ){
			echo '<p><a href="';
			echo the_permalink();
			echo '">Continue reading &rarr;</a></p>';
		}
		?>

	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php /*hadley_entry_footer();*/ ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
