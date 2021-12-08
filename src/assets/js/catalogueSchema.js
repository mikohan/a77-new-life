import '../vendor/imagemapster/jquery.imagemapster.min';

(function () {
	var image = $('img[usemap]');
	var areas = $.map($('area[data-key]'), function (el) {
		return {
			key: $(el).attr('data-key'),
			toolTip: $(el).attr('data-full'),
		};
	});
	console.log(areas);
	image
		.mapster({
			fillColor: 'ff0000',
			showToolTip: true,
			toolTipContainer:
				'<div style="max-width: 400px; border: 1px solid #f5f5f5; background-color: #f9f9f9; min-height: 200px; font-size: 90%; padding: 2rem;"></div>',
			fillOpacity: 0.3,
			stroke: true,
			singleSelect: true,
			mapKey: 'data-key',
			onMouseover: function (e) {
				var item = $('.side-' + e.key);
				item.css('background-color', 'red');
			},
			onMouseout: function (e) {
				var item = $('.side-' + e.key);
				item.css('background-color', '');
			},
			areas: areas,
		})
		.mapster('set', true, '551004B700');
})(jQuery);
