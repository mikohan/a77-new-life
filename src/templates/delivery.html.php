<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>Контакты Компании <?= COMPANY_INFO['company_name'] ?></title>
  <link rel="icon" type="image/png" href="/assets/images/favicon.png">
  <!-- fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
  <!-- css -->
</head>

<body>
  <!-- site -->
  <div class="site">
    <!-- site__mobile-header -->
    <?php include __DIR__ . '/../backend/includes/header/header.php' ?>
    <!-- site__header / end -->
    <div class="site__body">
      <div class="block-space block-space--layout--spaceship-ledge-height"></div>
      <div class="block faq">
        <div class="container container--max--xl">
          <div class="faq__header">
            <h1 class="faq__header-title">Доставка и оплата</h1>
          </div>
          <div class="faq__section">
            <h3 class="faq__section-title">Доставка</h3>
            <div class="faq__section-body">
              <div class="faq__question">
                <h5 class="faq__question-title">Доставка по Москве.</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <p>
                      При заказе от <?= COMPANY_INFO['free_delivery_from'] ?> - бесплатно.
                    </p>
                    <p>При заказе меньше <?= COMPANY_INFO['free_delivery_from'] ?> - стоимость доставки составляет <?= COMPANY_INFO['delivery_rate'] ?></p>
                    <p>
                      Можем так-же организовать доставку такси или курьером. Позвоните, чтобы уточнить детали.
                    </p>
                  </div>
                </div>
              </div>
              <div class="faq__question">
                <h5 class="faq__question-title">Доставка в регионы</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <p>
                      Отправляем в регионы любой транспортной компанией. До транспортной компании досталяем за сой счет.
                      Если есть вопросы по доставке - звоните <?= COMPANY_INFO['phone_free'][0] ?>
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="faq__section">
            <h3 class="faq__section-title">Оплата</h3>
            <div class="faq__section-body">
              <div class="faq__question">
                <h5 class="faq__question-title">Организации</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <p>
                      Работаем по безналу с Юр лицами. Система налогобложения - УСН (без НДС).
                      Юрлицам так-же доступны любые другие способы оплаты. Карта, онлайн, превод, наличиными.
                    </p>
                  </div>
                </div>
              </div>
              <div class="faq__question">
                <h5 class="faq__question-title">Физлица</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <p>
                      Принимаем все доступные способы оплаты:
                    </p>
                    <ul>
                      <li>Наличные</li>
                      <li>Все карты</li>
                      <li>На сайте онлайн</li>
                      <li>Превод на карту</li>
                      <li>Сбербанк Онлайн</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="faq__footer">
            <div class="faq__footer-title">Still Have A Questions?</div>
            <div class="faq__footer-subtitle">We will be happy to answer any questions you may have.</div>
            <a href="contact-us-v1.html" class="btn btn-primary">Contact Us</a>
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
  <!-- site / end -->
  <!-- mobile-menu -->
  <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php' ?>
  <!-- mobile-menu / end -->

</body>

</html>