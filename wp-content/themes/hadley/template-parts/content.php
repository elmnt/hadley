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
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>

		<?php
		/*
		Get the category name, and set it to a variable.
		Now we can customize this template based on category.
		*/
		$categories = get_the_category();
		$thecatvar = strtolower($categories[0]->cat_name);
		?>

		<?php if ( 'post' === get_post_type() && $thecatvar != 'books' ) : ?>
		<div class="entry-meta">
			<?php hadley_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php if ( $thecatvar == 'books' ): ?>
			<div class="meta__custom-holder">
				<p class="meta__custom"><span>Publish Date:</span> <?php echo get_post_meta($post->ID, 'Books: Publish Date', true); ?></p>
				<p class="meta__custom"><span>Publisher:</span> <?php echo get_post_meta($post->ID, 'Books: Publisher', true); ?></p>
			</div>
			<!--
			<div class="books__featuredimg">
			<?php /*the_post_thumbnail();*/ ?>
			</div>
			-->
		<?php endif; ?>

		<?php
		/*
		Since this is the partial used for single content AND the blog (category) feed,
		we need the following conditional. If it's a single page, show the content.
		Or, if it's the blog (category) feed, get the content-excerpt partial.
		*/
		?>
		<?php if ( is_single() ) {
				the_content( sprintf(
					// translators: %s: Name of current post.
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hadley' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hadley' ),
					'after'  => '</div>',
				) );
			} else {
				get_template_part( 'template-parts/content', 'content-excerpt' );
			}
		?>

		<?php /* Check for either content or excerpt, and get the right one */ ?>
		<?php /*get_template_part( 'template-parts/content', 'content-excerpt' );*/ ?>

		<?php
		/*
		the_content( sprintf(
			// translators: %s: Name of current post.
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hadley' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hadley' ),
			'after'  => '</div>',
		) );
		*/
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
