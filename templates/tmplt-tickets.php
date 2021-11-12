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

            <p>1 show now playing!</p>
        </div>
    </section>

    <section class="tickets_section">
        <?php while( $products->have_posts() ): $products->the_post();
            $product = wc_get_product( get_the_ID() );
            $credits = get_field('credits');
            $ticket_dates = get_field('dates'); ?>
            <div class="ticket">
                <div class="left">
                    <div class="image_holder">
                        <?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
                    </div>
                </div>
                <form class="right ticket_variations_form" id="variations_form_<?php echo get_the_ID(); ?>">
                    <h2 class="title"><?php the_title(); ?></h2>
                    <?php
                    $handle = new WC_Product_Variable(get_the_ID());
                    $variations = $handle->get_children();
                    if( $variations && $ticket_dates ): ?>
                        <div class="pills_checkbox_inputs_holder">
                            <?php foreach ( $variations as $value ): $variation = new WC_Product_Variation($value); ?>
                                <label for="<?php echo $value; ?>">
                                    <input type="radio" id="<?php echo $value; ?>" name="ticket_type" value="<?php echo $value; ?>" required>
                                    <span class="checkmark">
                                        <span class="pill_content">
                                            <span class="price"><?php echo get_woocommerce_currency_symbol().$variation->get_price(); ?></span>
                                            <span class="type"><?php echo implode(" / ", $variation->get_variation_attributes()); ?></span>
                                        </span>
                                    </span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( get_the_content() || $credits ): ?>
                        <div class="descriptions">
                            <?php if( get_the_content() ): ?>
                                <div class="description_holder">
                                    <h2 class="subtitle">Summary</h2>
                                    <div class="description">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if( $credits ): ?>
                                <div class="description_holder">
                                    <h2 class="subtitle">Credits</h2>
                                    <div class="description credits">
                                        <?php foreach( $credits as $credit ): ?>
                                            <p><?php echo $credit['text']; ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $ticket_dates ): ?>
                        <button class="add_to_cart_ticket button" data-product-id="<?php echo get_the_ID(); ?>">Select Ticket</button>
                    <?php endif; ?>
                </form>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>

    <section class="info_section">
        <div class="info">
            <h2 class="info_title">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ticketing-icon.svg" alt="">
                <span>Ticketing</span>
            </h2>
            <div class="info_lists_holder">
                <ul>
                    <li>On-line ticket sales end 12 hours prior to curtain. If on-line sales have closed you may come to the theatre 30 minutes prior to curtain time to purchase tickets, however, there is no guarantee of ticket availability.</li>
                    <li>Any will-call ticket not claimed 10 minutes prior to curtain time may be re-sold.</li>
                    <li>Purchase tickets early – Lumina shows sell out! Especially the final shows!</li>
                    <li>PLEASE NOTE THAT ALL TICKET SALES ARE FINAL!</li>
                </ul>

                <ul>
                    <li>Allow time to park & walk to the theatre. Weekend parking in the Silver Spring garages can be limited so allow at least 30 minutes to park & walk to the theatre.</li>
                    <li>Theatre doors will remain open for 5 minutes past curtain. For the safety of our actors, patrons arriving later than that may not be admitted or seated.</li>
                    <li>If you arrive at the theatre with a ticket for another performance date or time, admittance will be at the discretion of the box office manager. PLEASE CHECK YOUR TICKET ORDER for show date & time BEFORE confirming purchase.</li>
                </ul>
            </div>
        </div>
        <div class="info">
            <h2 class="info_title">
                <img src="<?php echo get_template_directory_uri(); ?>/images/seating-icon.svg" alt="">
                <span>Seating</span>
            </h2>
            <div class="info_lists_holder">
                <ul>
                    <li>Tickets are sold based on the number of seats in the house.</li>
                    <li>We offer a “wait list” for tickets that are unclaimed.</li>
                    <li>All patrons must watch the show from a seat. There are no “standing room only” viewing areas.</li>
                    <li>Children under the age of 7* will not be admitted. All patrons, including children, must have a ticket.</li>
                </ul>

                <ul>
                    <li>All ticket holders must be seated 10 minutes prior to curtain time.</li>
                    <li>Saving seats for patrons who are not in the theatre is not permitted.</li>
                    <li>It is recommended that all ticket holders (and wait-list patrons) arrive at the theatre at least 30 minutes prior to curtain time.</li>
                    <li>*Due to material in some Lumina productions this age may be adjusted upwards.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="banner_section">
        <h2>Additional</h2>
        <h2>Faqs & Info</h2>
        <a href="/faq" class="button big blue">Learn More</a>
    </section>
</div>
<?php
get_footer(); ?>
