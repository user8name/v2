/*top nav scrolltop*/
var isAnimated = false;
$(document).ready(function(){
    $(window).on("scroll",function(){
        if($(this).scrollTop() > 100){
            $(".nav").addClass("fixed");
            if(!isAnimated){
                $(".nav").css("top","-80px");
                $(".nav").animate({"top":"0"},500);
                isAnimated = true;
            }
        }else{
            isAnimated = false;
            $(".nav").removeClass("fixed");
        }
    })
});


/*Email*/

$(function () {
    var _lochref = window.location.href.toLowerCase();
    var _regex = new RegExp("cd-biosciences.com");
    if (_regex.test(_lochref)) {
        $('.email-info').attr("href", "mailto:info@cd-biosciences.com");
        $(".email-info").html("info@cd-biosciences.com");
        $('.email-to').attr("href", "mailto:info@cd-biosciences.com");
    } else {
        $('.email-info').attr("href", "mailto:clinicaldisposal.com");
        $(".email-info").html("info@clinicaldisposal.com");
        $('.email-to').attr("href", "mailto:info@clinicaldisposal.com");
    }
});
