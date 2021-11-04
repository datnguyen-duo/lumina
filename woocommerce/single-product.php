<?php
get_header();
$product = wc_get_product( get_the_ID() );

$age_limit = get_field('age_limit');
$type = get_field('type');
$testimonials = get_field('testimonials');
$gallery = $product->get_gallery_image_ids();
?>

<div class="single_product_page_container">

    <section class="hero_section">
        <?php if( $age_limit['min'] ): ?>
            <div class="age_limit">
                <p>AGE<?php echo ( $age_limit['min'] && $age_limit['max']) ? 'S' : null; ?></p>
                <div class="ages">
                    <?php if( $age_limit['min'] ): ?>
                        <p><?php echo $age_limit['min']; ?></p>
                    <?php endif; ?>

                    <?php if( $age_limit['min'] && $age_limit['max'] ): ?>
                        <p><?php echo $age_limit['max']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="left">
            <?php if( $gallery ): ?>
                <div class="gallery">
                    <?php foreach ( $gallery as $image ): $img = wp_get_attachment_image($image,'large'); ?>
                        <div class="image_holder">
                            <?php echo $img; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php elseif( get_the_post_thumbnail(get_the_ID()) ): ?>
                <div class="featured_image">
                    <div class="image_holder">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="right">
            <h1 class="program_title"><?php the_title(); ?></h1>

            <div class="labels">
                <?php if( $type ): ?>
                    <div class="label type_label">
                        <div class="label_content">
                            <p class="label_title">Program Type</p>
                            <p class="label_desc"><?php echo $type['label']; ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="label price_label">
                    <div class="label_content">
                        <p class="label_title">Registration Cost</p>
                        <p class="label_desc"><?php echo get_woocommerce_currency_symbol().$product->get_price(); ?></p>
                    </div>
                </div>
            </div>

            <?php if( $product->get_description() ): ?>
                <div class="description_holder">
                    <h2 class="desc_title">Summary</h2>

                    <div class="description">
                        <?php while( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if( $testimonials ): ?>
                <div class="testimonials">
                    <h2 class="testimonials_title">What our students are saying</h2>
                    <?php foreach( $testimonials as $testimonial ): ?>
                        <div class="testimonial">
                            <p class="testimonial_text"><?php echo $testimonial['description']; ?></p>
                            <p class="testimonial_author"><?php echo $testimonial['name']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

	<section class="form_section">
		<?php
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
        do_action( 'woocommerce_single_product_summary' );  ?>

        <div class="button_holder">
            <div class="button single_product_program_registration_button">Register & Add to Cart</div>
        </div>
	</section>
</div>


<?php
get_footer(); ?>
