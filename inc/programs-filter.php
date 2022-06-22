<?php

function print_programs($programs_args) {
    $programs = new WP_Query($programs_args);
    if( $programs->have_posts() ):
    while( $programs->have_posts() ): $programs->the_post();
        $product = wc_get_product( get_the_ID() );
        $type = get_field('type');
        $age_limit_min = get_field('age_limit_min');
        $age_limit_max = get_field('age_limit_max');
        $age_limit_message = get_field('age_limit_message');
        $img_id = $product -> get_image_id();
        $img_url = wp_get_attachment_image_url( $img_id, 'full' );
        ?>
        <div class="program">
            <div class="column img_col">
                <?php if( $age_limit_min ): ?>
                    <div class="circle">
                        <span class="ages">
                            AGES
                            <br>
                            <?php
                            echo $age_limit_min;
                            if( $age_limit_max ): echo '-'.$age_limit_max; else: echo "+"; endif; ?>
                        </span>

                        <?php if( $age_limit_message ): ?>
                            <span class="circle_desc"><?php echo $age_limit_message; ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="image_holder">
                    <img src="<?php echo $img_url?>" alt="program-image">
                </div>
            </div>

            <div class="column info_col">
                <?php if( $type ): ?>
                    <p class="program_category"><?php echo $type['label']; ?></p>
                <?php endif; ?>

                <h2 class="program_title"><?php the_title(); ?></h2>

                <?php if( get_the_content() ): ?>
                    <p class="program_description"><?php echo get_the_content(); ?></p>
                <?php endif; ?>
            </div>

            <div class="column cta_col">
                <a href="<?php the_permalink(); ?>" class="button">Register</a>
                <p>Registration Cost: <?php if($product->get_price()): echo get_woocommerce_currency_symbol().$product->get_price(); else: echo "TBD"; endif;?></p>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata();
    else: ?>
    <div class="no_results">
        <h2>There are no any program available right now.</h2>
    </div>
    <?php endif;
}

function filter_programs() {
    $filtered_type = $_POST['type'];
    $filtered_sort = $_POST['sort'];

    $programs_args = array(
        'post_type' => 'product',
        // 'meta_key'			=> 'age_limit_min',
        // 'orderby'			=> 'meta_value_num',
        'order_by' => 'pubish_date',
        'order'				=> ( $filtered_sort ) ? $filtered_sort : 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'registration'
            )
        ),
        'meta_query' => [
            'relation' => 'OR'
        ]
    );

    if( $filtered_type ) {
        //Check if filtration si from mobile device
        //first element will be always empty if filtration is from mobile device(select dropdown)
        if( $filtered_type[0] ) {
            foreach ($filtered_type as $type) {
                array_push($programs_args['meta_query'], array(
                    'key' => 'type',
                    'value' => $type,
                    'compare' => '=',
                ));
            }
        }
    }

    print_programs($programs_args);
    die;
}
add_action('wp_ajax_filter_programs', 'filter_programs'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_programs', 'filter_programs');