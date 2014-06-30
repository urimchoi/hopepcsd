<section id="connect-content" class="light">
  <table class="table page-width">
    <colgroup />
    <colgroup span="2" title="title" />
    <thead>
      <tr>
        <th data-name="description" class="icon-users" scope="col"> Group</th>
        <th data-name="location" class="icon-info-circled" scope="col"> Current Topic</th>
        <th data-name="time" class="icon-clock" scope="col"> Day/Time</th>
        <th data-name="email" scope="col"> Get in touch</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($page->children()->visible() as $item): ?>
      <tr>
        <td><?php echo $item->title() ?></td>
        <td><?php echo $item->topic() ?></td>
        <td><?php echo $item->time() ?></td>
        <td>
          <?php if($item->contact() != ""): ?>
            <a href="mailto:<?php echo $item->contact() ?>" class="icon-mail"></a>
          <?php endif ?>
          <?php if($item->phone() != ""): ?>  
            <a href="tel:<?php echo $item->phone() ?>" class="icon-phone"></a>
          <?php endif ?>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</section>