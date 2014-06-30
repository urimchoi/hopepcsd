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

	
		<?php switch ($page->title()) {
			case 'Koinonia':
				snippet('get_koinonia_list');
				break;
			case 'Bible Study':
				snippet('get_biblestudy_list');
				break;
			case 'Serve':
				snippet('get_serve_list');
				break;
			case 'Training':
				snippet('get_training_list');
				break;
		} ?>

		<?php snippet('get_otherways') ?>
</main>

<?php snippet('footer') ?>