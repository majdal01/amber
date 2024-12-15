<?php
/**
 * Amber functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Amber
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function amber_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Amber, use a find and replace
		* to change 'amber' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'amber', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'amber' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'amber_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'amber_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function amber_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'amber_content_width', 640 );
}
add_action( 'after_setup_theme', 'amber_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function amber_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'amber' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'amber' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'amber_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function amber_scripts() {
	wp_enqueue_style( 'amber-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'amber-style', 'rtl', 'replace' );

	//Adobe Fonts
	wp_enqueue_style( 'typekit', 'https://use.typekit.net/cot6hfo.css', array(), null );
	
	// Font Awesome
    wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/a6b8ab610e.js', array(), null, true );

	wp_enqueue_script( 'amber-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'amber_scripts' ); // Når WordPress indlæser scripts og styles, så skal den bruge funktionen amber_scripts


//Tilføjer mine 3 sider som default, når teamet aktiveres. Den her har jeg fået fra chatGPT. 

function amber_setup_default_pages() {
    // Create the front page
    $front_page_title = 'Home';
    $front_page_content = 'Welcome to the front page!';
    $front_page_template = ''; // Leave empty for default template

    $front_page = array(
        'post_title'    => $front_page_title,
        'post_content'  => $front_page_content,
        'post_status'   => 'publish',
        'post_type'     => 'page',
    );

    // Check if the front page already exists using WP_Query
    $front_page_query = new WP_Query( array(
        'post_type'  => 'page',
        'title'      => $front_page_title,
        'fields'     => 'ids',
    ) );

    if ( ! $front_page_query->have_posts() ) {
        $front_page_id = wp_insert_post( $front_page );
        update_option( 'page_on_front', $front_page_id );
        update_option( 'show_on_front', 'page' );
    }

    // Create the gallery page
    $gallery_page_title = 'Gallery';
    $gallery_page_content = 'Welcome to the gallery page!';
    $gallery_page_template = 'page-gallery.php'; // Template for the gallery page

    $gallery_page = array(
        'post_title'    => $gallery_page_title,
        'post_content'  => $gallery_page_content,
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'page_template' => $gallery_page_template,
    );

    // Check if the gallery page already exists using WP_Query
    $gallery_page_query = new WP_Query( array(
        'post_type'  => 'page',
        'title'      => $gallery_page_title,
        'fields'     => 'ids',
    ) );

    if ( ! $gallery_page_query->have_posts() ) {
        $gallery_page_id = wp_insert_post( $gallery_page );
        update_post_meta( $gallery_page_id, '_wp_page_template', $gallery_page_template );
    }

    // Create the about page
    $about_page_title = 'About';
    $about_page_content = 'Welcome to the about page!';
    $about_page_template = 'page-about.php'; // Template for the about page

    $about_page = array(
        'post_title'    => $about_page_title,
        'post_content'  => $about_page_content,
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'page_template' => $about_page_template,
    );

    // Check if the about page already exists using WP_Query
    $about_page_query = new WP_Query( array(
        'post_type'  => 'page',
        'title'      => $about_page_title,
        'fields'     => 'ids',
    ) );

    if ( ! $about_page_query->have_posts() ) {
        $about_page_id = wp_insert_post( $about_page );
        update_post_meta( $about_page_id, '_wp_page_template', $about_page_template );
    }
}
add_action( 'after_switch_theme', 'amber_setup_default_pages' );





//Sørger for kun at vise redigeringsmuligheder der passer til den specifikke side

function is_front_page_template() {
    return is_front_page();
}

function is_gallery_page() {
	return is_page_template('page-gallery.php');
}

function is_about_page() {
    return is_page_template('page-about.php');
}

function is_about_page_template() {
    return is_page_template('page-about.php');
}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

