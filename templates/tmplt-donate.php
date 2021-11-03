<?php
/* Template Name: Donate */
get_header(); ?>
<div class="template_donate_page_container">
    <section class="hero_section">
        <div class="hero_section_content">
            <div class="hero_title">
                <h1>DONATE</h1>
            </div>
            <div class="container">
                <div class="row">
                    <h2>Donation Preferences</h2>
                    <div class="form-wrapper">
                        <div class="inner">
                            <h4>I want to contribute:</h4>
                            <?php echo do_shortcode('[wc_woo_donation id="55"]')?>
                            <h4>to Lumina Studio Theatre</h4>
                        </div>
                        <div class="inner">
                            <div class="btn-wrapper">
                                <div class="btn pill">This is a one time donation</div>
                                <div class="btn pill">I would like to make this a recurring donation</div>
                            </div>
                            <div class="btn-wrapper">
                                <div class="btn pill">Monthly</div>
                                <div class="btn pill">Quarterly</div>
                                <div class="btn pill">Annually</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h2>Privacy Preferences</h2>
                    <div class="btn-wrapper">
                        <div class="btn pill">My full contact information</div>
                        <div class="btn pill">My name and email only</div>
                        <div class="btn pill">Anonymous</div>
                    </div>
                </div>
                <div class="row">
                    <h2>Designation (Optional)</h2>
                    <p>To designate your donation for a specific fund or purpose, please enter a description of how you'd like your donation to be used.</p>
                    <input type="text" class="full-width">
                </div>
                <div class="row">
                    <h2>Dedication Or Gift(Optional)</h2>
                    <p>To make a donation on behalf of or in memory of another person, please enter the person’s name. You will have a chance to send an eCard to this person at the end of making a donation.</p>
                    <input type="text" class="full-width">
                </div>
                <div class="row">
                    <button class="pill">Add to Cart</button>
                </div>
            </div>
        </div>
    </section>


</div>
<?php
get_footer(); ?>
