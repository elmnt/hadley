			<?php
			/* If there's an excerpt, get it: */
			if($post->post_excerpt){

				the_excerpt( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hadley' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				));

				/* 
				Add a 'Continue reading' link after the excerpt, 
				but not if it's in the articles category 
				*/
				if( !is_category( 'articles' ) ){
					echo '<p><a href="';
					echo the_permalink();
					echo '">Continue reading &rarr;</a></p>';
				}

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hadley' ),
					'after'  => '</div>',
				));

			}
			/* If not, get the content: */
			else {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hadley' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				));
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hadley' ),
					'after'  => '</div>',
				));
			}
			?>
