<?php
/**
 * Undone functions and definitions
 *
 * @package Undone
 */

/**
 * Set the content width based on the theme's design and stylesheet.
  */
// if ( ! isset( $content_width ) ) {
//     $content_width = 640; /* pixels */
// }


if ( ! function_exists( 'undone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function undone_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Undone, use a find and replace
     * to change 'undone' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'undone', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'undone' ),
    ) );

    // Enable support for Post Formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link' ) );

    // Setup the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'undone_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif; // undone_setup
add_action( 'after_setup_theme', 'undone_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function undone_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'undone' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'undone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function undone_scripts() {
    wp_enqueue_style( 'undone-style', get_stylesheet_uri() );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'undone_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Filters
 */
add_filter('json_api_encode', 'undone_encode_song_data');

function undone_encode_song_data($response) {
    if (isset($response['posts'])) {
        foreach ($response['posts'] as $post) {
            undone_add_format($post);
            undone_add_meta($post);
        }
    } else if (isset($response['post'])) {
        undone_add_format($response['post']);
        undone_add_meta($response['post']);
    }
    return $response;
}

// Get the post format
function undone_add_format(&$post) {
    $format = get_post_format( $post->id );
    $post->format = $format;
}

// get the mp3 field
function undone_add_meta(&$post) {
    $text = get_field('mp3', $post->id);
    $post->song_mp3 = $text;
};
