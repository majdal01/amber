<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amber
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <header class="page-header">
            <div class="page-header-img">
                <?php 
                $header_image = get_theme_mod( 'amber_page_header_image' );
                if ( $header_image ) : ?>
                    <img src="<?php echo esc_url( $header_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/default-page-header.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                <?php endif; ?>
            </div>
            <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'amber__page_title', __( 'Customize your page', 'amber' ) ) ); ?></h1>
        </header>

        <div class="line"></div>
        
        <?php
        // Start the loop
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile; // End of the loop.
        ?>


    </main><!-- #main -->

    <div class="greenline"></div>
    
</div><!-- #primary -->
    
<?php get_footer(); ?>
