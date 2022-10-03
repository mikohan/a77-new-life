<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <title>Оформление Заказа — Angara Parts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
</head>

<body>
  <!-- site -->
  <div class="site">
    <!-- site__mobile-header -->
    <?php include __DIR__ . '/../backend/includes/header/header.php' ?>
    <!-- site__header / end -->
    <!-- site__body -->
    <div class="site__body">
      <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
          <div class="block-header__body">
            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
              <ol class="breadcrumb__list">
                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                  <a href="/" class="breadcrumb__item-link">Главная</a>
                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                  <span class="breadcrumb__item-link">Заказ</span>
                </li>
                <li class="breadcrumb__title-safe-area" role="presentation"></li>
              </ol>
            </nav>
            <h1 class="block-header__title">Оформить заказ</h1>
          </div>
        </div>
      </div>
      <div class="checkout block">
        <div class="container container--max--xl">
          <div id="checkout-id" class="row">
            <div class="col-12 mb-3">
              <div class="alert alert-lg alert-primary">Returning customer? <a href="<?= $u->login() ?>">Залогиниться</a></div>
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
              <div class="card mb-lg-0">
                <div class="card-body card-body--padding--2">
                  <h3 class="card-title">Адрес и телефон</h3>
                  <div class="form-group">
                    <label for="checkout-phone">Телефон <span class="text-muted">*</span></label>
                    <input required type="text" class="form-control" id="checkout-phone" placeholder="Телефон">
                  </div>
                  <div class="form-group">
                    <label for="checkout-email">Email <span class="text-muted"></span></label>
                    <input required type="email" class="form-control" id="checkout-email" placeholder="Емейл">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="checkout-lastname">Фамилия <span class="text-muted"></span></label>
                      <input type="text" class="form-control" id="checkout-lastname" placeholder="Фамилия">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="checkout-firstname">Имя <span class="text-muted"></span></label>
                      <input type="text" class="form-control" id="checkout-firstname" placeholder="Имя">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="checkout-city">Город</label>
                    <input type="text" class="form-control" id="checkout-city" placeholder="Город">
                  </div>
                  <div class="form-group">
                    <label for="checkout-street">Улица и Дом</label>
                    <input type="text" class="form-control" id="checkout-street" placeholder="Улица дом корпус квартира">
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <span class="input-check form-check-input">
                        <span class="input-check__body">
                          <input class="input-check__input" type="checkbox" id="checkout-create-account">
                          <span class="input-check__box"></span>
                          <span class="input-check__icon"><svg width="9px" height="7px">
                              <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                            </svg>
                          </span>
                        </span>
                      </span>
                      <label class="form-check-label" for="checkout-create-account">Запомнить?</label>
                    </div>
                  </div>
                </div>
                <div class="card-divider"></div>
                <div class="card-body card-body--padding--2">
                  <h3 class="card-title">Комментарии</h3>
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                    <label for="checkout-comment">Комментарии к заказу <span class="text-muted">(Не обязательно)</span></label>
                    <textarea id="checkout-comment" class="form-control" rows="4"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
              <div class="card mb-0">
                <div class="card-body card-body--padding--2">
                  <h3 class="card-title">Ваш заказ</h3>
                  <table class="checkout__totals">
                    <thead class="checkout__totals-header">
                      <tr>
                        <th>SKU</th>
                        <th>Продукт</th>
                        <th>Всего</th>
                      </tr>
                    </thead>
                    <tbody class="checkout__totals-products order-items">
                    </tbody>
                    <tbody class="checkout__totals-subtotals">
                      <tr>
                        <th>Итого</th>
                        <td>&#8381; <span class="total-cart"></span></td>
                      </tr>
                    </tbody>
                    <tfoot class="checkout__totals-footer">
                      <tr>
                        <th>Всего</th>
                        <td>&#8381; <span class="total-cart"></span></td>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="checkout__payment-methods payment-methods">
                    <ul class="payment-methods__list">
                      <li class="payment-methods__item payment-methods__item--active">
                        <label class="payment-methods__item-header">
                          <span class="payment-methods__item-radio input-radio">
                            <span class="input-radio__body">
                              <input class="input-radio__input" name="checkout_payment_method" type="radio" checked>
                              <span class="input-radio__circle"></span>
                            </span>
                          </span>
                          <span class="payment-methods__item-title">Оплата при получении</span>
                        </label>
                        <div class="payment-methods__item-container">
                          <div class="payment-methods__item-details text-muted">
                            Оплатить наличными или переводом курьеру при получении
                          </div>
                        </div>
                      </li>
                      <li class="payment-methods__item">
                        <label class="payment-methods__item-header">
                          <span class="payment-methods__item-radio input-radio">
                            <span class="input-radio__body">
                              <input class="input-radio__input" name="checkout_payment_method" type="radio">
                              <span class="input-radio__circle"></span>
                            </span>
                          </span>
                          <span class="payment-methods__item-title">Оплата на сайте картой</span>
                        </label>
                        <div class="payment-methods__item-container">
                          <div class="payment-methods__item-details text-muted">
                            <form action="https://yoomoney.ru/eshop.xml" method="post">
                              <div class="card-body card-body--padding--2">
                                <div class="row cart-order-labels">
                                  <div class="form-group">
                                    <label for="checkout-summ">Сумма</label>
                                    <input type="text" class="form-control total-cart-input" id="checkout-summ" required name="sum" value="" type="number" min="1" placeholder="Укажите сумму платежа">
                                    <input required name="shopId" value="659633" type="hidden" />
                                    <input required name="scid" value="1313547" type="hidden" />
                                    <input required name="shopSuccessURL" value="<?= $call_back_url ?>" type="hidden" />
                                  </div>
                                  <div class="row cart-order-labels">
                                    <div class="form-group">
                                      <label class="control-label">Ваш Телефон</label>
                                      <input id="yandex-phone" class="form-control" required name="customerNumber" value="" />
                                    </div>
                                  </div>
                                </div>
                                <button id="pay-online" type="submit" class="btn btn-primary btn-xl btn-block">Оплатить онлайн</button>
                            </form>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="checkout__agree form-group">
                    <div class="form-check">
                      <span class="input-check form-check-input">
                        <span class="input-check__body">
                          <input class="input-check__input" type="checkbox" id="checkout-terms" checked>
                          <span class="input-check__box"></span>
                          <span class="input-check__icon"><svg width="9px" height="7px">
                              <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                            </svg>
                          </span>
                        </span>
                      </span>
                      <label class="form-check-label" for="checkout-terms">
                        Я согласен <a target="_blank" href="policy.php"> Политикой обработки персональнх данных</a>
                      </label>
                    </div>
                  </div>
                  <button id="send-order" type="submit" class="btn btn-primary btn-xl btn-block">Отправить заказ</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="block-space block-space--layout--before-footer"></div>
    </div>
    <!-- site__body / end -->
    <!-- site__footer -->
    <?php include __DIR__ . '/../backend/includes/footer/footer.php' ?>
    <!-- site__footer / end -->
  </div>
  <!-- scripts -->
  <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php'; ?>
</body>

</html>
