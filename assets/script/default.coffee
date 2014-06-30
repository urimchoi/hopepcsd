Setup = 
	minimizeHeader : ->
		if $(window).scrollTop() > 0
			$('#header_main_logo').addClass 'header_main_logo_mini'
			$('#header_main_menu').addClass 'header_main_menu_mini'
			$('#header_container').css
				'border-bottom': '1px solid #eee'
		else 
			$('#header_main_logo').removeClass 'header_main_logo_mini'
			$('#header_main_menu').removeClass 'header_main_menu_mini'
			$('#header_container').css
				'border-bottom': '0px'

	dropdownmenu : ->
		$('#header_main_menu li').hover(
			->
				$(@).find('.dropdown-menu').stop().slideDown(200)
			->
				$(@).find('.dropdown-menu').stop().slideUp(200)
			)

	dropdownmenuMobile : ->
		$('.mobile_nav_button').click(
			->
				$('.mobile_nav_wrapper').toggleClass('show')
				$('section, footer').toggleClass('bodyshow')
				$('header').toggleClass('bodyshow')
			)
		$('.dropdown-menu-mobile-button').click(
			->
				$('.dropdown-menu-mobile').slideToggle(200)
			)

Carousel =
	carouselPage: 0

	setup : ->
		if $(window).width() > 750
			carouselHeight = 0.39
		else
			carouselHeight = 1.0
		$('.carousel-item').css(
			'width':$(window).width()+'px'
			'height':$(window).width() * carouselHeight
			)
		$('#carousel-wrapper').css({'width':$(window).width()*$('.carousel-item').length})
		$('.carousel-bullet:first').addClass('active-bullet')
		$('.carousel-item-text').each(->
			$(@).css
				'left':$(window).width()/2+'px'
				'margin-top': $(this).height()/-2
				'margin-left': $(this).width()/-2
		)
		$('.carousel-bullet-wrapper').css(
			'width':$(window).width()
		)

	swipeAction : ->
		that = @
		nextPage = ->
			if that.carouselPage < $('.carousel-item').length - 1
				that.carouselPage++
				$('#carousel-wrapper').css({'margin-left':-that.carouselPage * $(window).width()})
				$('.carousel-bullet').removeClass('active-bullet')
				$('.carousel-bullet').eq(that.carouselPage).addClass('active-bullet')
				console.log(that.carouselPage)
			else 
				that.carouselPage = 0
				$('#carousel-wrapper').css({'margin-left':-that.carouselPage * $(window).width()})
				$('.carousel-bullet').removeClass('active-bullet')
				$('.carousel-bullet').eq(that.carouselPage).addClass('active-bullet')
		backPage = ->
			if that.carouselPage > 0
				that.carouselPage--
				$('#carousel-wrapper').css({'margin-left':-that.carouselPage * $(window).width()})
				$('.carousel-bullet').removeClass('active-bullet')
				$('.carousel-bullet').eq(that.carouselPage).addClass('active-bullet')
			else
				that.carouselPage = $('.carousel-item').length - 1
				$('#carousel-wrapper').css({'margin-left':-that.carouselPage * $(window).width()})
				$('.carousel-bullet').removeClass('active-bullet')
				$('.carousel-bullet').eq(that.carouselPage).addClass('active-bullet')
		$('.carousel-nav-right').click(->
			nextPage()
			)
		$('.carousel-nav-left').click(->
			backPage()
			)
		$('.carousel-item').swipe( 
			swipeLeft:(event, direction, distance, duration, fingerCount)->
				nextPage()
			swipeRight:(event, direction, distance, duration, fingerCount)-> 
				backPage()	
			threshold:25
		)
		$('#carousel-wrapper').css({'margin-left':-@.carouselPage * $(window).width()})

expandBox = (el, targetEl)->
	el2 = targetEl
	el2.each(->
		$(@).isShown = false
		)
	el.each(->
		$(@).on(
			'click'
			{num:$(@).attr('data-num')}
			(result)->
				if el2.eq(result.data.num).attr('data-shown') == 'hidden'
					el2.attr('data-shown','hidden')
					el.removeClass('filter-active')
					el2.hide()
					el2.eq(result.data.num).slideDown()
					el2.eq(result.data.num).attr('data-shown','shown')
					$(@).addClass('filter-active')
				else 
					el2.slideUp()
					el2.attr('data-shown','hidden')
					el.removeClass('filter-active')
		)
	)

fadeInAnimation = 
	init : ->
		$('a[data-type="icon"]').each(->
			obj = $(@)
			index = $(@).attr('data-index')
			animationStart = obj.offset().top + $(window).height() * 0.10
			$(window).scroll(->
				if $(window).scrollTop() + $(window).height() > animationStart
					obj.addClass('slide-down-' + index)
				)
			)

		$('.action-button-block a').hover(
			->
				$('.action-button-block').not($(@).parent().parent()).css('opacity':0.5)
			->
				$('.action-button-block').css('opacity':1)
			)


$(document).ready ->
	Carousel.setup()
	Carousel.swipeAction()
	fadeInAnimation.init()
	expandBox($('#filter ul li'),$('.filter-selection-block'))
	Setup.dropdownmenu()
	Setup.dropdownmenuMobile()

	# bulletin module
	$('.bulletin-quick-access-wrapper').on('click','.bulletin-quick-access-close', ->
		console.log(@)
		$('.bulletin-quick-access-wrapper').remove();
		)

$(window).scroll ->
	Setup.minimizeHeader()

$(window).resize ->
	Carousel.setup()
	Carousel.swipeAction()
