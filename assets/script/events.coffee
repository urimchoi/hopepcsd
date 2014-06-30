Events =

	init : ->
		console.log('fire!')
		that = @

		$('#events-content').on('click', '.more-button', ->
			button = @
			$.ajax(
				url: that.fbApiUrl + $(@).attr('data-id') + that.accessToken + $('body').attr('data-fbtoken')
				dataType: 'json'
				beforeSend: ->
					$(button).hide()
					$(button).parent().append('<span class="icon-spin3 animate-spin"></span>')
				success: (response)->
					# remove spin icon
					$(button).siblings('span').remove()

					# parse event detail text
					parsedText = JSON.stringify(response.description)
					parsedText = parsedText.replace(/\\n\\n/g, "</p><p class='event-text fade-in-instant'>").replace(/\\n/g,"<br>").replace(/\"/g, "").replace(/\\"/g, '"')

					# append results to event detail container
					$(button).parent().append('<p class="event-text fade-in-instant">'+parsedText+'</p>').append($(button).siblings('.close-button'))

					# show/hide buttons
					$(button).siblings('.close-button').show()

				)
			)
		$('#events-content').on('click', '.close-button', ->
			$(@).hide()
			$(@).siblings('.event-text').slideUp(200)
			$(@).siblings('.more-button').show()
			)

		$('#events-content').on('click', '.rsvp-button', ->
			$(@).empty().removeClass('icon-calendar-empty').addClass('icon-ok').append("RSVP'ed!")

			)

	fbApiUrl: "https://graph.facebook.com/v2.0/"

	accessToken : "?access_token="

$(document).ready ->
	Events.init()
	console.log('firing')