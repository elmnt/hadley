<?php
/**
 * Hadley Book Tour Button
 *
 * Widget to allow the user to show a "Book Tour" button on every page.
 * The button will link to a page titled "Book Tour" (book-tour)
 * Update this, so the page link (in the output) is dynamic.
 *
 * @package hadley
 */

class hbtb_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'hbtb_widget',
      __('Hadley Book Tour Button', 'hadley'), // Name
      array('description' => __('Displays a "Book Tour" button on every page', 'hadley'),)
    );
  }

  public function form($instance) {
    // the title
    isset($instance['title']) ? $title = $instance['title'] : null;
    empty($instance['title']) ? $title = 'Book Tour' : null;
    // the page link
    isset($instance['page_link']) ? $page_link = $instance['page_link'] : null;
    empty($instance['page_link']) ? $page_link = 'book-tour' : null;
    ?>
    <p>The default text on the button will be "Book Tour," but of course you have the option to change it. "My Book Tour," or "[the title] Book Tour," or anything you like, etc. KEEP IN MIND it's a button. So you don't want the text to be too long.</p>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Button Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <p>After you create your new 'Book Tour' page, enter the link to the page here. This will be the last part of the "Permalink," under the page title (not including the slashes). For instance, if your Permalink is http://www.mysite.com/book-tour/, the page link will be: book-tour.</p>
    <p>You'll see the default, in the field below, is 'book-tour.' So if you just name your new page 'Book Tour,' then you're all done. If you'd like to give it a <em>different</em> name, no biggie. You'll just need to enter the correct page below:</p>
    <p>
      <label for="<?php echo $this->get_field_id('page_link'); ?>"><?php _e('Page Link:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('page_link'); ?>" name="<?php echo $this->get_field_name('page_link'); ?>" type="text" value="<?php echo esc_attr($page_link); ?>">
    </p>
    <?php
  }

  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
    $instance['page_link'] = (!empty($new_instance['page_link']) ) ? strip_tags($new_instance['page_link']) : '';
    return $instance;
  }

  // Create widget front-end
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $page_link = apply_filters( 'widget_page_link', $instance['page_link'] );

    // Use a different button class for the home page & sub-pages
    if ( is_page('home') || is_page('bio') ) {
      echo __( '<div class="container--btbutton"><div class="wrap"><div class="grid center"><a id="booktour_button" href="/'. $page_link .'" class="button button--trans">'. $title .'</a></div></div></div>', 'hadley' );
        echo $args['after_widget'];
    } else {
      echo __( '<div class="container--btbutton"><div class="wrap"><div class="grid center"><a id="booktour_button" href="/'. $page_link .'" class="button">'. $title .'</a></div></div></div>', 'hadley' );
        echo $args['after_widget'];
    }

  }

}

// Register and load the widget
function hbtb_load_widget() {
  register_widget('hbtb_widget');
}
add_action('widgets_init', 'hbtb_load_widget');
