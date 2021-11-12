<?php
function render_shopping_cart_items($is_item_added_to_cart = false) {
    $woocommerce_cart = WC()->cart->get_cart();
    $checkoutPage = ( is_checkout() && empty( is_wc_endpoint_url('order-received')) );

    if( $woocommerce_cart ):
        $checkout_url = wc_get_checkout_url();

        if( $is_item_added_to_cart ):
            $last_added_product_id = end( WC()->cart->cart_contents)['product_id'];
            $last_product_title = get_the_title($last_added_product_id);
            $last_product_categories = get_the_terms($last_added_product_id,'product_cat');
            $last_product_category = ( sizeof($last_product_categories) ) ? $last_product_categories[0] : '';
        ?>
            <p class="item_added_to_cart_message">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/checkmark.svg" alt="">
                <?php echo $last_product_title.' '.$last_product_category->name; ?>
                has been added to cart.
            </p>
        <?php endif;

        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
//            var_dump($cart_item);
            $item_name = $cart_item['data']->get_title();
            $quantity = $cart_item['quantity'];
            $product_id = $cart_item['product_id'];
            $price = $cart_item['data']->get_price();
            $image = get_the_post_thumbnail($product_id);

            if( $cart_item['custom_price_field'] ) {
                $price = $cart_item['custom_price_field'];
            }

            if( $cart_item['campaign_id'] ) {
                $image = get_the_post_thumbnail( $cart_item['campaign_id'] );
            }

            $price_with_symbol = get_woocommerce_currency_symbol().$price;
            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $categories = get_the_terms($product_id,'product_cat');
            $category = $categories[0];
            ?>
            <div class="item item_<?php echo $product_id; ?>" id="cart_item_<?php echo $cart_item_key; ?>">
                <div class="top_info">
                    <div class="product_image">
                        <div class="image_holder">
                            <?php echo $image; ?>
                        </div>
                    </div>

                    <div class="info">
                        <?php if( $category): ?>
                            <div class="product_type"><?php echo $category->name; ?></div>
                        <?php endif; ?>

                        <div class="product_name">
                            <?php
                            echo $item_name;
                            echo ( $quantity > 1 ) ? ' ('.$quantity.')' : null;
                            ?>
                        </div>
                    </div>

                    <div class="actions desktop">
<!--                        <div class="edit_item" data-product="--><?php //echo $product_id; ?><!--">Edit</div>-->
                        <?php
                        echo apply_filters(
                            'woocommerce_cart_item_remove_link',
                            sprintf(
                                '<a href="%s" class="remove_item" aria-label="%s" data-product_id="%s" data-target="'.$cart_item_key.'" data-product_sku="%s">Remove</a>',
                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                esc_html__( 'Remove this item', 'woocommerce' ),
                                esc_attr( $product_id ),
                                esc_attr( $_product->get_sku() )
                            ),
                            $cart_item_key
                        );
                        ?>
                    </div>
                </div>
                <?php if( $category->slug == 'ticket'):
                    $variations = $cart_item['variation'];
                    $time = $cart_item['custom_data']['time'];
                    $date = $cart_item['custom_data']['date'];
                ?>
                    <div class="bottom_info">
                        <ul>
                            <?php if( $time ): ?>
                                <li><?php echo $time ?></li>
                            <?php endif; ?>

                            <?php if( $date ): ?>
                                <li><?php echo $date ?></li>
                            <?php endif; ?>

                            <?php if( $variations ): ?>
                                <li>
                                    <?php
                                    foreach ($variations as $var ):
                                        echo ucfirst($var);
                                    endforeach; ?>
                                </li>
                            <?php endif; ?>
                            <li><?php echo $price_with_symbol; ?></li>
                        </ul>
                    </div>
                <?php elseif( $category->slug == 'donation'):
                    $donation_type = $cart_item['custom_data']['donation_type'];?>
                    <div class="bottom_info">
                        <ul>
                            <?php if( $donation_type ): ?>
                                <li><?php echo $donation_type; ?></li>
                            <?php endif; ?>
                            <li><?php echo $price_with_symbol; ?></li>
                        </ul>
                    </div>
                <?php else:
                    $registration_type = get_field('type', $product_id);
                    ?>
                    <div class="bottom_info">
                        <ul>
                            <?php if( $registration_type ): ?>
                                <li><?php echo $registration_type['label']; ?></li>
                            <?php endif; ?>
                            <li><?php echo $price_with_symbol; ?></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="actions mobile">
                    <?php
                    echo apply_filters(
                        'woocommerce_cart_item_remove_link',
                        sprintf(
                            '<a href="%s" class="remove_item" aria-label="%s" data-product_id="%s" data-target="'.$cart_item_key.'" data-product_sku="%s">Remove</a>',
                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                            esc_html__( 'Remove this item', 'woocommerce' ),
                            esc_attr( $product_id ),
                            esc_attr( $_product->get_sku() )
                        ),
                        $cart_item_key
                    );
                    ?>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if( !$checkoutPage ): ?>
            <div class="checkout_btn_holder">
                <a href="<?php echo $checkout_url; ?>" class="checkout_btn blue">Checkout</a>
            </div>
        <?php endif; ?>

    <?php else:
        echo '<p class="empty_cart_message">Your cart is empty.</p>';
    endif;
}

