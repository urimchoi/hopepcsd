<?php $sermonSeries = $pages->find('sermons')->children()->visible(); 
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
  $parts = parse_url($url);
  parse_str($parts['query'], $query);
  $pageAjax = isset($query['page'])?$query['page']:0;
  $bookAjax = isset($query['book'])?$query['book']:"";
  $topicAjax = isset($query['topic'])?$query['topic']:"";

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


  echo $pageAjax;

  $sermonSeriesFiltered = $sermonSeriesFiltered->offset(5 * $pageAjax)->limit(5);
  if($sermonSeriesFiltered): 
    foreach($sermonSeriesFiltered as $s): ?>
      <div class="sermon-list-block fade-in-instant">
        <div class="sermon-synopsis-wrapper page-width">
        <h1><?php echo $s->title() ?></h1>
        <?php if($s->books() <> "" or $s->topic() <> ""): ?>
          <span id="data-categories" class="page-width">
            <?php if($s->books()): ?>
              Book: 
              <?php 
                $bookArray = explode(",",$s->books());
                foreach($bookArray as $b):
              ?>
                <div class="filtered-by"><?php echo ucwords($b) ?></div> 
              <?php endforeach ?>
            <?php endif ?>
            <?php if($s->topic()): ?>
              Topic: 
              <?php
                $topicArray = explode(",",$s->topic());
                foreach($topicArray as $t):
              ?>
              <div class="filtered-by"><?php echo ucwords($t) ?></div>
              <? endforeach ?>
            <?php endif ?>
          </span>
        <?php endif ?>
          <?php echo kirbytext($s->synopsis()) ?>
          <div class="sermon-expand-button"></div>
        </div>
        <?php if($s->children()->visible()): ?>
        <ul class="sermon-series-list page-width" data-shown="hidden">
          <?php foreach($s->children()->visible()->filterBy('tags', strtolower(param('tag')), ',') as $sermon): ?>
            <li>
              <h4><?php echo $sermon->date('M d, Y') ?></h4>
              <h3><?php echo $sermon->title() ?></h3>
              
              <?php if($sermon->hasSounds()): ?>
              <audio controls="controls">
                <source src="<?php echo $sermon->sounds()->first()->url() ?>" type="audio/mp3" />
                Your browser does not support the audio element
              </audio>
              <?php endif ?>

              <?php if($sermon->youtube()): ?>
                <span class="view-video-link" alt="//www.youtube.com/embed/<?php echo $sermon->youtube() ?>">View Video</span>
              <?php endif ?>
            </li>
          <?php endforeach ?>
        </ul>
        <?php endif ?>
      </div>
    <?php endforeach ?>
  <?php else: ?>
<?php endif; ?>