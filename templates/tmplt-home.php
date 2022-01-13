<?php
/* Template Name: Home */
get_header(); ?>
    <div class="template_home_page_container">
        <?php $hero_section = get_field('hero_section'); ?>
        <section class="hero_section">
            <?php if( $hero_section['title_part_1'] || $hero_section['title_part_2'] ): ?>
            <div class="banner__split-text">
                <?php if( $hero_section['title_part_1'] ): ?>
                    <h1 class="big_headline_animation"><?= $hero_section['title_part_1'] ?></h1>
                <?php endif; ?>

                <?php if( $hero_section['title_part_2'] ): ?>
                    <h1 class="big_headline_animation"><?= $hero_section['title_part_2'] ?></h1>
                <?php endif; ?>
            </div>
            <?php endif;

            if( $hero_section['image'] ):
                echo wp_get_attachment_image($hero_section['image']['ID'],'large',false,array('class' => 'background animate_el'));
            endif; ?>
            <div class="hero_overlay"></div>

            <div class="cta_section">
                <div class="wrapper left">
                    <?php if( $hero_section['cta_1_description']  ): ?>
                        <p><?= $hero_section['cta_1_description'] ?></p>
                    <?php endif; ?>

                    <?php
                    $link = $hero_section['cta_1_link'];
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="button" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                            <?= esc_html( $link_title ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="wrapper">
                    <?php if( $hero_section['cta_2_title'] ): ?>
                        <h2><?= $hero_section['cta_2_title'] ?></h2>
                    <?php endif; ?>

                    <?php if( $hero_section['cta_2_description'] ): ?>
                        <p><?= $hero_section['cta_2_description'] ?></p>
                    <?php endif; ?>

                    <?php if( $hero_section['cta_2_link'] || $hero_section['cta_2_link_2'] ): ?>
                        <div class="buttons">
                            <?php
                            $link = $hero_section['cta_2_link'];
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="button light" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                    <?= esc_html( $link_title ); ?>
                                </a>
                            <?php endif; ?>
                            <?php
                            $link = $hero_section['cta_2_link_2'];
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="button light" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                    <?= esc_html( $link_title ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </section>

        <?php
        $interactive_desc_section = get_field('interactive_desc_section');
        $description = $interactive_desc_section['description'];
        if( $description ): ?>
            <section class="words_with_image_section">
                <img class="img_background" src="" alt="">
                <!-- <h2 class="title">Welcome to Lumina Theatre</h2> -->

                <div class="description_holder">
                    <div class="description">
                        <?php
                        $interactive_words = $interactive_desc_section['interactive_words'];
                        if( $interactive_words ):
                            $interactive_desc = '';

                            foreach ( $interactive_words as $word ):
                                $word_image = $word['image'];
                                $target = $word['word'];
                                $interactive_desc = preg_replace("/({$target})/", "<span data-image='{$word_image['url']}'>$1</span>", $description);
                                $description = $interactive_desc;
                            endforeach;
                        endif; ?>
                        <p class="st__split-blurb"><?= $description; ?></p>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php $description_section = get_field('description_section'); ?>
        <section class="description_section">
            <div class="description_section_content">
                <div class="sentence_part part_1">
                    <?php if( $description_section['title_part_1'] ): ?>
                        <h2><?= $description_section['title_part_1'] ?></h2>
                    <?php endif; ?>

                    <?php
                    if( $description_section['title_image_1'] ):
                        echo wp_get_attachment_image($description_section['title_image_1']['ID'],'large',false,array('class' => 'word_image'));
                    endif; ?>
                </div>

                <div class="sentence_part part_2">
                    <?php
                    if( $description_section['title_image_2'] ):
                        echo wp_get_attachment_image($description_section['title_image_2']['ID'],'large',false,array('class' => 'word_image'));
                    endif; ?>

                    <?php if( $description_section['title_part_2'] ): ?>
                        <h2><?= $description_section['title_part_2'] ?></h2>
                    <?php endif; ?>

                    <div class="circle_btn_holder animate_el">
                        <a href="/lumina/faq/#registration-policies" class="circle_btn">
                            <img class="circle" src="<?php echo get_template_directory_uri(); ?>/images/circle.svg" alt="">
                            <span class="circle_text_holder">
                                <img class="circle_text" src="<?php echo get_template_directory_uri(); ?>/images/circle-text.svg" alt="">
                            </span>
                            <img class="circle_arrow" src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt="">
                        </a>
                    </div>

                    <?php if( $description_section['title_part_3'] ): ?>
                        <h2><?= $description_section['title_part_3'] ?></h2>
                    <?php endif; ?>
                </div>

                <?php if( $description_section['title_part_4'] ): ?>
                    <div class="sentence_part">
                        <h2><?= $description_section['title_part_4'] ?></h2>
                    </div>
                <?php endif; ?>

                <div class="circle_btn_holder_mobile">
                    <a href="#" class="circle_btn">
                        <img class="circle" src="<?php echo get_template_directory_uri(); ?>/images/circle.svg" alt="">
                        <span class="circle_text_holder">
                                <img class="circle_text" src="<?php echo get_template_directory_uri(); ?>/images/circle-text.svg" alt="">
                            </span>
                        <img class="circle_arrow" src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt="">
                    </a>
                </div>

                <?php if( $description_section['description'] ): ?>
                    <p class="description"><?= $description_section['description'] ?></p>
                <?php endif; ?>
            </div>
        </section>

        <?php $blocks = get_field('blocks');

        foreach ( $blocks as $index => $block ): ?>
            <?php if( $index %2 == 0 ): ?>
                <section class="img_with_desc_section">
                    <div class="left">
                        <div class="image_holder animate_el">
                            <img src="<?php echo $block["image"]["url"] ?>" alt="">
                        </div>
                    </div>
                    <div class="right">
                        <div class="right_content animate_el">
                            <div class="st__split-text">
                                <h2 class="title desktop letter_wrap animate_el big_headline_animation"><?php echo $block["title"]; ?></h2>
                            </div>
                            <h2 class="title mobile"><?php echo $block["title"]; ?></h2>
                            <h2 class="subtitle"><?php echo $block["subtitle"]; ?></h2>
                            <div class="description">
                                <p><?php echo $block["description"]; ?></p>
                            </div>
                            <a href="<?php echo $block["button"]["url"]; ?>" class="button big"><?php echo $block["button"]["title"]; ?></a>
                        </div>
                    </div>
                </section>

            <?php else: ?>
                <section class="img_with_desc_section_2">
                    <div class="left">
                        <div class="left_content animate_el">
                            <div class="st__split-text">
                                <h2 class="title desktop letter_wrap animate_el big_headline_animation"><?php echo $block["title"]; ?></h2>
                            </div>
                            <h2 class="title mobile"><?php echo $block["title"]; ?></h2>
                            <h2 class="subtitle"><?php echo $block["subtitle"]; ?></h2>
                            <div class="description">
                                <p><?php echo $block["description"]; ?></p>
                            </div>
                            <a href="<?php echo $block["button"]["url"]; ?>" class="button blue big"><?php echo $block["button"]["title"]; ?></a>
                        </div>
                    </div>
                    <div class="right">
                        <div class="image_holder animate_el">
                            <img class="" src="<?php echo $block["image"]["url"] ?>" alt="">
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php $description_s = get_field('description_section_2'); ?>
        <section class="banner_section">
            <div class="banner">
                <?php if( $description_s['title_part_1'] || $description_s['title_part_2'] || $description_s['subtitle'] ): ?>
                    <div class="st__split-text">
                        <div class="cta">
                            <?php if( $description_s['title_part_1'] ): ?>
                                <h2 class="animate_el big_headline_animation"><?= $description_s['title_part_1'] ?></h2>
                            <?php endif; ?>

                            <?php if( $description_s['subtitle'] ): ?>
                                <p class="cta_btn"><?= $description_s['subtitle'] ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if( $description_s['title_part_2'] ): ?>
                            <h2 class="animate_el big_headline_animation"><?= $description_s['title_part_2'] ?></h2>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="description_holder">
                    <a href="<?php echo get_template_directory_uri(); ?>/images/dev/FINAL DEIA Statement.pdf" class="circle_btn" download>
                        <img class="circle" src="<?php echo get_template_directory_uri(); ?>/images/circle-2.svg" alt="">
                        <img class="circle_arrow" src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt="">
                        <span class="circle_text_holder">
                            <img class="circle_text" src="<?php echo get_template_directory_uri(); ?>/images/circle-text-2.svg" alt="">
                        </span>
                    </a>

                    <?php if( $description_s['description'] ): ?>
                        <p><?= $description_s['description'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
        $testimonials_groups = get_field('testimonials_groups');
        if( $testimonials_groups ): ?>
            <section class="testimonials_section">
                <div class="buttons">
                    <?php foreach( $testimonials_groups as $index => $group ):
                        $category = 'category_'.strtolower(str_replace(" ", "_", $group['title']));
                    ?>
                        <div class="btn <?= ( $index == 0 ) ? ' active' : null; ?>" data-target="<?= $category ?>">
                            <?= $group['title'] ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="testimonials_slider">
                    <?php foreach( $testimonials_groups as $group ):
                        $category = 'category_'.strtolower(str_replace(" ", "_", $group['title']));
                        foreach( $group['testimonials'] as $testimonial ): ?>
                            <div class="testimonial <?= $category ?>">
                                <h2 class="text"><?= $testimonial['description'] ?></h2>
                                <h3 class="author"><?= $testimonial['author'] ?></h3>
                            </div>
                        <?php endforeach;
                    endforeach; ?>
                </div>

                <div class="navigation"></div>
            </section>
        <?php endif; ?>

        <?php $banner_s = get_field('banner_section'); ?>
        <section class="banner_2_section">
            <?php if( $banner_s['icon'] ): ?>
                <img class="icon" src="<?= $banner_s['icon']['url']; ?>" alt="<?= $banner_s['icon']['alt']; ?>">
            <?php endif; ?>

            <?php if( $banner_s['title'] ): ?>
                <h2 class="title letter_wrap animaxte_el big_headline_animation"><?php echo $banner_s['title']; ?></h2>
            <?php endif; ?>

            <?php if( $banner_s['description'] ): ?>
                <p class="description"><?php echo $banner_s['description']; ?></p>
            <?php endif; ?>

            <?php
            $link = $banner_s['button'];
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="button big blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                </a>
            <?php endif; ?>
        </section>
    </div>
<?php
get_footer(); ?>