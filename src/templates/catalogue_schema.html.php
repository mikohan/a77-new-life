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
    <?php include __DIR__ . '/../backend/includes/header/header.php'; ?>

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
              <div id="schema-id" class="schema__item-item">
                <img class="catalogue__schema-img" usemap="#schema" src="/catalogue_images/<?= $car_slug ?><?= $image ?>" alt="<?= $page_title ?>" />
                <map name="schema">
                  <?php foreach ($schema as $item) : ?>
                    <?php
                    $data_tt = json_encode($item);
                    ?>
                    <area data-full='<?= $data_tt ?>' data-key="<?= $item['h5_cat_number'] ?>" data-class="catalogue__tooltip-item" shape="rect" coords="<?= $item['coords'] ?>" href="/search/?search=<?= $item['h5_cat_number'] ?>" />
                  <?php endforeach ?>
                </map>
              </div>
              <div class="schema__item-item">
                <div class="typography">
                  <ul class="catalogue__ul">
                    <?php foreach ($products as $product) : ?>
                      <?php
                      $chk_br = $product['brand'] ?? false;
                      $brand = $chk_br ? mb_strtoupper($product['brand']['brand']) : '';
                      $spl = array_slice(explode(' ',  $product['name']), 0, 4);
                      $name = implode(' ', $spl);
                      ?>
                      <li class="side-<?= $product['cat_number'] ?>"><a href="/product/<?= $product['slug'] ?>/"><span class="catalogue__span-name"><?= $name ?></span> <span class="catalogue__span-brand"><?= $brand ?> </span> <span class="catalogue__span-price">&#8381;<?= $product['price'] ?></span></a></li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="faq__section">
            <div class="faq__section-body">
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
                                    <a href="/product/<?= $prod['slug'] ?>/" class="image__body">
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
                                      <a href="product-full.html"><?= $prod_name ?></a>
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
  <!-- quickview-modal -->
  <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
  <!-- quickview-modal / end -->
  <!-- scripts -->
</body>

</html>