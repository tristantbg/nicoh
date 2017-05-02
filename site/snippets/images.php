<section id="<?= tagslug($data->uid()) ?>" class="image-section fp-auto-height">

	<div class="section-marquee diff"></div>

	<div class="slider" data-random="<?php e($data->random()->bool(), 'true', 'false') ?>">
	<?php foreach ($data->gallery()->toStructure() as $item): ?>
		<?php $item = $item->toFile();
			  $title = $data->title()->html();
			  if ($item->itemcaption()->isNotEmpty()) {
		      $title .= ' — '.$item->itemcaption()->html();
		  	  }
		      if ($item->itemdate() != '') {
		      	$title .= ', '.$item->date('Y', 'itemdate');
		      }
		      if ($item->itemlink()->isNotEmpty()) {
		      	$title .= '<span class="link">'.'Voir '.'<a href="'.$item->itemlink()->html().'" target="_blank" rel="noopener">'.'ici'.'</a></span>';
		      }
		?>
		<div class="cell" data-title="<?= escape::html($title) ?>" data-flickity-bg-lazyload="<?= resizeOnDemand($item, 2000) ?>">
			<noscript><img src="<?= resizeOnDemand($item, 2000) ?>" alt="<?= $item->itemcaption()->html() ?>" /></noscript>
		</div>
	<?php endforeach ?>

	<div class="section-nav diff" data-target="nav-next">
		<svg id="images-svg" class="drawsvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 594" preserveAspectRatio="none"><path class="st0" d="M251.1 590.4c-44.8 0-115.3-21.3-115.3-68.6 0-41.4 52.5-73.9 107.4-73.9 108.8 0 108.8 83.8-5.5 83.8-261.4 0-261.4-319.4-7.6-319.4 199 0 206.3 161.7 7.9 161.7-311.6.1-313.1-370.4-10.9-370.4 90.5 0 145.1 26.9 171.3 49.5"/></svg>
  	</div>

	</div>

</section>