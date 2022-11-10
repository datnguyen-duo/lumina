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

  $(window).on("load", function () {
    //Custom select (select 2 js)
    $("select").each(function () {
      let selectClassList = $(this).data("class");
      let holderID;

      if ($(this).attr("id")) {
        holderID = $(this).attr("id");
      } else {
        holderID = $(this).attr("name");
      }

      holderID = holderID.concat("_holder");

      $(this).wrap('<div class="select_2_holder" id="' + holderID + '"></div>');

      let selectHolder = $("#" + holderID);

      $(this).select2({
        dropdownParent: selectHolder,
        width: "100%",
        minimumResultsForSearch: -1,
        // placeholder: 'test',
      });

      selectHolder.addClass(selectClassList);
    });
    //Custom select (select 2 js) END
  });

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
      $(".custom-price").val($(this).val());
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
  if ($(".single_product_page_container.registration_category").length) {
    $("input[type=radio][name=source_clone]").change(function () {
      if (this.value.toLowerCase() === "other") {
        $(".other_source_input_holder").show();
      } else {
        $(".other_source_input_holder").hide();
      }
    });

    //Deposit price field
    //Elex(name your price) plugin input field #custom_price_field
    var customPriceField = $(".custom-price");
    var depositCheckbox = $("#deposit_consent");
    var depositPrice = 150;
    function setDepositPrice() {
      if (depositCheckbox.is(":checked")) {
        customPriceField.attr("value", depositPrice);
      } else {
        customPriceField.attr(
          "value",
          $("#registration_product_price").data("price")
        );
        console.log($("#registration_product_price").data("price"));
      }
    }
    setDepositPrice();
    depositCheckbox.change(function () {
      setDepositPrice();
    });
    //Deposit price field END
  }
  /*	-----------------------------------------------------------------------------
            SINGLE PRODUCT END - REGISTRATION CATEGORY
        --------------------------------------------------------------------------------- */

  /*	-----------------------------------------------------------------------------
         SINGLE GALLERIES
     --------------------------------------------------------------------------------- */
  if ($(".single_galleries_page_container").length) {
    $(".close_gallery").on("click", function () {
      $(".gallery_light_box").fadeOut(function () {
        $(".gallery_slider").slick("destroy");
        $(".gallery_custom_pagination li").removeClass("active");
      });
    });

    $(".gallery_section .image").on("click", function () {
      var initialSlide = $(this).data("index");
      $(".gallery_custom_mobile_pagination .current_slide").text(
        initialSlide + 1
      );

      $(".gallery_custom_pagination li").eq(initialSlide).addClass("active");

      $(".gallery_light_box").fadeIn();

      $(".gallery_slider").slick({
        prevArrow:
          '<button type="button" class="gallery_prev_btn"><img src="' +
          site_data.theme_url +
          '/images/icons/arrow-white.svg" alt=""></button>',
        nextArrow:
          '<button type="button" class="gallery_next_btn"><img src="' +
          site_data.theme_url +
          '/images/icons/arrow-white.svg" alt=""></button>',
        fade: true,
        appendArrows: $(".gallery_holder"),
        // dots: true,
        initialSlide: initialSlide,
        adaptiveHeight: true,
        rows: 0,
        // slide: ".actor",
      });

      $(".gallery_custom_pagination_slider").slick({
        // slidesToShow: 20,
        slidesToScroll: 20,
        infinite: false,
        variableWidth: true,
        // gap: '100px',
        prevArrow:
          '<button type="button" class="custom_pagination_slider_prev"><img src="' +
          site_data.theme_url +
          '/images/icons/arrow-3-white.svg" alt=""></button>',
        nextArrow:
          '<button type="button" class="custom_pagination_slider_next"><img src="' +
          site_data.theme_url +
          '/images/icons/arrow-3-white.svg" alt=""></button>',
        // fade: true,
        // appendArrows: $(".gallery_holder"),
        adaptiveHeight: true,
        rows: 0,
      });
    });

    $(".gallery_slider").on("afterChange", function (slick, currentSlide) {
      $(".gallery_custom_pagination li")
        .removeClass("active")
        .eq(currentSlide.currentSlide)
        .addClass("active");
      $(".gallery_custom_mobile_pagination .current_slide").text(
        currentSlide.currentSlide + 1
      );

      var target = $(this).data("index");

      $(".gallery_custom_pagination_slider").slick(
        "slickGoTo",
        currentSlide.currentSlide
      );
    });

    $(".gallery_custom_pagination li").on("click", function () {
      var target = $(this).data("index");

      $(".gallery_slider").slick("slickGoTo", target);

      $(".gallery_custom_pagination li").removeClass("active");
      $(this).addClass("active");
    });
  }
  /*	-----------------------------------------------------------------------------
            SINGLE GALLERIES END
        --------------------------------------------------------------------------------- */

  /*	-----------------------------------------------------------------------------
          ABOUT US
      --------------------------------------------------------------------------------- */
  if ($(".template_about_page_container").length) {
    $(".history .title_holder").on("click", function () {
      $(this)
        .parent()
        .parent()
        .toggleClass("active")
        .find(".history_text, .image_holder")
        .slideToggle();
    });

    $(".member_name").on("click", function () {
      $(this).parent().toggleClass("active");
    });
  }
  /*	-----------------------------------------------------------------------------
            ABOUT US END
        --------------------------------------------------------------------------------- */

  /*	-----------------------------------------------------------------------------
        PROGRAMS PAGE
    --------------------------------------------------------------------------------- */
  if ($(".template_programs_page_container").length) {
    var programsResponseDiv = document.getElementById("programs_response");

    var filterForm = $("#programs_filter_form");
    filterForm.find("input, select").change(function () {
      filterPrograms();
    });

    if ($(window).width() > 1250) {
      filterForm.find("input[name=type]").prop("disabled", false);
      filterForm.find("select").prop("disabled", true);
    } else {
      filterForm.find("input[name=type]").prop("disabled", true);
      filterForm.find("select").prop("disabled", false);
    }

    function filterPrograms() {
      var categoryFilterBreakPoint = 1250;
      var category = "";
      var sort = $('input[name="sort"]:checked').val();

      if ($(window).width() > categoryFilterBreakPoint) {
        category = $('input[name="type[]"]').val();
      } else {
        category = $('select[name="type"]').val();
      }

      $.ajax({
        url: $(programsResponseDiv).data("action"),
        data: filterForm.serialize(),
        type: "POST",
        beforeSend: function (xhr) {
          $(programsResponseDiv).css("opacity", "0");
        },
        success: function (data) {
          programsResponseDiv.innerHTML = data;
        },
        complete: function (xhr, status) {
          $(programsResponseDiv).css("opacity", "1");
        },
      });
    }
  }
  /*	-----------------------------------------------------------------------------
            PROGRAMS PAGE END
        --------------------------------------------------------------------------------- */

  /*	-----------------------------------------------------------------------------
             CONTACT PAGE
         --------------------------------------------------------------------------------- */
  if ($(window).width() > 1000) {
    $(".contact form input").attr("placeholder", "Enter your e-mail");
  } else {
    $(".contact form input").attr("placeholder", "E-mail");
  }

  $(window).on("resize", function () {
    if ($(window).width() > 1000) {
      $(".contact form input").attr("placeholder", "Enter your e-mail");
    } else {
      $(".contact form input").attr("placeholder", "E-mail");
    }
  });
  /*	-----------------------------------------------------------------------------
            CONTACT PAGE END
        --------------------------------------------------------------------------------- */

  /*	-----------------------------------------------------------------------------
        TEMPLATE CALENDAR
    --------------------------------------------------------------------------------- */
  if ($(".template_calendar_page_container").length) {
    var categoryFilterBreakPoint = 1250;
    var filterForm = $("#calendar_filter_form");

    if ($(window).width() > categoryFilterBreakPoint) {
      filterForm.find("input[name=category]").prop("disabled", false);
      filterForm.find("select").prop("disabled", true);
    } else {
      filterForm.find("input[name=category]").prop("disabled", true);
      filterForm.find("select").prop("disabled", false);
    }

    function slickCarousel() {
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
    }
    function destroyCarousel() {
      if ($(".events_slider").hasClass("slick-initialized")) {
        $(".events_slider").slick("destroy");
      }
    }

    slickCarousel();

    $(".date_slider").slick({
      prevArrow:
        '<button type="button" class="date_slider_btn prev"><img src="' +
        site_data.theme_url +
        '/images/icons/arrow-3.svg" alt=""></button>',
      nextArrow:
        '<button type="button" class="date_slider_btn next"><img src="' +
        site_data.theme_url +
        '/images/icons/arrow-3.svg" alt=""></button>',
    });

    function filterCalendar() {
      var calendarResponseDiv = document.getElementById("events_response");
      $(".date_slider .slick-slide.slick-current")
        .find("input")
        .prop("checked", true);

      $.ajax({
        url: $(calendarResponseDiv).data("action"),
        data: filterForm.serialize(),
        type: "POST",
        beforeSend: function (xhr) {
          $(calendarResponseDiv).css("opacity", "0");
        },
        success: function (data) {
          calendarResponseDiv.innerHTML = data;
          destroyCarousel();
          slickCarousel();
        },
        complete: function (xhr, status) {
          $(calendarResponseDiv).css("opacity", "1");
        },
      });
    }

    // On before slide change
    $(".date_slider").on(
      "afterChange",
      function (event, slick, currentSlide, nextSlide) {
        filterCalendar();
      }
    );

    $(".filters")
      .find("input, select")
      .change(function () {
        filterCalendar();
      });
  }
  /*	-----------------------------------------------------------------------------
       TEMPLATE CALENDAR END
   --------------------------------------------------------------------------------- */

  if ($(".template_gallery_page_container").length) {
    const $galleriesResponse = $("#galleries-response");

    $("#season-year-select").on("change", function () {
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        data: {
          action: "filter_galleries",
          year: $(this).val(),
        },
        type: "GET",
        beforeSend: function (xhr) {
          $galleriesResponse.addClass("loading");
        },
        success: function (data) {
          $galleriesResponse.html(data);
          initGalleriesSlider();
        },
        complete: function (data) {
          $galleriesResponse.removeClass("loading");
        },
      });
    });

    function initGalleriesSlider() {
      var splide = new Splide(".splide", {
        type: "loop",
        drag: "free",
        perPage: 3,
        pagination: false,
        arrows: false,
        gap: "3vw",
        waitForTransition: false,
        easingFunc: (t) => (number = 1 - Math.pow(1 - t, 3)),
        autoScroll: {
          speed: 0.8,
          pauseOnFocus: false,
          // pauseOnHover: false
        },
        breakpoints: {
          1100: {
            // gap: '6vw',
          },
          760: {
            gap: 45,
            perPage: 2,
          },
          600: {
            perPage: 1,
          },
        },
      }).mount(window.splide.Extensions);
    }

    initGalleriesSlider();
  }
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
      location.hash = "#registration-policies";
      $(".questions_group:first-of-type .question:nth-child(2)").addClass(
        "active"
      );
      $(
        ".questions_group:first-of-type .question:nth-child(2) .question_text"
      ).slideDown();
    }, 500);
  }
  $(".circle_btn").on("click", function (e) {
    $(".questions_group:first-of-type .question:nth-child(2)").addClass(
      "active"
    );
    $(
      ".questions_group:first-of-type .question:nth-child(2) .question_text"
    ).slideDown();
  });
  $(".question .question_title").on("click", function () {
    $(this).parent().toggleClass("active").find(".question_text").slideToggle();
  });
  /*	-----------------------------------------------------------------------------
           FAQ PAGE END
       --------------------------------------------------------------------------------- */

  /*	-----------------------------------------------------------------------------
           HOMEPAGE PAGE END
       --------------------------------------------------------------------------------- */
  if ($(".template_home_page_container").length) {
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

    var testimonialSlider = $(".testimonials_slider");

    function initTestimonialsSlider(category) {
      testimonialSlider.find(".testimonial").css("display", "none");
      testimonialSlider
        .find(".testimonial." + category)
        .css("display", "block");

      testimonialSlider.on(
        "afterChange",
        function (event, slick, currentSlide, nextSlide) {
          smoothScroll();
        }
      );

      testimonialSlider.slick({
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
        slide: "." + category,
      });
    }

    initTestimonialsSlider(
      $(".testimonials_section .btn.active").data("target")
    );

    $(".testimonials_section .btn").on("click", function () {
      if (!$(this).hasClass("active")) {
        $(".testimonials_section .btn").removeClass("active");
        $(this).addClass("active");

        var category = $(this).data("target");

        $(".testimonials_slider").slick("unslick");

        initTestimonialsSlider(category);
      }

      smoothScroll();
    });
  }
  /*	-----------------------------------------------------------------------------
           HOMEPAGE PAGE END
       --------------------------------------------------------------------------------- */

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

/*	-----------------------------------------------------------------------------
    CONSTANT CONTACT 
--------------------------------------------------------------------------------- */
window.addEventListener("load", function () {
  setTimeout(() => {
    document.querySelectorAll(".ctct-form-element").forEach((input) => {
      input.placeholder = "Email Address";
    });
  }, 1000);
});
