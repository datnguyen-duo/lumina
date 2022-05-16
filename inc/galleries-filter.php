<?php
function print_galleries($query = array()) {
    if( !$query ) {
        $query = new WP_Query(array(
            'post_type' => 'galleries',
            'posts_per_page' => -1,
        ));
    }
    if( $query->have_posts() ): ?>
        <div class="splide" style="display: block;">
            <div class="splide__track">
                <div class="splide__list">
                    <?php while( $query->have_posts() ): $query->the_post(); $short_desc = get_field('short_desc'); ?>
                        <div class="splide__slide">
                            <a href="<?php the_permalink(); ?>" class="gallery_image">
                                <div class="image_holder">
                                    <div class="image">
                                        <?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
                                    </div>
                                </div>

                                <p>
                                    <span class="name"><?php the_title(); ?></span>

                                    <?php if( $short_desc ): ?>
                                        <span class="short_desc"><?php echo $short_desc; ?></span>
                                    <?php endif; ?>
                                </p>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="no_galleries">
            <h2>There are no galleries.</h2>
        </div>
    <?php endif;
}

function filter_galleries() {
    $year = (int)$_GET['year'];

    $query_args = array(
        'post_type' => 'galleries',
        'posts_per_page' => -1,
        'date_query' => array()
    );

    if( $year && $year != 'all' ) {
        $query_args['date_query'] = array(
            'relation' => 'OR',
            array('year' => $year)
        );
    }

    $query = new WP_Query($query_args);

    print_galleries($query);
    die;
}
add_action('wp_ajax_filter_galleries', 'filter_galleries'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_galleries', 'filter_galleries');