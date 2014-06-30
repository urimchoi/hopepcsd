<?php snippet('header') ?>
<?php snippet('fb_upcoming_events') ?>

<main id="content" class="fade-in-medium">

  <section id="carousel" >
    <div id="carousel-wrapper">
  	<?php if($page->hasImages()): ?> 
  	<?php foreach($page->images() as $image): ?>
  	<div class="carousel-item" style="background-image:url('<?php echo $image->url() ?>')">   
        <div class="carousel-item-text">  
          <h1 class="<?php if($image->inverse() == "yes"): ?>inverse<?php endif ?> hero"><?php echo html($image->title()) ?></h1>
          <span><?php echo $image->caption() ?></span>
          <?php if($image->link() != ""): ?>
            <a class="carousel-button" href="<?php echo $image->link() ?>"></a>
          <?php endif ?>
        </div>
  	</div>
  	<?php endforeach ?>
  	<?php endif ?>
    </div>


    <div class="carousel-bullet-wrapper">
    <?php if($page->hasImages()): ?> 
    <?php foreach($page->images() as $image): ?>
      <div class="carousel-bullet">
      </div>
    <?php endforeach ?>
    <?php endif ?>
    </div>

    <?php if($page->hasImages()): ?> 
    <?php if($page->images()->count() > 1): ?>
      <div class="carousel-nav-left">
      </div>
      <div class="carousel-nav-right">
      </div>
    <?php endif ?>
    <?php endif ?>
    </div>
  </section>

  <section id="action-button" class="page-width" style="text-align:center">
  	<ul>
      <li class="action-button-block three-block-layout">
        <div class="action-button-title">
          <div class="title-wrapper">
            <h1>Listen</h1>
            <h3>to sermons</h3>
          </div>
          <a href="<?php echo $pages->find('sermons')->url() ?>" data-type="icon" data-index="1">
            <img src="<?php echo url('/assets/images/icon_listen.png') ?>">
          </a>
        </div>
    	</li>
    	<li class="action-button-block three-block-layout">
        <div class="action-button-title">
          <div class="title-wrapper">
            <h1>Connect</h1>
            <h3>with community</h3>
          </div>
          <a href="<?php echo $pages->find('community')->url() ?>" data-type="icon" data-index="2">
            <img src="<?php echo url('/assets/images/icon_community.png') ?>">
          </a>
        </div>
    	</li>
    	<li class="action-button-block three-block-layout">
        <div class="action-button-title">
          <div class="title-wrapper">
            <h1>Give</h1>
            <h3>with us</h3>
          </div>
          <a href="<?php echo $pages->find('give')->url() ?>" data-type="icon" data-index="3">
            <img src="<?php echo url('/assets/images/icon_give.png') ?>">
          </a>
        </div>
    	</li>
    </ul>
  </section>

  <section id="service-info" class="dark">
    <div id="service-info-wrapper" class="page-width">
    	<h1>Sunday Services</h1>
    	<div class="service-info-block three-block-layout">
    		<h2>English Ministry</h2>
    		<?php echo $page->eminfo() ?>
    	</div>
    	<div class="service-info-block three-block-layout">
    		<h2>Korean Ministry</h2>
    		<?php echo $page->kminfo() ?>
    	</div>
    	<div class="service-info-block three-block-layout">
    		<h2>Youth Ministry <br/>(Middle school and high school)</h2>
    		<?php echo $page->yminfo() ?>
    	</div>

      <div class="more-button-wrapper">
        <a href="<?php echo $pages->find('contact')->url() ?>">
          <div class="more-button-white" >
            <p class="inverse">Get directions</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <section id="event-info" class="fb-upcoming-events page-width">
  	<h1>Upcoming Events</h1>
  	
		<div class="more-button-wrapper fb-more-button">
      <a href="<?php echo $pages->find('events')->url() ?>">
        <div class="more-button-blue" >
          <p>See all events</p>
        </div>
      </a>
    </div>
  </section>

</main>

<?php
date_default_timezone_set('America/Los_Angeles'); ?>
<?php if(date('l') == $pages->find('bulletin')->bulletin()): ?>
  <div class="bulletin-quick-access-wrapper fade-in-slow">

      <div class="bulletin-quick-access-caption">It's <?php echo date('l') ?>! Here are the bulletins!</div>
      <div class="bulletin-quick-access-close">X</div>
      <a href="<?php echo $pages->find('bulletin')->files()->find('em_bulletin.pdf')->url() ?>"><div class="bulletin-quick-access-button"><span class="icon-doc-text" style="font-size:20px;"></span></div></a>
  </div>
<?php endif ?>

<?php snippet('footer') ?>