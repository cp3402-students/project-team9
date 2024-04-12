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
 * @package _s
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="outer-content-container">
        <div class="content-container">
            <?php
            // Always display the outer content container
            // No matter if there's content or not
            while (have_posts()): the_post();

                // Output the post/page content
                the_content();

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()):
                    comments_template();
                endif;

            endwhile;
            ?>
        </div><!-- .content-container -->
    </div><!-- .outer-content-container -->
</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
