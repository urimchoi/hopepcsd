<?php snippet('header') ?>
<?php echo js('assets/script/parallax.js') ?>
<?php snippet('fb_upcoming_events') ?>

<main id="content" class="fade-in-fast">
	<section id="intro" class="page-width">
		<h1>Connect With Community</h1>
		<div class="intro-button-bg">
			<img src="<?php echo url('assets/images/icon_community.png') ?>">
		</div>
		<div class="intro-text">
			<?php echo kirbytext($page->intro()) ?>
		</div>
	</section>

	<section id="ministries" class="light">
		<div class="page-width">
			<h1>Ministries</h1>
			<?php foreach($pages->find('ministries')->children() as $ministry): ?>
			<div class="ministry-block">
				<img src="<?php 
				if($ministry->hasFiles()):
					echo $ministry->files()->find('ministry_default.png')->url();
				else:
					echo url('/assets/images/ministry_default.png');
				endif; 
				?>"></img>
				<h2 class="ministry-label"><?php echo $ministry->title() ?></h2>
				<span class="icon-mail"></span> <a href="mailto:<?php echo $ministry->email() ?>"><?php echo $ministry->name() ?></a><br/>
				<span class="icon-clock"></span> <?php echo $ministry->time() ?>
				
			</div>
			<?php endforeach ?>
		</div>
	</section>

	<section class="parallax"  style="background:url(<?php echo url('/assets/images/community_banner1.jpg') ?>) bottom center;">
	</section>

	<section id="connect-content" class="light">
		<div class="page-width"	>
			<h1>Get Involved</h1>
			<?php foreach($page->children()->visible() as $subpage): ?>
			<div class="two-block-layout community">
				<h1 class="alt"><?php echo $subpage->title() ?></h1>
				<a href="<?php echo $subpage->url() ?>" class="img-link"><img src="<?php echo $subpage->images()->find('icon.png')->url() ?>" class="community-icon"></a>
				<?php echo kirbytext($subpage->blurb()) ?>
				<div class="more-button-wrapper">
					<a href="<?php echo $subpage->url() ?>">
						<div class="more-button-blue" >
							<p>Browse all groups</p>
						</div>
					</a>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</section>

	<section id="connect-parallax" class="parallax" data-type="parallax" data-speed="-4" style="background:url(<?php echo url('/assets/images/community_banner.jpg') ?>);">
	</section>
			
	<section id="connect-footer" class="dark">
		<ul class="page-width">
			<li class="three-block-layout">
				<h1>Prayer Meetings</h1>
				<p>
					What!? Hokey religions and ancient weapons are no match for a good blaster at your side, kid. Don't be too proud of this technological terror you've constructed. The ability to destroy a planet is insignificant next to the power of the Force. Leave that to me. Send a distress signal, and inform the Senate that all on board were killed.
				</p>
				<h3>Every Tuesday</h3>
				<p>8:00 PM @ UCSD, Hope on Campus (HoC)</p>
				<h3>Every Saturday</h3>
				<p>8:00 AM @ Church</p>
			</li>
			<li class="fb-upcoming-events three-block-layout date-color-inverse">
				<h1>Upcoming Events</h1>
				<div class="alert check-fb-login inverse" style="padding:0"><p>To get the best experience, please log in to Facebook!</p>
					<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
					<p style="margin-top:20px;">Alternatively, you can visit the <a href="https://www.facebook.com/pages/Hope-Presbyterian-Church-of-San-Diego/112245353581?sk=events" target="_blank">facebook page</a> for all upcoming events.</p>
				</div>
				<div class="more-button-wrapper fb-more-button">
					<a href="<?php echo $pages->find('events')->url() ?>">
						<div class="more-button-white" >
							<p class="inverse">See all events</p>
						</div>
					</a>
				</div>
			</li>
			<li class="three-block-layout">
				<h1>Stay Connected</h1>
				<p>
					If you have any questions, feel free to drop us a note!	
				</p>

				
				<div class="more-button-wrapper">
					<a href="<?php echo $pages->find('contact')->url() ?>">
						<div class="more-button-white" >
							<p class="inverse">Contact Us</p>
						</div>
					</a>
				</div>
			</li>
		</ul>
	</section>
</main>

<?php snippet('footer') ?>