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
    <section class="hero_section">
        <div class="content">
            <h1 class="page_title big_headline_animation">Ticketing</h1>
            <h1 class="page_title big_headline_animation">& shows</h1>

            <p class="btn light">2 shows now playing!</p>
        </div>
    </section>

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

    <section class="info_section">
        <div class="info">
            <h2 class="info_title">Ticketing</h2>
            <div class="info_list_holder">
                <ul>
                    <li>On-line ticket sales end 12 hours prior to curtain. If on-line sales have closed you may come to the theatre 30 minutes prior to curtain time to purchase tickets, however, there is no guarantee of ticket availability.</li>
                    <li>Allow time to park & walk to the theatre. Weekend parking in the Silver Spring garages can be limited so allow at least 30 minutes to park & walk to the theatre.</li>
                    <li>Any will-call ticket not claimed 10 minutes prior to curtain time may be re-sold.</li>
                    <li>Theatre doors will remain open for 5 minutes past curtain. For the safety of our actors, patrons arriving later than that may not be admitted or seated.</li>
                    <li>Purchase tickets early – Lumina shows sell out especially the final shows.</li>
                    <li>If you arrive at the theatre with a ticket for another performance date or time, admittance will be at the discretion of the box office manager. PLEASE CHECK YOUR TICKET ORDER for show date & time BEFORE confirming purchase.</li>
                </ul>
            </div>
        </div>
    </section>
</div>
<?php
get_footer(); ?>
