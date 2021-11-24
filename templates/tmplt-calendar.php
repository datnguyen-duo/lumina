<?php
/* Template Name: Calendar */
get_header();
$events = new WP_Query(array(
    'post_type' => 'events',
    'orderby' => 'meta_value_num',
    'meta_key' => 'date',
    'order'	=> 'ASC',
));

$events_months = [];
while ( $events->have_posts() ): $events->the_post();
    //format must be in Ymd (20211123)
    $date = get_field('date');
    $date_year = date('Y', strtotime($date));
    $date_month = date('m', strtotime($date));
    $date_day = '01';

    $month = $date_year.$date_month.$date_day;

    if( !in_array( $month ,$events_months ) )
        array_push($events_months, $month);

endwhile; wp_reset_postdata();

$categories = get_terms( array(
    'taxonomy' => 'event-category',
    'hide_empty' => true,
) );
?>

<div class="template_calendar_page_container">
    <div class="filters">
        <?php if( $events_months ): ?>
            <div class="pill date date_slider">
                <?php
                foreach ( $events_months as $month ):
                    $date_month = date('F', strtotime($month)); ?>
                    <p data-value="<?php echo $month; ?>">
                        <?php echo $date_month; ?>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="pills_checkbox_inputs_holder">
                <label for="category_all">
                    <input type="radio" id="category_all" name="category" value="" checked>
                    <span class="checkmark">All</span>
                </label>

                <?php foreach ( $categories as $category ): ?>
                    <label for="category_<?php echo $category->slug; ?>">
                        <input type="radio" id="category_<?php echo $category->slug; ?>" name="category" value="<?php echo $category->slug; ?>">
                        <span class="checkmark"><?php echo $category->name; ?></span>
                    </label>
                <?php endforeach; ?>
            </div>

            <div id="dropdown">
                <select name="category">
                    <option value="">All</option>

                    <?php foreach ( $categories as $category ): ?>
                        <option value="<?php echo $category->slug ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>
    </div>

    <h1 class="page_title">Calendar</h1>
    <div id="events_response" data-action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
        <?php
        $first_day_of_the_month =  date('Ym01', strtotime($events_months[0]));
        $last_day_of_the_month = date('Ymt', strtotime($events_months[0]));

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
            )
        );
        print_calendar($events_args); ?>
    </div>
    <?php
    $boxes = get_field('boxes_section');
    if( $boxes ): ?>
        <section class="boxes_section <?php echo ( sizeof($boxes) > 2 ) ? ' more_than_two_boxes' : null; ?>">
            <?php foreach ( $boxes as $box ): ?>
                <div class="box">
                    <div class="box_content">
                        <?php if( $box['icon'] ): ?>
                            <img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/dev/box-icon-1.svg">
                        <?php endif; ?>

                        <?php if( $box['title'] ): ?>
                            <h2><?php echo $box['title']; ?></h2>
                        <?php endif; ?>

                        <?php
                        $link = $box['link'];
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="button big" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                <?php echo esc_html( $link_title ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
</div>
<?php
get_footer(); ?>
