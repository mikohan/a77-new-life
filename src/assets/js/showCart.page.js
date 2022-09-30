import { shoppingCart } from './shoppingCart';
(function() {
  var myCart = shoppingCart.listCart();

  if (myCart.length === 0) {
    $('#cart-id').html(`<h2 style="margin: 0 auto !important;">Корзина Пуста!</h2>`);
  }


  // Here is the code which is getting cart and user name and phone and send it to as one click order
  $("#send-order-one-click").on('submit', function(event) {
    event.preventDefault();
    // console.log($(this).serializeArray());

    var myCart = shoppingCart.listCart();
    // console.log(myCart);



    var name = $(this).serializeArray()[0].value;
    var phone = $(this).serializeArray()[1].value;


    var toThank = {
      name,
      phone,
    };
    var customer = {
      name,
      phone,
    };

    var total_sum = shoppingCart.totalCart();
    var form = {
      customer,
      total_sum,
      cart: myCart,
    };
    if (!name || name == '') {
      alert('Введите имя ' + name);
      return;
    }
    if (!phone || phone == '') {
      alert('Введите телефон  ' + phone);
      return;
    }

    var params = '/backend/pages/order/thank.php?';
    $.each(toThank, (key, value) => {
      if (value) {
        params += `${key}=${value}&`;
      }
    });
    const url = params.replace(/&+$/, '');

    $.post(
      '/backend/pages/order/manage_order.php',
      {
        data: form,
      },
      function(data) {
        if (data) {
          // Redirect to thank page
          window.location = url;
        } else {
          alert('Корзина напрочь пуста. Нечего отправлять  ☠ ');
          return;
        }
      }
    );

  });
})(jQuery);
