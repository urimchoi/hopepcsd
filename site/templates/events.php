<?php snippet('header') ?>
<?php echo js('assets/script/parallax.js') ?>

<?php echo js('/assets/script/events.js') ?>

<?php snippet('facebook_api_init') ?>

<?php $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December') ?>

<main id="content" class="fade-in-fast">
	<section id="intro-events" class="page-width">
		<h1>Events</h1>
	</section>

	<section id="events-parallax" class="parallax" data-type="parallax" data-speed="0.5">
	</section>

	<section id="events-content">
		<div class="alert check-fb-login">To get the best experience, please log in to Facebook!<br>
			<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
			<p style="text-align:center;margin-top:20px;">Alternatively, you can visit the <a href="https://www.facebook.com/pages/Hope-Presbyterian-Church-of-San-Diego/112245353581?sk=events" target="_blank">facebook page</a> for all upcoming events.</p>
		</div>
		<?php for($i = 0; $i < 12; $i++): ?>
		<div class="events-month-wrapper">
			<div id="events" class="page-width" data-month="<?php echo $i ?>">
				<h1><?php echo $months[$i] ?></h1>
			</div>
		</div>
		<?php endfor ?>
<!--		<?php if($page->hasChildren()): 
			$today = date('Y');
			$futuremonth = array();
			foreach($page->children()->visible() as $eventmonth):
				if($eventmonth->year('Y') >= $today):
					$futuremonth[] = $eventmonth;
				endif;
			endforeach;
			foreach($futuremonth as $event): 
				if($event->hasChildren()): ?>
			<div class="events-month-wrapper">
				<div id="events" class="page-width">
				<h1><?php echo $event->title() ?> <?php echo $event->year() ?></h1>
					<?php foreach($event->children()->visible()->sortBy('date','asc') as $eventitem): ?>
						<div class="event-date">
							<span class="date-number"><?php echo $eventitem->date('d') ?></span>
							<span class="date-day"><?php echo $eventitem->date('D') ?></span>
						</div>
						<div class="event-detail <?php if($eventitem->date('Ymd') < date('Ymd')): ?>past<?php endif ?>">	
							<h3><?php echo $eventitem->title() ?></h3>

							<h4><?php echo $eventitem->time() ?> @ 
							<?php if($eventitem->gmap() <> ""):
								echo $eventitem->location() ?></h4>
							<?php else: ?>
								TBD</h4>
							<?php endif ?>
							<p><?php echo $eventitem->text() ?></p>
							<?php if($eventitem->fb() <> ""): ?>
							  	<div class="more-button-wrapper">
						          <a href="<?php echo $eventitem->fb() ?>" target="_blank">
						            <div class="more-button-blue" >
						              <p>See detail</p>
						            </div>
						          </a>
						        </div>
							<?php endif ?>
						</div>
					<?php endforeach ?> 
				<?php endif ?>
				</div>
			</div>
			<?php endforeach ?>
		<?php endif ?> -->
		<div class="footnote page-width">
			<p>For questions related to events, please email us at: <a href="mailto:HopePC@yahoogroups.com" target="_blank">HopePC@yahoogroups.com</a></p>
		</div>
	</section>
			
</main>

<?php snippet('footer') ?>