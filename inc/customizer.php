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



    //***********************************************************/
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



    //***********************************************************/
    // Section til forside ikoner. Jeg har fået hjælp af Copilot til at lave denne del.

    $wp_customize->add_section( 'amber_front_page_icons' , array(
        'title'      => __( 'Front Page icons and text', 'amber' ),
        'priority'   => 30,
    ) );

    // Define the default icons array
    $default_icons = array(
        'fas fa-palette',
        'fas fa-paintbrush',
        'fas fa-tablet-screen-button'
    );

    for ( $i = 1; $i <= 3; $i++ ) {
        // Icon setting
        $wp_customize->add_setting( "amber_icon_$i" , array(
            'default'   => $default_icons[$i - 1], // Forskellige default ikoner
            'transport' => 'refresh',
        ) );

        // Icon control
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "amber_icon_$i", array(
            'label'      => __( "Icon $i", 'amber' ),
            'section'    => 'amber_front_page_icons',
            'settings'   => "amber_icon_$i",
        ) ) );

        // Text setting
        $wp_customize->add_setting( "amber_icon_text_$i" , array(
            'default'   => 'Your skills', // Default text
            'transport' => 'refresh',
        ) );

        // Text control
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "amber_icon_text_$i", array(
            'label'      => __( "Text $i", 'amber' ),
            'section'    => 'amber_front_page_icons',
            'settings'   => "amber_icon_text_$i",
        ) ) );
    
            // Color setting
        $wp_customize->add_setting( "amber_icon_color_$i" , array(
            'default'   => '#000000', // Default color
            'transport' => 'refresh',
        ) );

        // Color control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "amber_icon_color_$i", array(
            'label'      => __( "Icon Color $i", 'amber' ),
            'section'    => 'amber_front_page_icons',
            'settings'   => "amber_icon_color_$i",
        ) ) );
    }

    //***********************************************************/
    // Section til small-gallery på forsiden. 

        // Tilføjet mulighed for at redigere i small-gallery
        $wp_customize->add_section( 'amber_small_gallery' , array(
            'title'      => __( 'Small Gallery layout', 'amber' ),
            'priority'   => 30,
        ) );

        // Color ændring af container background color
        $wp_customize->add_setting( 'amber_small_gallery_container_bg_color' , array(
            'default'   => '#ffffff', // Default color
            'transport' => 'refresh',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_container_bg_color', array(
            'label'      => __( 'Container Background Color', 'amber' ),
            'section'    => 'amber_small_gallery',
            'settings'   => 'amber_small_gallery_container_bg_color',
        ) ) );
    
        // Redigere small gallery box
        $wp_customize->add_setting( 'amber_small_gallery_color' , array(
            'default'   => '#F0D8BE', // Default color
            'transport' => 'refresh',
        ) );
        
        // Redigere color small gallery box
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_color', array(
            'label'      => __( 'Box Background Color', 'amber' ),
            'section'    => 'amber_small_gallery',
            'settings'   => 'amber_small_gallery_color',
        ) ) );
        
        //Redigere small gallery box h2, p og a

        //H2
        $wp_customize->add_setting( 'amber_small_gallery_h2' , array(
            'default'   => __( 'Small gallery', 'amber' ),
            'transport' => 'refresh',
        ) );
        
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_small_gallery_h2', array(
            'label'      => __( 'Box Heading', 'amber' ),
            'section'    => 'amber_small_gallery',
            'settings'   => 'amber_small_gallery_h2',
        ) ) );

        $wp_customize->add_setting( 'amber_small_gallery_h2_color' , array(
            'default'   => '#000000', // Default color
            'transport' => 'refresh',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_h2_color', array(
            'label'      => __( 'Heading Color', 'amber' ),
            'section'    => 'amber_small_gallery',
            'settings'   => 'amber_small_gallery_h2_color',
        ) ) );
        

        //p
        $wp_customize->add_setting( 'amber_small_gallery_p' , array(
            'default'   => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'amber' ),
            'transport' => 'refresh',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_small_gallery_p', array(
            'label'      => __( 'Box Paragraph', 'amber' ),
            'section'    => 'amber_small_gallery',
            'settings'   => 'amber_small_gallery_p',
        ) ) );
    
        $wp_customize->add_setting( 'amber_small_gallery_p_color' , array(
            'default'   => '#000000', // Default color
            'transport' => 'refresh',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_p_color', array(
            'label'      => __( 'Paragraph Color', 'amber' ),
            'section'    => 'amber_small_gallery',
            'settings'   => 'amber_small_gallery_p_color',
        ) ) );


        //a
        $wp_customize->add_setting( 'amber_small_gallery_a_text' , array(
            'default'   => __( 'See more...', 'amber' ),
            'transport' => 'refresh',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_small_gallery_a_text', array(
            'label'      => __( 'Link Text', 'amber' ),
            'section'    => 'amber_small_gallery',
            'settings'   => 'amber_small_gallery_a_text',
        ) ) );
    
        $wp_customize->add_setting( 'amber_small_gallery_a_url' , array(
            'default'   => '#',
            'transport' => 'refresh',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_small_gallery_a_url', array(
            'label'      => __( 'Link URL', 'amber' ),
            'section'    => 'amber_small_gallery',
            'settings'   => 'amber_small_gallery_a_url',
        ) ) );
    
        $wp_customize->add_setting( 'amber_small_gallery_a_color' , array(
            'default'   => '#000000', // Default color
            'transport' => 'refresh',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_a_color', array(
            'label'      => __( 'Link Color', 'amber' ),
            'section'    => 'amber_small_gallery',
            'settings'   => 'amber_small_gallery_a_color',
        ) ) );
        
        // Add section for gallery images
        $wp_customize->add_section( 'amber_gallery' , array(
            'title'      => __( 'Gallery images', 'amber' ),
            'priority'   => 30,
        ) );

        // Define the default image URLs
        $default_images = array(
            get_template_directory_uri() . '/img/default3.jpg',
            get_template_directory_uri() . '/img/default1.png',
            get_template_directory_uri() . '/img/default2.jpg',
            get_template_directory_uri() . '/img/default4.png'
        );

        // Add settings and controls for each gallery image
        for ( $i = 1; $i <= 4; $i++ ) {
            // Image setting
            $wp_customize->add_setting( "amber_gallery_image_$i" , array(
                'default'   => $default_images[$i - 1], // Default image URL
                'transport' => 'refresh',
            ) );

            // Image control
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "amber_gallery_image_$i", array(
                'label'      => __( "Gallery Image $i", 'amber' ),
                'section'    => 'amber_gallery',
                'settings'   => "amber_gallery_image_$i",
            ) ) );
        }
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
