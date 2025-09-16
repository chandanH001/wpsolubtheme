<?php

if (! function_exists('solub_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Solub 1
 */
    function solub_setup()
{

/*
* Make theme available for translation.
* Translations can be filed in the /languages/ directory.
* If you're building a theme based on solub, use a find and replace
* to change 'solub' to the name of your theme in all the template files
*/
        load_theme_textdomain('solub', get_template_directory() . '/languages');

// Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded tag in the document head, and expect WordPress to
* provide it for us.
*/
        add_theme_support('title-tag');

// Remove widget block editor
        remove_theme_support('widgets-block-editor');

//Woocommerce Support

    add_theme_support( 'woocommerce' );

    // Optional: Enable WooCommerce product gallery features
    // add_theme_support( 'wc-product-gallery-zoom' );
    // add_theme_support( 'wc-product-gallery-lightbox' );
    // add_theme_support( 'wc-product-gallery-slider' );


/*
* Enable support for Post Thumbnails on posts and pages.
*
* See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
*/
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(825, 510, true);

// This theme uses wp_nav_menu() in two locations.
        register_nav_menus([
            'primary' => __('Primary Menu', 'solub'),
            // 'social'  => __('Social Links Menu', 'solub'),
        ]);

/*
* Switch default core markup for search form, comment form, and comments
* to output valid HTML5.
*/
        add_theme_support('html5', [
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ]);

/*
* Enable support for Post Formats.
*
* See: https://codex.wordpress.org/Post_Formats
*/
        add_theme_support('post-formats', [
            'image', 'video', 'quote', 'link', 'gallery', 'audio',
        ]);

    }
endif;
// solub_setup
add_action('after_setup_theme', 'solub_setup');

// Widget Registration
function solub_widgets_init()
{
    register_sidebar([
        'name'          => __('Blog Sidebar', 'solub'),
        'id'            => 'solub-blog-sidebar',
        'description'   => __('Widgets in this area will be shown under your single posts, Blog sidebar.', 'solub'),
        'before_widget' => '<div id="%1$s" class="tp-sidebar-widget mb-45 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="tp-sidebar-widget-title">',
        'after_title'   => '</h3>',
    ]);
    register_sidebar([
        'name'          => __('Footer 1', 'solub'),
        'id'            => 'solub-footer1-widgets',
        'description'   => __('Widgets in this area will be shown under your single posts, before comments.', 'solub'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-col-1 mb-30 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="tp-footer-widget-title">',
        'after_title'   => '</h3>',
    ]);
    register_sidebar([
        'name'          => __('Footer 2', 'solub'),
        'id'            => 'solub-footer2-widgets',
        'description'   => __('Widgets in this area will be shown under your single posts, before comments.', 'solub'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-col-2 mb-30 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="tp-footer-widget-title">',
        'after_title'   => '</h3>',
    ]);
    register_sidebar([
        'name'          => __('Footer 3', 'solub'),
        'id'            => 'solub-footer3-widgets',
        'description'   => __('Widgets in this area will be shown under your single posts, before comments.', 'solub'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-col-3 mb-30 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="tp-footer-widget-title">',
        'after_title'   => '</h3>',
    ]);
    register_sidebar([
        'name'          => __('Footer 4', 'solub'),
        'id'            => 'solub-footer4-widgets',
        'description'   => __('Widgets in this area will be shown under your single posts, before comments.', 'solub'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-col-4 mb-30 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="tp-footer-widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'solub_widgets_init');

function solub_theme_scripts()
{

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', [], '5.2.3', 'all');
    wp_enqueue_style('swiperbundle', get_template_directory_uri() . '/assets/css/swiper-bundle.css', [], '8.2.2', 'all');
    wp_enqueue_style('magnificpopup', get_template_directory_uri() . '/assets/css/magnific-popup.css', [], '8.2.2', 'all');
    wp_enqueue_style('fontawesomepro', get_template_directory_uri() . '/assets/css/font-awesome-pro.css', [], '6.0', 'all');
    wp_enqueue_style('spacing', get_template_directory_uri() . '/assets/css/spacing.css', [], '8.2.2', 'all');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', [], '8.2.2', 'all');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], '8.2.2', 'all');

    //style css
    // wp_enqueue_style('style', get_stylesheet_uri());
    // For emaidate apply css
    wp_enqueue_style(
        'style',
        get_stylesheet_uri(),
        [],
        filemtime(get_stylesheet_directory() . '/style.css') // This busts the cache
    );

    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery.js', ['jquery'], 1.1, true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.js', [], 1.1, true);
    wp_enqueue_script('bootstrapbundle', get_template_directory_uri() . '/assets/js/bootstrap-bundle.js', ['jquery'],
        1.1, true);
    wp_enqueue_script('swiperbundle', get_template_directory_uri() . '/assets/js/swiper-bundle.js', [], 1.1, true);
    wp_enqueue_script('magnificpopup', get_template_directory_uri() . '/assets/js/magnific-popup.js', [], 1.1,
        true);
    wp_enqueue_script('purecounter', get_template_directory_uri() . '/assets/js/purecounter.js', [], 1.1, true);
    wp_enqueue_script('imagesloaded-pkgd', get_template_directory_uri() . '/assets/js/imagesloaded-pkgd.js', ['imagesloaded'], 1.1, true);
    wp_enqueue_script('isotopepkgd', get_template_directory_uri() . '/assets/js/isotope-pkgd.js', [], 1.1, true);
    wp_enqueue_script('ajaxform', get_template_directory_uri() . '/assets/js/ajax-form.js', [], 1.1, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', [], 1.1, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.js', [], 1.1, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'solub_theme_scripts');

// Include breadcrumb functionality for the theme.
include_once 'inc/breadcrumb.php';
include_once 'inc/template-function.php';
include_once 'inc/nav-walker.php';
include_once 'inc/widget.php';
include_once 'inc/solub_resent_post_sidebar.php';
include_once 'inc/sloub-woo.php';
// include_once 'inc/solub-kirki.php';
if (class_exists('Kirki')) {
    include_once get_template_directory() . '/inc/solub-kirki.php';
}