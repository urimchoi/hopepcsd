Sermon =

	getMoreSermons : ->
		sermonPage = 1
		stopRunning = false
		$(window).scroll(->
			if($(window).scrollTop() + $(window).height() > 0.9 * $(document).height())
				if(!stopRunning)
					el = $('#sermon-list')
					stopRunning = true
					$.ajax(
						"ajax"
						data: 
							page: sermonPage
							book: $('#data-filter').attr('data-book')
							topic: $('#data-filter').attr('data-topic')
						success: (response)->
							el.append(response).append($('#load-more-button'))
							sermonPage++
						complete: ->
							if $('#pageCount').attr('data-totalcount') <= sermonPage * $('#pageCount').attr('data-pagecount')
								$('#load-more-button').fadeOut(0)
							else
								stopRunning = false

						)
			)

	expandSermonList : ->
		el = $('.sermon-expand-button')
		el2 = '.sermon-series-list'
		$(el2).each(->
			$(@).isShown = false
			)	
		$('#sermon-list').on(
			'click'
			'.sermon-expand-button'
			(result)->
				if $(@).parent().siblings(el2).attr('data-shown') == 'hidden'
					$(el2).attr('data-shown','hidden')
					el.removeClass('series-selected')
					$(el2).slideUp()
					$(@).parent().siblings(el2).slideDown()
					$(@).parent().siblings(el2).attr('data-shown','shown')
					$(@).addClass('series-selected')
				else 
					$(@).parent().siblings(el2).slideUp()
					$(el2).attr('data-shown','hidden')
					el.removeClass('series-selected')
		)

	sermonVideoPopup : ->
		$('.view-video-link-overlay').each( -> 
			$(@).click( -> 
				$('iframe').attr('src',$(@).attr('alt'))
				$('.youtube, iframe').toggle()
			)
		)

		$('.youtube').click( ->
			$('.youtube, iframe').toggle()
			$('iframe').attr('src',"")
		)

$(document).ready ->
	Sermon.expandSermonList()
	Sermon.sermonVideoPopup()
	Sermon.getMoreSermons()