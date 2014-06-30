<?php snippet('header') ?>

<main id="content" class="fade-in-fast">
	<section id="intro-contact" class="page-width">
		<h1>Contact Us</h1>
		<table class="table">
			<colgroup />
			<colgroup span="2" title="title" />
			<thead>
				<tr>
					<th data-name="title" class="icon-info-circled" scope="col"> Title</th>
					<th data-name="name" class="icon-user" scope="col"> Name</th>
					<th data-name="phone" class="icon-phone" scope="col"> Phone</th>
					<th data-name="email" class="icon-mail" scope="col"> Email</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($page->children()->visible() as $item): ?>
				<tr>
					<td><?php 
					if($item->title() != ""):
						echo $item->title();
					else:
						echo 'N/A';
					endif;
					?></td>

					<td><?php 
					if($item->name() != ""):
						echo $item->name();
					else:
						echo 'N/A';
					endif;
					?></td>

					<td>
					<?php if($item->phone() != ""): ?>
						<a href="tel:<?php echo $item->phone() ?>"><?php echo $item->phone() ?></a>
					<?php else: 
						echo 'N/A';
					endif; 
					?></td>

					<td>
					<?php if($item->email() != ""): ?>
						<a href="mailto:<?php echo $item->email() ?>"><?php echo $item->email() ?></a>
					<?php else:
						echo 'N/A';
					endif;
					?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</section>

	<?php snippet('get_location') ?>
			
	
</main>

<?php snippet('footer') ?>