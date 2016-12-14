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

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta articles__meta">
			<?php hadley_posted_on(); ?>
			<?php echo '&nbsp;&bull;&nbsp;' ?>
			<em><a href="<?php echo get_post_meta($post->ID, 'Article Source Link', true); ?>"><?php echo get_post_meta($post->ID, 'Article Source', true); ?></a></em>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<!--
		<div class="meta__custom-holder">
			<p class="meta__custom mt1 mb0"><?php /*echo get_post_meta($post->ID, 'Article Source', true);*/ ?></p>
		</div>
		<p><?php /*echo get_post_meta($post->ID, 'Article Source', true);*/ ?></p>
		-->

		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title title__post-link"><a href="' . get_post_meta($post->ID, 'Article Link', true) . '" rel="bookmark" target="_blank">', '&nbsp;&rarr;</a></h1>' );
			} else {
				the_title( '<h2 class="entry-title title__post-link"><a href="' . get_post_meta($post->ID, 'Article Link', true) . '" rel="bookmark" target="_blank">', '&nbsp;&rarr;</a></h2>' );
			}
		?>

		<div class="meta__custom-holder">
			<p class="meta__custom"><span><a href="<?php echo get_permalink(); ?>" rel="bookmark">Permalink &infin;</a></span></p>
		</div>
	
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<?php /* Check for either content or excerpt, and get the right one */ ?>
		<?php /*get_template_part( 'template-parts/content', 'content-excerpt' );*/ ?>

		<?php /* the excerpt */

		the_content( sprintf(
			// translators: %s: Name of current post.
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
