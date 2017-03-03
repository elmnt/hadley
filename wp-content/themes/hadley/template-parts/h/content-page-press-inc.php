<?php if( function_exists('get_field') ): // Safety for disabled ACF plugin ?>

	<div class="post__meta-holder">
		<?php
		if( $pr_source_link ){ // Did they include a link to the publisher's site?
			echo '<p class="post__meta"><span>Source:</span> <a href="'.$pr_source_link.'" target="_blank"><em>'.$pr_source.'</em></a></p>';
		} else { // No link
			echo '<p class="post__meta"><span>Source:</span> <em>'.$pr_source.'</em></p>';
		}
		// Byline (with optional link to author's content on source site)
		if( $pr_byline_link ){
			echo '<p class="post__meta">WRITTEN BY: <a href="'.$pr_byline_link.'" target="_blank">'.$pr_byline.'</a></p>';
		} else { // No link
			echo '<p class="post__meta">WRITTEN BY: '.$pr_byline.'</p>';
		}
		// Publication date
		if( $pr_date ){
			echo '<p class="post__meta"><span>Publish Date:</span> '.$pr_date.'</p>';
		}
		// If there's a Source Link, then it's basically a link post (with off-site link). Get the Permalink.
		// If there's no Source Link, the assumption is that a print-only piece is being referenced. Now it's just a standard post.
		if ( $pr_source_link ){
			echo '<p class="post__permalink"><a href="'.get_permalink().'" rel="bookmark">Permalink &infin;</a></p>';
		}
		?>
	</div>

	<?php // An optional quote
	if ( $pr_quote ){
		echo '<blockquote><p><span>&ldquo;</span> '.$pr_quote.'<span>&rdquo;</span></p><p>'.$pr_byline.'</p></blockquote>';
	}
	?>

	<?php // An optional (shorter) comment
	if ( $pr_excerpt ){
		echo '<p>'.$pr_excerpt.'</p>';
		if ( $pr_longer ) { // Did they include 'Write something longer'?
			echo '<p><a href="'.get_permalink().'">Continue Reading &rarr;</a></p>';
		}
	}
	?>

	<?php // The (optional) longer comment is in the single partial ?>

<?php else: echo $GLOBALS[ 'noacf' ]; // Set in header.php ?>

<?php endif; ?>
