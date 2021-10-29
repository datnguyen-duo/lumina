<?php
/* Template Name: Gallery */
get_header(); ?>
<div class="template_gallery_page_container">
    <section class="gallery_section">
        <div class="swiper-container swiper">
            <div class="swiper-wrapper">
                <?php for( $i=0; $i<5; $i++ ): ?>
                    <div class="swiper-slide">
                        <a href="#" class="gallery_image">
                            <div class="image_holder">
                                <div class="image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/dev/gallery-cover-<?php echo $i+1; ?>.png" alt="">
                                </div>
                            </div>
                            <p>Invasion of the Surreal Plays SEPT 2012 to AUG 2013</p>
                        </a>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

<!--        <div class="galleries_slider">-->
<!--            --><?php //for( $i=0; $i<5; $i++ ): ?>
<!--                <div class="gallery">-->
<!--                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/images/dev/gallery-cover---><?php //echo $i+1; ?><!--.png" alt="">-->
<!--                </div>-->
<!--            --><?php //endfor; ?>
<!--        </div>-->
    </section>
</div>
<?php
get_footer(); ?>
