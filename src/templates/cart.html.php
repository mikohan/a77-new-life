<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <title>Корзина — Angara Parts</title>
  <meta charset="UTF-8" />
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
</head>

<body>
  <!-- site -->
  <div class="site">
    <!-- site__header / start -->
    <?php include __DIR__ . '/../backend/includes/header/header.php' ?>
    <!-- site__header / end -->
    <!-- site__body -->
    <div class="site__body">
      <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
          <div class="block-header__body">
            <!-- <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
              <ol class="breadcrumb__list">
                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                  <a href="index.html" class="breadcrumb__item-link">Главная</a>
                </li>
                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                  <span class="breadcrumb__item-link">Корзина</span>
                </li>
                <li class="breadcrumb__title-safe-area" role="presentation"></li>
              </ol>
            </nav>-->
            <h1 class="block-header__title">Корзина</h1>
          </div>
        </div>
      </div>
      <div class="block">
        <div class="container">
          <div id="cart-id" class="cart">
            <div class="cart__table cart-table col-lg-9 col-md-12">
              <table class="cart-table__table">
                <thead class="cart-table__head">
                  <tr class="cart-table__row">
                    <th class="cart-table__column cart-table__column--image">Изображение</th>
                    <th class="cart-table__column cart-table__column--product">Название</th>
                    <th class="cart-table__column cart-table__column--price">Цена</th>
                    <th class="cart-table__column cart-table__column--quantity">Количество</th>
                    <th class="cart-table__column cart-table__column--total">Всего</th>
                    <th class="cart-table__column cart-table__column--remove"></th>
                  </tr>
                </thead>
                <tbody class="cart-table__body show-cart">
                  <!-- Here is the dummy for shopping cart -->
                </tbody>
                <tfoot class="cart-table__foot">
                  <tr>
                    <td colspan="6">
                      <div class="cart-table__actions">
                        <div class="cart-table__update-button d-none d-md-block">
                          <a class="btn btn-primary" href="">Обновить корзину</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="cart__totals col-lg-3 col-md-12">
              <div class="card">
                <div class="card-body card-body--padding--2">
                  <h3 class="card-title">Оформить заказ</h3>
                  <table class="cart__totals-table">
                    <thead>
                      <tr>
                        <th>Итого</th>
                        <td>&#8381; <span class="total-cart"></span></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>Доставка</th>
                        <td>
                          Звоните
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th class="cartd-title-sum">Сумма</th>
                        <td>&#8381; <span class="total-cart card-title-sum"></span></td>
                      </tr>
                    </tfoot>
                  </table>
                  <a class="btn btn-primary btn-block" href="<?= $u->order() ?>">
                    Оформить заказ
                  </a>
                  <div class="cart_policy">
                    <a href="<?= $u->policy() ?>">Политика конфиденциальности</a>
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
  <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php'; ?>
</body>
