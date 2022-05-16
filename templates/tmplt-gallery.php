<?php
/* Template Name: Gallery */
get_header();

function get_posts_years_array() {
    global $wpdb;
    $result = array();
    $years = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT YEAR(post_date) FROM {$wpdb->posts} WHERE post_status = 'publish' GROUP BY YEAR(post_date) AND wp_posts.post_type = 'galleries'"
        ),
        ARRAY_N
    );

    if ( is_array( $years ) && count( $years ) > 0 ) {
        foreach ( $years as $year ) {
            $result[] = $year[0];
        }
    }
    return $result;
}

$galleries_years = get_posts_years_array();
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
