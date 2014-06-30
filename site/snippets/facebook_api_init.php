<!-- Facebook Graph API -->

<script>
  window.fbAsyncInit = function() {

    FB.init({
      appId      : '744282618948015',
      xfbml      : true,
      version    : 'v2.0'
    });

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

    
  };


  // Response to FB status
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      var accessToken = response.authResponse.accessToken;
      $('body').attr('data-fbtoken', accessToken);

      var weekday = new Array(7);
      weekday[0]=  "Sun";
      weekday[1] = "Mon";
      weekday[2] = "Tue";
      weekday[3] = "Wed";
      weekday[4] = "Thu";
      weekday[5] = "Fri";
      weekday[6] = "Sat";

      <?php $epochDate = new DateTime($page->epoch()); ?>
      var epochDate = <?php echo $epochDate->format('U'); ?>,
      fbPageNumber = <?php echo $pages->find('settings')->facebook() ?>;

      console.log("/v2.0/" + fbPageNumber + "/events?since=" + epochDate);


      /* make the API call */
      FB.api(
          "/v2.0/" + fbPageNumber + "/events?since=" + epochDate,
          function (response) {
            if (response && !response.error) {
              var results = response.data;

              console.log(results);

              for (var i = 0; i <= results.length - 1; i++) {
                var obj = results[i];

                var s = obj['start_time'];
                var a = s.split(/[^0-9]/);
                var d = new Date (a[0],a[1]-1,a[2],a[3],a[4],a[5] );
                var injectHtmlDate = "<div class='event-date'><span class='date-number'>"+d.getDate()+"</span><span class='date-day'>"+weekday[d.getDay()]+"</span></div>",
                    injectHtmlDetail = "<div class='event-detail'><a href='http://www.facebook.com/events/"+obj.id+"'><h3>"+obj.name+"</h3></a><h4 class='icon-location'>"+obj.location+"</h4>",
                    injectHtmlUI = "<button class='more-button icon-plus' data-id="+obj.id+">More Details</button><button class='rsvp-button icon-calendar-empty'>RSVP</button><button class='close-button icon-minus'>close</button></div>";

                console.log(d.getMonth());
                $('#events[data-month="'+d.getMonth()+'"]').append(injectHtmlDate + injectHtmlDetail + injectHtmlUI);

              }

              $('.events-month-wrapper').each(function() {
                if(!$(this).children().children('.event-detail').length) {
                  $(this).remove();
                }
              });

              $('.alert').remove();
              $('.events-month-wrapper').show();
            }
          }
      );
    }
    else {
      $('.check-fb-login').show();
      $('.events-month-wrapper').hide();
      $('.fb-login').on('click', function() {
        FB.login();
      });
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


</script>

