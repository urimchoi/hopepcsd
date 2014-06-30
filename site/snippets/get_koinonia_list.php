<section id="connect-content" class="light">
  <table class="table page-width">
    <colgroup />
    <colgroup span="2" title="title" />
    <thead>
      <tr>
        <th data-name="description" class="icon-users" scope="col"> Group</th>
        <th data-name="time" class="icon-clock" scope="col"> Day/Time</th>
        <th data-name="email" class="icon-mail" scope="col"> Get in touch</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($page->children()->visible() as $item): ?>
      <tr>
        <td><?php echo $item->title() ?></td>
        <td><?php echo $item->time() ?></td>
        <td><?php echo kirbytext('(email:'.$item->contact().')') ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</section>