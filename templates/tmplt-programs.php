<?php
/* Template Name: Programs */
get_header();

$products = new WP_Query(array(
    'post_type' => 'product',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => 'registration'
        )
    )
));
?>
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

    <h1 class="page_title"><?php the_title(); ?></h1>

    <section class="programs_section">
        <?php while( $products->have_posts() ): $products->the_post();
            $product = wc_get_product( get_the_ID() );
            $type = get_field('type');
            ?>
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
                    <?php if( $type ): ?>
                        <p class="program_category"><?php echo $type['label']; ?></p>
                    <?php endif; ?>

                    <h2 class="program_title"><?php the_title(); ?></h2>

                    <?php if( get_the_content() ): ?>
                        <p class="program_description"><?php echo wp_trim_words(get_the_content(),30); ?></p>
                    <?php endif; ?>
                </div>

                <div class="column cta_col">
                    <a href="<?php the_permalink(); ?>" class="button">Register</a>
                    <p>Registration Cost: <?php echo get_woocommerce_currency_symbol().$product->get_price(); ?></p>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>

    <section class="banner_section">
        <h2>FAQS &</h2>
        <h2>Information</h2>
        <a class="button big blue">Learn More</a>
    </section>
</div>
<?php
get_footer(); ?>
