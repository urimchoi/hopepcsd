  	<footer id="footer_container" class="fade-in-medium">
		<div id="footer_wrapper">

			<p>HOPE PRESBYTERIAN CHURCH OF SAN DIEGO &#169; 2010</p>
			<a class="footer-social-media icon-facebook" href="http://www.facebook.com/<?php echo $pages->find('settings')->facebook() ?>" target="_blank"></a>
			<a class="footer-social-media icon-mail" href="<?php echo $pages->find('settings')->email() ?>" target="_blank"></a>
			<p>4665 Mercury St.<br/>San Diego, CA 92111</p>
		</div>
	</footer>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52010311-2', 'hopepcsd.org');
  ga('send', 'pageview');
</script>

</body>

</html>