<?php
/* Template Name: About */
get_header();
?>
<div class="template_about_page_container">
    <?php $hero_section = get_field('hero_section'); ?>
    <section class="hero_section">
        <div class="title_holder">
            <h1 class="section_title desktop">
                <span class="title_part_golder">
                    <span class="title_part_text"><?= $hero_section['title_part_1']; ?></span>

                    <?php if( $hero_section['subtitle'] ): ?>
                        <span class="circle"><span><?= $hero_section['subtitle']; ?></span></span>
                    <?php endif; ?>
                </span>

                <?php if( $hero_section['title_part_2'] ): ?>
                    <span class="title_part_text"><?= $hero_section['title_part_2']; ?></span>
                <?php endif; ?>
            </h1>

            <h1 class="section_title mobile">
                <div class="group">
                    <span class="title_part_text"><?= $hero_section['title_part_1']; ?></span>
                    <span class="title_part_text"><?= $hero_section['title_part_2']; ?></span>
                </div>

                <?php if( $hero_section['subtitle'] ): ?>
                    <span class="circle"><span><?= $hero_section['subtitle']; ?></span></span>
                <?php endif; ?>
            </h1>
        </div>

        <div class="image_with_description">
            <div class="left">
                <div class="image_holder">
                    <div class="image">
                        <?php if( $hero_section['image'] ): echo wp_get_attachment_image($hero_section['image']['ID'],'large'); endif; ?>
                    </div>

                    <div class="circle_btn_holder">
                        <a href="/programs/" class="circle_btn">
                            <img class="circle" src="<?= get_template_directory_uri(); ?>/images/about-circle-icon-circle.svg" alt="">
                            <span class="circle_text_holder">
                                    <img class="circle_text" src="<?= get_template_directory_uri(); ?>/images/about-circle-icon-circle-text.svg" alt="">
                                </span>
                            <img class="circle_arrow" src="<?= get_template_directory_uri(); ?>/images/icons/arrow-pink.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="right">
                <?php if( $hero_section['description'] ): ?>
                    <div class="description">
                        <p><?= $hero_section['description']; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php $values_section = get_field('values');
    if( $values_section ): ?>
    <section class="description_section">
        <h2 class="title">Core Values</h2>

        <div class="description_holder">
            <div class="description">
                <?php foreach ( $values_section as $value ): ?>
                    <div class="col">
                        <?php if( $value['title'] ): ?>
                            <h2><?= $value['title']; ?></h2>
                        <?php endif; ?>

                        <?php if( $value['description'] ): ?>
                            <p><?= $value['description']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <?php $history_section = get_field('history_section'); ?>
    <section class="history_section">
        <h2 class="section_title">
            <span class="title_part_golder">
                <span class="title_part_text"><?= $history_section['title_part_1']; ?></span>
                <?php if( $history_section['subtitle'] ): ?>
                    <span class="circle_text_holder"><span><?= $history_section['subtitle']; ?></span></span>
                <?php endif; ?>
            </span>
            <span class="title_part_text"><?= $history_section['title_part_2']; ?></span>
        </h2>

        <?php if( $history_section['description'] ): ?>
            <div class="section_description">
                <p><?= $history_section['description']; ?></p>
            </div>
        <?php endif; ?>

        <?php if( $history_section['history'] ): ?>
            <div class="history_container">
                <?php foreach ( $history_section['history'] as $index => $history ): ?>
                    <div class="history_holder">
                        <div class="history <?= ( $index == 0 ) ? ' active' : null; ?>">
                            <div class="info_holder">
                                <div class="title_holder">
                                    <div class="featured_image_holder">
                                        <?php if( $history['image'] ): ?>
                                            <div class="image_holder" style="display: <?= ( $index == 0 ) ? 'block' : null; ?>">
                                                <div class="image">
                                                    <?= wp_get_attachment_image($history['image']['ID'],'large'); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <h3 class="history_title">
                                        <?= $history['year'] ?>
                                        <button>
                                            <img src="<?= get_template_directory_uri(); ?>/images/icons/arrow-pink.svg" alt="">
                                            <img src="<?= get_template_directory_uri(); ?>/images/icons/arrow.svg" alt="">
                                        </button>
                                    </h3>
                                </div>
                                <div class="history_text" style="display: <?= ( $index == 0 ) ? 'block' : null; ?>">
                                    <p><?= $history['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <?php $members_section_title = get_field('members_section_title'); ?>
    <section class="team_section">
        <div class="section_title_holder">
            <div class="section_title">
                <?php if( $members_section_title['title_part_1'] ): ?>
                    <div class="sentence_part part_1">
                        <?php
                        if( $members_section_title['title_image_2'] ):
                            echo wp_get_attachment_image($members_section_title['title_image_1']['ID'],'large',false, array('class' => 'word_image wi_1'));
                        endif; ?>
                        <h2><?= $members_section_title['title_part_1'] ?></h2>
                        <?php
                        if( $members_section_title['title_image_2'] ):
                            echo wp_get_attachment_image($members_section_title['title_image_2']['ID'],'large',false, array('class' => 'word_image wi_1'));
                        endif; ?>
                    </div>
                <?php endif; ?>

                <?php if( $members_section_title['title_part_2'] ): ?>
                    <div class="sentence_part part_2">
                        <h2><?= $members_section_title['title_part_2'] ?></h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
        $members_groups = get_field('members_groups');

        if( $members_groups ):
            $members_title= get_field('members_title');
            $members_description = get_field('members_description');

            if( $members_title || $members_description ): ?>
                <div class="staff_description">
                    <div class="left">
                        <?php if( $members_title ): ?>
                            <h3><?= $members_title; ?></h3>
                        <?php endif; ?>

                        <div class="circle mobile">
                            <p>
                                The <br>
                                Lumina <br>
                                Team
                            </p>
                        </div>
                    </div>
                    <div class="right">
                        <?php if( $members_description ): ?>
                            <p><?= $members_description; ?></p>
                        <?php endif; ?>

                        <div class="circle desktop">
                            <p>
                                The <br>
                                Lumina <br>
                                Team
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="members_holder">
                <?php foreach ( $members_groups as $group ): ?>
                    <div class="members">
                        <?php foreach ( $group['members'] as $member ):
                            $description = get_field('description', $member->ID);
                            $position = get_field('position', $member->ID); ?>
                            <div class="member_holder">
                                <div class="member">
                                    <div class="image_holder">
                                        <?= get_the_post_thumbnail($member->ID); ?>
                                        <?php if( $description ): ?>
                                            <div class="member_desc">
                                                <p><?= $description; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <h3 class="member_name">
                                        <?= $member->post_title; ?>

                                        <?php if( $description ): ?>
                                            <button><img src="<?= get_template_directory_uri(); ?>/images/icons/arrow.svg" alt=""></button>
                                        <?php endif; ?>
                                    </h3>

                                    <?php if( $position ): ?>
                                        <p class="member_title"><?= $position; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif;

        $directors_lists = get_field('directors_lists');
        if( $directors_lists ):
            $directors_title = get_field('directors_title'); ?>
            <div class="directors_description">
                <div class="left">
                    <?php if( $directors_title ): ?>
                        <h3><?= $directors_title; ?></h3>
                    <?php endif; ?>
                    <div class="circle mobile">
                        <p>
                            <?php echo get_field('years')['from'];?> <br>
                            - <br>
                            <?php echo get_field('years')['to'];?>
                        </p>
                    </div>
                </div>
                <div class="right">
                    <div class="circle desktop">
                        <p>
                            <?php echo get_field('years')['from'];?> <br>
                            - <br>
                            <?php echo get_field('years')['to'];?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="directors">
                <?php foreach ( $directors_lists as $list ): ?>
                    <ul>
                        <?php foreach( $list['directors'] as $director ): ?>
                            <li><?= $director['name']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</div>
<?php
get_footer(); ?>