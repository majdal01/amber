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
                    get_template_directory_uri() . '/img/default3.jpg',
                    get_template_directory_uri() . '/img/default1.png',
                    get_template_directory_uri() . '/img/default2.jpg',
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

        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', 'page' );
            endwhile;
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>