import { shoppingCart } from './shoppingCart';
(function($) {
  var myCart = shoppingCart.listCart();
  if (myCart.length === 0) {
    $('#checkout-id').html(`<h2 style="margin: 0 auto !important;">Корзина пуста!</h2>`);
  }

  $('#send-order').on('click', function(e) {
    sendOrder(e);
  });

  $('#pay-online').on('click', function(e) {
    var yandexPhone = $('#yandex-phone').val();
    if (!yandexPhone) {
      alert('Телефон обязателен!');
    }
    if (yandexPhone) {
      sendOrder(e);
    }
  });

  function sendOrder(event) {
    event.preventDefault();
    var form = [];
    var phone = $('#checkout-phone').val();
    var email = $('#checkout-email').val();
    var lastname = $('#checkout-lastname').val();
    var firstname = $('#checkout-firstname').val();
    var city = $('#checkout-city').val();
    var street = $('#checkout-street').val();
    var comment = $('#checkout-comment').val();
    var total_sum = shoppingCart.totalCart();
    var myCart = shoppingCart.listCart();
    var paymentMethod = 'offline';

    var customer = {
      email,
      phone,
      lastname,
      firstname,
      city,
      street,
      comment,
    };
    var toThank = {
      paymentMethod,
      firstname,
      city,
      street,
    };

    var form = {
      customer,
      total_sum,
      cart: myCart,
    };
    if (!phone || phone == '') {
      alert('Введите телефон ' + phone);
      return;
    }
    // if (!email || email == '') {
    // 	alert('Введите email ' + phone);
    // 	return;
    // }

    var params = '/backend/pages/order/thank.php?';
    $.each(toThank, (key, value) => {
      if (value) {
        params += `${key}=${value}&`;
      }
    });
    const url = params.replace(/&+$/, '');

    // Send emails and store order and detalis to db
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
  }
})(jQuery);
