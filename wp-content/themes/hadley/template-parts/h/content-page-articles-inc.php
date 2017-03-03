<?php if( function_exists('get_field') ): // Safety for disabled ACF plugin ?>

	<div class="post__meta-holder">
		<?php
		if( $a_date ){
			echo '<p class="post__meta"><span>Publish Date:</span> '.$a_date.'</p>';
		}
		?>
		<?php if( $a_source ): // Did they include a reference to the publisher's site? ?>
			<?php if( $a_source_link ): // Did they include a link to the publisher's site? ?>
				<p class="post__meta"><a href="<?php echo $a_source_link; ?>" target="_blank"><span>Source:</span> <em><?php echo $a_source; ?></em></a></p>
			<?php else: // No publisher's site link ?>
				<p class="post__meta"><span>Source:</span> <em><?php echo $a_source; ?></em></p>
			<?php endif; ?>
		<?php else: // No reference to the publisher's site ?>
		<?php endif; ?>
		<p class="post__permalink"><a href="<?php echo get_permalink(); ?>" rel="bookmark">Permalink &infin;</a></p>
	</div>

	<?php // The description
	if ( $a_descr ){
	    echo '<p>'.$a_descr.'</p>';
	}
	?>

<?php else: echo $GLOBALS[ 'noacf' ]; // Set in header.php ?>

<?php endif; ?>
