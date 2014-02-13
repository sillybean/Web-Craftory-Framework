<?php
/**
 * Craftory Framework Theme Customizer
 *
 * @package Craftory Framework
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function craftory_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'craftory_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function craftory_customize_preview_js() {
	wp_enqueue_script( 'craftory_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'craftory_customize_preview_js' );


add_action( 'customize_register', 'craftory_customizer_sections' );
function craftory_customizer_sections( $wp_customize ) {

	$wp_customize->add_section( 'craftory_footer', array(
		'title' => 'Footer',
		'priority' => 105,
		'capability' => 'edit_pages',
	) );
 
	$wp_customize->add_setting( 'craftory_footer_text', array(
		'default' => '',
		'sanitize_callback' => 'craftory_sanitize_footer_text',
		'transport' => 'postMessage',
	) );
 
	$wp_customize->add_control( 'craftory_footer_text', array(
		'label' => 'Footer contact info',
		'section' => 'craftory_footer',
		'type' => 'text',
	) );

}

function craftory_sanitize_footer_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}