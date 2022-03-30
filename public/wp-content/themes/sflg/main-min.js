jQuery.event.special.touchstart={setup:function(e,i,s){this.addEventListener("touchstart",s,{passive:!i.includes("noPreventDefault")})}},jQuery.event.special.touchmove={setup:function(e,i,s){this.addEventListener("touchmove",s,{passive:!i.includes("noPreventDefault")})}},jQuery.event.special.wheel={setup:function(e,i,s){this.addEventListener("wheel",s,{passive:!0})}},jQuery.event.special.mousewheel={setup:function(e,i,s){this.addEventListener("mousewheel",s,{passive:!0})}},jQuery(document).ready((function($){if($("body").addClass("ready"),"loading"in HTMLImageElement.prototype){document.querySelectorAll('img[loading="lazy"]').forEach((e=>{e.src=e.dataset.src}))}else{const e=document.createElement("script");e.src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js",document.body.appendChild(e)}function e(e,i,s,t,o,l){if(jQuery("#"+e).length)new Waypoint({element:document.getElementById(e),handler:function(e){"down"===e?(jQuery(i).addClass(s),"function"==typeof o&&(o(),this.destroy())):"up"===e&&l&&jQuery(i).removeClass(s)},offset:t})}$(".wistia_embed").on("click",(function(){const e=this,i=$(this).attr("data-wistia");"undefined"==typeof Wistia&&function(e,i){jQuery.getScript("https://fast.wistia.com/assets/external/E-v1.js",(function(s,t,o){var l=setInterval((function(){$(e).attr("id")&&window._wq&&(_wq.push({id:i,onReady:function(e){e.play()}}),clearInterval(l))}),100)}))}(e,i)})),e("section-three","#section-three","visible",250,null,!0),e("section-four","#section-four","visible",250,null,!0),e("section-five","#section-five","visible",250,null,!0),e("sec-five-info-box","#sec-five-info-box","visible",250,null,!0),e("section-six","#section-six","visible",250,null,!0),e("section-eight","#section-eight","visible",250,null,!0),e("about-bottom","#about-bottom","visible",250,null,!0),$((function(){$('a[href*="#"]:not([href="#"])').click((function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);if((e=e.length?e:$("[name="+this.hash.slice(1)+"]")).length)return $("html, body").animate({scrollTop:e.offset().top},1e3),!1}}))})),$(".full-width-four-slides").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,mobileFirst:!0,arrows:!0,fade:!0,adaptiveHeight:!0,prevArrow:".full-width-four-slides-left",nextArrow:".full-width-four-slides-right",dots:!1,responsive:[{breakpoint:1169,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:3,slidesToScroll:3}},{breakpoint:1649,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:4,slidesToScroll:4}}]}),$(".full-width-three-slides").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,mobileFirst:!0,arrows:!0,fade:!0,adaptiveHeight:!0,prevArrow:".full-width-three-slides-left",nextArrow:".full-width-three-slides-right",dots:!1,responsive:[{breakpoint:1169,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:2,slidesToScroll:2}},{breakpoint:1659,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:3,slidesToScroll:3}}]}),$(".pa-slides").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,mobileFirst:!0,arrows:!0,fade:!0,adaptiveHeight:!0,prevArrow:".pa-slides-left",nextArrow:".pa-slides-right",dots:!1,responsive:[{breakpoint:1659,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:2,slidesToScroll:2}}]}),$(".att-slides").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,mobileFirst:!0,arrows:!0,fade:!0,adaptiveHeight:!0,prevArrow:".att-slides-left",nextArrow:".att-slides-right",dots:!1,responsive:[{breakpoint:1169,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:2,slidesToScroll:2}},{breakpoint:1649,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:3,slidesToScroll:3}}]}),$(".awards-slider-inner").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,mobileFirst:!0,arrows:!0,fade:!0,adaptiveHeight:!0,prevArrow:".awards-arrow-left",nextArrow:".awards-arrow-right",dots:!1,responsive:[{breakpoint:767,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:2,slidesToScroll:2}},{breakpoint:1169,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:4,slidesToScroll:4}},{breakpoint:1649,settings:{adaptiveHeight:!1,fade:!1,arrows:!1,slidesToShow:5,slidesToScroll:5}}]}),$("#sec-four-slider").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,mobileFirst:!0,arrows:!0,fade:!0,prevArrow:".sec-four-arrow-left",nextArrow:".sec-four-arrow-right",dots:!1,responsive:[{breakpoint:1169,settings:{fade:!1,arrows:!1,slidesToShow:3,slidesToScroll:3}},{breakpoint:1649,settings:"unslick"}]});var i=$("#sec-five-sp-counter"),s=$("#sec-five-sp-slider");s.on("init reInit afterChange",(function(e,s,t,o){var l=(t||0)+1;i.text(l+"/"+s.slideCount)})),s.slick({infinite:!0,slidesToShow:1,slidesToScroll:1,mobileFirst:!0,arrows:!0,fade:!0,adaptiveHeight:!0,prevArrow:".sec-five-arrow-left",nextArrow:".sec-five-arrow-right",dots:!1}),$("#sec-five-info-box a").on("click",(function(e){$("#sec-five-overlay").fadeIn(),$("html,body").css("overflow-y","hidden")})),$("#sec-five-close").on("click",(function(e){$("#sec-five-overlay").fadeOut(),$("html,body").css("overflow-y","scroll")})),$("ul > li.menu-item-has-children > a[href='#']").removeAttr("href"),$("span.go_back").on("click",(function(e){window.history.back()})),$("<div class='dots-wrapper'><span></span><span></span><span></span></div>").insertAfter(".widget h3"),$(".sidebar-blog .widget h3").on("click",(function(e){$(this).next("ul").slideToggle(),$(this).toggleClass("close")})),$(".widget ul.menu > li.menu-item-has-children a").on("click",(function(e){$(this).toggleClass("active"),$(this).next("ul").slideToggle()}));var t=window.location.href;function o(){$("header nav").addClass("nav_desktop"),$("header nav li.menu-item-has-children > a").next("ul.sub-menu").removeClass("open"),$("header nav").removeClass("nav_device")}function l(){$("header nav").removeClass("nav_desktop"),$("header nav").addClass("nav_device")}function n(){$(this).parent().toggleClass("active"),$(this).toggleClass("active"),$(this).next("ul.sub-menu").toggleClass("active")}$(".widget ul li").each((function(){$(this).find("a").attr("href")==t&&$(this).addClass("blog-active")})),$("#menu-wrapper").on("click",(function(e){$(this).toggleClass("open"),$("header").toggleClass("open"),$("nav").toggleClass("open"),$("html, body").toggleClass("fixed")})),$(window).width()>=1170&&o(),$(window).width()<1170&&(l(),$("header nav li.menu-item-has-children > a").off().on("click",n)),$(window).resize(_.debounce((function(){$(window).width()>=1170&&(o(),$("header nav li.menu-item-has-children > a").off("click",n)),$(window).width()<1170&&(l(),$("header nav li.menu-item-has-children > a").off().on("click",n))}),100))}));