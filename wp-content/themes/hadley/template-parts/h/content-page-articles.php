<?php
/**
 * Template part for displaying the custom 'articles' feed
 * @package hadley
 */
?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/*
	Assign the ACF field variables, but first check that the
	plugin is active, so the whole site doesn't implode if it's not O_O
	*/
	if ( function_exists( 'get_field' ) ) {
		$a_link        = get_field('article_link');
		$a_date        = get_field('article_date');
		$a_source      = get_field('article_source');
		$a_source_link = get_field('article_source_link');
		$a_descr       = get_field('article_description');
	}
	?>

	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a href="'.$a_link.'" rel="bookmark">', ' &rarr;</a></h3>' ); ?>
	</header>

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
				include( locate_template( 'template-parts/h/content-page-articles-inc.php' )); ?>

			</div><!-- /.col-7 -->

			<?php else: // If no featured image, use a single column layout for the same content ?>

			<?php include( locate_template( 'template-parts/h/content-page-articles-inc.php' )); ?>

			<?php endif; ?>

		</div><!-- /.grid -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hadley_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
