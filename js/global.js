/*	-----------------------------------------------------------------------------
 SMOOTH SCROLL START
--------------------------------------------------------------------------------- */

function smoothScroll() {
    // smoothScroll("#scroll-container"); // declare container here
    //
    // function smoothScroll(content, viewport, smoothness) {
    //     content = gsap.utils.toArray(content)[0];
    //     smoothness = smoothness || 2;
    //
    //     gsap.set(viewport || content.parentNode, {
    //         overflow: "hidden",
    //         position: "fixed",
    //         height: "100%",
    //         width: "100%",
    //         top: 0,
    //         left: 0,
    //         right: 0,
    //         bottom: 0,
    //     });
    //     gsap.set(content, { overflow: "visible", width: "100%" });
    //
    //     let getProp = gsap.getProperty(content),
    //         setProp = gsap.quickSetter(content, "y", "px"),
    //         setScroll = ScrollTrigger.getScrollFunc(window),
    //         removeScroll = () => (content.style.overflow = "visible"),
    //         killScrub = (trigger) => {
    //             let scrub = trigger.getTween
    //                 ? trigger.getTween()
    //                 : gsap.getTweensOf(trigger.animation)[0];
    //             scrub && scrub.kill();
    //             trigger.animation.progress(trigger.progress);
    //         },
    //         height,
    //         isProxyScrolling;
    //
    //     function onResize() {
    //         height = content.clientHeight;
    //         content.style.overflow = "visible";
    //         document.body.style.height = height + "px";
    //     }
    //     onResize();
    //     ScrollTrigger.addEventListener("refreshInit", onResize);
    //     ScrollTrigger.addEventListener("refresh", () => {
    //         removeScroll();
    //         requestAnimationFrame(removeScroll);
    //     });
    //     ScrollTrigger.defaults({ scroller: content });
    //     ScrollTrigger.prototype.update = (p) => p;
    //
    //     ScrollTrigger.scrollerProxy(content, {
    //         scrollTop(value) {
    //             if (arguments.length) {
    //                 isProxyScrolling = true;
    //                 setProp(-value);
    //                 setScroll(value);
    //                 return;
    //             }
    //             return -getProp("y");
    //         },
    //         getBoundingClientRect() {
    //             return {
    //                 top: 0,
    //                 left: 0,
    //                 width: window.innerWidth,
    //                 height: window.innerHeight,
    //             };
    //         },
    //     });
    //
    //     return ScrollTrigger.create({
    //         animation: gsap.fromTo(
    //             content,
    //             { y: 0 },
    //             {
    //                 y: () => document.documentElement.clientHeight - height,
    //                 ease: "none",
    //                 onUpdate: ScrollTrigger.update,
    //             }
    //         ),
    //         scroller: window,
    //         invalidateOnRefresh: true,
    //         start: 0,
    //         end: () => height - document.documentElement.clientHeight,
    //         scrub: smoothness,
    //         onUpdate: (self) => {
    //             if (isProxyScrolling) {
    //                 killScrub(self);
    //                 isProxyScrolling = false;
    //             }
    //         },
    //         onRefresh: killScrub,
    //     });
    // }
}
/*	-----------------------------------------------------------------------------
  SMOOTH SCROLL END
--------------------------------------------------------------------------------- */

/*	-----------------------------------------------------------------------------
    DOM LOAD
--------------------------------------------------------------------------------- */
document.addEventListener("DOMContentLoaded", function (event) {
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);
    window.scrollTo(0, 0);
});

/*	-----------------------------------------------------------------------------
    WINDOW LOAD
--------------------------------------------------------------------------------- */
window.addEventListener("load", function () {
    document.getElementById("viewport").classList.remove("loading");
    smoothScroll();
});

