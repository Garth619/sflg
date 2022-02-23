/**
 * Eliminate Lighthouse Error "Does not use passive listeners" as of 2/22/2022
 * https://stackoverflow.com/questions/60357083/does-not-use-passive-listeners-to-improve-scrolling-performance-lighthouse-repo
 */
jQuery.event.special.touchstart = {
  setup: function (_, ns, handle) {
    this.addEventListener("touchstart", handle, {
      passive: !ns.includes("noPreventDefault"),
    });
  },
};
jQuery.event.special.touchmove = {
  setup: function (_, ns, handle) {
    this.addEventListener("touchmove", handle, {
      passive: !ns.includes("noPreventDefault"),
    });
  },
};
jQuery.event.special.wheel = {
  setup: function (_, ns, handle) {
    this.addEventListener("wheel", handle, { passive: true });
  },
};
jQuery.event.special.mousewheel = {
  setup: function (_, ns, handle) {
    this.addEventListener("mousewheel", handle, { passive: true });
  },
};

jQuery(document).ready(function ($) {
  $("body").addClass("ready");

  /**
   * Lazy Loading - some browsers need to use the fallback below as of 2/22/2022
   * https://web.dev/browser-level-image-lazy-loading/
   */
  if ("loading" in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    const pictures = document.querySelectorAll("source[data-sourceset]"); // left off here
    images.forEach((img) => {
      img.src = img.dataset.src;
    });
    pictures.forEach((picture) => {
      // source.sourceset = source.dataset.sourceset;
    });
  } else {
    const script = document.createElement("script");
    script.src =
      "https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js";
    document.body.appendChild(script);
  }

  /**
   * Wistia - loads wistia on click to improve initial page speed fallsback if thumbnails need to be loaded on page load
   */
  function checkWistia() {
    const self = this;
    const wistiaID = $(this).attr("data-wistia");
    if (typeof Wistia === "undefined") {
      loadWistia(self, wistiaID);
    } else {
      //console.log("wistia is already defined");
    }
  }
  function loadWistia(self, wistiaID) {
    jQuery.getScript(
      "https://fast.wistia.com/assets/external/E-v1.js",
      function (data, textStatus, jqxhr) {
        // We got the text but, it's possible parsing could take some time on slower devices. Unfortunately, js parsing does not have
        // a hook we can listen for. So we need to set an interval to check when it's ready
        var interval = setInterval(function () {
          if ($(self).attr("id") && window._wq) {
            _wq.push({
              id: wistiaID,
              onReady: function (video) {
                video.play();
              },
            });
            clearInterval(interval);
          }
        }, 100);
      }
    );
  }
  $(".wistia_embed").on("click", checkWistia);

  /**
   * Waypoints
   */
  function createWaypoint(
    triggerElementId,
    animatedElement,
    className,
    offsetVal,
    functionName,
    reverse
  ) {
    if (jQuery("#" + triggerElementId).length) {
      var waypoint = new Waypoint({
        element: document.getElementById(triggerElementId),
        handler: function (direction) {
          if (direction === "down") {
            jQuery(animatedElement).addClass(className);

            if (typeof functionName === "function") {
              functionName();
              this.destroy();
            }
          } else if (direction === "up") {
            if (reverse) {
              jQuery(animatedElement).removeClass(className);
            }
          }
        },
        offset: offsetVal,
        // Integer or percent
        // 500 means when element is 500px from the top of the page, the event triggers
        // 50% means when element is 50% from the top of the page, the event triggers
      });
    }
  }
  createWaypoint("section-three", "#section-three", "visible", 250, null, true);
  createWaypoint("section-four", "#section-four", "visible", 250, null, true);
  createWaypoint("section-five", "#section-five", "visible", 250, null, true);
  createWaypoint(
    "sec-five-info-box",
    "#sec-five-info-box",
    "visible",
    250,
    null,
    true
  );
  createWaypoint("section-six", "#section-six", "visible", 250, null, true);
  createWaypoint("section-eight", "#section-eight", "visible", 250, null, true);
  // createWaypoint(
  //   "awards-component",
  //   "#awards-component",
  //   "visible",
  //   250,
  //   null,
  //   true
  // );
  createWaypoint("about-bottom", "#about-bottom", "visible", 250, null, true);
  // createWaypoint("internal-main", "body", "sticky", 85, null, true);

  /**
   * Smooth Scroll down to section on click (<a href="#id_of_section_to_be_scrolled_to">)
   */
  $(function () {
    $('a[href*="#"]:not([href="#"])').click(function () {
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length
          ? target
          : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          $("html, body").animate(
            {
              scrollTop: target.offset().top,
            },
            1000
          );
          return false;
        }
      }
    });
  });

  /**
   * Slick Carousel ( http://kenwheeler.github.io/slick/ )
   */
  $(".full-width-four-slides").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    fade: true,
    adaptiveHeight: true,
    prevArrow: ".full-width-four-slides-left",
    nextArrow: ".full-width-four-slides-right",
    dots: false,
    responsive: [
      {
        breakpoint: 1169,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 1649,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 4,
          slidesToScroll: 4,
        },
      },
    ],
  });
  $(".full-width-three-slides").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    fade: true,
    adaptiveHeight: true,
    prevArrow: ".full-width-three-slides-left",
    nextArrow: ".full-width-three-slides-right",
    dots: false,
    responsive: [
      {
        breakpoint: 1169,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 1659,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
    ],
  });
  $(".pa-slides").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    fade: true,
    adaptiveHeight: true,
    prevArrow: ".pa-slides-left",
    nextArrow: ".pa-slides-right",
    dots: false,
    responsive: [
      {
        breakpoint: 1659,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });
  $(".att-slides").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    fade: true,
    adaptiveHeight: true,
    prevArrow: ".att-slides-left",
    nextArrow: ".att-slides-right",
    dots: false,
    responsive: [
      {
        breakpoint: 1169,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 1649,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
    ],
  });
  $(".awards-slider-inner").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    fade: true,
    adaptiveHeight: true,
    prevArrow: ".awards-arrow-left",
    nextArrow: ".awards-arrow-right",
    dots: false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 1169,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 4,
          slidesToScroll: 4,
        },
      },
      {
        breakpoint: 1649,
        settings: {
          adaptiveHeight: false,
          fade: false,
          arrows: false,
          slidesToShow: 5,
          slidesToScroll: 5,
        },
      },
    ],
  });
  $("#sec-four-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    fade: true,
    prevArrow: ".sec-four-arrow-left",
    nextArrow: ".sec-four-arrow-right",
    dots: false,
    responsive: [
      {
        breakpoint: 1169,
        settings: {
          fade: false,
          arrows: false,
          centerMode: true,
          centerPadding: "0px",
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 1649,
        settings: "unslick",
      },
    ],
  });
  var $status = $("#sec-five-sp-counter");
  var $slickElement = $("#sec-five-sp-slider");
  $slickElement.on(
    "init reInit afterChange",
    function (event, slick, currentSlide, nextSlide) {
      //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
      var i = (currentSlide ? currentSlide : 0) + 1;
      $status.text(i + "/" + slick.slideCount);
    }
  );
  $slickElement.slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    fade: true,
    adaptiveHeight: true,
    prevArrow: ".sec-five-arrow-left",
    nextArrow: ".sec-five-arrow-right",
    dots: false,
  });

  /**
   * Remove "#" from menu anchor items to avoid jump to the top of the page
   */
  $("ul > li.menu-item-has-children > a[href='#']").removeAttr("href");
  // not found go back button
  function goBack() {
    window.history.back();
  }
  $("span.go_back").on("click", function (e) {
    goBack();
  });

  /**
   * Sidebar Dots
   */
  $(
    "<div class='dots-wrapper'><span></span><span></span><span></span></div>"
  ).insertAfter(".widget h3");

  /**
   * Sidebar slideToggle
   */
  $(".sidebar-blog .widget h3").on("click", function (e) {
    $(this).next("ul").slideToggle();
    $(this).toggleClass("close");
  });
  $(".widget ul.menu > li.menu-item-has-children a").on("click", function (e) {
    $(this).toggleClass("active");
    $(this).next("ul").slideToggle();
  });

  /**
   * Sidebar Current Class for Blog Sidebars
   * add active to blog widgets that dont show a built in current class
   */
  var pgurl = window.location.href;
  $(".widget ul li").each(function () {
    if ($(this).find("a").attr("href") == pgurl)
      $(this).addClass("blog-active");
  });

  /**
   * Resize Nav Functions
   * tablet and desktop top navigatons behave differently. These turn off click functions at certain window widths without reloading the page
   */
  $("#menu-wrapper").on("click", function (e) {
    $(this).toggleClass("open");
    $("header").toggleClass("open");
    $("nav").toggleClass("open");
    $("html, body").toggleClass("fixed");
  });
  function navDesktop() {
    $("header nav").addClass("nav_desktop");
    $("header nav li.menu-item-has-children > a")
      .next("ul.sub-menu")
      .removeClass("open");
    $("header nav").removeClass("nav_device");
  }
  function navDevice() {
    $("header nav").removeClass("nav_desktop");
    $("header nav").addClass("nav_device");
  }
  function tabletClick() {
    $(this).parent().toggleClass("active");
    $(this).toggleClass("active");
    $(this).next("ul.sub-menu").toggleClass("active");
  }
  // nav
  if ($(window).width() >= 1170) {
    navDesktop();
  }
  if ($(window).width() < 1170) {
    navDevice();
    $("header nav li.menu-item-has-children > a")
      .off()
      .on("click", tabletClick);
  }
  // resize window width and fire functions
  $(window).resize(
    _.debounce(function () {
      if ($(window).width() >= 1170) {
        navDesktop();
        // off
        $("header nav li.menu-item-has-children > a").off("click", tabletClick);
      }
      if ($(window).width() < 1170) {
        navDevice();
        // off
        $("header nav li.menu-item-has-children > a")
          .off()
          .on("click", tabletClick);
      }
    }, 100)
  );
}); // document ready
