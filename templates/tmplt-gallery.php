<?php
/* Template Name: Gallery */
get_header();

$galleries = new WP_Query(array(
    'post_type' => 'galleries',
    'posts_per_page' => -1,
));

$galleries_years = [];

while($galleries->have_posts()): $galleries->the_post();
    $gallery_year = get_the_date('Y');
    if( !in_array($gallery_year, $galleries_years) ) {
        array_push($galleries_years,get_the_date('Y'));
    }
endwhile; wp_reset_postdata();
?>
<div class="template_gallery_page_container">
    <section class="gallery_section">
        <div class="top_bar">
            <div class="info">
                <p>Scroll</p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-3.svg" alt="">
            </div>
            <?php if( $galleries_years ): ?>
                <div class="field">
                    <select name="season-year" data-class="rounded_2" data-placeholder="Season" id="season-year-select">
                        <option></option>
                        <option value="all">All</option>
                        <?php foreach ( $galleries_years as $year ): ?>
                            <option value="<?= $year ?>"><?= $year ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
        </div>
        <div id="galleries-response">
            <?php print_galleries(); ?>
        </div>
    </section>
</div>
<?php
get_footer(); ?>
