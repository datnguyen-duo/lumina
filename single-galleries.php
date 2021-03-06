<?php
get_header();
$images = get_field('gallery'); ?>
<div class="single_galleries_page_container">
    <div class="return_button">
        <a href="/gallery">
            <img class="desktop" src="<?php echo get_template_directory_uri(); ?>/images/icons/circle-arrow.svg" alt="">
            <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/images/icons/circle-arrow-2.svg" alt="">
            <?php the_title(); ?>
        </a>
    </div>

    <section class="gallery_section">
        <?php if( $images ): ?>
            <?php foreach ( $images as $index => $image ): ?>
                <div class="image_holder">
                    <div class="image" data-index="<?php echo $index; ?>">
                        <?php echo wp_get_attachment_image($image['image']['ID'],'large'); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no_images">
                <h2>There are no any images to show for this gallery.</h2>
            </div>
        <?php endif; ?>
    </section>

    <?php if( $images ): ?>
        <div class="gallery_light_box">
            <div class="slider_controls">
                <p class="mobile_info">
                    Swipe
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-3-white.svg" alt="">
                </p>

                <div class="left">
                    <div class="pagination">
                        <ul class="gallery_custom_pagination <?= ( sizeof($images) > 22 ) ? ' gallery_custom_pagination_slider' : null; ?>">
                            <?php foreach ( $images as $index => $image ): ?>
                                <li class="test" data-index="<?php echo $index; ?>"> <?php echo $index+1; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="gallery_custom_mobile_pagination">
                        <p class="current_slide">1</p>
                        <span></span>
                        <p class="total_slides"><?php echo sizeof($images); ?></p>
                    </div>
                </div>

                <div class="right">
                    <div class="close_gallery"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/times-circle.svg" alt=""></div>
                </div>
            </div>

            <div class="gallery_light_box_content">
                <div class="gallery_holder">
                    <div class="gallery_slider">
                        <?php foreach ( $images as $image ): ?>
                            <div class="image_holder">
                                <div class="image">
                                    <?php echo wp_get_attachment_image($image['image']['ID'],'large'); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>