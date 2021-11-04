<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="viewport" class="loading">
    <div id="scroll-container">

    <?php
    $is_light = (
        is_page_template(array('templates/tmplt-home.php','templates/tmplt-faq.php'))
        ||
        has_term( 'program', 'product_cat')
    );
    ?>
    <header class="site_header <?php echo ( $is_light ) ? ' light' : null; ?>">
        <a href="<?php echo get_site_url(); ?>" class="logo">
            <img class="light" src="<?php echo get_template_directory_uri(); ?>/images/logo-light.png" alt="">
            <img class="dark" src="<?php echo get_template_directory_uri(); ?>/images/logo-dark.png" alt="">
        </a>

        <nav>
            <ul>
                <li><a href="">Support</a></li>
                <li><a href="">Register</a></li>
            </ul>
        </nav>

        <div class="hamburger_holder">
            <p class="cart_link custom_side_cart_opener">Cart</p>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <div class="site_main_nav">
        <div class="separator"></div>
        <div class="separator_second"></div>
        <div class="main_nav_content">
            <div class="left">
                <nav>
                    <ul>
                        <li>
                            <a href="">Lumina</a>

                            <ul class="sub-menu">
                                <li><a href="">Home</a></li>
                                <li><a href="">About</a></li>
                                <li><a href="">Gallery</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="right">
                <nav>
                    <ul>
                        <li>
                            <a href="">Theatre</a>

                            <ul class="sub-menu">
                                <li><a href="">Programs</a></li>
                                <li><a href="">FAQ & Policies</a></li>
                                <li><a href="">Tickets</a></li>
                                <li><a href="">Calendar</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <?php render_shopping_cart(); ?>