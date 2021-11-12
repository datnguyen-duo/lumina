<?php
/* Template Name: Calendar */
get_header(); ?>
<div class="template_calendar_page_container">
    <div class="filters">
        <div class="pill date date_slider">
            <p>January</p>
            <p>February</p>
            <p>March</p>
            <p>April</p>
            <p>May</p>
            <p>June</p>
            <p>July</p>
            <p>August</p>
            <p>September</p>
            <p>October</p>
            <p>November</p>
            <p>December</p>
        </div>

        <ul>
            <li class="pill active">All</li>
            <li class="pill">Performances</li>
            <li class="pill">REHEARSALS</li>
            <li class="pill">Registration</li>
        </ul>
    </div>

    <h1 class="page_title">Calendar</h1>

    <section class="dates_section mobile">
        <div class="date">
            <div class="events_date">
                <div class="date_part_1">05</div>
                <div class="date_part_2">Sunday</div>
            </div>

            <div class="events">
                <?php for($i=0; $i<3; $i++): ?>
                    <div class="event">
                        <div class="info">
                            <p class="program_category">Registration</p>
                            <h2 class="program_title">Registration Open for Oliver Twist</h2>
                            <p class="program_description">For Players</p>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <div class="date">
            <div class="events_date">
                <div class="date_part_1">05</div>
                <div class="date_part_2">Sunday</div>
            </div>

            <div class="events">
                <?php for($i=0; $i<3; $i++): ?>
                    <div class="event">
                        <div class="info">
                            <p class="program_category">Registration</p>
                            <h2 class="program_title">Registration Open for Oliver Twist</h2>
                            <p class="program_description">For Players</p>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <div class="date">
            <div class="events_date">
                <div class="date_part_1">05</div>
                <div class="date_part_2">Sunday</div>
            </div>

            <div class="events">
                    <div class="event">
                        <div class="info">
                            <p class="program_category">Registration</p>
                            <h2 class="program_title">Registration Open for Oliver Twist</h2>
                            <p class="program_description">For Players</p>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <section class="dates_section desktop">
        <div class="date">
            <div class="events_date">
                <div class="date_part_1">05</div>
                <div class="date_part_2">Sunday</div>
            </div>

            <div class="events">
                <div class="events_slider">
                    <?php for($i=0; $i<3; $i++): ?>
                        <div class="event_slide">
                            <div class="event">
                                <div class="image_holder">
                                    <div class="image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/dev/Winters Tale Players.jpg">
                                    </div>
                                </div>

                                <div class="info">
                                    <p class="program_category">Registration</p>
                                    <h2 class="program_title">Registration Open for Oliver Twist</h2>
                                    <p class="program_description">For Players</p>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <?php for($i=0; $i<5; $i++): ?>
            <div class="date">
                <div class="events_date">
                    <div class="date_part_1">05</div>
                    <div class="date_part_2">Sunday</div>
                </div>

                <div class="events">
                    <div class="event">
                        <div class="image_holder">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/dev/Winters Tale Players.jpg">
                            </div>
                        </div>

                        <div class="info">
                            <p class="program_category">Registration</p>
                            <h2 class="program_title">Registration Open for Oliver Twist</h2>
                            <p class="program_description">For Players</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </section>

    <section class="boxes_section">
        <div class="box">
            <div class="box_content">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/dev/box-icon-1.svg">
                <h2>Buy Your Tickets</h2>
                <a href="/programs" class="button big">Buy Tickets</a>
            </div>
        </div>
        <div class="box">
            <div class="box_content">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/dev/box-icon-2.svg">
                <h2>Register Today</h2>
                <a href="/tickets" class="button big">Register</a>
            </div>
        </div>
    </section>
</div>
<?php
get_footer(); ?>
