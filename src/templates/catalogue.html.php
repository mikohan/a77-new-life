<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <title>Купить запчасти для {car goes here} ✰ в интернет магазине Запчастей в Москве ✈ </title>
  <meta name="description" content="Запчасти для <?= mb_ucfirst($make) ?> <?= mb_ucfirst($model) ?>. Всегда 97% запчастей в наличии на складе. ☎ <?= TELEPHONE_FREE ?>">
</head>

<body>

  <!-- site -->
  <div class="site" id="app">
    <!-- site__header -->
    <?php include __DIR__ . '/../backend/includes/header/header.php' ?>
    <!-- site__header / end -->
    <!-- site__body -->
    <!-- site__body -->
    <div class="site__body">
      <div class="block-space block-space--layout--spaceship-ledge-height"></div>
      <div class="block faq">
        <div class="container container--max--xl">
          <div class="faq__header">
            <h1 class="faq__header-title">Каталог на {Dummy}</h1>
          </div>
          <div class="faq__section">
            <h3 class="faq__section-title">Выберите раздел</h3>
            <div class="faq__section-body">
              <?php foreach ($first as $f) : ?>
                <div class="faq__question">
                  <h5 class="faq__question-title"><?= $f['name'] ?></h5>
                  <div class="faq__question-answer">
                    <div class="typography">
                      <p>
                        <img src="/catalogue_images/porter1<?= $f['img'] ?>" alt="<?= $f['name'] ?>" />
                      </p>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
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
  <!-- add vehicle-modal -->
  <div id="add-vehicle-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="add-vehicle-modal modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="add-vehicle-modal__close"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12">
            <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
          </svg>
        </button>
        <div class="add-vehicle-modal__body">
          <div class="add-vehicle-modal__title card-title">Add A Vehicle</div>
          <div class="vehicle-form vehicle-form--layout--modal">
            <div class="vehicle-form__item vehicle-form__item--select">
              <select class="form-control form-control-select2" aria-label="Year">
                <option value="none">Select Year</option>
                <option>2010</option>
                <option>2011</option>
                <option>2012</option>
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
                <option>2020</option>
              </select>
            </div>
            <div class="vehicle-form__item vehicle-form__item--select">
              <select class="form-control form-control-select2" aria-label="Brand" disabled>
                <option value="none">Select Brand</option>
                <option>Audi</option>
                <option>BMW</option>
                <option>Ferrari</option>
                <option>Ford</option>
                <option>KIA</option>
                <option>Nissan</option>
                <option>Tesla</option>
                <option>Toyota</option>
              </select>
            </div>
            <div class="vehicle-form__item vehicle-form__item--select">
              <select class="form-control form-control-select2" aria-label="Model" disabled>
                <option value="none">Select Model</option>
                <option>Explorer</option>
                <option>Focus S</option>
                <option>Fusion SE</option>
                <option>Mustang</option>
              </select>
            </div>
            <div class="vehicle-form__item vehicle-form__item--select">
              <select class="form-control form-control-select2" aria-label="Engine" disabled>
                <option value="none">Select Engine</option>
                <option>Gas 1.6L 125 hp AT/L4</option>
                <option>Diesel 2.5L 200 hp AT/L5</option>
                <option>Diesel 3.0L 250 hp MT/L5</option>
              </select>
            </div>
            <div class="vehicle-form__divider">Or</div>
            <div class="vehicle-form__item">
              <input type="text" class="form-control" placeholder="Enter VIN number" aria-label="VIN number">
            </div>
          </div>
          <div class="add-vehicle-modal__actions">
            <button class="btn btn-sm btn-secondary add-vehicle-modal__close-button" type="button">Cancel</button>
            <a href="" class="btn btn-sm btn-primary">Add A Vehicle</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- add-vehicle-modal / end -->
  <!-- photoswipe -->
  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div>
        </div>
        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        <div class="pswp__caption">
          <div class="pswp__caption__center"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- photoswipe / end -->
  <!-- scripts -->
</body>

</html>