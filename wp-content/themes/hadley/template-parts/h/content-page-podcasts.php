<?php
/**
 * Template part for displaying the custom 'events' feed
 * @package hadley
 */
// Assign the ACF variables
if ( function_exists( 'get_field' ) ) {
	$pod_title        = get_field('podcast_title');
	$pod_ep_number    = get_field('podcast_episode_number');
	$pod_ep_link      = get_field('podcast_episode_link');
	$pod_ep_date      = get_field('podcast_episode_date', false, false);
	$pod_ep_date      = new DateTime($pod_ep_date);
	$pod_ep_date_euro = get_field('episode_date_euro');
	$pod_ep_length    = get_field('podcast_episode_length');
}
?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!--
	<header class="entry-header">
		<?php /*the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );*/ ?>
	</header>
	-->

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
				include( locate_template( 'template-parts/h/content-page-podcasts-inc.php' )); ?>

			</div><!-- /.col-7 -->

		<?php else: // If no featured image, use a single column layout for the same content ?>

		<?php include( locate_template( 'template-parts/h/content-page-podcasts-inc.php' )); ?>

		<?php endif; ?>

		</div><!-- /.grid -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
