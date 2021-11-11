<div class="thank_you_page_container">
    <section class="hero_section">
        <div class="content">
            <h1 class="page_title big_headline_animation">Order</h1>
            <h1 class="page_title big_headline_animation">Confirmed!</h1>

            <p>Please send proof of vaccination to office@luminastudio.org OR bring proof of vaccination with you to the theatre (picture of vaccination card is sufficient). Masks required for all audience members.</p>
        </div>
    </section>

    <?php
    /**
     * Thankyou page
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @see https://docs.woocommerce.com/document/template-structure/
     * @package WooCommerce\Templates
     * @version 3.7.0
     */

    defined( 'ABSPATH' ) || exit;

    $print_order = false;

    if( $print_order ): ?>
        <div class="woocommerce-order">
            <?php
            if ( $order ) :

                do_action( 'woocommerce_before_thankyou', $order->get_id() );
                ?>

                <?php if ( $order->has_status( 'failed' ) ) : ?>

                    <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

                    <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                        <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
                        <?php if ( is_user_logged_in() ) : ?>
                            <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
                        <?php endif; ?>
                    </p>

                <?php else : ?>

                    <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

                    <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                        <li class="woocommerce-order-overview__order order">
                            <?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
                            <strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                        </li>

                        <li class="woocommerce-order-overview__date date">
                            <?php esc_html_e( 'Date:', 'woocommerce' ); ?>
                            <strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                        </li>

                        <?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                            <li class="woocommerce-order-overview__email email">
                                <?php esc_html_e( 'Email:', 'woocommerce' ); ?>
                                <strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                            </li>
                        <?php endif; ?>

                        <li class="woocommerce-order-overview__total total">
                            <?php esc_html_e( 'Total:', 'woocommerce' ); ?>
                            <strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                        </li>

                        <?php if ( $order->get_payment_method_title() ) : ?>
                            <li class="woocommerce-order-overview__payment-method method">
                                <?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
                                <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                            </li>
                        <?php endif; ?>

                    </ul>

                <?php endif; ?>

                <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
                <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

            <?php else : ?>

                <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

            <?php endif; ?>
        </div>
    <?php endif; ?>

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
        <a href="/faq/">
            <span class="button big blue">Learn More</span>
        </a>
    </section>
</div>

