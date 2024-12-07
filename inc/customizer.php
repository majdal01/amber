<?php
/**
 * Amber Theme Customizer
 *
 * @package Amber
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function amber_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'amber_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'amber_customize_partial_blogdescription',
			)
		);
	}

	// Customizable header content. Copilot helped me with this.

	// Add section for header content
    $wp_customize->add_section( 'amber_header_content' , array(
        'title'      => __( 'Header Content', 'amber' ),
        'priority'   => 30,
    ) );

    // Add setting for header h1
    $wp_customize->add_setting( 'amber_header_h1' , array(
        'default'   => __( 'Welcome to My Site', 'amber' ),
        'transport' => 'refresh',
    ) );

    // Add control for header h1
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_header_h1', array(
        'label'      => __( 'Header H1', 'amber' ),
        'section'    => 'amber_header_content',
        'settings'   => 'amber_header_h1',
    ) ) );

    // Add setting for header paragraph
    $wp_customize->add_setting( 'amber_header_p' , array(
        'default'   => __( 'This is a customizable paragraph.', 'amber' ),
        'transport' => 'refresh',
    ) );

    // Add control for header paragraph
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_header_p', array(
        'label'      => __( 'Header Paragraph', 'amber' ),
        'section'    => 'amber_header_content',
        'settings'   => 'amber_header_p',
    ) ) );

    // Add setting for header button text
    $wp_customize->add_setting( 'amber_header_button_text' , array(
        'default'   => __( 'Click Me', 'amber' ),
        'transport' => 'refresh',
    ) );

    // Add control for header button text
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_header_button_text', array(
        'label'      => __( 'Header Button Text', 'amber' ),
        'section'    => 'amber_header_content',
        'settings'   => 'amber_header_button_text',
    ) ) );

    // Add setting for header button URL
    $wp_customize->add_setting( 'amber_header_button_url' , array(
        'default'   => '#',
        'transport' => 'refresh',
    ) );

    // Add control for header button URL
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_header_button_url', array(
        'label'      => __( 'Header Button URL', 'amber' ),
        'section'    => 'amber_header_content',
        'settings'   => 'amber_header_button_url',
    ) ) );
}

add_action( 'customize_register', 'amber_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function amber_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function amber_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amber_customize_preview_js() {
	wp_enqueue_script( 'amber-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'amber_customize_preview_js' );
