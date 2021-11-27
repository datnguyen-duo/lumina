        <?php
        $checkoutPage = ( is_checkout() && empty( is_wc_endpoint_url('order-received')) );
        if( !$checkoutPage ): ?>
            <footer class="site_footer">
                <div class="top">
                    <div class="left">
                        <h2>Subscribe to Lumina for the latest updates</h2>
                        <form action="">
                            <input type="email" placeholder="Email Address">
                            <button><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt=""></button>
                        </form>

                        <div class="contact_info">
                            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-dark.png" alt="">
                            <p>8641 Colesville Rd Silver Spring MD 20910, <a href="tel:(301) 565-2281"> (301) 565-2281</a></p>
                        </div>
                    </div>
                    <div class="right">
                        <nav>
                            <ul class="menu">
                                <li>
                                    <a href="">Lumina</a>

                                    <ul class="sub-menu">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/about/">About</a></li>
                                        <!-- <li><a href="/">Gallery</a></li> -->
                                        <li><a href="/support/">Support</a></li>
                                        <li><a href="/contact/">Contact</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="">Theatre</a>

                                    <ul class="sub-menu">
                                        <li><a href="/programs">Programs</a></li>
                                        <li><a href="/faq">FAQ & Policies</a></li>
                                        <li><a href="/tickets">Tickets</a></li>
                                        <li><a href="/calendar">Calendar</a></li>
                                        <li><a class="custom_side_cart_opener">Cart</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="social_media">
                            <p>Follow Us</p>

                            <ul>
                                <li><a href="https://www.facebook.com/LuminaStudioTheater/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/social-media/facebook.svg" alt=""></a></li>
                                <li><a href="https://www.instagram.com/luminastudiotheatre/?hl=en" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/social-media/instagram.svg" alt=""></a></li>
                                <li><a href="https://www.youtube.com/channel/UCPp30MGZtbEp22ak3TwatzQ" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/social-media/youtube.svg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="contact_info">
                        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-dark.png" alt="">
                        <p>8641 Colesville Rd Silver Spring MD 20910, <a href="tel:(301) 565-2281">(301) 565-2281</a></p>
                    </div>
                    <p class="copyright">©2021 Lumina Studio Theatre. All rights reserved.</p>
                </div>
            </footer>
        <?php endif; ?>
    </div><!-- #scroll-container-->
</div><!-- #viewport -->
<?php wp_footer(); ?>
</body>

</html>