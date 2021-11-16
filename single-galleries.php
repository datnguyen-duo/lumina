<?php
get_header();
$gallery = get_field('gallery'); ?>
<div class="single_galleries_page_container">
    <section class="gallery_section">
        <?php foreach ( $gallery as $index => $image ): ?>
            <div class="image_holder">
                <div class="image" data-index="<?php echo $index; ?>">
                    <?php echo wp_get_attachment_image($image['image']['ID'],'large'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <div class="gallery_light_box">
        <div class="slider_controls">
            <div class="left">
                <ul class="gallery_custom_pagination">
                    <?php foreach ( $gallery as $index => $image ): ?>
                        <li data-index="<?php echo $index; ?>"> <?php echo $index+1; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="right">
                <div class="close_gallery"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/times-circle.svg" alt=""></div>
            </div>
        </div>

        <div class="gallery_light_box_content">
            <div class="gallery_holder">
                <div class="gallery_slider">
                    <?php foreach ( $gallery as $image ): ?>
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
</div>
<?php get_footer(); ?>