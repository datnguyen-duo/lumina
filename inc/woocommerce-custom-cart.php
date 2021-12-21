<?php
function render_shopping_cart_items($is_item_added_to_cart = false) {
    $woocommerce_cart = WC()->cart->get_cart();

    if( $woocommerce_cart ):
        $checkout_url = wc_get_checkout_url();

        if( $is_item_added_to_cart ):
            $last_added_product_id = end( WC()->cart->cart_contents)['product_id'];
            $last_product_title = get_the_title($last_added_product_id);
            $last_product_categories = get_the_terms($last_added_product_id,'product_cat');
            $last_product_category = ( sizeof($last_product_categories) ) ? $last_product_categories[0] : '';
        ?>
            <p class="item_added_to_cart_message">
                <img src="<?= get_template_directory_uri(); ?>/images/icons/checkmark.svg" alt="">
                <?= $last_product_title.' '.$last_product_category->name; ?>
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
                        <p class="remove_item" data-target="<?php echo $cart_item_key ?>">Remove</p>
                    </div>
                </div>
                <?php if( $category->slug == 'ticket'):
                    $variations = $cart_item['variation'];
                    $ticket_type = $cart_item['custom_data']['ticket_type']; ?>
                    <div class="bottom_info">
                        <ul>
                            <?php if( $ticket_type ): ?>
                                <li><?= $ticket_type ?></li>
                            <?php endif; ?>

                            <?php if( $variations['attribute_pa_ticket-date-and-time'] ):
                                $date_time = str_replace('-at-',' at ', $variations['attribute_pa_ticket-date-and-time']);
                                $date_time = str_replace('-','/', $date_time); ?>
                                <li><?= $date_time ?></li>
                            <?php endif; ?>

                            <li><?= $price_with_symbol; ?></li>
                        </ul>
                    </div>
                <?php elseif( $category->slug == 'donation'):
                    $donation_type = $cart_item['custom_data']['donation_type'];
                ?>
                    <div class="bottom_info">
                        <ul>
                            <?php if( $donation_type ): ?>
                                <li><?= $donation_type; ?></li>
                            <?php endif; ?>
                            <li><?= $price_with_symbol; ?></li>
                        </ul>
                    </div>
                <?php else:
                    $registration_type = get_field('type', $product_id);
                    $deposit = $cart_item['custom_data']['deposit_consent'];
                    ?>
                    <div class="bottom_info">
                        <ul>
                            <?php if( $registration_type ): ?>
                                <li><?= $registration_type['label']; ?></li>
                            <?php endif; ?>
                            <li><?= $price_with_symbol; ?><?=( $deposit == 'Yes' ) ? ' (deposit)' : null ?></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="actions mobile">
                    <p class="remove_item" data-target="<?= $cart_item_key ?>">Remove</p>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="checkout_btn_holder">
            <a href="<?= $checkout_url; ?>" class="checkout_btn blue">Checkout</a>
        </div>
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
    $variation_id = ( isset($_POST['variation_id']) ) ? $_POST['variation_id'] : '';
    $quantity = ( isset($_POST['quantity']) ) ? $_POST['quantity'] : 1;

    //Ticket product
    $product = wc_get_product( $product_id );
    $categories = $product->get_category_ids();
    $category = get_term($categories[0]);
    if( $category->slug == 'ticket'):
        add_filter('woocommerce_add_cart_item_data','wdm_add_item_data',1,10);
        function wdm_add_item_data($cart_item_data, $product_id) {
            global $woocommerce;

            $ticket_custom_price = $_POST['custom_price_field'];
            if( $ticket_custom_price ):
                $ticket_type = $_POST['ticket_type'];

                $cart_item_meta['custom_price_field'] = $ticket_custom_price;
                $cart_item_meta['total_price'] = $ticket_custom_price;
                $cart_item_meta['custom_data']['ticket_type'] = $ticket_type;
            endif;

            return $cart_item_meta;
        }
    endif;
    //Ticket product END

    WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );
}
add_action('wp_ajax_woo_custom_add_to_cart', 'woo_custom_add_to_cart'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_woo_custom_add_to_cart', 'woo_custom_add_to_cart');

function woo_custom_remove_from_cart() {
    $cart_item_key = $_POST['cartItemKey'];
    WC()->cart->remove_cart_item($cart_item_key);
}
add_action('wp_ajax_woo_custom_remove_from_cart', 'woo_custom_remove_from_cart'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_woo_custom_remove_from_cart', 'woo_custom_remove_from_cart');

function check_ticket_quantity() {
    $woocommerce_cart = WC()->cart->get_cart();
    $product_id = $_POST['product_id'];
    $variation_id = $_POST['variation_id'];
    $quantity = $_POST['quantity'];
    $product_variation = new WC_Product_Variation($variation_id);
    $variation_price = $product_variation->get_price();
    $variation_name = $product_variation->get_attribute('pa_ticket-date-and-time');
//    echo $product_variation->get_stock_quantity();
//    echo $product_variation->has_enough_stock(2);
//    echo $product_variation->is_in_stock();
//    echo ($product_variation->has_enough_stock($quantity)) ? 'true' : 'false'; die;
    if( $product_variation->is_in_stock() ) {
        if( !$product_variation->has_enough_stock($quantity) ) {
            echo 'false '.$product_variation->get_stock_quantity();
        } else {
            foreach ( WC()->cart->get_cart() as $cart_item ) {
                if( $cart_item['variation_id'] == $variation_id && $cart_item['quantity'] == $product_variation->get_stock_quantity() ) {
                    echo 'in-cart '.$product_variation->get_stock_quantity();
                }
            }
        }
    } else {
        echo 'false';
    }

    die;
}
add_action('wp_ajax_check_ticket_quantity', 'check_ticket_quantity'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_check_ticket_quantity', 'check_ticket_quantity');