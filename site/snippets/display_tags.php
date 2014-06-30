<?php if($s->books() <> "" or $s->topic() <> ""): ?>
  <span id="data-categories" class="page-width">
    <?php if($s->books()): ?>
      Book: 
      <?php 
        $bookArray = explode(",",$s->books());
        foreach($bookArray as $b):
      ?>
        <a href="<?php echo "/sermons/book:" . $b ?>"><div class="tags book"><?php echo ucwords($b) ?></div></a> 
      <?php endforeach ?>
    <?php endif ?>
    <?php if($s->topic()): ?>
      Topic: 
      <?php
        $topicArray = explode(",",$s->topic());
        foreach($topicArray as $t):
      ?>
        <a href="<?php echo "/sermons/topic:" . $t ?>"><div class="tags topic"><?php echo ucwords($t) ?></div></a>
      <? endforeach ?>
    <?php endif ?>
  </span>
<?php endif ?>