function update_shopping_cart() {
    $is_item_added_to_cart = $_POST['addedToCart'];
    render_shopping_cart_items($is_item_added_to_cart);
    die;
}
add_action('wp_ajax_updateshoppingcart', 'update_shopping_cart'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_updateshoppingcart', 'update_shopping_cart');

function render_shopping_cart() {
    $checkoutPage = ( is_checkout() && empty( is_wc_endpoint_url('order-received')) );
    ?>
    <div class="custom_cart_overlay <?php echo ( $checkoutPage ) ? ' checkout_page' : null; ?>"></div>

    <div class="custom_side_cart <?php echo ( $checkoutPage ) ? ' checkout_page' : null; ?>" data-action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
        <div class="custom_side_cart_content">
            <div class="cart_header">
                <h2 class="title">Your Cart</h2>

                <img class="close_cart" src="<?php echo get_template_directory_uri(); ?>/images/icons/times-circle.svg" alt="">
            </div>

            <div class="items" id="response">
                <?php render_shopping_cart_items(); ?>
            </div>
        </div>
    </div>
<?php }

function woo_custom_add_to_cart() {
    $product_id = $_POST['product_id'];
    $variation_id = $_POST['variation_id'];
    $quantity = ( isset($_POST['quantity']) ) ? $_POST['quantity'] : 1;

    add_filter('woocommerce_add_cart_item_data','wdm_add_item_data',1,10);
    function wdm_add_item_data($cart_item_data, $product_id) {
        global $woocommerce;

        $custom_data = $_POST['custom_data'];
        if( $custom_data ):
            $cart_item_meta['custom_data'] = $custom_data;
        endif;

        return $cart_item_meta;
    }

    WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );
}
add_action('wp_ajax_woo_custom_add_to_cart', 'woo_custom_add_to_cart'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_woo_custom_add_to_cart', 'woo_custom_add_to_cart');

function edit_ticket_product() {
    $product_id = $_POST['product_id'];
    $variation_id = $_POST['variation_id'];
    $product_variation = new WC_Product_Variation($variation_id);
    $variation_price = $product_variation->get_price();
    $variation_name = $product_variation->get_attribute('pa_ticket-type');
    $ticket_dates = get_field('dates',$product_id);
    ?>
    <div class="ticket_header">
        <h2><?php echo get_the_title($product_id); ?></h2>
        <img class="close_product" data-product-id="<?php echo $product_id; ?>" src="<?php echo get_template_directory_uri(); ?>/images/icons/times-circle.svg" alt="">
    </div>

    <form class="step step_1 active">
        <div class="dates">
            <?php foreach ( $ticket_dates as $date ): ?>
                <div class="date">
                    <p><?php echo $date['date']; ?></p>

                    <div class="dates_options">
                        <?php foreach ( $date['times'] as $time ):
                            $input_ID = 'input_'.$date['date'].'_'.$time['time'];
                        ?>
                            <label class="time_label" for="<?php echo $input_ID; ?>">
                                <input type="radio" value="<?php echo $date['date'].'__'.$time['time']; ?>" id="<?php echo $input_ID; ?>" name="date" required>
                                <span><?php echo $time['time']; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="button_holder">
            <div class="errors" id="step_1_errors_div"></div>

            <button class="button blue change_step" data-target=".step_2">Next</button>
        </div>
    </form>

    <div class="step step_2">
        <div class="variations">
            <div class="variation">
                <p class="variation_title"><?php echo $variation_name; ?></p>
                <div class="variation_content">
                    <div class="price">
                        <p class="price" data-value="<?php echo $variation_price; ?>"><?php echo get_woocommerce_currency_symbol(); ?><span><?php echo $variation_price; ?></span></p>
                    </div>
                    <div class="quantity">
                        <p>Quantity</p>
                        <div class="input_holder quantity_input_holder">
                            <span class="quantity_plus_minus minus">-</span>
                            <input type="number" name="custom_quantity" min="1" value="1">
                            <span class="quantity_plus_minus plus">+</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="button_holder">
            <button class="button blue add_to_cart_t" data-variation-id="<?php echo $variation_id; ?>" data-product-id="<?php echo $product_id; ?>">Add To Cart</button>
            <p class="change_step back_step" data-target=".step_1">Back</p>
        </div>
    </div>
    <?php die;
}
add_action('wp_ajax_edit_ticket_product', 'edit_ticket_product'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_edit_ticket_product', 'edit_ticket_product');