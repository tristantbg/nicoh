<?php

snippet('header');

?>
<section class="fp-auto-height">
    <div class="section-marquee">
    </div>
    <div class="slider" id="main-slider" data-random="true">
        <?php foreach ($page->
        mainslider()->toStructure() as $item): ?>
        <?php $item = $item->
        toFile();
			  $title = '';
			  if ($item->itemcaption()->isNotEmpty()) {
		      $title .= $item->itemcaption()->html();
		  	  }
		      // if ($item->itemdate() != '') {
		      // 	$title .= ', '.$item->date('Y', 'itemdate');
		      // }
		?>
        <div class="cell" data-title="<?= escape::html($title) ?>">
            <div class="inner-content">
                <img alt="<?= $item->itemcaption()->html() ?>" data-flickity-lazyload="<?= resizeOnDemand($item, 1200, true) ?>" src="<?= resizeOnDemand($item, 200) ?>" height="100%" width="auto"/>
                <noscript>
                    <img alt="<?= $item->itemcaption()->html() ?>" src="<?= resizeOnDemand($item, 1500) ?>" height="100%" width="auto"/>
                </noscript>
            </div>
        </div>
        <?php endforeach ?>
        <div class="section-nav">
            <svg viewbox="0 0 402.4 607.3" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <g id="next" data-target="nav-next">
                    <path class="clicktarget" d="M3.5 271.9h397.9v332.6H3.5z">
                    </path>
                    <path class="st1" d="M1.5 439h399.3M273.5 606.1L400.8 439 273.5 271.9">
                    </path>
                </g>
                <g id="prev" data-target="nav-prev">
                    <path class="clicktarget" d="M253.4 0h147.4v122.6H253.4z">
                    </path>
                    <path class="st1" d="M401.5 61.9H255.6m46.1-60.7l-45.4 60.7 45.4 60.7">
                    </path>
                </g>
                <g id="start" data-target="nav-first">
                    <path class="clicktarget" d="M2.4 235.3h294v-75.4L126.6 45.5H2.4z">
                    </path>
                    <path class="st1" d="M3.5 235.3c0-252.1 164.1-248 164.1 0 0-148.8 68.5-135.8 68.5 0 0-106.3 59-106.3 59-7.1">
                    </path>
                </g>
            </svg>
        </div>
    </div>
</section>
<?php

foreach($pages->
visible() as $section) {
  snippet($section->content()->name(), array('data' => $section));
}

snippet('footer');

?>
