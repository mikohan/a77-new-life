(function () {
	var total_sum = shoppingCart.totalCart();
	var myCart = shoppingCart.listCart();
	var prods = '';
	for (var i in myCart) {
		prods += `
                                        <tr>
                                            <td class="order-list__column-image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag" src="${myCart[i].image}" alt="${myCart[i].name}">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="order-list__column-product">
                                                <a href="product-full.html">${myCart[i].name}</a>
                                                <div class="order-list__options">
                                                </div>
                                            </td>
                                            <td class="order-list__column-quantity" data-title="Quantity:">
                                                ${myCart[i].count}
                                            </td>
                                            <td class="order-list__column-total">
                                            &#8381; ${myCart[i].price}
                                            </td>
                                        </tr>
                    `;
	}
	$('.order-list__products').html(prods);
	$('.total').html('&#8381; ' + total_sum);
	// Clear cart
	shoppingCart.clearCartSuccess();
	$('.count-cart').text(0);
})(jQuery);
