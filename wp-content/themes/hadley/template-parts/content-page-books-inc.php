<?php if( function_exists('get_field') ): // Safety for disabled ACF plugin ?>

	<div class="post__meta-holder">
		<p class="post__meta"><span>Publish Date:</span> <?php echo $b_published; ?></p>
		<?php // A link to the publisher's site is optional (not set as mandatory in ACF) ?>
		<?php if( $b_publisher_link ): // They included the link: ?>
			<p class="post__meta"><span>Publisher:</span> <a href="<?php echo $b_publisher_link; ?>" target="_blank"><?php echo $b_publisher; ?></a></p>
		<?php else: // They didn't include the link: ?>
			<p class="post__meta"><span>Publisher:</span> <?php echo $b_publisher; ?></p>
		<?php endif; ?>
	</div>

<?php else: echo $GLOBALS[ 'noacf' ]; // Set in header.php ?>
<?php endif; ?>

<?php // Check for excerpt or content & get the correct one
get_template_part( 'template-parts/content', 'content-excerpt' ); ?>

<?php
/*
Get the (optional) Amazon button (the last ACF), with the same safety conditional.
Don't add the error message. If the condition fails, we're already showing it (above)
*/
if( function_exists('get_field') && $b_amazon_link != '' ) {
	echo '<a target="_blank" href="'.$b_amazon_link.'" class="button button--small">Buy on Amazon</a>';
}
?>

<?php // Include the (optional) link to the author's book information ON the publisher's site
if( function_exists('get_field') && $b_publisher_link != '' ) {
	echo '<p class="mt1">Find <em><a target="_blank" href="'.$b_publisher_link.'">'.get_the_title().'</a></em> featured on my publisher\'s site.</p>';
}
?>
