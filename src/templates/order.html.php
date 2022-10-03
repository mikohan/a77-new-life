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
              <!--<ol class="breadcrumb__list">
                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                  <a href="/" class="breadcrumb__item-link">Главная</a>
                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                  <span class="breadcrumb__item-link">Заказ</span>
                </li>
                <li class="breadcrumb__title-safe-area" role="presentation"></li>
              </ol>-->
            </nav>
            <h1 class="block-header__title">Оформить заказ</h1>
          </div>
        </div>
      </div>
      <div class="checkout block">
        <div class="container container--max--xl">
          <div id="checkout-id" class="row">
            <div class="col-12 mb-3">
              <!--<div class="alert alert-lg alert-primary">Уже есть аккаунт? <a href="<?= $u->login() ?>">Залогиниться</a></div>-->
            </div>
            <!--Here starts left and right column -->

            <div class="col-12 col-lg-6 col-xl-7 mt-4 mt-lg-0">
              <div class="card mb-0">
                <div class="card-body card-body--padding--2">
                  <h3 class="card-title">Ваш заказ</h3>
                  <table class="checkout__totals">
                    <thead class="checkout__totals-header">
                      <tr>
                        <th>SKU</th>
                        <th class="order-table-widht">Продукт</th>
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
                        Я согласен c Политикой обработки персональных данных
                      </label>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-5">
              <div class="card mb-lg-0">
                <div class="card-body card-body--padding--2">
                  <h3 class="card-title">Быстрое оформление заказа</h3>
                  <div class="form-group">
                    <label for="checkout-phone">Телефон <span class="text-muted">*</span></label>
                    <input required type="text" class="form-control" id="checkout-phone" placeholder="Телефон">
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="checkout-firstname">Имя <span class="text-muted"></span></label>
                      <input type="text" class="form-control" id="checkout-firstname" placeholder="Имя">
                    </div>
                  </div>
                  <div class="text-muted p-1">
                   Оформите заказ и товар будет зарезервирован за Вами.
                  </div>
                  <button id="send-order" type="submit" class="btn btn-primary btn-xl btn-block">Оформить заказ</button>
                  <div class="text-muted p-1">                  
                   Менеджер свяжется с Вами для уточнения способа доставки и оплаты.
                  </div>
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
