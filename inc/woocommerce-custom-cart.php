<?php
function render_shopping_cart_items() {
    $woocommerce_cart = WC()->cart->get_cart();
    if( $woocommerce_cart ):

        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
            $item_name = $cart_item['data']->get_title();
            $quantity = $cart_item['quantity'];
            $product_id = $cart_item['product_id'];
            $price = $cart_item['data']->get_price();
            $price_with_symbol = get_woocommerce_currency_symbol().$price;
            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            ?>
            <div class="item item_<?php echo $product_id; ?>">
                <div class="top_info">
                    <div class="product_image">
                        <div class="image_holder">
                            <?php echo get_the_post_thumbnail($product_id); ?>
                        </div>
                    </div>

                    <div class="info">
                        <div class="product_type">Registration</div>

                        <div class="product_name">
                            <?php
                            echo $item_name;
                            echo ( $quantity > 1 ) ? ' ('.$quantity.')' : null;
                            ?>
                        </div>
                    </div>

                    <div class="actions">
                        <div class="edit_item">Edit</div>
                        <?php
                        echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            'woocommerce_cart_item_remove_link',
                            sprintf(
                                '<a href="%s" class="remove_item" aria-label="%s" data-product_id="%s" data-product_sku="%s">Remove</a>',
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

                <div class="bottom_info">
                    <ul>
                        <li>Rehearsal</li>
                        <li><?php echo $price_with_symbol; ?></li>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>

    <?php else:
        echo '<p class="empty_cart_message">Your cart is empty.</p>';
    endif;
}

function update_shopping_cart() {
    render_shopping_cart_items();
    die;
}
add_action('wp_ajax_updateshoppingcart', 'update_shopping_cart'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_updateshoppingcart', 'update_shopping_cart');

function render_shopping_cart() {
    $checkout_url = wc_get_checkout_url();
?>
    <div class="custom_side_cart" data-action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
        <div class="cart_header">
            <h2 class="title">Your Cart</h2>
            <img class="close_cart" src="<?php echo get_template_directory_uri(); ?>/images/icons/times-circle.svg" alt="">
        </div>

        <div class="items" id="response">
            <?php render_shopping_cart_items(); ?>
        </div>

        <div class="checkout_btn_holder">
            <a href="<?php echo $checkout_url; ?>" class="checkout_btn blue">Checkout</a>
        </div>
    </div>
<?php }