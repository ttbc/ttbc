<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

$post = get_post();
?>

<div id="<?php echo $post->post_name ?>" class="section section-<?php echo $post->post_name ?>">
    <header class="entry-header">
        <?php
        the_title('<h1 class="entry-title">', '</h1>');
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content();
        ?>
    </div><!-- .entry-content -->

</div><!-- #post-## -->
