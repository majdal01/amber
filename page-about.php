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
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/default-about-header.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                <?php endif; ?>
            </div>
            <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'amber_about_page_title', __( 'About', 'amber' ) ) ); ?></h1>
        </header>

        <div class="line"></div>

        
        <div class="about-container">

            <div class="about-wrapper">

                <div class="about-box" style="background-color: <?php echo esc_attr( get_theme_mod( 'amber_about_me_box_color', '#F0D8BE' ) ); ?>;">
                    <h2 style="color: <?php echo esc_attr( get_theme_mod( 'amber_about_me_box_h2_color', '#000000' ) ); ?>;"><?php echo esc_html( get_theme_mod( 'amber_about_me_box_h2', 'About me' ) ); ?></h2>
                </div>

                <section class="about-text">
                    <h2 style="color: <?php echo esc_attr( get_theme_mod( 'amber_about_top_h2_color', '#000000' ) ); ?>;"><?php echo esc_html( get_theme_mod( 'amber_about_top_h2', 'I love to create' ) ); ?></h2>
                    <p style="color: <?php echo esc_attr( get_theme_mod( 'amber_about_top_p_color', '#000000' ) ); ?>;">
                    <?php echo wp_kses_post( nl2br( get_theme_mod( 'amber_about_top_p', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.' ) ) ); ?>
                    </p>
                </section>

            </div>

        </div>

        <section class="about-profil-wrapper">
            
            <p style="color: <?php echo esc_attr( get_theme_mod( 'amber_about_profil_p_color', '#000000' ) ); ?>;">
            <?php echo wp_kses_post( nl2br( get_theme_mod( 'amber_about_profil_p', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br><br> Lorem ipsum dolor sit amet consectetur. Risus mi orci sit et donec senectus libero. Diam egestas viverra hendrerit pretium ac nam viverra ac pretium. Lacus maecenas lorem lacinia dui. Pharetra justo dui rutrum urna porta sed venenatis magna magna. Commodo mi morbi fringilla mauris duis. Morbi tortor viverra auctor dignissim enim sed. Vel aliquet quam duis nam. Mauris commodo sapien est aliquet viverra volutpat dui. Sollicitudin nisi pharetra diam sit lobortis pharetra commodo.' ) ) ); ?>
            </p>

            <?php 
            $profile_image = get_theme_mod( 'amber_about_profil_image', get_template_directory_uri() . '/img/default-profil-img.png' );
            ?>
            <img src="<?php echo esc_url( $profile_image ); ?>" alt="Default profilbillede">

        </section>


        <section class="funfacts-wrapper" style="background-color: <?php echo esc_attr( get_theme_mod( 'amber_funfacts_bg_color', '#4C563B' ) ); ?>;">
            <h2 style="color: <?php echo esc_attr( get_theme_mod( 'amber_funfacts_h2_color', '#fff' ) ); ?>;"><?php echo esc_html( get_theme_mod( 'amber_funfacts_h2', 'Fun facts' ) ); ?></h2>
            
            <div class="funfacts-style">

                <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
                    <h3 style="color: <?php echo esc_attr( get_theme_mod( "amber_funfact_color_$i", '#fff' ) ); ?>;"><?php echo esc_html( get_theme_mod( "amber_funfact_$i", "Fun fact $i" ) ); ?></h3>
                <?php endfor; ?>

            </div>

        </section>

        <?php
            while ( have_posts() ) : 
                the_post();
                the_content(); 
                edit_post_link( __( 'Feel free to edit this section with Wordpress. Click the text to begin', 'amber' ), '<p class="edit-link">', '</p>' );
            endwhile;
        ?>

    <div class="greenline"></div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

