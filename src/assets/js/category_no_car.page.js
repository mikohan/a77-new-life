import '../vendor/bootstrap/css/bootstrap.css';
import '../vendor/select2/css/select2.min.css';
import '../css/style.css';
import '../css/style.header-classic-variant-two.css'; //media="(min-width: 1200px)">
import '../css/style.mobile-header-variant-two.css'; //media="(max-width: 1199px)">

// import '@fortawesome/fontawesome-free/js/fontawesome';
// import '@fortawesome/fontawesome-free/js/solid';
// import '@fortawesome/fontawesome-free/js/regular';
// import '@fortawesome/fontawesome-free/js/brands';
// import './vendor/fontawesome/css/all.min.css';

// import './vendor/jquery/jquery.min.js';
import '../vendor/bootstrap/js/bootstrap.bundle.min.js';
import '../vendor/select2/js/select2.min.js';
window.noUiSlider = require('../vendor/nouislider/nouislider.min');
import './number';
import './main';

import './shoppingCart';
//import './category_no_car.vue';

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
