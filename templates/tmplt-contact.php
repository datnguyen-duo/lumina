<?php
/* Template Name: Contact */
get_header(); ?>
<div class="template_contact_page_container">
    <h1 class="page_title">Contact</h1>

    <section class="map_section">
        <div class="map_holder">
            <div class="map">
                <img src="<?php echo get_template_directory_uri(); ?>/images/dev/map.png" alt="">
            </div>

            <div class="map_info">
                <div class="info">
                    <div class="info_title">Find US</div>
                    <div class="info_desc">
                        8641 Colesville Rd,
                        Silver Spring, MD 20910
                    </div>
                </div>
                <div class="info">
                    <div class="info_title">Office hours</div>
                    <div class="info_desc">
                        Monday-Thursday,<br>
                        9am-3pm
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="boxes_section">
        <h2 class="title">To reach Lumina Studio Theatre from downtown Silver Spring/Takoma Park:</h2>

        <div class="boxes">
            <div class="box">
                <div class="box_content">
                    <h2>Walking/Driving</h2>
                    <p>Lumina’s office is located in the lower level of the Silver Spring Black Box Theatre – on Colesville Road, one block North of the intersection of Colesville Road and Georgia Avenue. DROP OFF/PICKUP students in the side alley.</p>
                </div>
            </div>
            <div class="box">
                <div class="box_content">
                    <h2>By Metro</h2>
                    <p>Take the Red Line train to the SILVER SPRING station.  Exit the station and walk NORTH on Colesville Road. The Silver Spring Black Box is 3 blocks NORTH of the Metro Station.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="contact_section">
        <div class="contact">
            <h2 class="contact_title">Email Us</h2>
            <a href="">office@luminastudio.org </a>
        </div>
        <div class="contact">
            <h2 class="contact_title">Call Us</h2>
            <a href="">(301) 565-2281</a>
        </div>
        <div class="contact">
            <h2 class="contact_title">Follow Us</h2>
            <ul>
                <li><a href="" target="_blank">FACEBOOK</a></li>
                <li><a href="" target="_blank">INSTAGRAM</a></li>
                <li><a href="" target="_blank">YOUTUBE</a></li>
            </ul>
        </div>
        <div class="contact">
            <h2 class="contact_title">Subscribe</h2>
            <form action="">
                <input type="text" placeholder="Enter your e-mail">
                <button><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-white.svg" alt=""></button>
            </form>
        </div>
    </section>
</div>
<?php
get_footer(); ?>
