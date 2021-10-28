<?php
/* Template Name: Faq */
get_header(); ?>
<div class="template_faq_page_container">
    <section class="hero_section">
        <div class="hero_section_content">
            <div class="hero_title">
                <h1>FAQ &</h1>
                <h1>POLICES</h1>
            </div>

            <div class="info">
                <div class="left">
                    <h2>If you are new to Lumina Studio Theatre, welcome! If you are one of our many continuing Lumina families, welcome back!</h2>
                </div>
                <div class="right">
                    <p>Have a question you don’t see answered below? </p>

                    <div class="circle_btn_holder">
                        <a href="#" class="circle_btn">
                            <img class="circle" src="<?php echo get_template_directory_uri(); ?>/images/circle.svg" alt="">
                            <span class="circle_text_holder">
                                <img class="circle_text" src="<?php echo get_template_directory_uri(); ?>/images/circle-text.svg" alt="">
                            </span>
                            <img class="circle_arrow" src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="questions_section">
        <div class="questions_group">
            <h2 class="group_title">Registration & policies</h2>

            <div class="questions">
                <?php for($i=0; $i<10; $i++): ?>
                    <div class="question">
                        <h3 class="question_title">
                            Registration
                            <button class="icon_btn"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt=""></button>
                        </h3>
                        <div class="question_text">
                            <p>
                                Once Lumina receives the registration form and payment, the registration is considered final and there are NO REFUNDS! The refund policy is clear – NO EXCEPTIONS! This policy applies whether the actor drops out or is asked to leave. If an actor changes this or her mind or drops out, the production fee cannot be “credited” towards another session or be considered a donation. Please understand that we cannot make exceptions to this NO REFUNDS policy.
                            </p>
                        </div>
                    </div>
                <?php endfor; ?>

                <!--Dont delete question empty div. This empty div is just for design layout-->
                <div class="question"></div>
            </div>
        </div>

        <div class="questions_group">
            <h2 class="group_title">Frequently Asked Questions</h2>

            <div class="questions">
                <?php for($i=0; $i<10; $i++): ?>
                    <div class="question">
                        <h3 class="question_title">
                            Where do you perform?
                            <button class="icon_btn"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt=""></button>
                        </h3>
                        <div class="question_text">
                            <p>
                                Lumina’s shows are performed at Silver Spring Black Box, 8641 Colesville Road, Silver Spring. It is located next to the AFI theatre. The performance location will always be noted at the ticket sale site www.Brownpapertickets.com
                            </p>
                        </div>
                    </div>
                <?php endfor; ?>
                <!--Dont delete question empty div. This empty div is just for design layout-->
                <div class="question"></div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer(); ?>
