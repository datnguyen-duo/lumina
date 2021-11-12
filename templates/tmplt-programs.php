<?php
/* Template Name: Programs */
get_header();

$filtered_type = ( isset($_GET["type"]) ) ? $_GET["type"] : "";
$filtered_sort = ( isset($_GET["sort"]) ) ? $_GET["sort"] : "DESC";

$product_args = array(
    'post_type' => 'product',
    'meta_key'			=> 'age_limit_min',
    'orderby'			=> 'meta_value_num',
    'order'				=> $filtered_sort,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => 'registration'
        )
    ),
    'meta_query' => []
);

if( $filtered_type ) {
    array_push($product_args['meta_query'], array(
        'key'	 	=> 'type',
        'value'	  	=> $filtered_type,
        'compare' 	=> '=',
    ));
}

$products = new WP_Query($product_args);

$type_field_key = "field_6181329d82c56";
$type_field = get_field_object($type_field_key);

?>
<div class="template_programs_page_container">
    <form class="filters" action="" id="programs_filter_form">
        <?php
        if( $type_field ): ?>
            <div class="field">
                <div class="pills_checkbox_inputs_holder">
                    <label for="type_all">
                        <input type="radio" id="type_all" name="type" value="" <?php echo ( !$filtered_type ) ? 'checked' : null; ?>>
                        <span class="checkmark">All</span>
                    </label>

                    <?php foreach ( $type_field['choices'] as $k => $v ): ?>
                        <label for="type_<?php echo $k; ?>">
                            <input type="radio" id="type_<?php echo $k; ?>" name="type" value="<?php echo $k; ?>" <?php echo ( $filtered_type == $k ) ? 'checked' : null; ?>>
                            <span class="checkmark"><?php echo $v; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div id="type_dropdown">
                    <select name="type">
                        <option value="" <?php echo ( !$filtered_type ) ? 'selected' : null; ?>>All</option>

                        <?php foreach ( $type_field['choices'] as $k => $v ): ?>
                            <option value="<?php echo $k; ?>" <?php echo ( $filtered_type == $k ) ? 'selected' : null; ?>>
                                <?php echo $v; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        <?php endif; ?>

        <div class="pills_checkbox_inputs_holder">
            <label for="sort" class="sort <?php echo $filtered_sort; ?>">
                <input type="checkbox" id="sort" name="sort" value="ASC" <?php echo ( $filtered_sort == 'ASC') ? 'checked' : null; ?>>
                <span class="checkmark">
                    AGE
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-2.svg">
                </span>
            </label>
        </div>
    </form>

    <h1 class="page_title"><?php the_title(); ?></h1>

    <section class="programs_section">
        <?php while( $products->have_posts() ): $products->the_post();
            $product = wc_get_product( get_the_ID() );
            $type = get_field('type');
            $age_limit_min = get_field('age_limit_min');
            $age_limit_max = get_field('age_limit_max');
            $age_limit_message = get_field('age_limit_message');
            $img_id = $product -> get_image_id();
            $img_url = wp_get_attachment_image_url( $img_id, 'full' );
            ?>
            <div class="program">
                <div class="column img_col">

                    <?php if( $age_limit_min ): ?>
                        <div class="circle">
                            <span class="ages">
                                AGES
                                <br>
                                <?php
                                echo $age_limit_min;
                                if( $age_limit_max ): echo '-'.$age_limit_max; else: echo "+"; endif; ?>
                            </span>

                            <?php if( $age_limit_message ): ?>
                                <span class="circle_desc"><?php echo $age_limit_message; ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="image_holder">
                        <img src="<?php echo $img_url?>" alt="program-image">
                    </div>
                </div>

                <div class="column info_col">
                    <?php if( $type ): ?>
                        <p class="program_category"><?php echo $type['label']; ?></p>
                    <?php endif; ?>

                    <h2 class="program_title"><?php the_title(); ?></h2>

                    <?php if( get_the_content() ): ?>
                        <p class="program_description"><?php echo get_the_content(); ?></p>
                    <?php endif; ?>
                </div>

                <div class="column cta_col">
                    <a href="<?php the_permalink(); ?>" class="button">Register</a>
                    <p>Registration Cost: <?php if($product->get_price()): echo get_woocommerce_currency_symbol().$product->get_price(); else: echo "TBD"; endif;?></p>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>

    <section class="banner_section">
        <h2>FAQS &</h2>
        <h2>Information</h2>
        <a href="/faq" class="button big blue">Learn More</a>
    </section>
</div>
<?php
get_footer(); ?>
