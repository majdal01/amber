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

     <!-- Forside sektion til ikoner. Copilot hjalp med at få den på plads -->
        <div class="front-page-icons">
            <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
                <div class="icon-box">
                    <i class="<?php echo esc_attr( get_theme_mod( "amber_icon_$i", 'fas fa-star' ) ); ?>"></i>
                    <p><?php echo esc_html( get_theme_mod( "amber_icon_text_$i", 'Default text' ) ); ?></p>
                </div>
            <?php endfor; ?>
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