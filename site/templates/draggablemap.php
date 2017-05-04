<?php snippet('header'); ?>


<div id="draggablemap">
	<img src="<?= $page->map()->toFile()->url() ?>" width='auto' height='auto'>
</div>

<?= js('assets/js/vendor/drag.js') ?>

<script>
	var map = $('#draggablemap img');
	Draggable.create(map, {
        type: 'xy',
        bounds: '#draggablemap',
        zIndexBoost: false,
        edgeResistance: 1,
        throwProps: true
    });
    TweenLite.to(map,0,{
    	x: -map.width()/2,
    	y: -map.height()/2
    });
</script>

<?php snippet('footer'); ?>
