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
        has_term( array('registration'), 'product_cat')
    );
    ?>
    <header class="site_header <?php echo ( $is_light ) ? ' light' : null; ?>">
        <a href="<?php echo get_site_url(); ?>" class="logo">
            <img class="light" src="<?php echo get_template_directory_uri(); ?>/images/logo-light.png" alt="">
            <img class="dark" src="<?php echo get_template_directory_uri(); ?>/images/logo-dark.png" alt="">
        </a>

        <?php
        if( has_nav_menu('menu-3') ): ?>
            <nav>
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'menu-3',
                        'container' => false,
                    )
                ); ?>
            </nav>
        <?php endif; ?>

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
        <div class="main_nav_content_holder">
            <div class="main_nav_content">
                
                <div class="left">
                    <img class="menu_gradient1" src="<?php echo get_template_directory_uri(); ?>/images/menu_gradient1.svg" alt="">
                    <?php
                    if( has_nav_menu('menu-1') ): ?>
                        <nav>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'container' => false,
                                )
                            ); ?>
                        </nav>
                    <?php endif; ?>

                    <div class="form_holder desktop">
                        <p>
                            Subscribe to Lumina for the latest updates
                        </p>
                        <form action="">
                            <input type="email" placeholder="Email Address">
                            <div class="icon_btn">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-3.svg" alt="">
                                <input type="submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class="separator_mobile"></div>
                <div class="right">
                    <img class="menu_gradient2" src="<?php echo get_template_directory_uri(); ?>/images/menu_gradient2.svg" alt="">

                    <?php
                    if( has_nav_menu('menu-2') ): ?>
                        <nav>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-2',
                                    'container' => false,
                                )
                            ); ?>
                        </nav>
                    <?php endif; ?>

                    <div class="form_holder mobile">
                        <p>
                            Subscribe to Lumina for the latest updates
                        </p>
                        <form action="">
                            <input type="email" placeholder="Email Address">
                            <div class="icon_btn">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-3.svg" alt="">
                                <input type="submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <?php
    $checkoutPage = ( is_checkout() && empty( is_wc_endpoint_url('order-received')) );
    if( !$checkoutPage ):
        render_shopping_cart();
    endif;
    ?>