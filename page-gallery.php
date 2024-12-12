
<?php

/*
Template name: Gallery page
*/
get_header();

?>

<main id="site-content" role="main">

    <header class="page-header">
        <?php if ( get_theme_mod( 'amber_gallery_header_image' ) ) : ?>
            <img src="<?php echo esc_url( get_theme_mod( 'amber_gallery_header_image' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        <?php endif; ?>
        <h1 class="page-title"><?php the_title(); ?></h1>
    </header>

    <section class="gallery-container">
        <?php 
        // Get images attached to the page via ACF, Custom Fields, or Media Library
        $gallery_images = get_attached_media('image', $post->ID); 

        if ($gallery_images) :
            echo '<div class="gallery-grid">';
            foreach ($gallery_images as $image) :
                $image_url = wp_get_attachment_image_src($image->ID, 'large');
        ?>
            <div class="gallery-item">
                <img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title($image->ID)); ?>">
            </div>
        <?php 
            endforeach; 
            echo '</div>';
        endif;
        ?>
    </section>

</main>

<?php get_footer(); ?>