<?php
        $checkoutPage = ( is_checkout() && empty( is_wc_endpoint_url('order-received')) );
        if( !$checkoutPage ):
            $phone = get_field('phone','option');
            $address = get_field('address','option');
            $copyright = get_field('copyright','option');
            $facebook = get_field('facebook','option');
            $instagram = get_field('instagram','option');
            $youtube = get_field('youtube','option'); ?>
            <footer class="site_footer">
                <div class="top">
                    <div class="left">
                        <h2>Subscribe to Lumina for the latest updates</h2>
                        <!-- Begin Constant Contact Inline Form Code -->
                        <div class="ctct-inline-form" data-form-id="ea484f0d-9149-4fcd-af14-2c2ce948281a"></div>
                        <!-- End Constant Contact Inline Form Code -->
                        <div class="contact_info">
                            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-dark.png" alt="">

                            <?php if( $address || $phone ): ?>
                                <p><?=$address; ?> <a href="tel:<?=$phone ?>"> <?=$phone ?></a></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="right">
                        <?php
                        if( has_nav_menu('menu-4') ): ?>
                            <nav>
                                <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'menu-4',
                                        'container' => false,
                                    )
                                ); ?>
                            </nav>
                        <?php endif; ?>

                        <?php if( $facebook || $instagram || $youtube ): ?>
                            <div class="social_media">
                                <p>Follow Us</p>

                                <ul>
                                    <?php if( $facebook ): ?>
                                        <li><a href="<?= $facebook; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/social-media/facebook.svg" alt=""></a></li>
                                    <?php endif; ?>

                                    <?php if( $instagram ): ?>
                                        <li><a href="<?= $instagram; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/social-media/instagram.svg" alt=""></a></li>
                                    <?php endif; ?>

                                    <?php if( $youtube ): ?>
                                        <li><a href="<?= $youtube; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/social-media/youtube.svg" alt=""></a></li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="contact_info">
                        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-dark.png" alt="">
                        <?php if( $address || $phone ): ?>
                            <p><?=$address; ?> <a href="tel:<?=$phone ?>"> <?=$phone ?></a></p>
                        <?php endif; ?>
                    </div>

                    <?php if( $copyright ): ?>
                        <p class="copyright"><?= $copyright ?></p>
                    <?php endif; ?>
                </div>
            </footer>
        <?php endif; ?>
    </div><!-- #scroll-container-->
</div><!-- #viewport -->
<?php wp_footer(); ?>
<!-- Begin Constant Contact Active Forms -->
<script> var _ctct_m = "2c2bc7f5f3221778dc457148819434af"; </script>
<script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
<!-- End Constant Contact Active Forms -->
</body>

</html>