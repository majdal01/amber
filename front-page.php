<?php
/**
 * The template for displaying front page
 * 
 * @package Amber
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!--IMG HEADER-->
        <div class="header-image-container">

            <?php if ( get_header_image() ) : ?>
                <img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/default-header-img.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            <?php endif; ?>

            <div class="header-overlay">
                <h1><?php echo get_theme_mod( 'amber_header_h1', __( 'Welcome to My Site', 'amber' ) ); ?></h1>
                <p><?php echo get_theme_mod( 'amber_header_p', __( 'This is a customizable paragraph.', 'amber' ) ); ?></p>
                <a href="<?php echo esc_url( get_theme_mod( 'amber_header_button_url', '#' ) ); ?>" class="header-button">
                    <?php echo get_theme_mod( 'amber_header_button_text', __( 'Click Me', 'amber' ) ); ?>
                </a>
            </div>
        </div>

    <!------------------------------------------------------------>
    <!-- Forside sektion til ikoner. Copilot hjalp med at få den på plads -->
        <div class="front-page-icons">
            <?php
            // Defineret default ikoner
            $default_icons = array(
                'fas fa-palette',
                'fas fa-paintbrush',
                'fas fa-tablet-screen-button'
            );

            for ( $i = 1; $i <= 3; $i++ ) : ?>
                <div class="icon-box">
                    <i class="<?php echo esc_attr( get_theme_mod( "amber_icon_$i", $default_icons[$i - 1] ) ); ?>" style="color: <?php echo esc_attr( get_theme_mod( "amber_icon_color_$i", '#000000' ) ); ?>;"></i>
                    <p><?php echo esc_html( get_theme_mod( "amber_icon_text_$i", 'Your skills' ) ); ?></p>
                </div>
            <?php endfor; ?>
        </div>

        <div class="line"></div>

    <!------------------------------------------------------------>
    <!-- Forside sektion til lille galleri -->
        <div class="small-gallery-container" style="background-color: <?php echo esc_attr( get_theme_mod( 'amber_small_gallery_container_bg_color', '#ffffff' ) ); ?>;">
            
            <div class="box-text-wrapper">

                <div class="small-gallery-box" style="background-color: <?php echo esc_attr( get_theme_mod( 'amber_small_gallery_color', '#F0D8BE' ) ); ?>;">
                    <h2 style="color: <?php echo esc_attr( get_theme_mod( 'amber_small_gallery_h2_color', '#000000' ) ); ?>;"><?php echo esc_html( get_theme_mod( 'amber_small_gallery_h2', 'Small gallery' ) ); ?></h2>
                </div>

                <div class="small-gallery-text">
                    <p style="color: <?php echo esc_attr( get_theme_mod( 'amber_small_gallery_p_color', '#000000' ) ); ?>;"><?php echo wp_kses_post( get_theme_mod( 'amber_small_gallery_p', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua <br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit.' ) ); ?></p>
                    <a href="<?php echo esc_url( get_theme_mod( 'amber_small_gallery_a_url', '#' ) ); ?>" style="color: <?php echo esc_attr( get_theme_mod( 'amber_small_gallery_a_color', '#000000' ) ); ?>;"><?php echo esc_html( get_theme_mod( 'amber_small_gallery_a_text', 'See more...' ) ); ?></a>
                </div>

            </div>

            <div class="gallery">
                <?php
                // Define the default image URLs
                $default_images = array(
                    get_template_directory_uri() . '/img/default3.png',
                    get_template_directory_uri() . '/img/default1.png',
                    get_template_directory_uri() . '/img/default2.png',
                    get_template_directory_uri() . '/img/default4.png'
                );

                for ( $i = 1; $i <= 4; $i++ ) : ?>
                    <div class="gallery-item">
                        <img src="<?php echo esc_url( get_theme_mod( "amber_gallery_image_$i", $default_images[$i - 1] ) ); ?>" alt="Gallery Image <?php echo $i; ?>">
                    </div>
                <?php endfor; ?>
            </div>

        </div>

        <div class="line"></div>
        
        <div class="quote-container">
            <i class="fa-solid fa-quote-left"></i>
            <h2><?php echo get_theme_mod( 'amber_quote_h2', __( 'Art is everything to me.', 'amber' ) ); ?></h2>
            <p><?php echo get_theme_mod( 'amber_quote_p', __( '- John Doe', 'amber') ) ?></p>
            <a href="
                <?php echo esc_url( get_theme_mod( 'amber_quote_button_url', '#' ) ); ?>" class="site-button">
                <?php echo get_theme_mod( 'amber_quote_button_text', __( 'About Me', 'amber' ) ); ?>
            </a>
        </div>

        <div class="greenline"></div>
        
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>