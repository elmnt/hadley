<?php
/**
 * hadley functions and definitions.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package hadley
 */


if ( ! function_exists( 'hadley_setup' ) ) :

function hadley_setup() {

	// Add support for post-formats
	add_theme_support( 'post-formats', array('link', 'audio', 'video') );
	add_post_type_support( 'post', 'post-formats' );

	// Make theme available for translation.
	load_theme_textdomain( 'hadley', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	/*
	 * Enable multiple-post-thumbnails plugin
	 * to display our header image on the Bio page
	 */
	if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(
		  array(
		    'label' => 'Bio Header Photo',
		    'id' => 'secondary-image',
		    'post_type' => 'page'
		  )
		);
	}

	// wp_nav_menu()
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'hadley' ),
	) );

	/*
	 * Switch default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// WordPress core custom background feature.
	// Turned off (don't want the user to change the background color)
	/*
	add_theme_support( 'custom-background', apply_filters( 'hadley_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	*/

}
endif;
add_action( 'after_setup_theme', 'hadley_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
/* Why is this still here in 2017?
function hadley_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hadley_content_width', 640 );
}
add_action( 'after_setup_theme', 'hadley_content_width', 0 );
*/


/*
Don't want this turned on for now:
add_action( 'init', 'cd_add_editor_styles' );
*/
/**
 * Apply theme's stylesheet to the visual editor.
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
/*
function cd_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}
*/


/**
 * Register widget area.
 */
function hadley_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hadley' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hadley' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	// create a widget for social icons
	register_sidebar( array(
		'name'          => esc_html__( 'Hadley Social Media Icons', 'hadley' ),
		'id'            => 'social-media-icons',
		'description'   => esc_html__( 'Add the "Hadley Social Media Icons" widget here, to display your social media links on every page, just above the footer (and above the search bar, if you have chosen to use the "Hadley Footer Search Box."). Enter your social media links in the form fields below. Any that you leave blank will be ignored.', 'hadley' ),
		'before_widget' => '<div class="container--social"><div class="wrap"><div class="grid"><section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section></div></div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	// create a widget for the search box, so we can move it around and turn it on/off
	register_sidebar( array(
		'name'          => esc_html__( 'Hadley Footer Search Box', 'hadley' ),
		'id'            => 'search-box',
		'description'   => esc_html__( 'Add the "Search" widget here to display a search bar just above the site footer. Note: If you choose to display it here, you will probably want to make sure it is not in the sidebar, to avoid being redundant!', 'hadley' ),
		'before_widget' => '<div class="container--search"><div class="wrap"><div class="grid"><section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section></div></div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	// create a widget to show some featured posts on the home page (front-page.php)
	register_sidebar( array(
		'name'          => esc_html__( 'Hadley Home Page Featured Posts', 'hadley' ),
		'id'            => 'home-featured',
		'description'   => esc_html__( 'This will display some featured (most recent) articles on the home page. To activate this, drag an instance of the "Custom Menu" widget, on the left, and select a menu to display. Note: You will have to set up the custom menus first, in Appearance > Menus. If you already set them up for use in the sidebar, they will be ready for you to select.', 'hadley' ),
		'before_widget' => '<div class="frontpage__featured"><section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section></div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	));

	// create a widget for the "Book Tour" button, so we can turn it on/off
	register_sidebar( array(
		'name'          => esc_html__( 'Hadley Book Tour Button', 'hadley' ),
		'id'            => 'book-tour',
		'description'   => esc_html__( "To activate this widget, and turn on the 'Book Tour' button, drag the 'Book Tour Button' widget (on the left) into this field, and click 'Save'." , "hadley" ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));

}
add_action( 'widgets_init', 'hadley_widgets_init' );


/**
 * Add some new custom image sizes
 */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'new-size-s', 150, 300 );
	add_image_size( 'new-size-m', 300, 600 );
	add_image_size( 'new-size-l', 600, 900 );
}
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
	$addsizes = array(
	"new-size-s" => __( "HadleySmall"),
	"new-size-m" => __( "HadleyMedium"),
	"new-size-l" => __( "HadleyLarge")
);
$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}


/**
 * Add filter to remove the 'Tag:' text on tag archives
 */
add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}
	return $title;
});


/**
 * Enqueue scripts and styles.
 */
function hadley_scripts() {

	// main styles
	wp_enqueue_style( 'hadley-style', get_stylesheet_uri() );

	// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer )

	// load jQuery
	wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', false, '1.12.4', true);
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'hadley-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// misc hadley settings
	wp_enqueue_script( 'hadleysettings', get_template_directory_uri() . '/js/hadley-settings.js', array(), '001', true );

	// fontawesome - Not shipping with v1.0.0 - Keep it light
	// wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/86e1502599.js', false, '1.6.24', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Conditional load
	// if ( is_page( 'Page' ) ) {
	//   wp_enqueue_script('script-name');
	// }

}
add_action( 'wp_enqueue_scripts', 'hadley_scripts' );


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';

// User can add a custom 'Book Tour' button
require get_template_directory() . '/inc/hadley-book-tour-button.php';

// User bio info showing in the sidebar
require get_template_directory() . '/inc/hadley-sidebar-bio.php';

// Add social media links
require get_template_directory() . '/inc/hadley-social-icons.php';
