<?php
/**
 * Allow users to filter by child category in the Blog category
 * @package hadley
 */
?>
<div class="blog__categories">
   <h6>Blog Categories:</h6>

   <ul>
   <li><a href="/blog">Show All</a></li>
   <?php
   /* unordered list */
   $args = array (
       'title_li'           => __( '' ),
       'hide_empty'         => 0,
       'show_count'         => 0,
       'use_desc_for_title' => 1,
       'child_of'           => 9
   );
   wp_list_categories( $args );

   /* select menu
   $args = array(
      'show_option_all'   => '',
      'option_all_value'  => '',
      'show_option_none'  => '',
      'option_none_value' => '-1',
      'orderby'           => 'ID',
      'order'             => 'ASC',
      'show_count'        => 0,
      'hide_empty'        => 0,
      'child_of'          => 9,
      'exclude'           => '',
      'include'           => '',
      'echo'              => 1,
      'selected'          => 1,
      'hierarchical'      => 1,
      'name'              => 'cat',
      'id'                => '',
      'class'             => 'postform',
      'depth'             => 1,
      'tab_index'         => 0,
      'taxonomy'          => 'category',
      'hide_if_empty'     => true,
      'value_field'       => 'term_id'
   );
   wp_dropdown_categories( $args );
   */

   ?>
   <!--
   <script type="text/javascript">
      /*
      var dropdown = document.getElementById("cat");
      function onCatChange() {
         if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
            location.href = "<?php /*echo esc_url( home_url( '/' ) );*/ ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
         }
      }
      dropdown.onchange = onCatChange;
      */
   </script>
   -->

   </ul>
</div>
