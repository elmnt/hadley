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

	</div>

	<?php
	// Podcast title and link
	if ( $pod_title ) {
		if ( $pod_link ) {
			echo '<h4 style="margin-bottom:.5rem;"><a href="'.$pod_link.'">'.$pod_title.'</a></h4>';
		} else {
			echo '<h4 style="margin-bottom:.5rem;">'.$pod_title.'</h4>';
		}
	}

	// Episode title and link
	echo '<h5><a href="'.get_permalink().'">#'.$pod_ep_number.': '.get_the_title().'</a></h5>';

	// Episode date (we have at least one - U.S. format or Euro format)
	if ( $pod_ep_date ) {
		if ( $pod_ep_date_euro == 'yes' ) {
			echo '<p>'.$pod_ep_date->format('j M Y').'</p>';
		} else {
			echo '<p>'.$pod_ep_date->format('M j, Y').'</p>';
		}
	}

	//echo '<p>'.$pod_ep_date_euro->format('j M Y').'</p>';

	// Episode Date and Duration
	/*
	echo '<p>'.$pod_ep_date.' '.$pod_ep_length.'</p>';
	echo '<p>'.$pod_ep_date->format('j M Y').'</p>';
	*/
	?>

	<?php // Check for excerpt or content & get the correct one
	get_template_part( 'template-parts/content', 'content-excerpt' ); ?>

<?php else: echo $GLOBALS[ 'noacf' ]; // Set in header.php ?>

<?php endif; ?>

<?php
/*
$pod_title        = get_field('podcast_title');
$pod_link         = get_field('podcast_link');
$pod_ep_number    = get_field('podcast_episode_number');
$pod_ep_link      = get_field('podcast_episode_link');
$pod_ep_date      = get_field('podcast_episode_date');
$pod_ep_date_euro = get_field('podcast_episode_date_euro');
$pod_ep_length    = get_field('podcast_episode_length');
*/
?>

<script type="text/javascript">
$( ".entry-content" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
</script>
