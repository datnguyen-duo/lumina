<?php
/* Template Name: Support */
get_header();
?>
<div class="template_support_page_container">
    <?php $hero_section = get_field('hero_section'); ?>
    <section class="hero_section">
        <?php if( $hero_section['title_part_1'] || $hero_section['title_part_2'] || $hero_section['subtitle']): ?>
            <div class="title_holder">
                <h1 class="section_title desktop">
                    <?php if( $hero_section['title_part_1'] ): ?>
                        <span class="title_part_text"><?= $hero_section['title_part_1']; ?></span>
                    <?php endif; ?>

                    <span class="title_part_golder">
                        <?php if( $hero_section['subtitle'] ): ?>
                            <span class="circle"><span><?= $hero_section['subtitle']; ?></span></span>
                        <?php endif; ?>

                        <?php if( $hero_section['title_part_2'] ): ?>
                            <span class="title_part_text"><?= $hero_section['title_part_2']; ?></span>
                        <?php endif; ?>
                    </span>
                </h1>

                <?php if( $hero_section['subtitle'] ): ?>
                    <span class="circle mobile"><span><?= $hero_section['subtitle']; ?></span></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="image_with_description">
            <div class="left">
                <?php if( $hero_section['description'] ): ?>
                    <div class="description">
                        <p><?= $hero_section['description']; ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="right">
                <div class="image_holder">
                    <?php if( $hero_section['image'] ): ?>
                        <div class="image">
                            <?= wp_get_attachment_image($hero_section['image']['ID'],'large'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php $description_section = get_field('description_section');

    if( $description_section['title'] || $description_section['link'] || $description_section['list'] ): ?>
        <section class="donate_section">
            <div class="left">
                <div class="title_holder">
                    <?php if( $description_section['title'] ): ?>
                        <h2><?= $description_section['title']; ?></h2>
                    <?php endif; ?>

                    <?php
                    $link = $description_section['link'];
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="button blue" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                            <?= esc_html( $link_title ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="right">
                <?php if( $description_section['list'] ): ?>
                    <ul>
                        <?php foreach( $description_section['list'] as $item ): ?>
                            <li><?= $item['title'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php
    $info_section = get_field('info_section');

    if( $info_section['groups'] ): ?>
        <section class="info_section">
            <?php if( $info_section['title'] ): ?>
                <h2 class="section_title"><?= $info_section['title']; ?></h2>
            <?php endif; ?>

            <?php
            $info_section = get_field('info_section');
            foreach( $info_section['groups'] as $group ): ?>
                <div class="info">
                    <div class="title_holder">
                        <h2 class="info_title"><?php echo $group['title']; ?></h2>

                        <?php
                        $link = $group['link'];
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <div class="button_holder">
                                <a class="button big" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                    <?= esc_html( $link_title ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="info_list_holder">
                        <div class="list_items <?= ( sizeof($group['list']) == 1 ) ? ' rows_layout' : null; ?>">
                            <?php foreach ( $group['list'] as $item ): ?>
                                <div class="list_item">
                                    <?php if( $item['icon'] ): ?>
                                        <div class="icon_holder">
                                            <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['alt']; ?>">
                                        </div>
                                    <?php endif; ?>


                                    <div class="description_holder">
                                        <?php if( $item['title'] ): ?>
                                            <h3><?= $item['title']; ?></h3>
                                        <?php endif; ?>

                                        <?php if( $item['description'] ): ?>
                                            <p><?= $item['description']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
</div>
<?php
get_footer(); ?>
