<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <link rel="icon" type="image/png" href="/assets/images/favicon.png" />
  <title>Каталог запчастей для <?= $make ?> <?= $model ?> ✰ в интернет магазине Запчастей в Москве ✈ </title>
  <meta name="description" content="Каталог запчастей для <?= mb_ucfirst($make) ?> <?= mb_ucfirst($model) ?>. Всегда 97% запчастей в наличии на складе. ☎ <?= TELEPHONE_FREE ?>">
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
          <div class="faq__header">
            <h1 class="faq__header-title">Каталог запчастей на <?= "{$make} {$model}" ?></h1>
          </div>
          <div class="faq__section">
            <h3 class="faq__section-title">Выберите раздел</h3>
            <div class="faq__section-body">
              <?php foreach ($first as $f) : ?>
                <div class="faq__question">
                  <h5 class="faq__question-title"><?= $f['name'] ?></h5>
                  <div class="faq__question-answer">
                    <div class="typography">
                      <?php
                      $link = isset($_GET['parent']) ? "/catalogue/schema/{$car_slug}/{$f['id']}/" : "/catalogue/{$car_slug}/{$f['id']}/";
                      ?>
                      <a href="<?= $link ?>">
                        <img src="/catalogue_images/porter1<?= $f['img'] ?>" alt="<?= $f['name'] ?>" />
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
    <!-- site__body / end -->
    <!-- site__footer -->
    <?php require_once __DIR__ . '/../backend/includes/footer/footer.php' ?>
    <!-- site__footer / end -->
  </div>
  <!-- site / end -->
  <!-- quickview-modal -->
  <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
  <!-- quickview-modal / end -->
  <!-- scripts -->
</body>

</html>