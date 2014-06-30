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
    if (response.status === 'connected') {
      var accessToken = response.authResponse.accessToken;
      $('body').attr('data-fbtoken', accessToken);

      var weekday = new Array(12);
      weekday[0]=  "Jan";
      weekday[1] = "Feb";
      weekday[2] = "Mar";
      weekday[3] = "Apr";
      weekday[4] = "May";
      weekday[5] = "Jun";
      weekday[6] = "Jul";
      weekday[7] = "Aug";
      weekday[8] = "Sep";
      weekday[9] = "Oct";
      weekday[10] = "Nov";
      weekday[11] = "Dec";

      var epochDate = <?php echo time() ?>,
      fbPageNumber = <?php echo $pages->find('settings')->facebook() ?>;

      /* make the API call */
      FB.api(
          "/v2.0/" + fbPageNumber + "/events?limit=4&since=" + epochDate,
          function (response) {
            if (response && !response.error) {
              var results = response.data;

              for (var i = 0; i <= results.length - 1; i++) {
                var obj = results[i];

                var s = obj['start_time'];
                var a = s.split(/[^0-9]/);
                var d = new Date (a[0],a[1]-1,a[2],a[3],a[4],a[5] );
                var injectHtml = "<div class='event-wrapper'><div class='event-date'><span class='date-number'>"+d.getDate()+"</span><span class='date-day'>"+weekday[d.getMonth()]+"</span></div><div class='event-detail'><a href='http://www.facebook.com/events/"+obj.id+"'><h3>"+obj.name+"</h3></a><h4 class='icon-location'>"+obj.location+"</h4></div>";

                $('.fb-upcoming-events').append(injectHtml);

              };

              $('.fb-upcoming-events').append($('.fb-more-button'));
              $('.alert').remove();
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

