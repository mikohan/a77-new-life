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
			toolTipContainer: '<div class="catalogue__tooltip-container"></div>',
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
