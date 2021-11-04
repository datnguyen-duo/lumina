/*	-----------------------------------------------------------------------------
    HOMEPAGE
--------------------------------------------------------------------------------- */

window.addEventListener("load", function () {
  let bannerHeadline = document.querySelector(".banner__split-text");
  let bannerTitleSplit = new SplitText(bannerHeadline, {
    type: "lines",
  });
  var hero_animation = gsap.timeline();

  let hero_overlay = document.querySelector(".hero_overlay");
  let header = document.querySelector("header");
  let cta_section = document.querySelectorAll(".cta_section");
  let wrapper = document.querySelector(
    ".template_home_page_container .banner__split-text .wrapper"
  );

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
  hero_animation.from(wrapper, { opacity: 0 }, "-=1");

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

/*	-----------------------------------------------------------------------------
    DONATE PAGE
--------------------------------------------------------------------------------- */

document.addEventListener("DOMContentLoaded", function (event) {

  //DECLARATIONS
  var recurringCheckbox = document.querySelector(".donation-is-recurring");
  var subInterval = document.getElementById("_subscription_period_interval");
  var subPeriod = document.querySelector("._subscription_period");
  var subLength = document.getElementById("_subscription_length");

  //RESET
  recurringCheckbox.checked = false;
  subInterval.value = 1;
  subPeriod.value = "month";
  subLength.value = 0;

  const buttons = document.querySelectorAll(
    ".template_donate_page_container .pill"
  );

  buttons.forEach((btn) => {
    btn.onclick = function() {
      this.closest(".btn-wrapper")
        .querySelectorAll(".pill")
        .forEach((child) => {
          child.classList.remove("active");

          if (this.classList.contains("btn__month")) {
            subInterval.value = 1;
            subPeriod.value = "month";
          } else if (this.classList.contains("btn__quarter")) {
            subInterval.value = 3;
            subPeriod.value = "month";
          } else if (this.classList.contains("btn__annual")) {
            subInterval.value = 1;
            subPeriod.value = "year";
          }
        });

      this.classList.add("active");

      if (this.classList.contains("recurring")) {
        document.querySelector(".recurring-options").classList.add("active");

        if (!recurringCheckbox.checked) {
          recurringCheckbox.checked = true;
        }
      } else if (this.classList.contains("one-time")) {
        document.querySelector(".recurring-options").classList.remove("active");

        if (recurringCheckbox.checked) {
          recurringCheckbox.checked = false;
        }
      }
    };
  });

  // DONATE ADD TO CART 

  var addToCart = document.querySelector(".donate-add-to-cart")

  addToCart.onclick = function() {
    document.getElementById("wc-donation-f-submit-donation").click()
  }
});
