<?php

if (!function_exists('ttbc_setup')) {

    /**
     * Twenty Fourteen setup.
     *
     * Set up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support post thumbnails.
     *
     * @since Twenty Fourteen 1.0
     */
    function ttbc_setup() {

        /*
         * Make Twenty Fourteen available for translation.
         *
         * Translations can be added to the /languages/ directory.
         * If you're building a theme based on Twenty Fourteen, use a find and
         * replace to change 'twentyfourteen' to the name of your theme in all
         * template files.
         */
        load_theme_textdomain('ttbc', get_template_directory() . '/languages');

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Top primary menu', 'ttbc'),
            'secondary' => __('Secondary menu on frontpage', 'ttbc'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));
        
//        add_theme_support('custom-logo', array(
//            'height' => 50,
//            'width' => 90,
//            'flex-height' => true,
//            'flex-width' => true,
//            'header-text' => array('site-title', 'site-description'),
//        ));

        // This theme allows users to set a custom background.
        add_theme_support('custom-background', apply_filters('ttbc_custom_background_args', array(
            'default-color' => 'f5f5f5',
        )));

        // Add support for featured content.
        add_theme_support('featured-content', array(
            'featured_content_filter' => 'ttbc_get_featured_posts',
            'max_posts' => 6,
        ));

        // This theme uses its own gallery styles.
        add_filter('use_default_gallery_style', '__return_false');
        
        add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
    }

} // theme_setup

add_action('after_setup_theme', 'ttbc_setup');

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function ttbc_scripts() {
    $suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';

    // Add open sans font, used in the main stylesheet.
    wp_register_style('open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,300italic,300,700,700italic', array(), null);

    //fullPage.js
    wp_register_style('fullpage', get_template_directory_uri() . '/css/jquery.fullPage.css', array('open-sans'), '2.8.8');
    wp_register_script('fullpage', get_template_directory_uri() . '/js/jquery.fullPage' . $suffix . '.js', array('jquery'), '2.8.8');

    //font-awesome
    wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome' . $suffix . '.css', array(), '4.7.0');
   
    //progressbar.js
    wp_register_script('progressbar', get_template_directory_uri() . '/js/progressbar.min.js', array('jquery'), '1.0.1');

    // Load our main stylesheet.
    wp_register_style('ttbc-style', get_template_directory_uri() . '/css/style' . $suffix . '.css', array('fullpage', 'font-awesome', 'open-sans'), '1.0.6');
    wp_register_script('ttbc-script', get_template_directory_uri() . '/js/script.js', array('jquery', 'fullpage', 'progressbar'), '1.0.0', true);

    //enqueue
    wp_enqueue_script('ttbc-script');
    wp_enqueue_style('ttbc-style');
}

add_action('wp_enqueue_scripts', 'ttbc_scripts');
?>