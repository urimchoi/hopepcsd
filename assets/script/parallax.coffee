Parallax =
	init : ->
		$('section[data-type="parallax"]').each(->
			bgobj = $(@)
			speed = $(@).attr('data-speed')
			$(window).scroll(->
				scrollStart = $(window).scrollTop() + $(window).height() - bgobj.offset().top
				if $(window).scrollTop() + $(window).height() > bgobj.offset().top
					yPos = ((scrollStart / $(window).height()) / speed * 100) * -1
					coords = '50% '+yPos+'%'
					bgobj.css(
						'background-position': coords
						)
					)
			)
	setPosition: ->
		bgobj = $('section[data-type="parallax"]')
		speed = $('section[data-type="parallax"]').attr('data-speed')
		scrollStart = $(window).scrollTop() + $(window).height() - bgobj.offset().top
		if $(window).scrollTop() + $(window).height() > bgobj.offset().top
			yPos = ((scrollStart / $(window).height()) / speed * 100) * -1
			coords = '50% '+yPos+'%'
			console.log(yPos)
			bgobj.css(
				'background-position': coords
				)

$(document).ready ->
	Parallax.init()
	Parallax.setPosition()