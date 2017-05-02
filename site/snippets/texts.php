<section id="<?= tagslug($data->uid()) ?>" class="text-section fp-auto-height">

	<div class="section-marquee"></div>

	<div class="slider" data-random="<?php e($data->random()->bool(), 'true', 'false') ?>">
	<?php foreach ($data->children()->visible() as $item): ?>
		<?php $title = $data->title()->html();
		      $title .= ' — '.$item->title()->html();
		      if ($item->author()->isNotEmpty()) {
		      	$title .= ', '.$item->author()->html();
		      }
		      if ($item->date()) {
		      	$title .= ', '.$item->date('Y');
		      }
		?>
		<div class="cell" data-title="<?= escape::html($title) ?>">
			<div class="scroller">
				<div class="inner-content size-sync"><?= $item->text()->kt() ?></div>
			</div>
		</div>
	<?php endforeach ?>

	<div class="section-nav" data-target="nav-next">
		<svg id="texts-svg" class="drawsvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 594" preserveAspectRatio="none"><path class="st0" d="M32 274.5c-68.8-68.7 149.6-150.9 149.9-238C182-11.5 156-7.6 156 39v353.3c0 33.1-25.8 40.5-25.8 4.9 0-54.6 157.2-182.8 157.2-258.8 0-35.8-23.3-36.8-23.3 4.9V560c0 41.7-28.3 42.1-28.3 2.9"/><path class="st1" d="M0 340.1h400"/></svg>
  	</div>
  	
	</div>

</section>