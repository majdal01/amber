
<?php

/*
Template name: Gallery page
*/
get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <header class="gallery-header">
            
            <div class="gallery-header-img">
                <?php 
                $header_image = get_theme_mod( 'amber_gallery_header_image' );
                if ( $header_image ) : ?>
                    <img src="<?php echo esc_url( $header_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/default-gallery-header.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                <?php endif; ?>
            </div>

            <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'amber_gallery_page_title', __( 'Gallery', 'amber' ) ) ); ?></h1>
        </header>

        <div class="line"></div>

        <div class="large-gallery-container">

            <?php
            // Default billeder
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

            for ( $i = 1; $i <= 8; $i++ ) : ?>
                <div class="large-gallery-item">
                    <img src="<?php echo esc_url( get_theme_mod( "amber_large_gallery_image_$i", $default_images[$i - 1] ) ); ?>" alt="Gallery Image <?php echo $i; ?>">
                </div>
            <?php endfor; ?>

        </div>

        <div class="line"></div>

        <?php
        while ( have_posts() ) : 
            the_post();
            the_content(); 

            // ChatGPT hjalp mig her, så teksten også er synlig, selvom man arbejder med customizeren
            if ( current_user_can( 'edit_post', get_the_ID() ) || is_customize_preview() ) {
                echo '<p class="edit-link"><a href="' . get_edit_post_link( get_the_ID() ) . '">' . 
                    __( 'Feel free to edit this section with WordPress. Close the customizer, return to your site and click the text to begin', 'amber' ) . 
                    '</a></p>';
            }
        endwhile;
        ?>

        <div class="greenline"></div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>