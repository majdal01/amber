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
            $header_image = get_theme_mod( 'amber_about_about_image' );
            if ( $header_image ) : ?>
                <img src="<?php echo esc_url( $header_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/default-about-header.jpg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            <?php endif; ?>
        </div>
        <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'amber_about_page_title', __( 'About', 'amber' ) ) ); ?></h1>

    </header>



    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

