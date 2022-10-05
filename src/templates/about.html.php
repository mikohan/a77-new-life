<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8">
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>О Компании Angara Parts</title>
  <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
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
    <!-- site__body -->
    <div class="site__body">
      <div class="about">
        <div class="about__body">
          <div class="about__image">
            <div class="about__image-bg" style="background-image: url('/assets/images/about-1903x1903.jpg');"></div>
            <div class="decor about__image-decor decor--type--bottom">
              <div class="decor__body">
                <div class="decor__start"></div>
                <div class="decor__end"></div>
                <div class="decor__center"></div>
              </div>
            </div>
          </div>
          <div class="about__card">
            <div class="about__card-title">О Компании</div>
            <div class="about__card-text">
              Angara Parts компания с 20 летней историей. Мы поставляем запасные части для автомобилей, грузовиков и спецтехники.
            </div>
            <div class="about__card-author">Владимир Востриков, CEO Angara Parts</div>
            <div class="about__card-signature">
              <img src="/assets/images/signature.jpg" width="160" height="55" alt="Подпись" title="Подпись">
            </div>
          </div>
          <div class="about__indicators">
            <div class="about__indicators-body">
              <div class="about__indicators-item">
                <div class="about__indicators-item-value">10 000</div>
                <div class="about__indicators-item-title">Запчастей на складе</div>
              </div>
              <div class="about__indicators-item">
                <div class="about__indicators-item-value">2003</div>
                <div class="about__indicators-item-title">Год основания</div>
              </div>
              <div class="about__indicators-item">
                <div class="about__indicators-item-value">50 000</div>
                <div class="about__indicators-item-title">Довольных клиентов</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="block-space block-space--layout--divider-xl"></div>
      <div class="block block-teammates">
        <div class="container container--max--xl">
          <div class="block-teammates__title">Профессиональная команда</div>
          <div class="block-teammates__subtitle">Познакомтесь с нашей профессиональной командой.</div>
          <div class="block-teammates__list">
            <div class="owl-carousel">
              <?php foreach ($staff as $man) : ?>
                <?php
                $image = base64_encode($man['img206']);
                $img = $man['img206'] ? "data:image/jpeg;base64,{$image}" : '/assets/images/teammates/teammate-default-206x206.jpg';
                ?>
                <div class="block-teammates__item teammate">
                  <div class="teammate__avatar">
                    <img src="<?= $img ?>" alt="<?= $man['firstname'] ?>" title="<?= $man['firstname'] ?>">
                  </div>
                  <div class="teammate__info">
                    <div class="teammate__name"><?= $man['firstname'] ?></div>
                    <div class="teammate__position"><?= $man['position'] ?></div>
                  </div>
                </div>
              <?php endforeach ?>

            </div>
          </div>
        </div>
      </div>
      <div class="block-space block-space--layout--divider-xl"></div>
      <div class="block block-reviews">
        <div class="container">
          <div class="block-reviews__title">Отзывы</div>
          <div class="block-reviews__subtitle">За время нашей работы мы получили<br>сотни положительных отзывов.</div>
          <div class="faq__section">
            <h3 class="faq__section-title">Отзывы в поисковиках</h3>
            <div class="faq__section-body">
              <div class="faq__question_review">
                <h5 class="faq__question-title">Отзывы в Гугл</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <img src="/assets/images/testimonials/google.png" alt="Отзывы Гугл" title="Отзывы Гугл" />
                  </div>
                </div>
              </div>
              <div class="faq__question faq__question_review">
                <h5 class="faq__question-title">Отзывы в Яндекс</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <img src="/assets/images/testimonials/yandex.png" alt="Яндекс отзывы" title="Яндекс отзывы" />
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="block-space block-space--layout--before-footer"></div>
    </div>
    <div class="block-space block-space--layout--divider-xl"></div>
    <div class="block block-reviews">
      <div class="container">
        <div class="faq__section">
          <h3 class="faq__section-title">Еще о Компании</h3>
          <div class="faq__section-body">
            <div class="faq__question_review">
              <h5 class="faq__question-title"></h5>
              <div class="faq__question-answer faq__question-answer-account">
                <div class="typography">
                  <div class="row">
                    <div class="col-md-12 requisite">
                      <h3>Реквизиты компании</h3>
                      <div>Общество с ограниченной ответсвенностью "АНГАРА"</div>
                      <div>ИНН 7733607590</div>
                      <div>КПП 773301001</div>
                      <div>БИК 044525555</div>
                      <div>ОГРН 5077746795418</div>
                      <div>Номер счета 40702810170030424301</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="faq__question faq__question_review">
              <h5 class="faq__question-title"></h5>
              <div class="faq__question-answer">
                <div class="typography">
                  <img src="/assets/images/testimonials/ang_sert.jpg" alt="Яндекс отзывы" title="Яндекс отзывы" />
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
  <!-- site / end -->
  <!-- mobile-menu -->
  <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php' ?>
  <!-- mobile-menu / end -->

</body>

</html>