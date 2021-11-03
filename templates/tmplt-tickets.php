<?php
/* Template Name: Tickets */
get_header();

$products = new WP_Query(array(
    'post_type' => 'product',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => 'ticket'
        )
    )
));
?>
<div class="template_tickets_page_container">
    <h1 class="page_title"><?php the_title(); ?></h1>

    <section class="tickets_section">
        <?php while( $products->have_posts() ): $products->the_post();
            $product = wc_get_product( get_the_ID() );
//            $variations = $product->get_available_variations();
//            $variations_id = wp_list_pluck( $variations, 'variation_id' );
//            var_dump($variations_id);
            ?>
            <div class="ticket">
                <div class="left">
                    <div class="image_holder">
<!--                        --><?php //echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
                    </div>
                </div>
                <div class="right">
                    <div class="ticket_name"><?php the_title(); ?></div>
                    <button class="add_to_cart" data-product-id="<?php echo get_the_ID(); ?>">Add to cart</button>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>
</div>
<?php
get_footer(); ?>
