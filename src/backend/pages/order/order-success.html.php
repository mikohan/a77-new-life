<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Order Success — Red Parts</title>
    <?php require_once __DIR__ . '/../new_includes/header/header_links.php' ?>
</head>

<body>
    <!-- site -->
    <div class="site">
        <!-- site header / start  -->
        <?php require_once __DIR__ . '/../new_includes/header/header_new.php' ?>
        <!-- site__header / end -->
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--spaceship-ledge-height"></div>
            <div class="block order-success">
                <div class="container">
                    <div class="order-success__body">
                        <div class="order-success__header">
                            <div class="order-success__icon">
                                <svg width="100" height="100">
                                    <path d="M50,100C22.4,100,0,77.6,0,50S22.4,0,50,0s50,22.4,50,50S77.6,100,50,100z M50,2C23.5,2,2,23.5,2,50
        s21.5,48,48,48s48-21.5,48-48S76.5,2,50,2z M44.2,71L22.3,49.1l1.4-1.4l21.2,21.2l34.4-34.4l1.4,1.4L45.6,71
        C45.2,71.4,44.6,71.4,44.2,71z" />
                                </svg>
                            </div>
                            <h1 class="order-success__title">Спасибо за заказ! <?= $firstname ?></h1>
                            <div class="order-success__subtitle">Ваш заказ получен, мы свяжемся с Вами в ближайшие рабочи часы.</div>
                            <div class="order-success__actions">
                                <a href="/" class="btn btn-sm btn-secondary">Вернуться на главную</a>
                            </div>
                        </div>
                        <div class="card order-success__meta">
                            <ul class="order-success__meta-list">
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Order number:</span>
                                    <span class="order-success__meta-value">#9478</span>
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Created At:</span>
                                    <span class="order-success__meta-value"><?= date('d / m / Y') ?></span>
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Total:</span>
                                    <span class="order-success__meta-value total">$1596.00</span>
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Способ оплаты:</span>
                                    <span class="order-success__meta-value"><?= $payment_method ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="card">
                            <div class="order-list">
                                <table>
                                    <thead class="order-list__header">
                                        <tr>
                                            <th class="order-list__column-label" colspan="2">Product</th>
                                            <th class="order-list__column-quantity">Quantity</th>
                                            <th class="order-list__column-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="order-list__products">
                                    </tbody>
                                    <tbody class="order-list__subtotals">
                                        <tr>
                                            <th class="order-list__column-label" colspan="3">Итого</th>
                                            <td class="order-list__column-total total"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="order-list__footer">
                                        <tr>
                                            <th class="order-list__column-label" colspan="3">Всего</th>
                                            <td class="order-list__column-total total"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
        <!-- site__footer -->
        <?php require_once __DIR__ . '/../new_includes/footer/footer.php' ?>
        <!-- scripts -->
        <?php require_once __DIR__ . '/../new_includes/footer/scripts.php' ?>
        <script>
            $(document).ready(function() {
                var total_sum = shoppingCart.totalCart();
                var myCart = shoppingCart.listCart();
                var prods = ''
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
                    `
                }
                $('.order-list__products').html(prods);
                $('.total').html('&#8381; ' + total_sum)
                // Clear cart
                shoppingCart.clearCartSuccess();
                $('.count-cart').text(0)
            })
        </script>
</body>

</html>