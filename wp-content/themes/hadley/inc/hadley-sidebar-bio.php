<?php
/**
 * Hadley Sidebar Bio
 *
 * Simple widget to get Bio photo (The Bio page Featured Image) & author's name into the sidebar
 *
 * @package hadley
 */

class hsb_widget extends WP_Widget {

    function __construct() {
      parent::__construct(
        'hsb_widget',
        __('Hadley Sidebar Bio', 'hadley'),
        array( 'description' => __( 'Displays Author Bio in the Sidebar', 'hadley' ), )
      );
    }

    public function widget( $args, $instance ) {

      /* We don't need a title element
      $title = apply_filters( 'widget_title', $instance['title'] );
      */
      $author_name = apply_filters( 'widget_author_name', $instance['author_name'] );

      echo $args['before_widget'];

      echo '<div class="widget-wrapper widget__hsb">';
      echo '<figure>';

      // Get the tumbnail from the Bio page
      query_posts('pagename=bio');
      if (have_posts()) : 
        while (have_posts()) : the_post(); 
          echo the_post_thumbnail();
        endwhile;
      endif; 
      wp_reset_query();

      echo '<figcaption>';

      if ( ! empty( $author_name ) )
          echo '<p>' . $author_name . '</p>';

      echo '</figcaption>';
      echo '</figure>';
      echo '</div>';

      echo $args['after_widget'];

    }

    // Widget Backend
    public function form( $instance ) {

      if ( isset( $instance[ 'author_name' ] ) ) {
          $author_name = $instance[ 'author_name' ];
      }
      else {
          $author_name = __( 'Enter your name here.', 'hadley' );
      }

      // Widget admin form
      ?>
      <p>When in use, this widget will take the "Featured Image" from your Bio page, and place it in your sidebar. Enter your name in the field below, as you'd like it to appear under the photo.</p>
      <p>
      <label for="<?php echo $this->get_field_id( 'author_name' ); ?>"><?php _e( 'Your Name:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'author_name' ); ?>" name="<?php echo $this->get_field_name( 'author_name' ); ?>" type="text" value="<?php echo esc_attr( $author_name ); ?>" />
      </p>
    <?php

    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
      $instance = array();
      $instance['author_name'] = ( ! empty( $new_instance['author_name'] ) ) ? strip_tags( $new_instance['author_name'] ) : '';
      return $instance;
    }

}

// Register and load the widget
function hsb_load_widget() {
  register_widget( 'hsb_widget' );
}
add_action( 'widgets_init', 'hsb_load_widget' );

