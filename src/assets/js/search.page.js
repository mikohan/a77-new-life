(function ($) {
	console.log('Clicked');
	$('.reset-button').on('click', function (e) {
		e.preventDefault();
		$('#id-filter-form')[0].reset();
		$('#id-filter-form').trigger('submit');
	});
	$('#apply-button').on('click', function (e) {
		e.preventDefault();
		$('#id-filter-form').trigger('submit');
	});
	$('.input-check__input').on('click', function (e) {
		console.log('Clicked', this);
		// e.preventDefault();
		$('#id-filter-form').trigger('submit');
	});
	$('.applied-filters__item').on('click', function (e) {
		// e.preventDefault();
		console.log($('#id-filter-form'));

		$('#id-filter-form')[0].reset();
		$('#id-filter-form').trigger('submit');
	});
})(jQuery);
