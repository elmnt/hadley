<?php
/**
 * Template part for displaying page content in front-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hadley
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php /*the_title( '<h1 class="entry-title">', '</h1>' );*/ ?>
		<!--<h3 class="front-page__title"><?php /*bloginfo( 'name' );*/ ?></h3>-->

		<?php
			/*
			$meta = get_post_meta( get_the_ID(), 'Home Page Intro' );
			if( !empty($meta) ) {
				echo '<p class="frontpage__lead">';
				echo $meta[0];
				echo '</p>';
				echo '<div class="center"><a href="/bio" class="button">Read My Full Bio</a></div>';
			} else {
				//the_title( '<h1 class="entry-title">', '</h1>' );
			}
			*/
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">

	  <div class="grid">
	    <div class="col-8">
	    	<?php the_content(); ?>
	    	<a href="/bio">Read My Full Bio &rarr;</a><!--<div class="center mb3"></div>-->
	    	<?php dynamic_sidebar( 'social-media-icons' ); ?>
	    </div>
	    <div class="col-4">
			<?php /* Get the same 'featured posts' menus as the sidebar */ ?>
			<?php dynamic_sidebar( 'home-featured' ); ?>
	    </div>
	  </div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hadley' ),
				'after'  => '</div>',
			));
		?>

	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>

		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'hadley' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->

	<?php endif; ?>
	
</article><!-- #post-## -->
