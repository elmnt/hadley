<?php
/**
 * The sidebar containing the main widget area
 * @package hadley
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-4">

  <aside id="secondary" class="widget-area" role="complementary">
  	<?php dynamic_sidebar( 'sidebar-1' ); ?>
  </aside><!-- #secondary -->

</div><!-- /.col-4 -->

</div><!-- /.grid -->
</div><!-- /.wrap -->
</div><!-- /.container -->
