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
                    <h4>Donation Preferences</h4>
                    <div class="form-wrapper">
                        <p>I want to contribute:</p>
                        <?php echo do_shortcode('[wc_woo_donation id="55"]')?>
                        <p>to Lumina Studio Theatre</p>
                        <div class="btn-wrapper">
                            <div class="btn">This is a one time donation</div>
                            <div class="btn">I would like to make this a recurring donation</div>
                        </div>
                        <div class="btn-wrapper">
                            <div class="btn">Monthly</div>
                            <div class="btn">Quarterly</div>
                            <div class="btn">Annually</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4>Privacy Preferences</h4>
                    <div class="btn-wrapper">
                        <div class="btn">My full contact information</div>
                        <div class="btn">My name and email only</div>
                        <div class="btn">Anonymous</div>
                    </div>
                </div>
                <div class="row">
                    <h4>Designation (Optional)</h4>
                    <p>To designate your donation for a specific fund or purpose, please enter a description of how you'd like your donation to be used.</p>
                    <input type="text">
                </div>
                <div class="row">
                    <h4>Designation (Optional)</h4>
                    <p>To designate your donation for a specific fund or purpose, please enter a description of how you'd like your donation to be used.</p>
                    <input type="text">
                </div>
                <div class="row">
                    <button>Add to Cart</button>
                </div>
            </div>
        </div>
    </section>


</div>
<?php
get_footer(); ?>
