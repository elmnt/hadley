<?php
/**
 * hadley Theme Customizer.
 *
 * @package hadley
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hadley_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'hadley_customize_register' );


/*

function my_customize_register( $wp_customize ) {
  $wp_customize->add_panel();
  $wp_customize->get_panel();
  $wp_customize->remove_panel();
 
  $wp_customize->add_section();
  $wp_customize->get_section();
  $wp_customize->remove_section();
 
  $wp_customize->add_setting();
  $wp_customize->get_setting();
  $wp_customize->remove_setting();
 
  $wp_customize->add_control();
  $wp_customize->get_control();
  $wp_customize->remove_control();
}

$wp_customize->add_setting( 'setting_id', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'theme_supports' => '', // Rarely needed.
  'default' => '',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
));

*/


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hadley_customize_preview_js() {
	wp_enqueue_script( 'hadley_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hadley_customize_preview_js' );
