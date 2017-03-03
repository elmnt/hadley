<?php if( function_exists('get_field') ): // Safety for disabled ACF plugin ?>

	<div class="post__meta-holder">

		<?php if ( $e_time ): // Did they include the time? Yes: ?>
			<p class="post__meta"><span>When:</span> <?php echo $e_date.' | '.$e_time; ?></p>
		<?php else: // No: ?>
			<p class="post__meta"><span>When:</span> <?php echo $e_date; ?></p>
		<?php endif; ?>

		<?php
		/*
		Some conditionals for the location:
		We're only requiring 'City,' but allowing for Street Address & State
		*/
		if ( $e_location_address && $e_location_state  ) {
			// Address, City, State
			echo '<p class="post__meta"><span>Where:</span> '.$e_location_address.', '.$e_location_city.', '.$e_location_state.'</p>';
		} elseif ( $e_location_address ) {
			// Address, City
			echo '<p class="post__meta"><span>Where:</span> '.$e_location_address.', '.$e_location_city.'</p>';
		} elseif ( $e_location_state ) {
			// City, State
			echo '<p class="post__meta"><span>Where:</span> '.$e_location_city.', '.$e_location_state.'</p>';
		} else {
			// City
			echo '<p class="post__meta"><span>Where:</span> '.$e_location_city.'</p>';
		}
		?>

		<?php
		// Did they include a Google Map link?
		if ( $e_google_map_link ) {
			echo '<p class="post__meta"><a href="'.$e_google_map_link.'">Google Maps Link</a></p>';
		}
		?>

	</div>

	<?php // Check for excerpt or content & get the correct one
	get_template_part( 'template-parts/content', 'content-excerpt' ); ?>

<?php else: echo $GLOBALS[ 'noacf' ]; // Set in header.php ?>

<?php endif; ?>
