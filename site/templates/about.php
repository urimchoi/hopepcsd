<?php snippet('header') ?>

<main id="content" class="fade-in-fast">
	<section id="doctrine" class="page-width">
		<h1>Our Doctrine</h1>
		<blockquote>Our church is committed to the beliefs of the Westminster Confession of Faith and all the doctrinal statements of Reformed Theology. The church is defined by its outlook on Scripture, and it is our conviction that the Word of God is <strong>infallible</strong> and <strong>inerrant</strong>; God's authoritative word to His people.</blockquote>
	</section>

	<section id="we-believe" class="page-width">
		<h1>We believe</h1>
		<ul>
			<li class="we-believe-block three-block-layout">
				<span class="alt">The Bible is the written word of God,</span>
				<p>inspired by the Holy Spirit and without error in the original manuscripts. The Bible is the revelation of God’s truth and is infallible and authoritative in all matters of faith and practice.</p>
			</li>
			<li class="we-believe-block three-block-layout">
				<span class="alt">The Holy Trinity.</span>
				<p>There is one God, who exists eternally in three persons: the Father, the Son, and the Holy Spirit.</p>
			</li>
			<li class="we-believe-block three-block-layout">
				<span class="alt">All are sinners</span>
				<p>and totally unable to save themselves from God’s displeasure, except by His mercy.</p>
			</li>
			<li class="we-believe-block three-block-layout">
				<span class="alt">Salvation is by God alone</span>
				<p>as He sovereignly chooses those He will save. We believe His choice is based on His grace, not on any human inliidual merit, or foreseen faith.</p>
			</li>
			<li class="we-believe-block three-block-layout">
				<span class="alt">Jesus Christ is the eternal Son of God,</span>
				<p>who through His perfect life and sacrificial death atoned for the sins of all who will trust in Him, alone, for salvation.</p>
			</li>
			<li class="we-believe-block three-block-layout">
				<span class="alt">God is gracious and faithful to His people</span>
				<p>not simply as inliiduals but as families in successive generations according to His Covenant promises.</p>
			</li>
			<li class="we-believe-block three-block-layout">
				<span class="alt">The Holy Spirit indwells God’s people</span>
				<p>and gives them the strength and wisdom to trust Christ and follow Him.</p>
			</li>
			<li class="we-believe-block three-block-layout">
				<span class="alt">Jesus will return,</span>
				<p>bodily and visibly, to judge all mankind and to receive His people to Himself.</p>
			</li>
			<li class="we-believe-block three-block-layout">
				<span class="alt">All aspects of our lives are to be lived to the glory of God</span>
				<p>under the Lordship of Jesus Christ</p>
			</li>
		</ul>
	</section>

	<section id="leaders">
		<div id="leaders-wrapper" class="page-width">
			<h1 class="inverse">Our Staff</h1>
			<ul>
			<?php if($page->children()): ?>
				<?php foreach($page->children() as $bio): ?>
					<?php if($bio->role() == "leader"): ?>
						<li class="leaders-block" style="clear:both">
							<img src="<?php echo $bio->images()->first()->url() ?>"></img>
							<h1 class="alt"><?php echo $bio->name() ?></h1>
							<h3 class="inverse"><?php echo $bio->title() ?></h3>
							<?php echo kirbytext($bio->bio()) ?>
						</li>
					<?php endif ?>
				<?php endforeach ?>
			<?php else: ?>
				No information found
			<?php endif ?>
			</ul>
		</div>

		<div class="spacer"></div>

		<div id="staff-wrapper" class="page-width" style="clear:both">
			<h1 class="inverse">Deacons</h1>
			<ul>
			<?php if($page->children()): ?>
				<?php foreach($page->children() as $bio): ?>
					<?php if($bio->role() == "staff"): ?>
						<li class="staff-block">
							<img src="<?php if($bio->hasImages()): ?><?php echo $bio->images()->first()->url() ?><?php else: ?><?php echo url('/assets/images/default_profile.png') ?><?php endif ?>"></img>
							<h1 class="alt"><?php echo $bio->name() ?></h1>
							<h3 class="inverse"><?php echo $bio->title() ?></h3>
						</li>
					<?php endif ?>
				<?php endforeach ?>
			<?php else: ?>
				No information found
			<?php endif ?>
			</ul>
		</div>
	</section>

	<?php snippet('get_location') ?>
			
</main>

<?php snippet('footer') ?>