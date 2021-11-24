<?php

function print_calendar($events_args) {
    $events = new WP_Query($events_args);

    if( $events->have_posts() ):
        //step 1
        //Get all events dates without duplicates(if there are multiple events on the same date)
        $events_dates = [];
        while ( $events->have_posts() ): $events->the_post();
            //format must be in Ymd (20211123)
            $date = get_field('date');

            if( !in_array( $date ,$events_dates ) )
                array_push($events_dates, $date);
        endwhile; wp_reset_postdata();
        //step 1 END
        ?>

        <!--
        Step 2
        Loop through the events_dates and call(make query) all events for every date
        Mobile part-->
        <section class="dates_section_mobile">
            <?php
            foreach ( $events_dates as $date ):
                $date_events = new WP_Query(array(
                    'post_type' => 'events',
                    'meta_key'		=> 'date',
                    'meta_value'	=> $date,
                    'tax_query' => $events_args['tax_query']
                ));
                $date_day_of_the_month = date('d', strtotime($date));
                $date_day_of_the_week = date('l', strtotime($date));
                ?>
                <div class="date">
                    <div class="events_date">
                        <div class="date_part_1"><?php echo $date_day_of_the_month; ?></div>
                        <div class="date_part_2"><?php echo $date_day_of_the_week; ?></div>
                    </div>

                    <div class="events">
                        <?php
                        while( $date_events->have_posts() ): $date_events->the_post();
                            $categories = get_the_terms(get_the_ID(), 'event-category');
                            $short_desc = get_field('short_description');
                        ?>
                            <div class="event">
                                <div class="info">
                                    <?php if( $categories ): ?>
                                        <p class="event_category"><?php echo $categories[0]->name; ?></p>
                                    <?php endif; ?>

                                    <h2 class="event_title"><?php the_title(); ?></h2>

                                    <?php if( $short_desc ): ?>
                                        <p class="event_description"><?php echo $short_desc; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
        <!--Mobile part END

        Desktop part-->
        <section class="dates_section_desktop">
            <?php
            foreach ( $events_dates as $date ):
                $date_events = new WP_Query(array(
                    'post_type' => 'events',
                    'meta_key'		=> 'date',
                    'meta_value'	=> $date,
                    'tax_query' => $events_args['tax_query']
                ));
                $date_day_of_the_month = date('d', strtotime($date));
                $date_day_of_the_week = date('l', strtotime($date));

                if( $date_events->have_posts() ):
                    if( $date_events->found_posts > 1 ): ?>
                        <div class="date">
                            <div class="events_date">
                                <div class="date_part_1"><?php echo $date_day_of_the_month; ?></div>
                                <div class="date_part_2"><?php echo $date_day_of_the_week ?></div>
                            </div>

                            <div class="events">
                                <div class="events_slider">
                                    <?php while( $date_events->have_posts() ): $date_events->the_post();
                                        $categories = get_the_terms(get_the_ID(), 'event-category');
                                        $short_desc = get_field('short_description');
                                    ?>
                                        <div class="event_slide">
                                            <div class="event">
                                                <div class="image_holder">
                                                    <div class="image">
                                                        <?php echo get_the_post_thumbnail(); ?>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <?php if( $categories ): ?>
                                                        <p class="program_category"><?php echo $categories[0]->name; ?></p>
                                                    <?php endif; ?>

                                                    <h2 class="program_title"><?php the_title(); ?></h2>

                                                    <?php if( $short_desc ): ?>
                                                        <p class="program_description"><?php echo $short_desc; ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php while( $date_events->have_posts() ): $date_events->the_post();
                            $categories = get_the_terms(get_the_ID(), 'event-category');
                            $short_desc = get_field('short_description');
                            ?>
                            <div class="date">
                                <div class="events_date">
                                    <div class="date_part_1"><?php echo $date_day_of_the_month; ?></div>
                                    <div class="date_part_2"><?php echo $date_day_of_the_week ?></div>
                                </div>

                                <div class="events">
                                    <div class="event">
                                        <div class="image_holder">
                                            <div class="image">
                                                <?php echo get_the_post_thumbnail(); ?>
                                            </div>
                                        </div>

                                        <div class="info">
                                            <?php if( $categories ): ?>
                                                <p class="program_category"><?php echo $categories[0]->name; ?></p>
                                            <?php endif; ?>

                                            <h2 class="program_title"><?php the_title(); ?></h2>

                                            <?php if( $short_desc ): ?>
                                                <p class="program_description"><?php echo $short_desc; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile; wp_reset_postdata();
                    endif;
                endif;
            endforeach; ?>
        </section>
        <!--Desktop part END
        Step 2 END-->
    <?php else: ?>
        <section class="no_events_section">
            <h2>There is no upcoming events right now.</h2>
        </section>
    <?php endif;
}

function filter_calendar() {
    $filtered_date = $_POST['date'];
    $filtered_category = $_POST['category'];

    $first_day_of_the_month =  date('Ym01', strtotime($filtered_date));
    $last_day_of_the_month = date('Ymt', strtotime($filtered_date));

    $events_args = array(
        'post_type' => 'events',
        'orderby' => 'meta_value_num',
        'meta_key' => 'date',
        'order'	=> 'ASC',
        'meta_query' => array(
            array (
                'key' => 'date',
                'value' => array($first_day_of_the_month, $last_day_of_the_month),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        ),
        'tax_query' => array()
    );

    if( $filtered_category ) {
        array_push($events_args['tax_query'],array(
            'taxonomy' => 'event-category',
            'terms' => $filtered_category,
            'field' => 'slug',
        ));
    }

    print_calendar($events_args);
    die;
}

add_action('wp_ajax_filter_calendar', 'filter_calendar'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_calendar', 'filter_calendar');