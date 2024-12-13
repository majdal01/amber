<?php

/*
Template name: About page
*/
get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <header class="about-header">
        <div class="about-header-img">
            <?php 
            $header_image = get_theme_mod( 'amber_about_header_image' );
            if ( $header_image ) : ?>
                <img src="<?php echo esc_url( $header_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/default-about-header.jpg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            <?php endif; ?>
        </div>
        <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'amber_about_page_title', __( 'About', 'amber' ) ) ); ?></h1>
    </header>

    <div class="line"></div>

    
    <div class="about-container" style="background-color: <?php echo esc_attr( get_theme_mod( 'amber_about_container_bg_color', '#ffffff' ) ); ?>;">

        <div class="about-wrapper">

            <div class="about-box" style="background-color: <?php echo esc_attr( get_theme_mod( 'amber_about_color', '#F0D8BE' ) ); ?>;">
                <h2 style="color: <?php echo esc_attr( get_theme_mod( 'amber_about_h2_color', '#000000' ) ); ?>;"><?php echo esc_html( get_theme_mod( 'amber_about_h2', 'About me' ) ); ?></h2>
            </div>

            <div class="about-text">
                <h2>Lorem Ipsum</h2>
                <p style="color: <?php echo esc_attr( get_theme_mod( 'amber_about_p_color', '#000000' ) ); ?>;">
                    <?php echo wp_kses_post( nl2br( get_theme_mod( 'amber_about_p', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.' ) ) ); ?>
                </p>
            </div>

        </div>

    </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

