<?php if( function_exists('get_field') ): // Safety for disabled ACF plugin ?>

	<?php
	// Podcast title and episode number
	if ( $pod_title ) {
		echo '<h4 class="podcast__showtitle">'.$pod_title.'</h4>';
	}
	if ( $pod_ep_number ) {
		echo '<h6 class="mt0 mbh">Episode #'.$pod_ep_number.'</h6>';
	}
	?>

	<?php the_title( '<h4 class="entry-title mt0"><a href="'.$pod_ep_link.'" rel="bookmark">', ' &rarr;</a></h4>' ); ?>

	<div class="post__meta-holder">

	<?php
		// Episode date (with optional Euro format)
		if ( $pod_ep_date ) {
			if ( $pod_ep_date_euro == 'yes' ) {
				echo '<p class="post__meta">'.$pod_ep_date->format('j M Y').'&nbsp;&nbsp;|&nbsp;&nbsp;'.$pod_ep_length.'</p>';
			} else {
				echo '<p class="post__meta">'.$pod_ep_date->format('M j, Y').'&nbsp;&nbsp;|&nbsp;&nbsp;'.$pod_ep_length.'</p>';
			}
		}
	?>

	<p class="post__permalink"><a href="<?php the_permalink(); ?>" rel="bookmark">Permalink &infin;</a></p>

	</div>

	<?php // Check for excerpt or content & get the correct one
	get_template_part( 'template-parts/content', 'content-excerpt' ); ?>

<?php else: echo $GLOBALS[ 'noacf' ]; // Set in header.php ?>

<?php endif; ?>

<script type="text/javascript">
$( ".entry-content" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
</script>
