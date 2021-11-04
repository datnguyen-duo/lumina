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
            ?>
            <div class="ticket">
                <div class="left">
                    <div class="image_holder">
                        <?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
                    </div>
                </div>
                <div class="right">
                    <h2 class="title"><?php the_title(); ?></h2>
                    <?php
                    $handle = new WC_Product_Variable(get_the_ID());
                    $variations = $handle->get_children();
                    if( $variations ): ?>
                        <div class="pills_checkbox_inputs_holder">
                            <?php foreach ( $variations as $value ): $variation = new WC_Product_Variation($value); ?>
                                <label for="<?php echo $value; ?>">
                                    <input type="radio" id="<?php echo $value; ?>" name="ticket_type" value="<?php echo $value; ?>">
                                    <span class="pill">
                                        <span class="pill_content">
                                            <span class="price"><?php echo get_woocommerce_currency_symbol().$variation->get_price(); ?></span>
                                            <span class="type"><?php echo implode(" / ", $variation->get_variation_attributes()); ?></span>
                                        </span>
                                    </span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( get_the_content() ): ?>
                        <div class="description_holder">
                            <h2 class="subtitle">Summary</h2>
                            <div class="description">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <button class="add_to_cart_ticket button" data-product-id="<?php echo get_the_ID(); ?>">Select Ticket</button>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>
</div>
<?php
$arr = array(
    'Ticket Type' => 'Senior'
);
//WC()->cart->add_to_cart( 71, 1, 75, $arr );
?>
<?php
get_footer(); ?>
