<section class="page-width">
  <h1>Other ways to get involved</h1>
  <?php foreach($pages->find('community')->children()->visible() as $subpage): ?>
    <?php if($subpage->title() != $page->title()):?>
    <div class="three-block-layout" style="text-align:center;margin-bottom:0px">
      <h1 class="alt" style="text-align:center;"><?php echo $subpage->title() ?></h1>
      <a href="<?php echo $subpage->url() ?>"><img src="<?php echo $subpage->images()->find('icon.png')->url() ?>" class="community-icon" style="margin-bottom:0px"></a>
    </div>
    <? endif ?>
  <?php endforeach ?>

  </div>
</section>
