<!DOCTYPE html>
<html lang="en">
<head>
  
  <title><?php echo html($site->title()) ?> - <?php echo html($page->title()) ?></title>
  <meta charset="utf-8" />
  <meta name="description" content="<?php echo html($site->description()) ?>" />
  <meta name="keywords" content="<?php echo html($site->keywords()) ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="width=device-width,
  minimum-scale=1.0, maximum-scale=1.0">

  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <!-- CSS Reset -->
  <?php echo css('assets/styles/reset.css') ?>

  <!-- stylesheets -->
  <?php echo css('assets/styles/style.css') ?>
  <?php echo css('assets/styles/style_mobile.css') ?>

  <!-- animations -->
  <?php echo css('assets/styles/animation.css') ?>
  <?php echo css('assets/styles/animation_mobile.css') ?>

  <!-- glyph fonts -->
  <?php echo css('assets/styles/fontello/fontello.css') ?>
  <?php echo css('assets/styles/fontello/fontello-embedded.css') ?>
  <?php echo css('assets/styles/fontello/fontello-codes.css') ?>
  <?php echo css('assets/styles/fontello/animation.css') ?>

  <!-- boilerplate -->
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="<?php echo url('assets/script/jquery.touchSwipe.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo url('assets/script/json2.js') ?>"></script> 

  <!-- main js file -->
  <script type="text/javascript" src="<?php echo url('assets/script/default.js') ?>"></script> 

  <!-- adobe typekit -->
  <script type="text/javascript" src="//use.typekit.net/ipd2gll.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  
</head>

<body >
    <div class="mobile_nav_wrapper">
      <ul id="mobile_nav"> 
        <?php foreach($pages->visible() AS $p): ?>
          <li <?php echo ($p->isOpen()) ? ' class="active"' : '' ?>><a href="<?php echo $p->url() ?>" data-title="<?php echo $p->title() ?>"><?php echo html($p->title()) ?></a>
            <?php if($p->title() == 'Community'): ?>
              <div class="dropdown-menu-mobile-button"></div>
              <div class="dropdown-menu-mobile">
                <?php foreach($pages->find('community')->children()->visible() as $s): ?>
                  <a href="<?php echo $s->url() ?>"><?php echo $s->title() ?></a>
                <?php endforeach ?>
              </div>
            <?php endif ?>

          </li>
        <?php endforeach ?> 
      </ul>
    </div>
  	<header id="header_container">
    	<div id="header_wrapper" class="page-width">
    		<a href="<?php echo $site->url() ?>">
    			<div id="header_main_logo">
    			</div>
    		</a>

        <ul id="header_main_menu"> 
          <?php foreach($pages->visible() AS $p): ?>
            <li <?php echo ($p->isOpen()) ? ' class="active"' : '' ?>><a href="<?php echo $p->url() ?>" data-dropdown="<?php echo $p->title() ?>"><?php echo html($p->title()) ?></a>
              <?php if($p->title() == 'Community'): ?>
                <div class="dropdown-menu">
                  <?php foreach($pages->find('community')->children()->visible() as $s): ?>
                    <a href="<?php echo $s->url() ?>"><?php echo $s->title() ?></a>
                  <?php endforeach ?>
                </div>
              <?php endif ?>

            </li>
          <?php endforeach ?> 
        </ul>

        <div class="mobile_nav_button">&#9776</div>

    	</div>
	</header>