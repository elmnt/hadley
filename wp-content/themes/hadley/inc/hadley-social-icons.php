<?php
/**
 * Hadley Social Media Icons
 *
 * Widget to show social media icons
 *
 * @package hadley
 */

class hsmi_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'hsmi_widget',
      __('Hadley Social Media Icons', 'hadley'), // Name
      array('description' => __('Links to Author social media profiles', 'hadley'),)
    );
  }

  public function form($instance) {
    // the title
    isset($instance['title']) ? $title = $instance['title'] : null;
    empty($instance['title']) ? $title = 'Elsewhere' : null;
    // social icon options
    isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
    isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
    isset($instance['instagram']) ? $instagram = $instance['instagram'] : null;
    isset($instance['google']) ? $google = $instance['google'] : null;
    isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
    isset($instance['pinterest']) ? $pinterest = $instance['pinterest'] : null;
    isset($instance['tumblr']) ? $tumblr = $instance['tumblr'] : null;
    isset($instance['youtube']) ? $youtube = $instance['youtube'] : null;
    isset($instance['reddit']) ? $reddit = $instance['reddit'] : null;
    isset($instance['flickr']) ? $flickr = $instance['flickr'] : null;
    isset($instance['vine']) ? $vine = $instance['vine'] : null;
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e('Tumblr:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('reddit'); ?>"><?php _e('Reddit:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('reddit'); ?>" name="<?php echo $this->get_field_name('reddit'); ?>" type="text" value="<?php echo esc_attr($reddit); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_attr($flickr); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('vine'); ?>"><?php _e('Vine:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('vine'); ?>" name="<?php echo $this->get_field_name('vine'); ?>" type="text" value="<?php echo esc_attr($vine); ?>">
    </p>
    <?php
  }

  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
    $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
    $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
    $instance['instagram'] = (!empty($new_instance['instagram']) ) ? strip_tags($new_instance['instagram']) : '';
    $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
    $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : '';
    $instance['pinterest'] = (!empty($new_instance['pinterest']) ) ? strip_tags($new_instance['pinterest']) : '';
    $instance['tumblr'] = (!empty($new_instance['tumblr']) ) ? strip_tags($new_instance['tumblr']) : '';
    $instance['youtube'] = (!empty($new_instance['youtube']) ) ? strip_tags($new_instance['youtube']) : '';
    $instance['reddit'] = (!empty($new_instance['reddit']) ) ? strip_tags($new_instance['reddit']) : '';
    $instance['flickr'] = (!empty($new_instance['flickr']) ) ? strip_tags($new_instance['flickr']) : '';
    $instance['vine'] = (!empty($new_instance['vine']) ) ? strip_tags($new_instance['vine']) : '';
    return $instance;
  }

  public function widget($args, $instance) {

    $title = apply_filters('widget_title', $instance['title']);
    $facebook = $instance['facebook'];
    $twitter = $instance['twitter'];
    $instagram = $instance['instagram'];
    $google = $instance['google'];
    $linkedin = $instance['linkedin'];
    $pinterest = $instance['pinterest'];
    $tumblr = $instance['tumblr'];
    $youtube = $instance['youtube'];
    $reddit = $instance['reddit'];
    $flickr = $instance['flickr'];
    $vine = $instance['vine'];

    // social profile link
    /* WITH (removed) font-awesome icons
    $facebook_profile = '<li><a class="facebook" href="' . $facebook . '"><i class="fa fa-facebook"></i></a></li>';
    $twitter_profile  = '<li><a class="twitter" href="' . $twitter . '"><i class="fa fa-twitter"></i></a></li>';
    $instagram_profile   = '<li><a class="instagram" href="' . $instagram . '"><i class="fa fa-instagram"></i></a></li>';
    $google_profile   = '<li><a class="google" href="' . $google . '"><i class="fa fa-google-plus"></i></a></li>';
    $linkedin_profile = '<li><a class="linkedin" href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a></li>';
    $pinterest_profile = '<li><a class="pinterest" href="' . $pinterest . '"><i class="fa fa-pinterest"></i></a></li>';
    $tumblr_profile = '<li><a class="tumblr" href="' . $tumblr . '"><i class="fa fa-tumblr"></i></a></li>';
    $youtube_profile = '<li><a class="youtube" href="' . $youtube . '"><i class="fa fa-youtube"></i></a></li>';
    $reddit_profile = '<li><a class="reddit" href="' . $reddit . '"><i class="fa fa-reddit"></i></a></li>';
    $flickr_profile = '<li><a class="flickr" href="' . $flickr . '"><i class="fa fa-flickr"></i></a></li>';
    $vine_profile = '<li><a class="vine" href="' . $vine . '"><i class="fa fa-vine"></i></a></li>';
    */

    $facebook_profile = '<li><a class="facebook" href="' . $facebook . '">Facebook</a></li>';
    $twitter_profile  = '<li><a class="twitter" href="' . $twitter . '">Twitter</a></li>';
    $instagram_profile   = '<li><a class="instagram" href="' . $instagram . '">Instagram</a></li>';
    $google_profile   = '<li><a class="google" href="' . $google . '">Google Plus</a></li>';
    $linkedin_profile = '<li><a class="linkedin" href="' . $linkedin . '">LinkedIn</a></li>';
    $pinterest_profile = '<li><a class="pinterest" href="' . $pinterest . '">Pinterest</a></li>';
    $tumblr_profile = '<li><a class="tumblr" href="' . $tumblr . '">Tumblr</a></li>';
    $youtube_profile = '<li><a class="youtube" href="' . $youtube . '">YouTube</a></li>';
    $reddit_profile = '<li><a class="reddit" href="' . $reddit . '">Reddit</a></li>';
    $flickr_profile = '<li><a class="flickr" href="' . $flickr . '">Flickr</a></li>';
    $vine_profile = '<li><a class="vine" href="' . $vine . '">Vine</a></li>';

    echo $args['before_widget'];
    if (!empty($title)) {
      echo $args['before_title'] . $title . $args['after_title'];
    }

    echo '<div class="hadley-social">';
    echo '<ul>';
    echo (!empty($facebook) ) ? $facebook_profile : null;
    echo (!empty($twitter) ) ? $twitter_profile : null;
    echo (!empty($instagram) ) ? $instagram_profile : null;
    echo (!empty($google) ) ? $google_profile : null;
    echo (!empty($linkedin) ) ? $linkedin_profile : null;
    echo (!empty($pinterest) ) ? $pinterest_profile : null;
    echo (!empty($tumblr) ) ? $tumblr_profile : null;
    echo (!empty($youtube) ) ? $youtube_profile : null;
    echo (!empty($reddit) ) ? $reddit_profile : null;
    echo (!empty($flickr) ) ? $flickr_profile : null;
    echo (!empty($vine) ) ? $vine_profile : null;
    echo '</ul>';
    echo '</div>';
    echo $args['after_widget'];
  }

}

// Register and load the widget
function hsmi_load_widget() {
  register_widget('hsmi_widget');
}
add_action('widgets_init', 'hsmi_load_widget');
