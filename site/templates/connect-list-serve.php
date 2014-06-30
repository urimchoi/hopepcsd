<?php snippet('header') ?>

<main id="content" class="fade-in-fast">
	<section id="intro" class="page-width">
		<span class="crumbs"><a href="<?php echo $site->url() ?>">Home</a> > <a href="<?php echo $page->parent()->url() ?>">Community</a> > <?php echo $page->title() ?></span>
		<h1><?php echo $page->title() ?></h1>
		<div class="intro-button-bg">
			<img src="<?php echo $page->images()->find('icon.png')->url() ?>">
		</div>
		<div class="intro-text">
		<?php echo kirbytext($page->blurb()) ?>
		</div>
	</section>

	
		<?php snippet('get_serve_list');?>

		<?php snippet('get_otherways') ?>
</main>

<?php snippet('footer') ?>