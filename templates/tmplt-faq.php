<?php
/* Template Name: Faq */
$hero_headline_first = get_field('hero_headline_first');
$hero_headline_second = get_field('hero_headline_second');
$hero_description = get_field('hero_description');
$hero_small_desceription = get_field('hero_small_desceription');
$hero_button = get_field('hero_button');

$first_section_title = get_field('first_section_title');
$first_section_faq = get_field('first_section_faq');

$second_section_title = get_field('second_section_title');
$second_section_faq = get_field('second_section_faq');

get_header(); ?>
<div class="template_faq_page_container">
    <section class="hero_section">
        <div class="hero_section_content">
            <div class="hero_title">
                <?php if($hero_headline_first): ?>
                    <h1><?php echo $hero_headline_first; ?></h1>
                <?php endif; ?>

                <?php if($hero_headline_second): ?>
                    <h1><?php echo $hero_headline_second ?></h1>
                <?php endif; ?>
                
                <?php if($hero_description): ?>
                        <h2 class="mobile_subheadline"><?php echo $hero_description ?></h2>
                <?php endif; ?>
                
            </div>

            <div class="info">
                <div class="left">
                    <?php if($hero_description): ?>
                        <h2><?php echo $hero_description ?></h2>
                    <?php endif; ?>
                </div>
                <div class="right">

                    <?php if($hero_small_desceription): ?>
                        <p><?php echo $hero_small_desceription ?></p>
                    <?php endif; ?>
                    
                    <?php if($hero_button): ?>
                        <div class="circle_btn_holder">
                            <a href="<?php echo $hero_button['url']; ?>" target="<?php echo $hero_button['target']; ?>" class="circle_btn">
                                <img class="circle" src="<?php echo get_template_directory_uri(); ?>/images/circle_second.svg" alt="">
                                <span class="circle_text_holder">
                                    <img class="circle_text" src="<?php echo get_template_directory_uri(); ?>/images/circle-text-faq.svg" alt="">
                                </span>
                                <img class="circle_arrow" src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt="">
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="questions_section">
        <div class="questions_group">
            <?php if($first_section_title): ?>
                <h2 id="registration-policies" class="group_title"><?php echo $first_section_title; ?></h2>
            <?php endif; ?>

            <?php if($first_section_faq): ?>
                <div class="questions">
                    <?php foreach ($first_section_faq as $singleQuestion): ?>
                        <div class="question">
                            <h3 class="question_title">
                                <?php echo $singleQuestion['faq_question'] ?>
                                <button class="icon_btn"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt=""></button>
                            </h3>
                            <div class="question_text">
                                <?php echo $singleQuestion['faq_answer'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!--Dont delete question empty div. This empty div is just for design layout-->
                    <div class="question"></div>
                </div>
            <?php endif; ?>
        </div>

        <div class="questions_group">
            <?php if($second_section_title): ?>
                <h2 class="group_title"><?php echo $second_section_title; ?></h2>
            <?php endif; ?>

            <?php if($second_section_faq): ?>
                <div class="questions">
                    <?php foreach ($second_section_faq as $singleQuestion): ?>
                        <div class="question">
                            <h3 class="question_title">
                                <?php echo $singleQuestion['faq_question'] ?>
                                <button class="icon_btn"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt=""></button>
                            </h3>
                            <div class="question_text">
                                <?php echo $singleQuestion['faq_answer'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!--Dont delete question empty div. This empty div is just for design layout-->
                    <div class="question"></div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>
<?php
get_footer(); ?>
