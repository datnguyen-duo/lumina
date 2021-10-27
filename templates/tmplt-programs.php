<?php
/* Template Name: Programs */
get_header(); ?>
<div class="template_programs_page_container">
    <div class="filters">
        <ul>
            <li class="pill active">All</li>
            <li class="pill">Rehearsal Groups</li>
            <li class="pill">Summerstock Camps</li>
        </ul>

        <div class="pill sort">
            AGE
            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-2.svg">
        </div>
    </div>

    <h1 class="page_title">Programs</h1>

    <section class="programs_section">
        <?php for($i=0; $i<7; $i++): ?>
            <div class="program">
                <div class="column img_col">
                    <div class="circle">
                        <span class="ages">AGES<br>8-11</span>
                        <span class="circle_desc">By Invite</span>
                    </div>

                    <div class="image_holder">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/dev/Winters Tale Players.jpg">
                    </div>
                </div>

                <div class="column info_col">
                    <p class="program_category">Summerstock Camps</p>
                    <h2 class="program_title">The spoon of loch garve: a brand new scottish quest</h2>
                    <p class="program_description">Lumina’s youngest actors begin their exciting theatre experience as Players. They work with speech creatively, learn to develop basic characters, and practice the fundamentals of acting.</p>
                </div>

                <div class="column cta_col">
                    <a class="button">Register</a>
                    <p>Registration Cost: $550</p>
                </div>
            </div>
        <?php endfor; ?>
    </section>

    <section class="banner_section">
        <h2>FAQS &</h2>
        <h2>Information</h2>
        <a class="button big blue">Learn More</a>
    </section>
</div>
<?php
get_footer(); ?>
