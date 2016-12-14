<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hadley
 */

?>

<?php
/* Get the user name
$user_info = get_userdata(1);
$fn = $user_info->first_name;
$ln = $user_info->last_name;
echo '<h1 class="entry-title">'.$fn.' '.$ln.'</h1>';
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php
		/*
		Turn off the normal page title, and use a conditional 
		that allows us to pull the user's name into the Bio page
		*/
		?>
		<?php /*the_title( '<h1 class="entry-title">', '</h1>' );*/ ?>

		<?php if ( !is_page('bio') ): ?>
			<h1><?php the_title(); ?></h1>
		<?php else: ?>
			<h1><?php bloginfo( 'name' ); ?></h1>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hadley' ),
				'after'  => '</div>',
			) );
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
