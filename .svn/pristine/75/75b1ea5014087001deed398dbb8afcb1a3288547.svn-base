!
$(document).ready(function () {
    "use strict";
    $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');  
    $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');   
    $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">Navigation</a>");   
    $(".menu > ul > li").on('mouseenter', function (e) { if ($(window).width() > 1024) { $(this).children("ul").stop(true, false).fadeIn(150); e.preventDefault(); } });
    $(".menu > ul > li").on('mouseleave', function (e) { if ($(window).width() > 1024) { $(this).children("ul").stop(true, false).fadeOut(150); e.preventDefault(); } });   
    $(".menu > ul > li").click(function (e) { if ($(window).width() <= 1024) { $(this).children("ul").fadeToggle(150);/* e.preventDefault();*/ } });    
    $(".menu-mobile").click(function (e) { $(".menu > ul").toggleClass('show-on-mobile'); e.preventDefault(); });  
    //$('.menu > ul > li').off({ mouseenter: stopEvent, mouseleave: stopEvent });
});


$(document).ready(function(){
	var ul3_d=$(".navi-menu-3>li").children('ul');
	var ul_lenght=ul3_d.length;
	if(ul_lenght>0){
		ul3_d.before('<span class="navi-submenu"></span>');
	};
	$('.navi-submenu').click(function () {
		$(this).next('ul').toggle();
	});
  
});

$(document).ready(function () {
	$(".navi-submenu").click(function (e) {
		if ($(this).html().length == 0) {
			$(this).parents(".navi-menu-2").find(".navi-submenu").html("");
			$(this).parents(".navi-menu-2").find(".navi-menu-4").hide();
			$(this).html("&nbsp;");
			$(this).siblings(".navi-menu-4").show();
		}
		else {
			$(this).html("");
			$(this).siblings(".navi-menu-4").hide();
		}
		return false;
	});
		

		
	/**/var isAnimated = false;
	$(document).ready(function () {
		$(window).on("scroll", function () {
			if ($(this).scrollTop() > 500) {
				$(".nav").addClass("fixed");
				if (!isAnimated) {
					$(".nav").css("top", "-40px");
					$(".nav").animate({ "top": "50px" }, 500);
					isAnimated = true;
				}
			} else {
				isAnimated = false;
				$(".nav").removeClass("fixed");
			}
		})
	});
});
