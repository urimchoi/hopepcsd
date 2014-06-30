<?php snippet('header') ?>
<script type="text/javascript" src="<?php echo url('assets/script/sermon.js') ?>"></script> 



<div class="youtube"></div>
<iframe src="" frameborder="0" allowfullscreen class="modal-frame"></iframe>

<main id="content" class="fade-in-fast">

  <section id="filter" class="page-width">
    <h1>Sermon Archive</h1>
    <ul>
      <li class="four-block-layout"><h2>Filter By:</h2></li>
      <li class="four-block-layout filter-button" data-num="0">Book</li>
      <li class="four-block-layout filter-button" data-num="1">Category</li>
    </ul>
  </section>

  <section id="filter-selection-wrapper">
    <div id="filter-book" class="filter-selection-block page-width" data-shown="hidden">
      <ul class="filter-selection-ul">
        <?php $sermonSeries = $pages->find('sermons'); 
          $books = tagcloud($sermonSeries, array('field' => 'books','children' => 'visible','sort' => 'name','sortdir' => 'asc'));
          $topics = tagcloud($sermonSeries, array('field' => 'topic','children' => 'visible','sort' => 'name','sortdir' => 'asc')); ?>
        <?php foreach($books as $b): ?>
        <li class="four-block-layout"><a href="<?php echo $pages->find('sermons')->url() . "/book:" . $b->name() ?>"><?php echo ucwords($b->name()) ?></a></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div id="filter-category" class="filter-selection-block page-width" data-shown="hidden">
      <ul class="filter-selection-ul">
        <?php foreach($topics as $t): ?>
        <li class="four-block-layout"><a href="<?php echo $pages->find('sermons')->url() . "/topic:" . $t->name() ?>"><?php echo ucwords($t->name()) ?></a></li>
        <?php endforeach ?>
      </ul>
    </div>
  </section>

  <section id="sermon-list" data-page="1">
    <?php snippet('get_sermon') ?>
  </section>

</main>
<?php snippet('footer') ?>