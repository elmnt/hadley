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

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php hadley_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php /* Option 1: If we have a featured image: */ ?>
		<?php if ( has_post_thumbnail() ) : ?>
		
		<div class="grid">

			<div class="col-4">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('large'); ?></a>
			</div>

			<div class="col-8">
				
			<?php /* Check for either content or excerpt, and get the right one */ ?>
			<?php get_template_part( 'template-parts/content', 'content-excerpt' ); ?>

			</div>
			
		</div><!-- /.grid -->
		
		<?php /* Option 2: If we do NOT have a featured image: */ ?>
		<?php else : ?>
		<div class="grid">
			<!-- block -->
			<?php /* the content/excerpt */
			/* If there's an excerpt, get it: */
			if($post->post_excerpt){
				the_excerpt( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hadley' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				));
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hadley' ),
					'after'  => '</div>',
				));
			}
			/* If not, get the content: */
			else {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hadley' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				));
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hadley' ),
					'after'  => '</div>',
				));
			}
			?>
			<p><a href="<?php the_permalink(); ?>">Read more</a></p>
			<!-- /block -->
		</div><!-- /.grid -->
		<?php endif; /* if ( has_post_thumbnail() */ ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
