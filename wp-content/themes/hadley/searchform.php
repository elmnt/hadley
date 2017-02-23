<?php
/**
 * Template for displaying search forms
 * @package hadley
 */
?><form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'hadley' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search This Site', 'placeholder', 'hadley' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'hadley' ); ?></span>Submit</button>
</form>
