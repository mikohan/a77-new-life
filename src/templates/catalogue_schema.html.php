<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
  <title>Купить запчасти для <?= $make ?> <?= $model ?> ✰ в интернет магазине Запчастей в Москве ✈ </title>
  <meta name="description" content="Запчасти для <?= mb_ucfirst($make) ?> <?= mb_ucfirst($model) ?>. Всегда 97% запчастей в наличии на складе. ☎ <?= TELEPHONE_FREE ?>">
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
            <h1 class="faq__header-title"><?= mb_ucfirst($page_title) ?> на <?= "{$make} {$model}" ?></h1>
          </div>
          <div class="faq__section">
            <div class="schema__item-container">
              <div class="schema__item-item">
                <img usemap="#schema" src="/catalogue_images/<?= $car_slug ?><?= $image ?>" alt="<?= $page_title ?>" />
                <map name="schema">
                  <?php foreach ($schema as $item) : ?>
                    <area shape="rect" coords="<?= $item['coords'] ?>" href="" />
                  <?php endforeach ?>
                </map>
              </div>
              <div class="schema__item-item">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tenetur vero illo et! Necessitatibus nostrum architecto provident repellat voluptas veniam.
              </div>
            </div>
          </div>
          <div class="faq__section">
            <h3 class="faq__section-title">Payment Information</h3>
            <div class="faq__section-body">
              <div class="faq__question">
                <h5 class="faq__question-title">What payments methods are available?</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <p>
                      Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                      aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
                    </p>
                  </div>
                </div>
              </div>
              <div class="faq__question">
                <h5 class="faq__question-title">Can I split my payment?</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <p>
                      Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                      aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="faq__section">
            <h3 class="faq__section-title">Orders and Returns</h3>
            <div class="faq__section-body">
              <div class="faq__question">
                <h5 class="faq__question-title">How do I return or exchange an item?</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <p>
                      Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                      aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
                    </p>
                  </div>
                </div>
              </div>
              <div class="faq__question">
                <h5 class="faq__question-title">How do I cancel an order?</h5>
                <div class="faq__question-answer">
                  <div class="typography">
                    <p>
                      Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                      aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
                    </p>
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