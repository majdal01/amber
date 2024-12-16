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
	// Redigeringsmuligheder til headeren på front-page.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_header_content' , array(
        'title'      => __( 'Amber Header text and button', 'amber' ),
        'priority'   => 30,
    ) );

    //***********   h1   ***********/
    $wp_customize->add_setting( 'amber_header_h1' , array(
        'default'   => __( 'Welcome to Your Site', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_header_h1', array(
        'label'      => __( 'Header H1', 'amber' ),
        'section'    => 'amber_header_content',
        'settings'   => 'amber_header_h1',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   p   ***********/
    $wp_customize->add_setting( 'amber_header_p' , array(
        'default'   => __( 'Edit the theme elements with customise in the top menu.', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_header_p', array(
        'label'      => __( 'Header Paragraph', 'amber' ),
        'section'    => 'amber_header_content',
        'settings'   => 'amber_header_p',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   button   ***********/
    $wp_customize->add_setting( 'amber_header_button_text' , array(
        'default'   => __( 'Click Me', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_header_button_text', array(
        'label'      => __( 'Header Button Text', 'amber' ),
        'section'    => 'amber_header_content',
        'settings'   => 'amber_header_button_text',
        'active_callback' => 'is_front_page_template',
    ) ) );

    $wp_customize->add_setting( 'amber_header_button_url' , array(
        'default'   => '#',
        'transport' => 'refresh',
    ) );

    //***********   url   ***********/
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_header_button_url', array(
        'label'      => __( 'Header Button URL', 'amber' ),
        'section'    => 'amber_header_content',
        'settings'   => 'amber_header_button_url',
        'active_callback' => 'is_front_page_template',
    ) ) );



    //***********************************************************/
	// Redigeringsmuligheder til ikonerne på front-page.php
    //***********************************************************/
    
    $wp_customize->add_section( 'amber_front_page_icons' , array(
        'title'      => __( 'Amber icons and text', 'amber' ),
        'priority'   => 31,
    ) );

    //***********   ikoner   ***********/
    $default_icons = array(
        'fas fa-palette',
        'fas fa-paintbrush',
        'fas fa-tablet-screen-button'
    );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "amber_icon_$i" , array(
            'default'   => $default_icons[$i - 1],
            'transport' => 'refresh',
        ) );

        
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "amber_icon_$i", array(
            'label'      => __( "Icon $i", 'amber' ),
            'section'    => 'amber_front_page_icons',
            'settings'   => "amber_icon_$i",
            'active_callback' => 'is_front_page_template',
        ) ) );

        //***********   text under ikoner   ***********/
        $wp_customize->add_setting( "amber_icon_text_$i" , array(
            'default'   => 'Your skills', 
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "amber_icon_text_$i", array(
            'label'      => __( "Text $i", 'amber' ),
            'section'    => 'amber_front_page_icons',
            'settings'   => "amber_icon_text_$i",
            'active_callback' => 'is_front_page_template',
        ) ) );
    
        //***********   farve på ikoner   ***********/
        $wp_customize->add_setting( "amber_icon_color_$i" , array(
            'default'   => '#000000', 
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "amber_icon_color_$i", array(
            'label'      => __( "Icon Color $i", 'amber' ),
            'section'    => 'amber_front_page_icons',
            'settings'   => "amber_icon_color_$i",
            'active_callback' => 'is_front_page_template',
        ) ) );
    }



    //***********************************************************/
	// Redigeringsmuligheder til small gallery på front-page.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_small_gallery' , array(
        'title'      => __( 'Amber Small Gallery layout', 'amber' ),
        'priority'   => 32,
    ) );

    //***********   farve på baggrunden   ***********/
    $wp_customize->add_setting( 'amber_small_gallery_container_bg_color' , array(
        'default'   => '#ffffff', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_container_bg_color', array(
        'label'      => __( 'Container Background Color', 'amber' ),
        'section'    => 'amber_small_gallery',
        'settings'   => 'amber_small_gallery_container_bg_color',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   baggrundsfarve på textboksen   ***********/
    $wp_customize->add_setting( 'amber_small_gallery_color' , array(
        'default'   => '#F0D8BE', 
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_color', array(
        'label'      => __( 'Box Background Color', 'amber' ),
        'section'    => 'amber_small_gallery',
        'settings'   => 'amber_small_gallery_color',
        'active_callback' => 'is_front_page_template',
    ) ) );
        
    //***********   h2   *************/
    $wp_customize->add_setting( 'amber_small_gallery_h2' , array(
        'default'   => __( 'Small gallery', 'amber' ),
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_small_gallery_h2', array(
        'label'      => __( 'Box Heading', 'amber' ),
        'section'    => 'amber_small_gallery',
        'settings'   => 'amber_small_gallery_h2',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   h2 farve  *************/
    $wp_customize->add_setting( 'amber_small_gallery_h2_color' , array(
        'default'   => '#000000', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_h2_color', array(
        'label'      => __( 'Heading Color', 'amber' ),
        'section'    => 'amber_small_gallery',
        'settings'   => 'amber_small_gallery_h2_color',
        'active_callback' => 'is_front_page_template',
    ) ) );
        

    //***********   p  *************/
    $wp_customize->add_setting( 'amber_small_gallery_p' , array(
        'default'   => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_small_gallery_p', array(
        'label'      => __( 'Box Paragraph', 'amber' ),
        'section'    => 'amber_small_gallery',
        'settings'   => 'amber_small_gallery_p',
        'type'       => 'textarea',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   p farve  *************/
    $wp_customize->add_setting( 'amber_small_gallery_p_color' , array(
        'default'   => '#000000', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_p_color', array(
        'label'      => __( 'Paragraph Color', 'amber' ),
        'section'    => 'amber_small_gallery',
        'settings'   => 'amber_small_gallery_p_color',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   a  *************/
    $wp_customize->add_setting( 'amber_small_gallery_a_text' , array(
        'default'   => __( 'See more...', 'amber' ),
        'transport' => 'refresh',
    ) );
        
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_small_gallery_a_text', array(
        'label'      => __( 'Link Text', 'amber' ),
        'section'    => 'amber_small_gallery',
        'settings'   => 'amber_small_gallery_a_text',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   a url  *************/
    $wp_customize->add_setting( 'amber_small_gallery_a_url' , array(
        'default'   => '#',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_small_gallery_a_url', array(
        'label'      => __( 'Link URL', 'amber' ),
        'section'    => 'amber_small_gallery',
        'settings'   => 'amber_small_gallery_a_url',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   a farve  *************/
    $wp_customize->add_setting( 'amber_small_gallery_a_color' , array(
        'default'   => '#000000', 
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_small_gallery_a_color', array(
        'label'      => __( 'Link Color', 'amber' ),
        'section'    => 'amber_small_gallery',
        'settings'   => 'amber_small_gallery_a_color',
        'active_callback' => 'is_front_page_template',
    ) ) );
    


    //***********************************************************/
	// Redigeringsmuligheder til billeder i small gallery på front-page.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_gallery' , array(
        'title'      => __( 'Amber Small Gallery images', 'amber' ),
        'priority'   => 33,
    ) );

    $default_images = array(
        get_template_directory_uri() . '/img/default3.png',
        get_template_directory_uri() . '/img/default1.png',
        get_template_directory_uri() . '/img/default2.png',
        get_template_directory_uri() . '/img/default4.png'
    );

    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "amber_gallery_image_$i" , array(
            'default'   => $default_images[$i - 1], 
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "amber_gallery_image_$i", array(
            'label'      => __( "Gallery Image $i", 'amber' ),
            'section'    => 'amber_gallery',
            'settings'   => "amber_gallery_image_$i",
            'active_callback' => 'is_front_page_template',
        ) ) );
    }



    //***********************************************************/
	// Redigeringsmuligheder til quote på front-page.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_quote_content' , array(
        'title'      => __( 'Amber Quote text and button', 'amber' ),
        'priority'   => 34,
    ) );

    //***********   h2  *************/
    $wp_customize->add_setting( 'amber_quote_h2' , array(
        'default'   => __( 'Art is everything to me.', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_quote_h2', array(
        'label'      => __( 'Quote H2', 'amber' ),
        'section'    => 'amber_quote_content',
        'settings'   => 'amber_quote_h2',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   p  *************/
    $wp_customize->add_setting( 'amber_quote_p' , array(
        'default'   => __( '- John Doe', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_quote_p', array(
        'label'      => __( 'Quote Paragraph', 'amber' ),
        'section'    => 'amber_quote_content',
        'settings'   => 'amber_quote_p',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   button  *************/
    $wp_customize->add_setting( 'amber_quote_button_text' , array(
        'default'   => __( 'About Me', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_quote_button_text', array(
        'label'      => __( 'Quote Button Text', 'amber' ),
        'section'    => 'amber_quote_content',
        'settings'   => 'amber_quote_button_text',
        'active_callback' => 'is_front_page_template',
    ) ) );

    //***********   Button URL  *************/
    $wp_customize->add_setting( 'amber_quote_button_url' , array(
        'default'   => '#',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_quote_button_url', array(
        'label'      => __( 'Quote Button URL', 'amber' ),
        'section'    => 'amber_quote_content',
        'settings'   => 'amber_quote_button_url',
        'active_callback' => 'is_front_page_template',
    ) ) );



    //***********************************************************/
	// Redigeringsmuligheder til siden page-gallery.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_gallery_header' , array(
        'title'      => __( 'Amber Gallery header image and title', 'amber' ),
        'priority'   => 30,
        'active_callback' => 'is_gallery_page',
    ) );

    //***********   header img   ***********/
    $wp_customize->add_setting( 'amber_gallery_header_image' , array(
        'default'   => '', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'amber_gallery_header_image', array(
        'label'      => __( 'Header Image', 'amber' ),
        'section'    => 'amber_gallery_header',
        'settings'   => 'amber_gallery_header_image',
        'active_callback' => 'is_gallery_page',
    ) ) );

    //***********   h1   ***********/
    $wp_customize->add_setting( 'amber_gallery_page_title' , array(
        'default'   => __( 'Gallery', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_gallery_page_title', array(
        'label'      => __( 'Header H1', 'amber' ),
        'section'    => 'amber_gallery_header',
        'settings'   => 'amber_gallery_page_title',
        'active_callback' => 'is_gallery_page',
    ) ) );
    


    //***********************************************************/
	// Redigeringsmuligheder til billederne på page-gallery.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_large_gallery' , array(
        'title'      => __( 'Amber Large Gallery images', 'amber' ),
        'priority'   => 31,
        'active_callback' => 'is_gallery_page',
    ) );

    $default_images = array(
        get_template_directory_uri() . '/img/default3.png',
        get_template_directory_uri() . '/img/default1.png',
        get_template_directory_uri() . '/img/default4.png',
        get_template_directory_uri() . '/img/default5.png',
        get_template_directory_uri() . '/img/default2.png',
        get_template_directory_uri() . '/img/default6.png',
        get_template_directory_uri() . '/img/default7.png',
        get_template_directory_uri() . '/img/default8.png'
    );

    for ( $i = 1; $i <= 8; $i++ ) {
        $wp_customize->add_setting( "amber_large_gallery_image_$i" , array(
            'default'   => $default_images[$i - 1], 
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "amber_large_gallery_image_$i", array(
            'label'      => __( "Gallery Image $i", 'amber' ),
            'section'    => 'amber_large_gallery',
            'settings'   => "amber_large_gallery_image_$i",
            'active_callback' => 'is_gallery_page',
        ) ) );
    }



    //***********************************************************/
	// Redigeringsmuligheder til siden page-about.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_about_header' , array(
        'title'      => __( 'Amber About Header image and title', 'amber' ),
        'priority'   => 30,
        'active_callback' => 'is_about_page',
    ) );

    //***********   header img   ***********/
    $wp_customize->add_setting( 'amber_about_header_image' , array(
        'default'   => '', // Default image URL
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'amber_about_header_image', array(
        'label'      => __( 'Header Image', 'amber' ),
        'section'    => 'amber_about_header',
        'settings'   => 'amber_about_header_image',
        'active_callback' => 'is_about_page',
    ) ) );

    //***********   h1   ***********/
    $wp_customize->add_setting( 'amber_about_page_title' , array(
        'default'   => __( 'About', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_about_page_title', array(
        'label'      => __( 'Header H1', 'amber' ),
        'section'    => 'amber_about_header',
        'settings'   => 'amber_about_page_title',
        'active_callback' => 'is_about_page',
    ) ) );



    //***********************************************************/
	// Redigeringsmuligheder til siden page-about.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_about_me_box' , array(
        'title'      => __( 'Amber About Me box', 'amber' ),
        'priority'   => 31,
        'active_callback' => 'is_about_page',
    ) );

    //***********   baggrundsfarve på textboksen   ***********/
    $wp_customize->add_setting( 'amber_about_me_box_color' , array(
        'default'   => '#F0D8BE', 
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_about_me_box_color', array(
        'label'      => __( 'Box Background Color', 'amber' ),
        'section'    => 'amber_about_me_box',
        'settings'   => 'amber_about_me_box_color',
        'active_callback' => 'is_about_page',
    ) ) );
        
    //***********   h2 i boxen   *************/
    $wp_customize->add_setting( 'amber_about_me_box_h2' , array(
        'default'   => __( 'About me', 'amber' ),
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_about_me_box_h2', array(
        'label'      => __( 'Box Heading', 'amber' ),
        'section'    => 'amber_about_me_box',
        'settings'   => 'amber_about_me_box_h2',
        'active_callback' => 'is_about_page',
    ) ) );

    //***********   h2 i boxen farve  *************/
    $wp_customize->add_setting( 'amber_about_me_box_h2_color' , array(
        'default'   => '#000000', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_about_me_box_h2_color', array(
        'label'      => __( 'Heading Color', 'amber' ),
        'section'    => 'amber_about_me_box',
        'settings'   => 'amber_about_me_box_h2_color',
        'active_callback' => 'is_about_page',
    ) ) );

    //***********************************************************/
	// Redigeringsmuligheder til overste afsnit page-about.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_about_top' , array(
        'title'      => __( 'Amber About Me top text', 'amber' ),
        'priority'   => 32,
        'active_callback' => 'is_about_page',
    ) );

    //***********   h2   ***********/
    $wp_customize->add_setting( 'amber_about_top_h2' , array(
        'default'   => __( 'I love to create', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_about_top_h2', array(
        'label'      => __( 'Box Heading', 'amber' ),
        'section'    => 'amber_about_top',
        'settings'   => 'amber_about_top_h2',
        'active_callback' => 'is_about_page',
    ) ) );

    //***********   h2 farve   ***********/
    $wp_customize->add_setting( 'amber_about_top_h2_color' , array(
        'default'   => '#000000', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_about_top_h2_color', array(
        'label'      => __( 'Heading Color', 'amber' ),
        'section'    => 'amber_about_top',
        'settings'   => 'amber_about_top_h2_color',
        'active_callback' => 'is_about_page',
    ) ) );

    //***********   p   ***********/
    $wp_customize->add_setting( 'amber_about_top_p' , array(
        'default'   => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_about_top_p', array(
        'label'      => __( 'Box Paragraph', 'amber' ),
        'section'    => 'amber_about_top',
        'settings'   => 'amber_about_top_p',
        'type'       => 'textarea', 
        'active_callback' => 'is_about_page',
    ) ) );

    //***********   p farve   ***********/
    $wp_customize->add_setting( 'amber_about_top_p_color' , array(
        'default'   => '#000000', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_about_top_p_color', array(
        'label'      => __( 'Paragraph Color', 'amber' ),
        'section'    => 'amber_about_top',
        'settings'   => 'amber_about_top_p_color',
        'active_callback' => 'is_about_page',
    ) ) );

    

    //***********************************************************/
	// Redigeringsmuligheder til profilafsnittet på siden page-about.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_about_profil' , array(
        'title'      => __( 'Amber Profil image and text', 'amber' ),
        'priority'   => 33,
        'active_callback' => 'is_about_page',
    ) );

    //***********   p   ***********/
    $wp_customize->add_setting( 'amber_about_profil_p' , array(
        'default'   => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br><br> Lorem ipsum dolor sit amet consectetur. Risus mi orci sit et donec senectus libero. Diam egestas viverra hendrerit pretium ac nam viverra ac pretium. Lacus maecenas lorem lacinia dui. Pharetra justo dui rutrum urna porta sed venenatis magna magna. Commodo mi morbi fringilla mauris duis. Morbi tortor viverra auctor dignissim enim sed. Vel aliquet quam duis nam. Mauris commodo sapien est aliquet viverra volutpat dui. Sollicitudin nisi pharetra diam sit lobortis pharetra commodo.', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_about_profil_p', array(
        'label'      => __( 'Box Paragraph', 'amber' ),
        'section'    => 'amber_about_profil',
        'settings'   => 'amber_about_profil_p',
        'type'       => 'textarea', 
        'active_callback' => 'is_about_page',
    ) ) );
    
    //***********   p farve   ***********/
    $wp_customize->add_setting( 'amber_about_profil_p_color' , array(
        'default'   => '#000000', // Default color
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_about_profil_p_color', array(
        'label'      => __( 'Paragraph Color', 'amber' ),
        'section'    => 'amber_about_profil',
        'settings'   => 'amber_about_profil_p_color',
        'active_callback' => 'is_about_page',
    ) ) );


    //***********   profil img   ***********/
    $wp_customize->add_setting( 'amber_about_profil_image' , array(
        'default'   => get_template_directory_uri() . '/img/default-profil-img.png', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'amber_about_profil_image', array(
        'label'      => __( 'Profile Image', 'amber' ),
        'section'    => 'amber_about_profil',
        'settings'   => 'amber_about_profil_image',
        'active_callback' => 'is_about_page',
    ) ) );



    //***********************************************************/
	// Redigeringsmuligheder til funfacts på siden page-about.php
    //***********************************************************/

    $wp_customize->add_section( 'amber_funfacts' , array(
        'title'      => __( 'Amber Fun Facts', 'amber' ),
        'priority'   => 34,
        'active_callback' => 'is_about_page',
    ) );

    //***********   baggrundsfarve   ***********/
    $wp_customize->add_setting( 'amber_funfacts_bg_color' , array(
        'default'   => '#4C563B', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_funfacts_bg_color', array(
        'label'      => __( 'Funfacts Background Color', 'amber' ),
        'section'    => 'amber_funfacts',
        'settings'   => 'amber_funfacts_bg_color',
        'active_callback' => 'is_about_page',
    ) ) );

    //***********   h2   ***********/
    $wp_customize->add_setting( 'amber_funfacts_h2' , array(
        'default'   => __( 'Fun facts', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber_funfacts_h2', array(
        'label'      => __( 'Fun Facts Heading', 'amber' ),
        'section'    => 'amber_funfacts',
        'settings'   => 'amber_funfacts_h2',
        'active_callback' => 'is_about_page',
    ) ) );

    //***********   h2 farve   ***********/
    $wp_customize->add_setting( 'amber_funfacts_h2_color' , array(
        'default'   => '#ffffff', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'amber_funfacts_h2_color', array(
        'label'      => __( 'Heading Color', 'amber' ),
        'section'    => 'amber_funfacts',
        'settings'   => 'amber_funfacts_h2_color',
        'active_callback' => 'is_about_page',
    ) ) );

    //***********   funfacts   ***********/
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "amber_funfact_$i" , array(
            'default'   => __( "Fun fact $i", 'amber' ),
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "amber_funfact_$i", array(
            'label'      => __( "Fun Fact $i", 'amber' ),
            'section'    => 'amber_funfacts',
            'settings'   => "amber_funfact_$i",
            'active_callback' => 'is_about_page',
        ) ) );

        //***********   funfacts farve   ***********/
        $wp_customize->add_setting( "amber_funfact_color_$i" , array(
            'default'   => '#ffffff', 
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "amber_funfact_color_$i", array(
            'label'      => __( "Fun Fact Color $i", 'amber' ),
            'section'    => 'amber_funfacts',
            'settings'   => "amber_funfact_color_$i",
            'active_callback' => 'is_about_page',
        ) ) );
    }



    //***********************************************************/
	// Redigeringsmuligheder til siden page.php
    //***********************************************************/ 

    $wp_customize->add_section( 'amber_page_header' , array(
        'title'      => __( 'Amber Page header image and title', 'amber' ),
        'priority'   => 30,
        'active_callback' => 'is_customizer_preview_page',
    ) );

    //***********   header img   ***********/
    $wp_customize->add_setting( 'amber_page_header_image' , array(
        'default'   => '', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'amber_page_header_image', array(
        'label'      => __( 'Header Image', 'amber' ),
        'section'    => 'amber_page_header',
        'settings'   => 'amber_page_header_image',
        'active_callback' => 'is_customizer_preview_page',
    ) ) );

    //***********   h1   ***********/
    $wp_customize->add_setting( 'amber__page_title' , array(
        'default'   => __( 'Customize your page', 'amber' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'amber__page_title', array(
        'label'      => __( 'Header H1', 'amber' ),
        'section'    => 'amber_page_header',
        'settings'   => 'amber__page_title',
        'active_callback' => 'is_customizer_preview_page',
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
