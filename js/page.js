/*	-----------------------------------------------------------------------------
    HOMEPAGE
--------------------------------------------------------------------------------- */

window.addEventListener("load", function () {
  if (document.body.classList.contains("home")) {
    let bannerHeadline = document.querySelector(".banner__split-text");
    let bannerTitleSplit = new SplitText(bannerHeadline, {
      type: "words, chars, lines",
    });
    var hero_animation = gsap.timeline();

    let hero_overlay = document.querySelector(".hero_overlay");
    let header = document.querySelector("header");
    let cta_section = document.querySelector(".cta_section");

    hero_animation.to(hero_overlay, { opacity: 0.6, duration: 1 });
    hero_animation.to(cta_section, { opacity: 1, duration: 0.6 });
    hero_animation.to(header, { top: 0, duration: 0.6 }, "<");
    hero_animation.from(bannerTitleSplit.lines[0], 1, {
      opacity: 0,
      yPercent: 50,
      ease: Quint.easeOut,
    });
    hero_animation.from(
      bannerTitleSplit.lines[1],
      1,
      {
        opacity: 0,
        yPercent: -50,
        ease: Quint.easeOut,
      },
      "-=1"
    );
  }

  gsap.from(
    ".cta_btn",
    {
      opacity: 0,
      scrollTrigger: {
        trigger: ".banner_section .st__split-text",
        start: "top 75%",
      },
    },
    "+=.5"
  );


});
