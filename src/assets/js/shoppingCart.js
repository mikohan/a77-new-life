// (function ($) {
// Shoping cart functions
//**************************************************************
var shoppingCart = {};
shoppingCart.cart = [];
shoppingCart.Item = function(name, price, count, image, sku) {
  this.name = name;
  this.price = price;
  this.count = count;
  this.image = image;
  this.sku = sku;
};
shoppingCart.addItemCart = function(name, price, count, image, sku) {
  for (var i in this.cart) {
    if (this.cart[i].sku == sku) {
      this.cart[i].count += count;
      this.saveCart();
      //alert("Товар добавлен в корзину");
      return;
    }
  }
  var item = new this.Item(name, price, count, image, sku);
  if (this.cart == null) {
    this.cart = new Array();
  }
  this.cart.push(item);
  this.saveCart();
  //alert('Товар добавлен в корзину');
};
shoppingCart.removeItemFromCart = function(sku) {
  for (var i in this.cart) {
    if (this.cart[i].sku == sku) {
      this.cart[i].count--;
      if (this.cart[i].count === 0) {
        this.cart.splice(i, 1);
      }
      break;
    }
  }
  this.saveCart();
};
shoppingCart.removeItemFromCartAll = function(sku) {
  for (var i in this.cart) {
    if (this.cart[i].sku == sku) {
      this.cart.splice(i, 1);
      break;
    }
  }
  this.saveCart();
};
shoppingCart.clearCart = function() {
  if (confirm("Удалить все товары из корзины?")) {
    this.cart = [];
    this.saveCart();
  }
};
shoppingCart.clearCartSuccess = function() {
  this.cart = [];
  this.saveCart();
};
shoppingCart.countCart = function() {
  var totalCount = 0;
  for (var i in this.cart) {
    totalCount += this.cart[i].count;
  }
  return totalCount;
};
shoppingCart.totalCart = function() {
  var totalCost = 0;
  for (var i in this.cart) {
    totalCost += this.cart[i].price * this.cart[i].count;
  }
  return totalCost.toFixed(0);
};
shoppingCart.listCart = function() {
  var cartCopy = [];
  for (var i in this.cart) {
    var item = this.cart[i];
    var itemCopy = {};
    for (var p in item) {
      itemCopy[p] = item[p];
    }
    itemCopy.total = (item.price * item.count).toFixed(2);
    cartCopy.push(itemCopy);
  }
  return cartCopy;
};
shoppingCart.saveCart = function() {
  localStorage.setItem("shoppingCart", JSON.stringify(this.cart));
};
shoppingCart.loadCart = function() {
  this.cart = JSON.parse(localStorage.getItem("shoppingCart"));
  //return this.cart;
};
$(".add-to-cart").on("click", function(event) {
  // event.preventDefault();
  var name = $(this).attr("data-name");
  var price = Number($(this).attr("data-price"));
  var image = $(this).attr("data-image");
  var sku = $(this).attr("data-sku");
  shoppingCart.addItemCart(name, price, 1, image, sku);
  ym(20154349, "reachGoal", "add_to_cart_GA");
  console.log("Added to cart");
  displayCart();
});
$(".clear-cart").on("click", function(event) {
  shoppingCart.clearCart();
  displayCart();
});
function displayCart() {
  var cartArray = shoppingCart.listCart();
  var output = "";
  for (var i in cartArray) {
    output += `
                  <tr class="cart-table__row">
                    <td class="cart-table__column cart-table__column--image">
                      <div class="image image--type--product d-none d-md-block">
                        <a href="" class="image__body">
                          <img class="image__tag" src="${cartArray[i].image
        ? cartArray[i].image
        : "/assets/images/products/product-default-150.webp"

      }" alt="${cartArray[i].name}" title="${cartArray[i].name
      }">
                        </a>
                      </div>
                    </td>
                    <td class="cart-table__column cart-table__column--product">
                      <a href="" class="cart-table__product-name">${cartArray[i].name
      }</a>
                      <ul class="cart-table__options">
                      </ul>
                    </td>
                    <td class="cart-table__column cart-table__column--price d-none d-md-block" data-title="Цена">${cartArray[i].price
      }</td>
                    <td class="cart-table__column cart-table__column--quantity" data-title="Количество">
                      <div class="cart-table__quantity input-number">
                        <input class="form-control input-number__input" type="number" min="1" value="${cartArray[i].count
      }">
                        <div class="input-number__add plus-item" data-name="${cartArray[i].name
      }" data-sku="${cartArray[i].sku}"></div>
                        <div class="input-number__sub substract-item" data-name="${cartArray[i].name
      }" data-sku="${cartArray[i].sku}"></div>
                      </div>
                    </td>
                    <td class="cart-table__column cart-table__column--total" data-title="Всего">${cartArray[i].total
      }</td>
                    <td class="cart-table__column cart-table__column--remove">
                      <button type="button" class="cart-table__remove btn btn-sm btn-icon btn-muted delete-item" data-sku="${cartArray[i].sku
      }">
                        <svg width="12" height="12">
                          <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
                        </svg>
                      </button>
                    </td>
                  </tr>
`;
  }

  let mini_out = "";
  for (var i in cartArray) {
    mini_out += `
							<li class="dropcart__item">
                <div class="dropcart__item-image">
                  <a href="/cart/">
                    <img style="width: 70px;" src="${cartArray[i].image
        ? cartArray[i].image
        : "/assets/images/products/product-default-70.webp"
      }" alt="${cartArray[i].name}" title="${cartArray[i].name}">
                  </a>
                </div>
                <div class="dropcart__item-info">
                  <div class="dropcart__item-name">
                    <a href="/cart/">${cartArray[i].name}</a>
                  </div>
                  <div class="dropcart__item-meta">
                    <div class="dropcart__item-quantity">${cartArray[i].count
      }</div>
                    <div class="dropcart__item-price">&#8381; ${cartArray[i].price
      }</div>
                  </div>
                </div>
                <button type="button" class="dropcart__item-remove delete-item" data-name="${cartArray[i].name
      }"><svg width="10" height="10"  >
                    <path d="M8.8,8.8L8.8,8.8c-0.4,0.4-1,0.4-1.4,0L5,6.4L2.6,8.8c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L3.6,5L1.2,2.6
  c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L5,3.6l2.4-2.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L6.4,5l2.4,2.4
  C9.2,7.8,9.2,8.4,8.8,8.8z" />
                  </svg>
                </button>
              </li>
							`;
  }
  let order_items = "";
  for (var i in cartArray) {
    order_items += `
		<tr>
		  <td class="td-sku" data-sku="${cartArray[i].sku}">${cartArray[i].sku}</td>
			<td>${cartArray[i].name}</td>
			<td>&#8381; ${cartArray[i].price}</td>
		</tr>
		
		`;
  }
  $(".order-items").html(order_items);
  $("#show-mini-cart").html(mini_out);
  $("#mini-count").html(shoppingCart.countCart());
  $("#mini-total").html(shoppingCart.totalCart());
  $(".show-cart").html(output);
  $(".count-cart").html(shoppingCart.countCart());
  $(".total-cart").html(shoppingCart.totalCart());
  $(".total-cart-input").val(shoppingCart.totalCart());
}

$(".header").on("click", ".delete-item", function(event) {
  var sku = $(this).attr("data-sku");
  shoppingCart.removeItemFromCartAll(sku);
  displayCart();
});
$(".show-cart").on("click", ".delete-item", function(event) {
  var sku = $(this).attr("data-sku");
  shoppingCart.removeItemFromCartAll(sku);
  displayCart();
});
$(".show-cart-menu").on("click", ".delete-item", function(event) {
  var sku = $(this).attr("data-sku");
  shoppingCart.removeItemFromCartAll(sku);
  displayCart();
});
$(".show-cart").on("click", ".substract-item", function(event) {
  var sku = $(this).attr("data-sku");
  shoppingCart.removeItemFromCart(sku);
  displayCart();
});
$(".show-cart").on("click", ".plus-item", function(event) {
  var name = $(this).attr("data-name");
  var sku = $(this).attr("data-sku");
  var image = $(this).attr("data-image");
  shoppingCart.addItemCart(name, 0, 1, image, sku);
  displayCart();
});
//var load = [];
shoppingCart.loadCart();
displayCart();
const load = shoppingCart.listCart();
// })(jQuery);
// console.log(shoppingCart);
export { shoppingCart, displayCart };
