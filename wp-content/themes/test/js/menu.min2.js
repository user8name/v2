/*menu js 2*/
$(document).ready(function () {
    "use strict";
    $('.menu > ul > li:has(ul)').addClass('menu-dropdown-icon');
    $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
    $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">Menu</a>");
    $(".menu > ul > li").on('mouseenter', function (e) {

    	if ($(window).width() > 1024) { $(this).children("ul").stop(true, false).fadeIn(150); e.preventDefault(); } });
    $(".menu > ul > li").on('mouseleave', function (e) { if ($(window).width() > 1024) { $(this).children("ul").stop(true, false).fadeOut(150); e.preventDefault(); } });
    $(".menu > ul > li").click(function (e) { if ($(window).width() <= 1024) { $(this).children("ul").fadeToggle(150);/* e.preventDefault();*/ } });
    $(".menu-mobile").click(function (e) { $(".menu > ul").toggleClass('show-on-mobile'); e.preventDefault(); });
});

$(document).ready(function () {
	var a = 1;
	$(".navi-menu-3").click(function (e) {
		if(a ==1){
			a = 0;
			$(this).find(".navi-menu-4").show();
		}else {
			a = 1;
			$(this).find(".navi-menu-4").hide();
		}
	});
});