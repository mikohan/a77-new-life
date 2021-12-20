<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
  <title>Купить запчасти для <?= $make ?> <?= $model ?> ✰ в интернет магазине Запчастей в Москве ✈ </title>
  <meta name="description" content="Запчасти для <?= mb_ucfirst($make) ?> <?= mb_ucfirst($model) ?>. Всегда 97% запчастей в наличии на складе. ☎ <?= TELEPHONE_FREE ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
</head>

<body>
  <!-- site -->
  <div class="site" id="app">
    <!-- site__header -->
    <?php include __DIR__ . '/../backend/includes/header/header.php'; ?>
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
                <a href="" class="breadcrumb__item-link">Каталог</a>
              <li>
              <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                <span class="breadcrumb__item-link"><?= $model ?></span>
              </li>
              <li class="breadcrumb__title-safe-area" role="presentation"></li>
            </ol>
          </nav>
          <div class="faq__header">
            <h1 class="faq__header-title custom-mobile-header"><?= mb_ucfirst($page_title) ?> на <?= "{$make} {$model}" ?></h1>
          </div>
          <div class="faq__section" style="padding: 5px;">
            <div class="schema__item-container">
              <div id="schema-id" class="schema__item-item">
                <img class="catalogue__schema-img" usemap="#schema" src="/catalogue_images/<?= $car_slug ?><?= $image ?>" alt="<?= $page_title ?>" />
                <map name="schema">
                  <?php foreach ($schema as $item) : ?>
                    <?php
                    $prod = array();
                    $prod['h5_cat_number'] = $item['h5_cat_number'];
                    $prod['h4_title'] = $item['h4_title'];
                    $prod['h4_title'] = $item['h4_title'];
                    $prod['count'] = $item['count'];
                    if ($item['products'] ?? false) {
                      $array_products = [];
                      foreach ($item['products'] as $p) {
                        $array_products['name'] =  $p['name'];
                        $array_products['brand'] = $p['brand']['brand'] ?? 'original';
                        $array_products['tmb'] = $p['tmb'] ?? null;
                        $array_products['price'] =  $p['price'] ?? null;
                        $prod['products'][] = $array_products;
                      }
                    }
                    $data_tt = json_encode($prod, JSON_UNESCAPED_UNICODE);
                    // p($data_tt);
                    ?>
                    <area data-full='<?= $data_tt ?>' data-key="<?= $item['h5_cat_number'] ?>" data-class="catalogue__tooltip-item" shape="rect" coords="<?= $item['coords'] ?>" href="/search/?search=<?= $item['h5_cat_number'] ?>" />
                  <?php endforeach ?>
                </map>
              </div>
              <div class="schema__item-item" style="padding-top: 1rem; padding-right: 0.5rem;">
                <div class="typography">
                  <ul class="catalogue__ul">
                    <?php foreach ($products as $product) : ?>
                      <?php
                      $chk_br = $product['brand'] ?? false;
                      $brand = $chk_br ? mb_strtoupper($product['brand']['brand']) : '';
                      $spl = array_slice(explode(' ',  $product['name']), 0, 4);
                      $name = implode(' ', $spl);
                      ?>
                      <li class="side-<?= $product['cat_number'] ?>"><a href="<?= $u->product($product['slug']) ?>"><span class="catalogue__span-name"><?= $name ?></span> <span class="catalogue__span-brand"><?= $brand ?> </span> <span class="catalogue__span-price">&#8381;<?= $product['price'] ?></span></a></li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="faq__section">
            <div class="faq__section-body faq__section-body_catalogue">
              <div class="block block-products-columns">
                <div class="container">
                  <div class="row">
                    <?php foreach ($products_chunks as $pc) : ?>
                      <div class="col-4">
                        <div class="block-products-columns__title"></div>
                        <div class="block-products-columns__list">
                          <?php foreach ($pc as $prod) : ?>
                            <?php
                            $prod_image = count($prod['product_image']) ? $prod['product_image'][0]['img150'] : '/assets/images/products/product-default-160.jpg';
                            $chk_brand = $prod['brand'] ?? false;
                            $prod_brand = $chk_brand ? mb_strtoupper($prod['brand']['brand']) : '';
                            $chk_price = $prod['price'] ?? false;
                            $prod_price = $chk_price ? $prod['price'] : 'Звоните';
                            $prod_price =  $prod_price ? $prod_price : 'Звоните';
                            $prod_cat_number = $prod['cat_number'];
                            $prod_name = $prod['name'];
                            ?>
                            <div class="block-products-columns__list-item">
                              <div class="product-card">
                                <div class="product-card__actions-list">
                                  <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                                    <svg width="16" height="16">
                                      <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                                    </svg>
                                  </button>
                                </div>
                                <div class="product-card__image">
                                  <div class="image image--type--product">
                                    <a href="<?= $u->product($prod['slug']) ?>" class="image__body">
                                      <img class="image__tag" src="<?= $prod_image ?>" alt="<?= $prod_name ?>">
                                    </a>
                                  </div>
                                </div>
                                <div class="product-card__info">
                                  <div class="product-card__name">
                                    <div>
                                      <div class="product-card__badges">
                                        <div class="tag-badge tag-badge--hot">hot</div>
                                        <!-- <div class="tag-badge tag-badge--sale">sale</div>
                                        <div class="tag-badge tag-badge--new">new</div> -->
                                      </div>
                                      <a href="<?= $u->product($prod['slug']) ?>"><?= $prod_name ?></a>
                                    </div>
                                  </div>
                                  <div class="product-card__rating mr-2">
                                    <?= $prod_cat_number ?>
                                    <div class="product-card__rating-label"><?= $prod_brand ?></div>
                                  </div>
                                </div>
                                <div class="product-card__footer">
                                  <div class="product-card__prices">
                                    <div class="product-card__price product-card__price--current">&#8381; <?= $prod_price ?></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach ?>
                        </div>
                      </div>
                    <?php endforeach ?>
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