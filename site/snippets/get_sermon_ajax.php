<?php $sermonSeries = $pages->find('sermons')->children()->visible(); 
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
  $parts = parse_url($url);
  parse_str($parts['query'], $query);
  $pageAjax = isset($query['page'])?$query['page']:0;
  $bookAjax = isset($query['book'])?$query['book']:"";
  $topicAjax = isset($query['topic'])?$query['topic']:"";


  # set how many items to show per page
  $pageCount = (string)$pages->find('sermons')->showcount();
  $pageCount = intval($pageCount);

  # modify scope depending on ajax queries
  $sermonSeriesFiltered = $sermonSeries;
  if ($bookAjax <> ""):
    $sermonSeriesFiltered = $sermonSeriesFiltered->filterBy('books', '*=', $bookAjax);
    if ($topicAjax <> ""):
      $sermonSeriesFiltered = $sermonSeriesFiltered->filterBy('topic', '*=', $topicAjax);
    endif;
  else:
    if ($topicAjax <> ""):
      $sermonSeriesFiltered = $sermonSeriesFiltered->filterBy('topic', '*=', $topicAjax);
    endif;
  endif; 

  # run loop for all results
  $sermonSeriesFiltered = $sermonSeriesFiltered->offset($pageCount * $pageAjax)->limit($pageCount);
  if($sermonSeriesFiltered): 
    foreach($sermonSeriesFiltered as $s): ?>
      <div class="sermon-list-block fade-in-instant">
        <div class="sermon-synopsis-wrapper page-width">
        <h1><?php echo $s->title() ?></h1>
        <?php if($s->books() <> "" or $s->topic() <> ""): ?>
          <span id="data-categories"  >
            <?php if($s->books()): ?>
              Book: 
              <?php 
                $bookArray = explode(",",$s->books());
                foreach($bookArray as $b):
              ?>
                <a href="<?php echo $site->url() . "/sermons/book:" . $b ?>"><div class="tags book"><?php echo ucwords($b) ?></div></a> 
              <?php endforeach ?>
            <?php endif ?>
            <?php if($s->topic()): ?>
              Topic: 
              <?php
                $topicArray = explode(",",$s->topic());
                foreach($topicArray as $t):
              ?>
              <a href="<?php echo $site->url() . "/sermons/topic:" . $t ?>"><div class="tags topic"><?php echo ucwords($t) ?></div></a>
              <? endforeach ?>
            <?php endif ?>
          </span>
        <?php endif ?>
          <?php echo kirbytext($s->synopsis()) ?>
          <div class="sermon-expand-button"></div>
        </div>
        <?php if($s->children()->visible()): ?>
        <ul class="sermon-series-list page-width" data-shown="hidden">
          <?php foreach($s->children()->visible()->sortBy('date','desc') as $sermon): ?>
            <li class="four-block-layout">
              <span class="date"><?php echo $sermon->date('M d, Y') ?></span>
              <h3><?php echo $sermon->title() ?></h3>

              <?php if($sermon->youtube()): ?>
              <div class="video-link-wrapper">
                <img class="view-video-link" src="http://img.youtube.com/vi/<?php echo $sermon->youtube() ?>/hqdefault.jpg" >
                <div class="view-video-link-overlay" alt="//www.youtube.com/embed/<?php echo $sermon->youtube() ?>"></div>
              </div>
              <?php endif ?>
            </li>
          <?php endforeach ?>
        </ul>
        <?php endif ?>
      </div>
    <?php endforeach ?>
  <?php else: ?>
<?php endif; ?>