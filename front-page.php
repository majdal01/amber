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

    <!------------------------------------------------------------>
    <!-- Forside sektion til lille galleri -->

        <div class="small-gallery-container">
                <div class="small-gallery-style">
                    <div class="small-gallery-box">
                        <h2>Digital art</h2>
                    </div>
                    <section class="small-gallery-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#">See more...</a>
                    </section>
                </div>
        </div>



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