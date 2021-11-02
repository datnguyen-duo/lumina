<?php
function render_shopping_cart_items() {
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
        $item_name = $cart_item['data']->get_title();
        $quantity = $cart_item['quantity'];
        $product_id = $cart_item['product_id'];
        $price = $cart_item['data']->get_price();
        $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        ?>
        <div class="item">
            <td class="product-remove">
                <?php
                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    'woocommerce_cart_item_remove_link',
                    sprintf(
                        '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                        esc_html__( 'Remove this item', 'woocommerce' ),
                        esc_attr( $product_id ),
                        esc_attr( $_product->get_sku() )
                    ),
                    $cart_item_key
                );
                ?>
            </td>
            <div class="image">
                <?php echo get_the_post_thumbnail($product_id) ?>
            </div>
            <p><?php echo $item_name; ?></p>
            <p><?php echo $quantity ?></p>
        </div>
    <?php
    endforeach;
}

function update_shopping_cart() {
    render_shopping_cart_items();
    die;
}
add_action('wp_ajax_updateshoppingcart', 'update_shopping_cart'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_updateshoppingcart', 'update_shopping_cart');