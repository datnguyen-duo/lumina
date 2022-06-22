<?php
/* Template Name: Programs */
get_header();

$programs_args = array(
    'post_type' => 'product',
    // 'meta_key'			=> 'age_limit_min',
    // 'orderby'			=> 'meta_value_num',
    'order_by' => 'pubish_date',
    'order'				=> 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => 'registration'
        )
    ),
    'meta_query' => []
);

$type_field_key = "field_6181329d82c56";
$type_field = get_field_object($type_field_key);
?>
<div class="template_programs_page_container">
    <form class="filters" action="" id="programs_filter_form">
        <input type="hidden" name="action" value="filter_programs">
        <?php
        if( $type_field ): ?>
            <div class="field">
                <div class="pills_checkbox_inputs_holder">
                    <?php foreach ( $type_field['choices'] as $k => $v ): ?>
                        <label for="type_<?php echo $k; ?>">
                            <input type="checkbox" id="type_<?php echo $k; ?>" name="type[]" value="<?php echo $k; ?>">
                            <span class="checkmark"><?php echo $v; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
                <select name="type[]" id="program-type" data-class="rounded_2">
                    <option value="">All</option>

                    <?php foreach ( $type_field['choices'] as $k => $v ): ?>
                        <option value="<?php echo $k; ?>">
                            <?php echo $v; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>

        <div class="pills_checkbox_inputs_holder">
            <label for="sort" class="sort">
                <input type="checkbox" id="sort" name="sort" value="ASC">
                <span class="checkmark">
                    AGE
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-2.svg">
                </span>
            </label>
        </div>
    </form>

    <h1 class="page_title"><?php the_title(); ?></h1>

    <section class="programs_section" id="programs_response" data-action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
        <?php print_programs($programs_args); ?>
    </section>

    <section class="banner_section">
        <h2>FAQS &</h2>
        <h2>Information</h2>
        <a href="/faq" class="button big blue">Learn More</a>
    </section>
</div>
<?php
get_footer(); ?>
