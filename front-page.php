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

<div id="primary" class="content-area">
    <div id="fullpage">

        <?php
        $latest_blog_posts = new WP_Query(array(
            'post_type' => 'page',
            'meta_key'  => 'featured',
            'orderby' => 'menu_order',
            'order'   => 'ASC',
        ));

        if ($latest_blog_posts->have_posts()) :
            // Start the loop.
            while ($latest_blog_posts->have_posts()) :
                $latest_blog_posts->the_post();
                // Include the page content template.
                get_template_part('content', 'page');
            // End the loop.
            endwhile;
        endif;
        ?>

    </div><!-- #fullpage -->
</div><!-- .content-area -->

<?php get_footer(); ?>
