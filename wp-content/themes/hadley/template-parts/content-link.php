<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hadley
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php

			/*
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			*/

			if ( is_single() ) {
				the_title( '<h1 class="entry-title title__post-link"><a href="' . get_post_meta($post->ID, 'Article Link', true) . '" rel="bookmark" target="_blank">', '&nbsp;&rarr;</a></h1>' );
			} else {
				the_title( '<h2 class="entry-title title__post-link"><a href="' . get_post_meta($post->ID, 'Article Link', true) . '" rel="bookmark" target="_blank">', '&nbsp;&rarr;</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<!-- Get the adjusted meta info, similar to the main articles feed
		<div class="entry-meta">
			<?php /*hadley_posted_on();*/ ?>
		</div>
		-->
		<?php endif; ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta articles__meta">
			<?php hadley_posted_on(); ?>
			<?php echo '&nbsp;&bull;&nbsp;' ?>
			<em><a href="<?php echo get_post_meta($post->ID, 'Article Source Link', true); ?>"><?php echo get_post_meta($post->ID, 'Article Source', true); ?></a></em>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php /* the excerpt */
		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hadley' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hadley' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
