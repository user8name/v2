$('.inquiry-button').click(function () {
    var _h = $("#inquirypoint").offset().top - 10;
    $("html,body").animate({ scrollTop: _h }, 500);
    $("#I_Name").focus();
});

/*navmenu*/
$(function () {
    $('.navmenu li span.afinve1').on('click', function () {
        var parent = $(this).parent().parent();
        var labeul = $(this).parent("li").find(">ul");
        if ($(this).parent().hasClass('open') == false) {
            parent.find('ul').slideUp(300);
            parent.find("li").removeClass("open");
            parent.find('li a').removeClass("active").find(".arrow").removeClass("open");
            $(this).parent("li").addClass("open").find(labeul).slideDown(300);
            parent.find('span.afinve1').removeClass("open");
            $(this).addClass("open")
        } else {
            $(this).parent("li").removeClass("open").find(labeul).slideUp(300);
            if ($(this).parent().find("ul").length > 0) {
                $(this).removeClass("open")
            } else {
                $(this).addClass("open")
            }
        }
    });
    var _nav_title = "";
    var _breadmenu_title = "";
    $('.bread-crumb li').each(function (index, element) {
        _breadmenu_title += $(element).text().toLocaleLowerCase() + "|";
    });
    $('.navmenu a').each(function (index, element) {
        _nav_title = $(element).text().toLocaleLowerCase().trim();
        if (_breadmenu_title.indexOf(_nav_title.trim()) >= 0) {
            console.log(_nav_title + '/' + element);
                $(this).css('font-weight', 'bold');
                $(this).css('color', '#1a386e');
            $(element).parentsUntil('ul.navmenu').each(function (i, e) {
                if ($(e).children().has(element)) {
                    if ($(e).is('li')) {
                        $(e).addClass('open');
                        $(e).children('span').addClass('open');
                        $(e).children('ul').slideDown(300);
                    } else if ($(e).is('ul')) {
                         $(e).slideDown(300);
                    }
                }
            });
        }
    });
});


$(".index-product-btn .btn").click(function () {
    if ($(".other-productbox").hasClass("hide-row")) {
        $(".other-productbox").removeClass("hide-row");
    }
    else {
        $(".other-productbox").addClass("hide-row");
    }
});

$(document).ready(function () {
    $(function () {
        $("#back-top").click(function () {
            $('body,html').animate({ scrollTop: 0 }, 1000);
            return false;
        });
    });
});

$(function () {
    var _lochref = window.location.href.toLowerCase();
    var _regex = new RegExp("cd-biosciences.com");
    if (_regex.test(_lochref)) {
        $('.email-info').attr("href", "mailto:info@cd-biosciences.com");
        $(".email-info").html("info@cd-biosciences.com");
        $('.email-to').attr("href", "mailto:info@cd-biosciences.com");
    } else {
        $('.email-info').attr("href", "mailto:info@clinicaldisposal.com");
        $(".email-info").html("info@clinicaldisposal.com");
        $('.email-to').attr("href", "mailto:info@clinicaldisposal.com");
    }
});

$(".switch-btn").click(function(){
    if($(".submit_search").css("display")=="none"){  
        $(".submit_search").show(); 
        $(".switch-btn").addClass("on");   
    }else{   
        $(".submit_search").hide(); 
        $(".switch-btn").removeClass("on");  
    }    
});