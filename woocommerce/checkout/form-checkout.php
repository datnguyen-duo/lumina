<div class="form_checkout_page_container">
    <div class="page_content">
        <?php
        /**
         * Checkout Form
         *
         * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
         *
         * HOWEVER, on occasion WooCommerce will need to update template files and you
         * (the theme developer) will need to copy the new files to your theme to
         * maintain compatibility. We try to do this as little as possible, but it does
         * happen. When this occurs the version of the template file will be bumped and
         * the readme will list any important changes.
         *
         * @see https://docs.woocommerce.com/document/template-structure/
         * @package WooCommerce\Templates
         * @version 3.5.0
         */


//        add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true' );

        add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
        function custom_override_checkout_fields( $fields ) {
            $fields['billing']['billing_address_2'] = array(
                'label_class'  => '',
            );
            return $fields;
        }

        if ( ! defined( 'ABSPATH' ) ) {
            exit;
        }

        do_action( 'woocommerce_before_checkout_form', $checkout );

        // If checkout registration is disabled and not logged in, the user cannot checkout.
        if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
            echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
            return;
        }

        ?>

        <div class="pills_checkbox_inputs_holder steps">
            <label for="step_1" class="container">
                <input type="radio" id="step_1" name="step_choice" value="customer_details" checked>
                <span class="checkmark">Your Details</span>
            </label>

            <label for="step_2" class="container">
                <input type="radio" id="step_2" name="step_choice" value="order_review">
                <span class="checkmark">Payment Info</span>
            </label>
        </div>

        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

            <?php if ( $checkout->get_checkout_fields() ) : ?>

                <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                <div class="step_block active" id="customer_details">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>

                    <div class="button next_step" data-target="step_2">Continue to Payment</div>
                </div>

                <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

            <?php endif; ?>

            <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

<!--            <h3 id="order_review_heading">--><?php //esc_html_e( 'Your order', 'woocommerce' ); ?><!--</h3>-->

            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order step_block">
                <?php do_action( 'woocommerce_checkout_shipping' ); ?>

                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>

            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </form>

        <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
    </div>
</div>