<?php
/* Template Name: Gallery */
get_header();

$galleries = new WP_Query(array(
    'post_type' => 'galleries',
));
?>
<div class="template_gallery_page_container">
    <section class="gallery_section">
        <?php if( $galleries->have_posts() ): ?>
            <div class="top_bar">
                <div class="info">
                    <p>Scroll</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-3.svg" alt="">
                </div>
                <div class="filter">
                    <p>Season</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-3.svg" alt="">
                </div>
            </div>

            <div class="splide" style="display: block;">
                <div class="splide__track">
                    <div class="splide__list">
                        <?php while( $galleries->have_posts() ): $galleries->the_post(); $short_desc = get_field('short_desc'); ?>
                            <div class="splide__slide">
                                <a href="<?php the_permalink(); ?>" class="gallery_image">
                                    <div class="image_holder">
                                        <div class="image">
                                            <?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
                                        </div>
                                    </div>

                                    <p>
                                        <span class="name"><?php the_title(); ?></span>

                                        <?php if( $short_desc ): ?>
                                            <span class="short_desc"><?php echo $short_desc; ?></span>
                                        <?php endif; ?>
                                    </p>
                                </a>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="no_galleries">
                <h2>There are no galleries to show yet.</h2>
            </div>
        <?php endif; ?>
    </section>
</div>
<?php
get_footer(); ?>
