<?php
/**
 * Template part for displaying the custom 'books' feed post content
 * The extensive conditionals just make sure the markup won't show
 * if the user has neglected to fill in the ACF fields.
 * @package hadley
 */
?>
<?php if( $published || $publisher ): // If we have this ACF content, display it ?>

	<div class="post__meta-holder">
		<?php if( $published ): ?>
		<p class="post__meta"><span>Publish Date:</span> <?php echo $published; ?></p>
		<?php endif; ?>
		<?php if( $publisher ): ?>
		<p class="post__meta"><span>Publisher:</span> <?php echo $publisher; ?></p>
		<?php endif; ?>
	</div>

<?php else: // no ?>
<?php endif; ?>

<?php // If they've used the excerpt, get it. If not, get the content ?>
<?php get_template_part( 'template-parts/content', 'content-excerpt' ); ?>

<a target="_blank" href="<?php echo $amazon_link; ?>" class="button button--small">Buy on Amazon</a>
