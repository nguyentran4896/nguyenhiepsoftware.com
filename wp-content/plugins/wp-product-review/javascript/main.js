/* jshint ignore:start */
/**
 * Main JavaScript File
 */
jQuery(document).ready(function($) {
    
    var initPieChart = function() {
        returnColor = function(percent) {
            
            if (percent > 0 && percent <= 25) {
                return c1;
            } else if (percent > 25 && percent <= 50) {
                return c2;
            } else if (percent > 50 && percent <= 75) {
                return c3;
            } else if (percent > 75) {
                return c4;
            }
        };
        if (typeof trackcolor != 'undefined') {
            trackColorRight = trackcolor.toUpperCase();
        }
        else {
            trackColorRight = '#ebebeb';
        }

        p_image_width = $('.review-wrap-up .rev-wu-image').width();
        if (p_image_width==0 || p_image_width==null)   p_image_width = 50;
        $('.cwp-review-percentage').cwp_easyPieChart({
            barColor: function(percent) {
                return returnColor(percent);
            },
            trackColor: trackColorRight,
            scaleColor: false,
            lineCap: 'butt',
            rotate: 0,
            lineWidth: 15 * Math.min(p_image_width,150)/140,
            animate: 1,
            size : Math.min(p_image_width,150)*0.8,
            onStep: function(value) {
                var c = returnColor(value);
                
                this.$el.find('span').text(~~value / 10);
                this.$el.find('span').css({
                    color: c
                });
            }
        });
    };

    initPieChart();

    function wuReview() {

    	
		

    	if( !(typeof(cwpCustomBarIcon) === "undefined") && !(cwpCustomBarIcon === "") && isSetToPro) {
    		$(".rev-option").each(function() {
	            var grade = $(this).attr("data-value");
	            $(this).addClass("customBarIcon");
	            var x = 10;
	            if ($(this).children("ul").find("li").length == 0)
	                for (var i = 0; i < x; i++) {
	                $(this).children("ul").append("<li><i class='fa fa-fw'>&"+cwpCustomBarIcon+"</i></li>");
	            }
	            $(this).children("ul").children("li:nth-child(-n+" + Math.ceil(grade / 10) + ")").css("color", returnColor(grade));
	            $(this).children("div").children("span").text(grade / 10 + "/10");
        	});
    	} else {
			$(".rev-option").each(function() {
	            var grade = $(this).attr("data-value");
	            var x = 10;
	            if ($(this).children("ul").find("li").length == 0)
	                for (var i = 0; i < x; i++) {
	                $(this).children("ul").append("<li style='margin-right: 2%;'></li>");
	            }
	            $(this).children("ul").children("li:nth-child(-n+" + Math.ceil(grade / 10) + ")").css("background", returnColor(grade));
	            $(this).children("div").children("span").text(grade / 10 + "/10");
	        });
    	}

    }

    $(".comment-meta-option .comment-meta-grade").each(function() {
        var theBarWidth = (100 * parseFloat($(this).css('width')) / parseFloat($(this).parent().css('width')));
        $(this).css("background", returnColor(theBarWidth));
    });

    
    wuReview();

    $(".comment_meta_slider").each(function() {
        var comm_meta_input = $(this).parent(".comment-form-meta-option").children("input");
        $(this).slider({
            min: 0,
            max: 100,
            value: 4,
            slide: function(event, ui) {
                $(comm_meta_input).val(ui.value / 10);
            }
        });
    });
    

});