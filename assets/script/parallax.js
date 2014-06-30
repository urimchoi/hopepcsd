// Generated by CoffeeScript 1.7.1
(function() {
  var Parallax;

  Parallax = {
    init: function() {
      return $('section[data-type="parallax"]').each(function() {
        var bgobj, speed;
        bgobj = $(this);
        speed = $(this).attr('data-speed');
        return $(window).scroll(function() {
          var coords, scrollStart, yPos;
          scrollStart = $(window).scrollTop() + $(window).height() - bgobj.offset().top;
          if ($(window).scrollTop() + $(window).height() > bgobj.offset().top) {
            yPos = ((scrollStart / $(window).height()) / speed * 100) * -1;
            coords = '50% ' + yPos + '%';
            return bgobj.css({
              'background-position': coords
            });
          }
        });
      });
    },
    setPosition: function() {
      var bgobj, coords, scrollStart, speed, yPos;
      bgobj = $('section[data-type="parallax"]');
      speed = $('section[data-type="parallax"]').attr('data-speed');
      scrollStart = $(window).scrollTop() + $(window).height() - bgobj.offset().top;
      if ($(window).scrollTop() + $(window).height() > bgobj.offset().top) {
        yPos = ((scrollStart / $(window).height()) / speed * 100) * -1;
        coords = '50% ' + yPos + '%';
        console.log(yPos);
        return bgobj.css({
          'background-position': coords
        });
      }
    }
  };

  $(document).ready(function() {
    Parallax.init();
    return Parallax.setPosition();
  });

}).call(this);
