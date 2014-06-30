<?php snippet('header') ?>

<main id="content" class="fade-in-fast">
	<section id="intro" class="page-width">
		<h1>Give Online</h1>
		<div class="intro-button-bg">
			<img src="<?php echo url('/assets/images/icon_give.png') ?>">
		</div>
		<div class="intro-text">
			<?php echo kirbytext($page->blurb()) ?>
		</div>
	</section>

	<section class="light">
		<div class="page-width">
			<p>He is here. Obi-Wan is here. The Force is with him. Partially, but it also obeys your commands. Oh God, my uncle. How am I ever gonna explain this? No! Alderaan is peaceful. We have no weapons. You can't possibly…</p>
		</div>
	</section>

	<section class="dark">
		<div class="page-width">
			<h1 class="inverse">Give Through Serving</h1>
			<?php echo kirbytext($page->servingblurb()) ?>
			<div class="more-button-wrapper">
				<a href="<?php echo $pages->find('community/serve')->url() ?>">
					<div class="more-button-white" >
						<p class="inverse">Learn more</p>
					</div>
				</a>
			</div>
		</div>	
	</section>
			
	
</main>

<?php snippet('footer') ?>