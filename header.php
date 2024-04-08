<?php
/**
 * 
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Team9A2
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <!-- include bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">
            <?php esc_html_e('Skip to content', 'team9a2'); ?>
        </a>
        <header id="masthead" class="site-header">
            <!-- dark blue div above the navbar -->
            <div id="dark-blue-div" class="dark-blue-header">

            </div>
            <!-- navbar that sites below header and contains basically everything -->
            <nav class="navbar main-navigation">
                <!-- full width container that spans entire viewport -->
                <div class="container-fluid">
                    <!-- This div contains the entire row -->
                    <div class="row align-items-center">
                        <!-- offcanvas button -->
                        <div class="col">
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                                aria-label="Toggle navigation">
                                <!-- change colour of offcanvas menu button to white -->
                                <svg class="custom-icon" xmlns="http://www.w3.org/2000/svg" width="34" height="34"
                                    fill="#fff" class="bi bi-list" viewBox="0 0 16 16"
                                    style="font-weight: bold; stroke: none;">
                                    <path fill-rule="evenodd"
                                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </button>
                        </div>

                        <!-- this column stores the logo img-->
                        <div class="col-auto">
                            <?php if (has_custom_logo()): ?>
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
                                $logo_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
                                ?>
                                <!-- important to set max height and width to auto so images can resize properly without ruining aspect ratio -->
                                <img src="<?php echo esc_url($logo_image[0]); ?>" alt="<?php echo esc_attr($logo_alt); ?>"
                                    style="max-height: 100px; width: auto;" class="img-fluid">
                            <?php else: ?>
                                <!-- placeholder/fallback logo which will by default be set as base theme logo until changed to something custom by user -->
                                <img src="<?php echo get_template_directory_uri(); ?>/images/U3A_logo.png"
                                    alt="<?php bloginfo('name'); ?>" style="max-height: 100px; width: auto;"
                                    class="img-fluid">
                            <?php endif; ?>
                        </div>

                        <!-- this column is used to store all wordpress nav menu items-->
                        <div class="col-auto">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary-menu', 
                                    'menu_class' => 'navbar-nav', 
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- offcanvas sidebar menu -->
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <?php
                    // offcanvas menu content
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary-menu', // Replace 'primary-menu' with the menu location name or ID
                            'menu_class' => 'navbar-nav',
                        )
                    );
                    ?>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </header>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>