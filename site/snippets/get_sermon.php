<?php 

  # set scope to sermon subpages
  $sermonSeries = $pages->find('sermons')->children()->visible(); 

  # set how many items to show per page
  $pageCount = (string)$pages->find('sermons')->showcount();
  $pageCount = intval($pageCount);


  # check if ajax queries are found. If not, set to false
  $bookFilter = strtolower(param('book')) ?: false;
  $topicFilter = strtolower(param('topic')) ?: false;

  # modify scope depending on ajax queries
  $sermonSeriesFiltered = $sermonSeries;
  if ($bookFilter):
    $sermonSeriesFiltered = $sermonSeriesFiltered->filterBy('books', '*=', $bookFilter);
    if ($topicFilter):
      $sermonSeriesFiltered = $sermonSeriesFiltered->filterBy('topic', '*=', $topicFilter);
    endif;
  else:
    if ($topicFilter):
      $sermonSeriesFiltered = $sermonSeriesFiltered->filterBy('topic', '*=', $topicFilter);
    endif;
  endif; 

  # limit pageviews to 5 items
  $sermonFiltered = $sermonSeriesFiltered->limit($pageCount);

  # If there are any posts, run
  if($sermonFiltered <> ''): 

    # if filters are present, show them here
    if(param('book') or param('topic')): ?>
      <span id="data-filter" data-book="<?php echo param('book') ?>" data-topic="<?php echo param('topic') ?>" class="page-width">
        Currently filtered by:
        <?php if(param('book')): ?>
          <a href="<?php echo $pages->find('sermons')->url() ?>"><div class="tags book"><?php echo ucwords(param('book')) ?></div></a>
        <?php endif ?>
        <?php if(param('topic')): ?>
          <a href="<?php echo $pages->find('sermons')->url() ?>"><div class="tags topic"><?php echo ucwords(param('topic')) ?></div></a>
        <?php endif ?>
        <a href="<?php echo $pages->find('sermons')->url() ?>">clear</a>
      </span>
    <?php endif ?>

    <span id="pageCount" data-totalcount="<?php echo $sermonSeriesFiltered->count() ?>" data-pagecount="<?php echo $pageCount ?>"></span>
      <?php 
      # for each page found do as such
      foreach($sermonFiltered as $s): ?>
        <div class="sermon-list-block">
          <div class="sermon-synopsis-wrapper page-width">
          <h1><?php echo $s->title() ?></h1>
          <?php if($s->books() <> "" or $s->topic() <> ""): ?>
            <span id="data-categories">
              <?php if($s->books()): ?>
                <div class="tags-wrapper">
                  Book: 
                <?php 
                  $bookArray = explode(",",$s->books());
                  foreach($bookArray as $b):
                ?>
                  <a href="<?php echo $site->url() . "/sermons/book:" . $b ?>"><div class="tags book"><?php echo ucwords($b) ?></div></a> 
                <?php endforeach ?>
                </div>
              <?php endif ?>
              <?php if($s->topic()): ?>
                <div class="tags-wrapper">
                  Topic: 
                <?php
                  $topicArray = explode(",",$s->topic());
                  foreach($topicArray as $t):
                ?>
                  <a href="<?php echo $site->url() . "/sermons/topic:" . $t ?>"><div class="tags topic"><?php echo ucwords($t) ?></div></a>
                <? endforeach ?>
                </div>
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
      <?php 
      # if the query returns more than $pageCount pages, display the load more button
      if($sermonSeriesFiltered->count() > $pageCount): ?>
        <div id="load-more-button"></div>
      <?php endif ?>
  <?php else: ?>
    <div class="page-width">There are no pages to view</div>
  <?php endif; ?>