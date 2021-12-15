const browserUrl = new URL(window.location.href);
// On checkbox change
(function ($) {
	$('.my-filter').on('change', function (e) {
		e.preventDefault();
		//	$('#filters-form').trigger('submit');
		if (browserUrl.searchParams.has(e.target.name)) {
			browserUrl.searchParams.delete(e.target.name);
		} else {
			browserUrl.searchParams.set(e.target.name, e.target.value);
		}
		window.location.href = browserUrl.toString();
	});

	$('.applied-filters__button--filter').on('click', function (e) {
		if (browserUrl.searchParams.has(e.target.id)) {
			browserUrl.searchParams.delete(e.target.id);
		}
		window.location.href = browserUrl.toString();
	});
	$('.applied-filters__button--clear').on('click', function (e) {
		window.location.href = browserUrl.pathname;
	});
	// Next page clicked pagination
	$('#pagination-next').on('click', function () {
		console.log('Nex pagination clicked');
	});
})(jQuery);
