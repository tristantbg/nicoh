<?php 
$colors = ''; 
foreach($data->palette()->toStructure() as $color){ 
	$colors .= $color->color().",";
}; 
$colors = substr($colors, 0, -1);
?>
<section id="<?= tagslug($data->uid()) ?>" class="blog-section fp-auto-height">

	<div class="section-marquee"></div>

	<div class="slider" 
	data-random="<?php e($data->random()->bool(), 'true', 'false') ?>" 
	data-colors="<?= $colors ?>">
	<?php foreach ($data->children()->visible() as $item): ?>
		<?php $title = '<em>'.$item->title()->html().'</em>';
		      if ($item->subtitle()->isNotEmpty()) {
		      	$title .= ', '.$item->subtitle()->html();
		      }
		      if ($item->startdate()) {
		      	$title .= ', '.$item->date('d.m.Y', 'startdate');
		      }
		      if ($item->enddate()) {
		      	$title .= '—'.$item->date('d.m.Y', 'enddate');
		      }
		?>
		<div class="cell" data-title="<?= escape::html($title) ?>">
			<div class="scroller">
				<div class="inner-content size-sync"><?= $item->text()->kt() ?></div>
			</div>
		</div>
	<?php endforeach ?>

	<div class="section-nav" data-target="nav-next">
		<svg id="blog-svg" class="drawsvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 594" preserveAspectRatio="none">
		<path class="st0" d="M.7 2.7h399.1L.7 146.3l386.4 78.2L.7 362.1l386.4 81.3L.7 591.1h380"/></svg>
  	</div>
  	
	</div>

</section>