var i=0;

$(document).ready(function() {

	// Carousel
	$('.carousel-item').css({'width':$(window).width()+'px'});
	$('#carousel-wrapper').css({'width':$(window).width()*$('.carousel-item').length});
	$('.carousel-bullet:first').addClass('active-bullet');
	$('.carousel-item-text').each(function() {
		$(this).css({'left':$(window).width()/2+'px','margin-top': $(this).height()/-2, 'margin-left': $(this).width()/-2});
	});
	$('.carousel-bullet-wrapper').css({'width':$(window).width()});
	$('.carousel-item').swipe( {
        swipeLeft:function(event, direction, distance, duration, fingerCount) { 
			if(i<$('.carousel-item').length-1) {
				i++;
				$('#carousel-wrapper').css({'margin-left':-i*$(window).width()});
				$('.carousel-bullet').removeClass('active-bullet');
				$('.carousel-bullet').eq(i).addClass('active-bullet');
			} else {
				return false;
			} 
        }, swipeRight:function(event, direction, distance, duration, fingerCount) { 
			if(i>0) {
				i--;
				$('#carousel-wrapper').css({'margin-left':-i*$(window).width()});
				$('.carousel-bullet').removeClass('active-bullet');
				$('.carousel-bullet').eq(i).addClass('active-bullet');
			} else {
				return false;
			} 
        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
         threshold:0
    });

	// Filter
	$('#filter ul li').each(function() {
		$(this).click(function() {
			if($(this).hasClass('selected')) {
				$('.filter-selection-block').animate({'max-height':0},600);
				$(this).removeClass('selected');
			} else {
				$('#filter ul li').removeClass('selected');
				$('.filter-selection-block').css({'max-height':0});
				$(this).addClass('selected');
				$('.filter-selection-block').eq($(this).index()-1).animate({'max-height':500},600);
			}
		});
	});

	// Sermon Video Pop Up
	$('.view-video-link').each(function() {
		$(this).click(function() {
			$('iframe').attr('src',$(this).attr('alt'));
			$('.youtube, iframe').toggle();
		});
	});

	$('.youtube').click(function() {
		$('.youtube, iframe').toggle();
		$('iframe').attr('src',"");
	});

	// Sermon Series Expand
	$('.sermon-expand-button').each(function() {
		$(this).click(function() {
			if($(this).hasClass('series-selected')) {
				$(this).parent().siblings('.sermon-series-list').animate({'max-height':0},600);
				$(this).removeClass('series-selected');
			} else {
				$('.sermon-series-list').css({'max-height':0});
				$('.sermon-expand-button').removeClass('series-selected');
				$(this).addClass('series-selected');
				$(this).parent().siblings('.sermon-series-list').animate({'max-height':1000},600);
			}
		});
	});

	var ajax_load = "loading...";
	var loadURL;
	$('#button').click(function() {
		loadURL = $('#sermon-list').attr('alt');
		console.log(loadURL);
		$('#sermon-list').html(ajax_load).load(loadURL);
	});

	
});

$(window).scroll(function() {
	if($(window).scrollTop()>0) {
		$('#header_main_logo').addClass('header_main_logo_mini');
		$('#header_main_menu').addClass('header_main_menu_mini');
	} else {
		$('#header_main_logo').removeClass('header_main_logo_mini');
		$('#header_main_menu').removeClass('header_main_menu_mini');
	}
	
});


$(window).resize(function() {
	$('.carousel-item').css({'width':$(window).width()+'px'});
	$('#carousel-wrapper').css({'width':$(window).width()*$('.carousel-item').length});
	$('.carousel-item-text').each(function() {
		$(this).css({'left':$(window).width()/2+'px','margin-top': $(this).height()/-2, 'margin-left': $(this).width()/-2});
	});
	$('#carousel-wrapper').css({'margin-left':-i*$(window).width()});
	
});