(function ($) {
    //document ready
    /*	-----------------------------------------------------------------------------
            MENU OPENER START
        --------------------------------------------------------------------------------- */
    var siteHeader = $(".site_header");
    var hamburger = $(".hamburger");
    var navIsLight = false;

    // var menuOpen = gsap.timeline({
    //     paused: true,
    //     reversed: true,
    //     onComplete: function () {
    //         console.log("complete");
    //     },
    // });
    //
    // let site_main_nav = $(".site_main_nav");
    // let site_main_nav_before = $(".separator");
    // let site_main_nav_after = $(".separator_second");
    // let leftMenu = $(".main_nav_content .left");
    // let rightMenu = $(".main_nav_content .right");
    // let nav = $(".main_nav_content nav");
    // let winWidth = $(window).width();
    //
    // menuOpen.to(site_main_nav, {display: "block"});
    //
    // menuOpen.to(leftMenu, {height: (winWidth > 1024) ? '100%' : '50%', duration: 0.7 ,ease: "power2.inOut",}, '<');
    // menuOpen.to(rightMenu, {height: (winWidth > 1024) ? '100%' : '50%', duration: 0.7 ,ease: "power2.inOut",}, '<');
    // menuOpen.to(nav, {opacity: 1, duration: 0.7 ,ease: "power2.inOut",});
    // menuOpen.to(site_main_nav_before, {height: '100%', duration: 0.3 ,ease: "power2.inOut",});
    // menuOpen.to(site_main_nav_after, {height: '100%', duration: 0.3 ,ease: "power2.inOut",});

    if (siteHeader.hasClass("light")) navIsLight = true;

    hamburger.on("click", function () {
        $(".site_main_nav").fadeToggle();
        $(this).toggleClass("active");
        $("body").toggleClass("no_scroll");

        // menuOpen.reversed() ? menuOpen.play() : menuOpen.reverse();

        if (navIsLight) {
            siteHeader.toggleClass("light");
        }
    });

    /*	-----------------------------------------------------------------------------
            MENU OPENER END
        --------------------------------------------------------------------------------- */

    /*	-----------------------------------------------------------------------------
          SINGLE PRODUCT
      --------------------------------------------------------------------------------- */
    if ($(".single_product_page_container").length) {
        $("input[type=radio][name$=_clone]").change(function () {
            var target = $(this).attr("name").replace("_clone", "");
            $("input[name=" + target + "]").val($(this).val());
        });

        $(".cart").validate({
            messages: {},
            submitHandler: function (form) {
                $(".cart button").trigger("click");
            },
            errorElement: "small",
            errorLabelContainer: "#errordiv",
        });

        $(".clone_add_to_cart_btn").on("click", function () {
            $(".cart").submit();
        });
    }
    /*	-----------------------------------------------------------------------------
            SINGLE PRODUCT END
        --------------------------------------------------------------------------------- */

    /*	-----------------------------------------------------------------------------
           SINGLE PRODUCT - DONATION CATEGORY
       --------------------------------------------------------------------------------- */
    if ($(".single_product_page_container.donation_category").length) {
        //copy value of custom price clone input to the original hidden custom price input
        $("#custom_price_field_clone").on("input", function () {
            $("#custom_price_field").val($(this).val());
        });

        $("input[type=radio][name=donation_type_clone]").change(function () {
            if (this.value === "Recurring donation") {
                $(".recurring_donation_type_radio_buttons").slideDown();
            } else {
                $(".recurring_donation_type_radio_buttons").slideUp();
                $("input[name=recurring_donation_type]").val("");

                $(".recurring_donation_type_radio_buttons input").each(function () {
                    $(this).prop("checked", false);
                });
            }
        });
    }
    /*	-----------------------------------------------------------------------------
            SINGLE PRODUCT - DONATION CATEGORY END
        --------------------------------------------------------------------------------- */

    /*	-----------------------------------------------------------------------------
          SINGLE PRODUCT - REGISTRATION CATEGORY
      --------------------------------------------------------------------------------- */
    if ( $(".single_product_page_container.registration_category").length ) {
        $("input[type=radio][name=source_clone]").change(function () {
            if( this.value.toLowerCase() === 'other' ) {
                $('.other_source_input_holder').show();
            } else {
                $('.other_source_input_holder').hide();
            }
        });
    }
    /*	-----------------------------------------------------------------------------
            SINGLE PRODUCT END - REGISTRATION CATEGORY
        --------------------------------------------------------------------------------- */


    /*	-----------------------------------------------------------------------------
        PROGRAMS PAGE
    --------------------------------------------------------------------------------- */
    if ( $(".template_programs_page_container").length ) {
        var filterForm = $('#programs_filter_form');
        filterForm.find('input, select').change(function() {
            filterForm.submit();
        });

        $("form select").select2({
            dropdownParent: $('#type_dropdown'),
            width: '100%',
            minimumResultsForSearch: -1
        });

        if( $(window).width() > 1250 ) {
            filterForm.find("input[name=type]").prop('disabled', false);
            filterForm.find("select").prop('disabled', true);
        } else {
            filterForm.find("input[name=type]").prop('disabled', true);
            filterForm.find("select").prop('disabled', false);
        }
    }
    /*	-----------------------------------------------------------------------------
            PROGRAMS PAGE END
        --------------------------------------------------------------------------------- */

    /*	-----------------------------------------------------------------------------
             CONTACT PAGE
         --------------------------------------------------------------------------------- */
        if( $(window).width() > 1000 ) {
            $('.contact form input').attr('placeholder', 'Enter your e-mail');
        } else {
            $('.contact form input').attr('placeholder', 'E-mail');
        }

        $(window).on("resize", function () {
            if( $(window).width() > 1000 ) {
                $('.contact form input').attr('placeholder', 'Enter your e-mail');
            } else {
                $('.contact form input').attr('placeholder', 'E-mail');
            }
        });
    /*	-----------------------------------------------------------------------------
            CONTACT PAGE END
        --------------------------------------------------------------------------------- */
        


    /*	-----------------------------------------------------------------------------
             CALENDAR PAGE
         --------------------------------------------------------------------------------- */
    $(".events_slider").slick({
        prevArrow:
            '<button type="button" class="events_slider_btn prev"><img src="' +
            site_data.theme_url +
            '/images/icons/arrow.svg" alt=""></button>',
        nextArrow:
            '<button type="button" class="events_slider_btn next"><img src="' +
            site_data.theme_url +
            '/images/icons/arrow.svg" alt=""></button>',
        infinite: false,
    });

    $(".date_slider").slick({
        initialSlide: 8,
        prevArrow:
            '<button type="button" class="date_slider_btn prev"><img src="' +
            site_data.theme_url +
            '/images/icons/arrow-3.svg" alt=""></button>',
        nextArrow:
            '<button type="button" class="date_slider_btn next"><img src="' +
            site_data.theme_url +
            '/images/icons/arrow-3.svg" alt=""></button>',
    });
    /*	-----------------------------------------------------------------------------
           CALENDAR PAGE END
       --------------------------------------------------------------------------------- */

    /*	-----------------------------------------------------------------------------
             GALLERY PAGE
         --------------------------------------------------------------------------------- */

    var swiper = new Swiper(".gallery_swiper", {
        slidesPerView: 1,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    var swiper = new Swiper(".swiper", {
        // loopedSlides: 8,
        slidesPerView: 2.8,
        spaceBetween: 170,
        loop: true,
        freeMode: true,
        autoplay: {
            delay: 1,
            disableOnInteraction: false,
            // waitForTransition: false,
        },
        speed: 10000,
        mousewheel: {
            // forceToAxis: true,
        },
    });

    swiper.on("slideChange", function () {
        // console.log('s');
        swiper.autoplay.stop();

        setTimeout(function () {
            swiper.autoplay.start();
        }, 500);
    });

    $(".gallery_section").hover(function () {
        swiper.autoplay.start();
    });

    // var swiper = new Swiper(".swiper-container", {
    //   loopedSlides: 8,
    //   loop: true,
    //   slidesPerView: "auto",
    //   freeMode: true,
    //   mousewheel: {
    //     releaseOnEdges: true,
    //   },
    // });
    //
    // var thumb = document.querySelectorAll(".thumbContainer");
    //
    // thumb.forEach(function(image, index) {
    //   var delay = index * 90;
    //   image.classList.add("fadeInSlide");
    //   image.style.animationDelay = delay + "ms";
    // });

    // $(".galleries_slider").slick({
    //   autoplay: true,
    //   autoplaySpeed: 0,
    //   centerMode: true,
    //   slidesToShow: 3,
    //   slidesToScroll: 1,
    //   speed: 1000,
    //   pauseOnFocus: true,
    //   pauseOnHover: true,
    //   pauseOnDotsHover: true,
    //   cssEase: 'linear',
    //   arrows : false,
    //   waitForAnimate: false,
    //   // centerPadding: '50px',
    //   // variableWidth: true ,
    // });
    //
    // $('.galleries_slider').on('swipe', function(event, slick, currentSlide, nextSlide){
    //   console.log(currentSlide);
    // });
    /*	-----------------------------------------------------------------------------
           GALLERY PAGE END
       --------------------------------------------------------------------------------- */

    /*	-----------------------------------------------------------------------------
              CHECKOUT PAGE
          --------------------------------------------------------------------------------- */
    if ($(".form_checkout_page_container").length) {
        $("input[type=radio][name=step_choice]").change(function () {
            var target = "#" + this.value;

            $(".step_block").removeClass("active");
            $(target).addClass("active");
        });

        $(".next_step").on("click", function () {
            $("#step_2").trigger("click");
        });

        $(".radio_wrapper .woocommerce-input-wrapper").addClass(
            "pills_checkbox_inputs_holder three_in_row"
        );

        $(".radio_wrapper .woocommerce-input-wrapper label").each(function () {
            $(this).contents().wrap('<span class="checkmark"/>');
        });

        $(".radio_wrapper .woocommerce-input-wrapper input[type=radio]").each(
            function () {
                var id = $(this).attr("id");
                var label = $(
                    '.radio_wrapper .woocommerce-input-wrapper label[for="' + id + '"]'
                );
                $(this).contents().wrap('<span class="checkmark"/>');
                $(this).detach().prependTo(label);
            }
        );

        $("input[type=radio][name=ship_to_different_address_radio]").change(
            function () {
                $("#ship-to-different-address-checkbox").trigger("click");

                $(".shipping_address select").select2({
                    // allowClear: true,
                    // width: '100%',
                    // // selectOnClose: true,
                    // placeholder : placeHolder,
                    // dropdownPosition: 'below',
                });
            }
        );
    }
    /*	-----------------------------------------------------------------------------
           CHECKOUT PAGE END
       --------------------------------------------------------------------------------- */

    /*	-----------------------------------------------------------------------------
           FAQ PAGE
       --------------------------------------------------------------------------------- */

    if (window.location.href.indexOf("registration-policies") != -1) {
        setTimeout(() => {
            location.hash = '#registration-policies';
            $(".questions_group:first-of-type .question:nth-child(2)").addClass("active");
            $(".questions_group:first-of-type .question:nth-child(2) .question_text").slideDown();
        }, 500);
    }
    $(".circle_btn").on("click", function(e) {
        $(".questions_group:first-of-type .question:nth-child(2)").addClass("active");
        $(".questions_group:first-of-type .question:nth-child(2) .question_text").slideDown();
    })
    $(".question .question_title").on("click", function () {
        $(this).parent().toggleClass("active").find(".question_text").slideToggle();
    });
    /*	-----------------------------------------------------------------------------
           FAQ PAGE END
       --------------------------------------------------------------------------------- */

    var wordsWithImageSection = $(".words_with_image_section");
    var wordsWithImageSectionWord = $(".words_with_image_section span");
    wordsWithImageSectionWord.on({
        mouseover: function () {
            var img = $(this).data("image");

            setTimeout(function () {
                wordsWithImageSection.addClass("word_is_active");
                wordsWithImageSection
                    .find(".img_background")
                    .attr("src", img)
                    .fadeIn(200);
            }, 250);
        },
        mouseout: function () {
            wordsWithImageSection.removeClass("word_is_active");

            wordsWithImageSection.find(".img_background").fadeOut(200, function () {
                $(this).attr("src", "");
            });
        },
    });
    $(".testimonials_slider").on(
        "afterChange",
        function (event, slick, currentSlide, nextSlide) {
            smoothScroll();
        }
    );
    $(".testimonials_slider").slick({
        prevArrow:
            '<div class="left"><button type="button" class="testimonials_prev_btn"><img src="' +
            site_data.theme_url +
            '/images/icons/arrow.svg" alt="">Previous</button></div>',
        nextArrow:
            '<div class="right"><button type="button" class="testimonials_next_btn">Next<img src="' +
            site_data.theme_url +
            '/images/icons/arrow.svg" alt=""></button></div>',
        appendArrows: $(".navigation"),
        fade: true,
        adaptiveHeight: true,
        rows: 0,
        slide: ".actor",
    });

    $(".testimonials_section .btn").on("click", function () {
        if ($(this).is(".active")) {
            return;
        } else {
            $(".testimonials_section .btn").removeClass("active");
            $(this).addClass("active");
        }

        $(".testimonials_slider").slick("unslick");

        if ($(this).is(".actors")) {
            $(".testimonial.actor").css("display", "block");
            $(".testimonial.audience").css("display", "none");
            $(".testimonials_slider").slick({
                prevArrow:
                    '<div class="left"><button type="button" class="testimonials_prev_btn"><img src="' +
                    site_data.theme_url +
                    '/images/icons/arrow.svg" alt="">Previous</button></div>',
                nextArrow:
                    '<div class="right"><button type="button" class="testimonials_next_btn">Next<img src="' +
                    site_data.theme_url +
                    '/images/icons/arrow.svg" alt=""></button></div>',
                appendArrows: $(".navigation"),
                fade: true,
                adaptiveHeight: true,
                rows: 0,
                slide: ".actor",
            });
            $(".testimonials_slider").on(
                "afterChange",
                function (event, slick, currentSlide, nextSlide) {
                    smoothScroll();
                }
            );
        } else {
            $(".testimonial.actor").css("display", "none");
            $(".testimonial.audience").css("display", "block");
            $(".testimonials_slider").slick({
                prevArrow:
                    '<div class="left"><button type="button" class="testimonials_prev_btn"><img src="' +
                    site_data.theme_url +
                    '/images/icons/arrow.svg" alt="">Previous</button></div>',
                nextArrow:
                    '<div class="right"><button type="button" class="testimonials_next_btn">Next<img src="' +
                    site_data.theme_url +
                    '/images/icons/arrow.svg" alt=""></button></div>',
                appendArrows: $(".navigation"),
                fade: true,
                adaptiveHeight: true,
                rows: 0,
                slide: ".audience",
            });
            $(".testimonials_slider").on(
                "afterChange",
                function (event, slick, currentSlide, nextSlide) {
                    smoothScroll();
                }
            );
        }

        smoothScroll();
    });

    //     $(".letter_wrap").each(function () {
    //       var words = jQuery(this).text().split(" ");
    //       jQuery(this)
    //         .empty()
    //         .html(function () {
    //           for (i = 0; i < words.length; i++) {
    //             if (i == 0) {
    //               jQuery(this).append(
    //                 '<div class="single_word">' + words[i] + "</div>"
    //               );
    //             } else {
    //               jQuery(this).append(
    //                 ' <div class="single_word">' + words[i] + "</div>"
    //               );
    //             }
    //           }
    //         });
    //     });

    //   $(".single_word").html(function (index, html) {
    //     return html.replace(/\S/g, '<div class="word_wrap"><span>$&</span></div>');
    //   });

    //   $(window).on("scroll", function () {
    //     $(".circle_btn")
    //       .find(".circle_text")
    //       .css({
    //         transform:
    //           "translate(-50%,-50%) rotate(" + $(window).scrollTop() * 0.1 + "deg)",
    //       });
    //   });

    $(window).on("resize", function () {});
})(jQuery);

/*	-----------------------------------------------------------------------------
    TEXT TRANSITIONS 
--------------------------------------------------------------------------------- */

(function ($) {
    let animationTrigger = $(".animate_el");

    animationTrigger.each(function () {
        let trigger = $(this);
        let headlineClasssName = "in_view";

        gsap.to(animationTrigger, {
            scrollTrigger: {
                trigger: trigger,
                start: "top 75%",
                onEnter: function () {
                    $(trigger).addClass("in_view");
                },
            },
        });
    });
})(jQuery);

window.addEventListener("load", function () {
    const headlineTriggers = gsap.utils.toArray(".st__split-text");
    headlineTriggers.forEach((split) => {
        let titleSplit = new SplitText(split, {
            type: "lines",
        });
        var tl = gsap.timeline({
            scrollTrigger: {
                trigger: split,
                start: "top 75%",
                onStart: function () {
                    split.classList.add("disabled-pointer");
                },
                onComplete: function () {
                    split.classList.remove("disabled-pointer");
                },
            },
        });
        tl.from(titleSplit.lines[0], 0.5, {
            opacity: 0,
            yPercent: 50,
            ease: Expo.inOut,
        });
        tl.from(
            titleSplit.lines[1],
            0.5,
            {
                opacity: 0,
                yPercent: -50,
                ease: Expo.inOut,
            },
            "-=.5"
        );
    });

    const splitBlurb = gsap.utils.toArray(".st__split-blurb");
    splitBlurb.forEach((split) => {
        let blurb = new SplitText(split, {
            type: "lines",
        });
        gsap.from(blurb.lines, {
            y: 90,
            rotationZ: 3,
            stagger: 0.1,
            opacity: 0,
            scrollTrigger: {
                trigger: split,
                start: "top 75%",
                ease: "back.inOut(1.7)",
            },
        });
    });
    //   const blurbTriggers = gsap.utils.toArray(".st__fade");
    //   blurbTriggers.forEach((trigger) => {
    //     gsap.from(trigger, {
    //       opacity: 0,
    //       y: 20,
    //       ease: Expo.inOut,
    //       scrollTrigger: {
    //         trigger: trigger,
    //         start: "top 70%",
    //       },
    //     });
    //   });
});

/*	-----------------------------------------------------------------------------
    GRAPHIC / SHAPE ANIMATIONS 
--------------------------------------------------------------------------------- */

window.addEventListener("load", function () {
    const rotateTriggers = gsap.utils.toArray(".circle_text");

    rotateTriggers.forEach((trigger) => {
        gsap.from(trigger, {
            rotation: -150,
            scrollTrigger: {
                trigger: trigger,
                start: "top bottom",
                end: "bottom top",
                scrub: true,
            },
        });
    });
});
