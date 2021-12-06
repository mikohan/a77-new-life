import { shoppingCart } from './shoppingCart';
(function () {
	var myCart = shoppingCart.listCart();

	if (myCart.length === 0) {
		$('#cart-id').html(`<h2 style="margin: 0 auto !important;">Корзина Пуста!</h2>`);
	}
})(jQuery);
