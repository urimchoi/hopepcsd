<section id="connect-content" class="light">
  <div class="page-width">
    <h1>In-Reach</h1>
    <?php echo kirbytext($page->inreach()) ?>

    <table class="table">
      <colgroup />
      <colgroup span="2" title="title" />
      <thead>
        <tr>
          <th scope="col" class="icon-users">Ministry</th>
          <th scope="col" class="icon-mail">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($page->children()->visible() as $item): ?>
        <?php if($item->type() == 'inreach'): ?>
        <tr>
          <td><?php echo $item->title() ?></td>
          <td><?php echo kirbytext('(email:'.$item->contact().')') ?></td>
        </tr>
        <?php endif ?>
        <?php endforeach ?>
      </tbody>
    </table>

    <h1>Out-Reach</h1>
    <?php echo kirbytext($page->outreach()) ?>

    <table class="table">
      <colgroup />
      <colgroup span="2" title="title" />
      <thead>
        <tr>
          <th scope="col" class="icon-users">Ministry</th>
          <th scope="col" class="icon-mail">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($page->children()->visible() as $item): ?>
        <?php if($item->type() == 'outreach'): ?>
        <tr>
          <td><?php echo $item->title() ?></td>
          <td><?php echo kirbytext('(email:'.$item->contact().')') ?></td>
        </tr>
        <?php endif ?>
        <?php endforeach ?>
      </tbody>
    </table>

    <h1>Up-Reach</h1>
    <?php echo kirbytext($page->upreach()) ?>

    <table class="table">
      <colgroup />
      <colgroup span="2" title="title" />
      <thead>
        <tr>
          <th scope="col" class="icon-users">Ministry</th>
          <th scope="col" class="icon-mail">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($page->children()->visible() as $item): ?>
        <?php if($item->type() == 'upreach'): ?>
        <tr>
          <td><?php echo $item->title() ?></td>
          <td><?php echo kirbytext('(email:'.$item->contact().')') ?></td>
        </tr>
        <?php endif ?>
        <?php endforeach ?>
      </tbody>
    </table>

    <h1>Education</h1>
    <?php echo kirbytext($page->education()) ?>

    <table class="table">
      <colgroup />
      <colgroup span="2" title="title" />
      <thead>
        <tr>
          <th scope="col" class="icon-users">Ministry</th>
          <th scope="col" class="icon-mail">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($page->children()->visible() as $item): ?>
        <?php if($item->type() == 'education'): ?>
        <tr>
          <td><?php echo $item->title() ?></td>
          <td><?php echo kirbytext('(email:'.$item->contact().')') ?></td>
        </tr>
        <?php endif ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</section>

<section class="page-width">
  <h1>Missions</h1>
  <p>We seek to share the good news of Jesus Christ with those in San Diego and beyond. Every summer we send a team on a short term mission trip to various places around the world. We also go across the border to Mexico to help teach English, build homes, and serve the community.</p>
  <p>We are currently supporting missionaries in Australia, Mexico, Middle East, Japan, and Europe (Persian Mission)</p>
</section>

<section class="light">
  <div class="page-width">
    <h1>Mercy Ministry</h1>
    <p>Once a month our mercy team volunteers at Ronald McDonald House to encourage families who are going through difficult times.</p>
    <p>We also serve the homeless by handing out care packages throughout the year!</p>
  </div>
</section>