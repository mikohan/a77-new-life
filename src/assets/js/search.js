jQuery(function () {
	$('.reset-button').on('click', function (e) {
		e.preventDefault();
		$('#id-filter-form')[0].reset();
		$('#id-filter-form').submit();
	});
	$('#apply-button').on('click', function (e) {
		e.preventDefault();
		$('#id-filter-form').submit();
	});
	$('.input-check__input').on('click', function (e) {
		e.preventDefault();
		$('#id-filter-form').submit();
	});
	$('.applied-filters__item').on('click', function (e) {
		e.preventDefault();
		$('#id-filter-form')[0].reset();
		$('#id-filter-form').submit();
	});
});
