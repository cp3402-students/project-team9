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
    <div class="custom-jumbotron">
        <?php
        // Output the jumbotron
        display_custom_jumbotron();
        ?>
    </div>

    <div class="content-container">
        <?php
        while (have_posts()):
            the_post();

            // Start of the content container
            echo '<div class="content-container">';
            // Output the post/page content
            the_content();
            // End of the content container
            echo '</div>';

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()):
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
    </div><!-- .content-container -->
</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
