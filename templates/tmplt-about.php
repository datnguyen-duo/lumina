<?php
/* Template Name: About */
get_header();
?>
<div class="template_about_page_container">
    <section class="hero_section">
        <div class="title_holder">
            <h1 class="section_title">
                <span class="title_part_golder">
                    <span class="title_part_text">About</span>
                    <a href=""><span>unique opportunities for young actors of any experience level</span></a>
                </span>
                <span class="title_part_text">lumina</span>
            </h1>
        </div>
        <div class="image_with_description">
            <div class="left">
                <div class="image_holder">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/dev/hero_image.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="description">
                    <p>
                        Lumina provides a disciplined and rigorous professional setting where
                        actors are trained in a comprehensive performance focused program of
                        theatre arts based on Rudolf Steiner’s Creative Speech and Drama techniques.
                        The techniques of Stella Adler and Michael Chehkov are also demonstrated and put
                        into practice. Our program includes in-depth vocal and character coaching, improvisation,
                        and stage combat training, detailed costumes, live music, choreography and occasionally
                        special elements such as masks to support the shows. The results are exhilarating and
                        thoughtful productions that demand more of our aspiring actors, and benefit them for life,
                        whether they pursue acting professionally or become informed and astute patrons of the arts.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="description_section">
        <h2 class="title">Our Goal</h2>

        <div class="description_holder">
            <div class="description">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Maecenas sed semper odio. Ut eget ipsum magna. Integer a
                    neque eu mauris.
                </p>
            </div>
        </div>
    </section>

    <section class="history_section">
        <h2 class="section_title">
            <span class="title_part_golder">
                <span class="title_part_text">Our</span>
                <a href=""><span>Helping young actors since 1997</span></a>
            </span>
            <span class="title_part_text">History</span>
        </h2>

        <div class="section_description">
            <p>
                Since 1997 Lumina has worked with over 600 young actors and
                enjoys a 95% retention rate from season to season. Some alumni
                have gone on to major in theatre and attend prestigious theatre
                schools such as NYU’s Tisch School of the Arts. Many alumni also
                return for guest appearances in current productions and work as
                Directors in the Summerstock program, thus giving back to the
                next generation of Lumina actors.
            </p>
        </div>

        <div class="history_container">
            <?php for($i=0; $i<6; $i++): ?>
                <div class="history_holder">
                    <div class="history <?php echo ($i == 0) ? 'active': null;?>">
                        <div class="featured_image_holder">
                            <div class="image_holder" style="display: <?php echo ($i == 0) ? 'block': null;?>">
                                <div class="image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/dev/hero_image.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="info_holder">
                            <h3 class="history_title">
                                199<?php echo $i; ?>
                                <button class="icon_btn"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-pink.svg" alt=""></button>
                            </h3>
                            <div class="history_text" style="display: <?php echo ($i == 0) ? 'block': null;?>">
                                <p>
                                    Lumina Studio Theatre made its debut on October 5, 1995 in Brooklyn,
                                    NY at Promote Art Works, Inc. as a new concept in teaching speech and drama.
                                    Jillian Raye, Founder and Artistic Director, moved the organization to Takoma
                                    Park, MD, in 1997. Ms. Raye’s extensive training included: the Victorian Ballet
                                    Guild Theatre School; the Harkness Conservatory of Drama, Australia; Rudolf
                                    Steiner’s Speech and Drama technique and a Bachelor’s Degree in Theatre from the
                                    University of Texas at Dallas.
                                </p>
                                <p>
                                    Ms. Raye believed that young actors can perform brilliantly using the classics in
                                    imaginative ways; that actors and audiences can grow from barrier-free, intergenerational
                                    performances; and that theatre discipline and creativity are soul mates that belong to the
                                    entire community.
                                </p>

                                <p>
                                    Beginning with a few young people rehearsing in Ms. Raye’s basement and performing in
                                    an old movie theatre, Lumina has flourished and now attracts over 100 young actors per
                                    season from across the metropolitan area. Lumina offers many opportunities for
                                    participants: Folk Tale Camps for the youngest actors (age 8+) to the Theatre Group
                                    for adult actors. Lumina presents nine productions each season.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </section>


    <section class="team_section">
        <div class="section_title_holder">
            <div class="section_title">
                <div class="sentence_part part_1">
                    <img class="word_image wi_1" src="<?php echo get_template_directory_uri(); ?>/images/dev/RII Karim.jpg" alt="">
                    <h2>Staff &</h2>
                    <img class="word_image wi_2" src="<?php echo get_template_directory_uri(); ?>/images/dev/AYLI Grace.jpg" alt="">
                </div>

                <div class="sentence_part part_2">
                    <h2>Directors</h2>
                </div>
            </div>
        </div>
        <div class="staff_description">
            <div class="left">
                <h3>Staff</h3>
            </div>
            <div class="right">
                <p>
                    Co Executive-Directors Meg Lebow and Sophie Cameron bring backgrounds in theater,
                    literature, education, and administration to Lumina Studio Theatre. Meg and Sophie
                    have helped direct over 35 productions on and off of the Lumina stage.
                </p>

                <div class="circle">
                    <p>
                        The <br>
                        Lumina <br>
                        Team
                    </p>
                </div>
            </div>
        </div>

        <div class="members_holder">
            <div class="members">
                <?php for($i=0; $i<2 ; $i++): ?>
                    <div class="member_holder">
                        <div class="member">
                            <div class="image_holder">
                                <img class="word_image wi_1" src="<?php echo get_template_directory_uri(); ?>/images/dev/RII Karim.jpg" alt="">

                                <div class="member_desc">
                                    <p>
                                        Meg Lebow holds a BA in English Literature and an MA in
                                        Victorian Literature. Her graduate studies have focused
                                        on Victorian attitudes towards actors and acting.
                                        She brings an anti-racist framework to the study of “The Classics.”
                                        Meg has directed a preschool program and led poetry workshops at
                                        Blue Monarch, a rehabilitative facility for women. She became
                                        Co-Executive Director of Lumina in June 2021.
                                    </p>
                                </div>
                            </div>
                            <h3 class="member_name">
                                Meg Lebow
                                <button><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt=""></button>
                            </h3>
                            <p class="member_title">Co-Executive Director</p>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="members">
                <?php for($i=0; $i<2 ; $i++): ?>
                    <div class="member_holder">
                        <div class="member">
                            <div class="image_holder">
                                <img class="word_image wi_1" src="<?php echo get_template_directory_uri(); ?>/images/dev/RII Karim.jpg" alt="">

                                <div class="member_desc">
                                    <p>
                                        Meg Lebow holds a BA in English Literature and an MA in
                                        Victorian Literature. Her graduate studies have focused
                                        on Victorian attitudes towards actors and acting.
                                        She brings an anti-racist framework to the study of “The Classics.”
                                        Meg has directed a preschool program and led poetry workshops at
                                        Blue Monarch, a rehabilitative facility for women. She became
                                        Co-Executive Director of Lumina in June 2021.
                                    </p>
                                </div>
                            </div>
                            <h3 class="member_name">
                                Meg Lebow
                                <button><img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow.svg" alt=""></button>
                            </h3>
                            <p class="member_title">Co-Executive Director</p>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>


        <div class="directors_description">
            <div class="left">
                <h3>Board of directors</h3>
            </div>
            <div class="right">
                <div class="circle">
                    <p>
                        2020 <br>
                        - <br>
                        2021
                    </p>
                </div>
            </div>
        </div>

        <div class="directors">
            <ul>
                <li>Dara Corrigan</li>
                <li>Amanda Fore</li>
                <li>Colette Matzzie</li>
                <li>David Minton</li>
                <li>Michael Novello</li>
            </ul>

            <ul>
                <li>Julie Reiner</li>
                <li>Cynthia Ross-Zenick</li>
                <li>Esther Schwartz-McKinzie</li>
                <li>Albee Shanefelter</li>
            </ul>
        </div>
    </section>
</div>
<?php
get_footer(); ?>