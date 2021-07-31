

$(function () {
    //alert($(window).height());
    $('#clickme').click(function () {
        $('#code').center();
        $('#goodcover').show();
        $('#code').fadeIn();
    });
    $('#closebt').click(function () {
        $('#code').hide();
        $('#goodcover').hide();
    });
   /* $('#goodcover').click(function () {
        $('#code').hide();
        $('#goodcover').hide();
    });

    var val=$(window).height();
	var codeheight=$("#code").height();
    var topheight=(val-codeheight)/2;
	$('#code').css('top',topheight);*/
    jQuery.fn.center = function (loaded) {
        var obj = this;
        body_width = parseInt($(window).width());
        body_height = parseInt($(window).height());
        block_width = parseInt(obj.width());
        block_height = parseInt(obj.height());

        left_position = parseInt((body_width / 2) - (block_width / 2) + $(window).scrollLeft());
        if (body_width < body_width) {
            left_position = 0 + $(window).scrollLeft();
        };

        top_position = parseInt((body_height / 5) - (block_height / 5) + $(window).scrollTop());
        if (body_height < body_height) {
            top_position = 0 + $(window).scrollTop();
        };

        if (!loaded) {

            obj.css({
                'position': 'absolute'
            });
            obj.css({
                'top': ($(window).height() - $('#code').height()) * 0.2,
                'left': left_position
            });
            $(window).bind('resize', function () {
                obj.center(!loaded);
            });
            $(window).bind('scroll', function () {
                obj.center(!loaded);
            });

        } /*else {
            obj.stop();
            obj.css({
                'position': 'absolute'
            });
            obj.animate({
                'top': top_position
            }, 200, 'linear');
        }*/
    }
});


