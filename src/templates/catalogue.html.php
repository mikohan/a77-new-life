<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
  <title><?= $title ?></title>
  <meta name="description" content="<?= $description ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
</head>

<body>

  <!-- site -->
  <div class="site" id="app">
    <!-- site__header -->
    <?php include __DIR__ . '/../backend/includes/header/header.php' ?>
    <!-- site__header / end -->
    <!-- site__body -->
    <div class="site__body">
      <div class="block-space block-space--layout--spaceship-ledge-height"></div>
      <div class="block faq">
        <div class="container container--max--xl">
          <nav class="breadcrumb block-header__breadcrumb header__breadcrumb_catalogue" aria-label="breadcrumb">
            <ol class="breadcrumb__list">
              <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
              <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                <a href="/" class="breadcrumb__item-link">Главная</a>
              </li>
              <li class="breadcrumb__item breadcrumb__item--parent">
                <a <?php if ($breadcrumb) : ?> href="<?= $breadcrumb ?>" <?php endif ?> class="breadcrumb__item-link">Каталог <?= $model ?></a>
              <li>
                <?php if ($parent) : ?>
              <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                <span class="breadcrumb__item-link"><?= $schema_name ?> <?= $model ?></span>
              </li>
              <li class="breadcrumb__title-safe-area" role="presentation"></li>
            <?php endif ?>
            </ol>
          </nav>
          <div class="faq__header">
            <h1 class="faq__header-title custom-mobile-header"><?= $h1 ?></h1>
          </div>
          <div class="faq__section">
            <h3 class="faq__section-title">Выберите раздел</h3>
            <div class="faq__section-body faq__section-body_catalogue">
              <?php foreach ($first as $f) : ?>
                <div class="faq__question faq__question_catalogue">
                  <h5 class="faq__question-title"><?= $f['name'] ?></h5>
                  <div class="faq__question-answer">
                    <div class="typography">
                      <?php
                      $link = isset($_GET['parent']) ? "/catalogue/schema/{$car_slug}/{$f['id']}/" : "/catalogue/{$car_slug}/{$f['id']}/";
                      ?>
                      <a href="<?= $link ?>">
                        <img loading="lazy" src="/catalogue_images/<?= $car_slug ?><?= $f['img'] ?>" alt="<?= $f['name'] ?>" title="<?= $f['name'] ?>" />
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
      <div class="block-space block-space--layout--before-footer"></div>
    </div>
    <!-- site__body / end -->
    <!-- site__footer -->
    <?php require_once __DIR__ . '/../backend/includes/footer/footer.php' ?>
    <!-- site__footer / end -->
  </div>
  <!-- site / end -->
  <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php'; ?>
  <!-- quickview-modal -->
  <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
  <!-- quickview-modal / end -->
  <!-- scripts -->
</body>

</html>
