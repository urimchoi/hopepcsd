<?php if($page->children()->visible()): ?>
  <?php foreach($page->children()->visible() as $sermonseries): ?>
    <div class="sermon-list-block">
      <div class="sermon-synopsis-wrapper">
      <h2><?php echo $sermonseries->title() ?></h2>
        <?php echo kirbytext($sermonseries->synopsis()) ?>
        <div class="sermon-expand-button"></div>
      </div>
      <?php if($sermonseries->children()->visible()): ?>
      <ul class="sermon-series-list">
        <?php foreach($sermonseries->children()->visible() as $sermon): ?>
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
      <?php else: ?>
      <?php endif ?>
    </div>
  <?php endforeach ?>
<?php else: ?>
<?php endif ?>