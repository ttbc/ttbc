<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
?>

<?php if (is_front_page()) : ?>
    <nav id="secondary-navigation" class="site-navigation secondary-navigation" role="navigation">
        <?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_class' => 'nav-menu')); ?>
    </nav>
<?php endif; ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Start the loop.
        while (have_posts()) : the_post();

            // Include the page content template.
            get_template_part('content', 'page');

        // End the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>

