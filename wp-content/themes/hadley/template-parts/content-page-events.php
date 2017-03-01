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

			<?php
			/*
			Assign the ACF field variables, but first check that the
			plugin is active, so the whole site doesn't implode if it's not O_O
			*/
			if ( function_exists( 'get_field' ) ) {
				$e_date             = get_field('event_date');
				$e_time             = get_field('event_time');
				$e_location_address = get_field('event_location_address');
				$e_location_city    = get_field('event_location_city');
				$e_location_state   = get_field('event_location_state');
				$e_google_map_link  = get_field('event_google_map_link');
			}
			?>

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
					include( locate_template( 'template-parts/content-page-events-inc.php' )); ?>

				</div><!-- /.col-7 -->

			<?php else: // If no featured image, use a single column layout for the same content ?>

			<?php include( locate_template( 'template-parts/content-page-events-inc.php' )); ?>

			<?php endif; ?>

		</div><!-- /.grid -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
