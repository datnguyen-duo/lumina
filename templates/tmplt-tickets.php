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
            <?php if( $products->have_posts() ): ?>
                <p><?= $products->found_posts ?> show now playing!</p>
            <?php endif; ?>
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
                        <?= get_the_post_thumbnail(get_the_ID(),'large'); ?>
                    </div>
                </div>
                <form class="right ticket_variations_form" id="variations_form_<?= get_the_ID(); ?>">
                    <h2 class="title"><?php the_title(); ?></h2>
                    <?php
                    $handle = new WC_Product_Variable(get_the_ID());
                    $variations = $handle->get_children();
                    if( $variations && $ticket_dates ): ?>
                        <div class="pills_checkbox_inputs_holder">
                            <?php foreach ( $variations as $value ): $variation = new WC_Product_Variation($value); ?>
                                <label for="<?= $value; ?>">
                                    <input type="radio" id="<?= $value; ?>" name="ticket_type" value="<?= $value; ?>" required>
                                    <span class="checkmark">
                                        <span class="pill_content">
                                            <span class="price"><?= get_woocommerce_currency_symbol().$variation->get_price(); ?></span>
                                            <span class="type"><?= implode(" / ", $variation->get_variation_attributes()); ?></span>
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
                                            <p><?= $credit['text']; ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $ticket_dates ): ?>
                        <button class="add_to_cart_ticket button" data-product-id="<?= get_the_ID(); ?>">Select Ticket</button>
                    <?php endif; ?>
                </form>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>
    <?php
    $info_list = get_field("info_list");

    if( $info_list ): ?>
        <section class="info_section">
            <?php foreach ( $info_list as $group ): ?>
                <div class="info">
                    <h2 class="info_title">
                        <?php if( $group['icon'] ): ?>
                            <img src="<?= $group['icon']['url']; ?>" alt="<?= $group['icon']['alt']; ?>">
                        <?php endif; ?>

                        <span><?= $group['title']; ?></span>
                    </h2>

                    <?php if( $group['lists'] ): ?>
                        <div class="info_lists_holder">
                            <?php foreach ( $group['lists'] as $list ): ?>
                                <ul>
                                    <?php foreach ( $list['list_items'] as $item ): ?>
                                        <li><?= $item['title'] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php
    $banner_section = get_field('banner_section');
    if( $banner_section['title_part_1'] || $banner_section['title_part_2'] || $banner_section['button'] ): ?>
        <section class="banner_section">
            <h2><?= $banner_section['title_part_1'] ?></h2>
            <h2><?= $banner_section['title_part_2'] ?></h2>

            <?php
            $link = $banner_section['button'];
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="button blue big" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                    <?= esc_html( $link_title ); ?>
                </a>
            <?php endif; ?>
        </section>
    <?php endif; ?>
</div>
<?php
get_footer(); ?>
