<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <link rel="icon" type="image/png" href="/assets/images/favicon.png" />
  <link rel="canonical" href="<?= $u->category($get_category) ?>" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
  <title><?= $title ?></title>
  <meta name="description" content="<?= $description ?>">
</head>
<style>
  products-list__item {
    display: none;
  }

  .fade-loader {
    width: 100%;
    height: 100vh;
    background-color: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 10px;
    border-radius: 3px;
  }

  .fade-loader h3 {
    color: #fff;
    font-weight: bold;
    font-size: 3rem;
  }

  .has-photo {
    cursor: pointer;
  }

  .filter-list__title:hover {
    font-weight: 600;
  }

  .applied-filters__button--filter {
    cursor: pointer;
  }

  .applied-filters__button--filter svg:hover {
    fill: red;
    transform: scale(1.3);
  }

  .c-filter-svg {
    fill: red;
  }

  [v-cloak] {
    display: none;
  }
</style>
</head>

<body>
  <!-- site -->
  <div class="site">
    <!-- site__mobile-header -->
    <?php include __DIR__ . '/../backend/includes/header/header.php' ?>
    <!-- site__header / end -->
    <!-- site__body -->
    <div id="app" class="site__body">
      <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
          <div class="block-header__body">
            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
              <ol class="breadcrumb__list">
                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                  <a href="index.html" class="breadcrumb__item-link">Главная</a>
                </li>
                <?php foreach ($parents as $parent) : ?>
                  <li class="breadcrumb__item breadcrumb__item--parent">
                    <a href="/category/<?= $parent['slug'] ?>/" class="breadcrumb__item-link"><?= $parent['name'] ?></a>
                  <li>
                  <?php endforeach ?>
                  <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                    <span class="breadcrumb__item-link"><?= $page_category['name'] ?></span>
                  </li>
                  <li class="breadcrumb__title-safe-area" role="presentation"></li>
              </ol>
            </nav>
            <?php
            $title = isset($current_car) ? "{$page_category['name']} для {$current_car->make->name} {$current_car->name}" : "{$page_category['name']}";
            ?>
            <h1 class="block-header__title"><?= $title ?></h1>
          </div>
        </div>
      </div>
      <div class="block-split block-split--has-sidebar">
        <div class="container">
          <div class="block-split__row row no-gutters">
            <div class="block-split__item block-split__item-sidebar col-auto">
              <div class="sidebar sidebar--offcanvas--mobile">
                <div class="sidebar__backdrop"></div>
                <div class="sidebar__body">
                  <div class="sidebar__header">
                    <div class="sidebar__title">Filters</div>
                    <button class="sidebar__close" type="button"><svg width="12" height="12">
                        <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
                      </svg>
                    </button>
                  </div>
                  <div class="sidebar__content">
                    <div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                      <div class="widget__header widget-filters__header">
                        <h4>Фильтры</h4>
                      </div>
                      <div class="widget-filters__list">
                        <form id="filters-form" name="filters-form" method="GET" action="">
                          <?php
                          foreach ($checked_car_model as $cm) {
                            if (!in_array($cm, $get_arr)) {
                              echo ("<input type='hidden' name='car_models' value='{$cm}' />");
                            }
                          }
                          foreach ($checked_brand as $br) {
                            if (!in_array($br, $get_arr)) {
                              echo ("<input type='hidden' name='brand' value='{$br}' />");
                            }
                          }
                          ?>
                          <?php include(__DIR__ . '/../backend/pages/category_no_car/filters_widget.php') ?>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-split__item block-split__item-content col-auto">
              <div class="block">
                <div class="products-view">
                  <div class="products-view__options view-options view-options--offcanvas--mobile">
                    <div class="view-options__body">
                      <button type="button" class="view-options__filters-button filters-button">
                        <span class="filters-button__icon"><svg width="16" height="16">
                            <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2
	C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2
	C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3
	C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" />
                          </svg>
                        </span>
                        <span class="filters-button__title">Фильтры</span>
                        <span class="filters-button__counter">3</span>
                      </button>
                      <div class="view-options__layout layout-switcher">
                        <div class="layout-switcher__list">
                          <button type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="grid" data-with-features="false">
                            <svg width="16" height="16">
                              <path d="M15.2,16H9.8C9.4,16,9,15.6,9,15.2V9.8C9,9.4,9.4,9,9.8,9h5.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
	H9.8C9.4,7,9,6.6,9,6.2V0.8C9,0.4,9.4,0,9.8,0h5.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z M6.2,16H0.8
	C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h5.4C6.6,9,7,9.4,7,9.8v5.4C7,15.6,6.6,16,6.2,16z M6.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8
	C0,0.4,0.4,0,0.8,0h5.4C6.6,0,7,0.4,7,0.8v5.4C7,6.6,6.6,7,6.2,7z" />
                            </svg>
                          </button>
                          <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true">
                            <svg width="16" height="16">
                              <path d="M16,0.8v14.4c0,0.4-0.4,0.8-0.8,0.8H9.8C9.4,16,9,15.6,9,15.2V0.8C9,0.4,9.4,0,9.8,0l5.4,0C15.6,0,16,0.4,16,0.8z M7,0.8
	v14.4C7,15.6,6.6,16,6.2,16H0.8C0.4,16,0,15.6,0,15.2L0,0.8C0,0.4,0.4,0,0.8,0l5.4,0C6.6,0,7,0.4,7,0.8z" />
                            </svg>
                          </button>
                          <button type="button" class="layout-switcher__button" data-layout="list" data-with-features="false">
                            <svg width="16" height="16">
                              <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h14.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
	H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z" />
                            </svg>
                          </button>
                          <button type="button" class="layout-switcher__button" data-layout="table" data-with-features="false">
                            <svg width="16" height="16">
                              <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2v-2.4C0,12.4,0.4,12,0.8,12h14.4c0.4,0,0.8,0.4,0.8,0.8v2.4C16,15.6,15.6,16,15.2,16z
	 M15.2,10H0.8C0.4,10,0,9.6,0,9.2V6.8C0,6.4,0.4,6,0.8,6h14.4C15.6,6,16,6.4,16,6.8v2.4C16,9.6,15.6,10,15.2,10z M15.2,4H0.8
	C0.4,4,0,3.6,0,3.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v2.4C16,3.6,15.6,4,15.2,4z" />
                            </svg>
                          </button>
                        </div>
                      </div>
                      <div class="view-options__legend">
                        Показано <?= count($products) ?> из <?= $products_total_count ?> продуктов
                      </div>
                      <div class="view-options__spring"></div>
                      <div class="view-options__select">
                        <label for="view-option-sort">Сортировать:</label>
                        <select id="view-option-sort" class="form-control form-control-sm" name="">
                          <option value="">Цена</option>
                        </select>
                      </div>
                      <div class="view-options__select">
                        <label for="view-option-limit">Показано:</label>
                        <select id="view-option-limit" class="form-control form-control-sm" name="">
                          <option value="">20</option>
                        </select>
                      </div>
                    </div>
                    <div class="view-options__body view-options__body--filters">
                      <div class="view-options__label">Активные фильтры</div>
                      <div class="applied-filters">
                        <ul class="applied-filters__list">
                          <?php foreach ($active_filters as $active_filter) : ?>
                            <li class="applied-filters__item">
                              <div id="<?= $active_filter[2] ?>" class="applied-filters__button applied-filters__button--filter">
                                <?= $active_filter[0] ?> <?= $active_filter[1] ?>
                                <svg class="c-filter-svg" @click="clearFilter(active.eng)" width="9" height="9">
                                  <path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z" />
                                </svg>
                              </div>
                            </li>
                          <?php endforeach ?>
                          <li class="applied-filters__item">
                            <button id="clear-all" type="button" class="applied-filters__button applied-filters__button--clear">Очистить Фильтры</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="products-view__list products-list products-list--grid--4" data-layout="grid" data-with-features="false">
                    <div class="products-list__head">
                      <div class="products-list__column products-list__column--image">Image</div>
                      <div class="products-list__column products-list__column--meta">SKU</div>
                      <div class="products-list__column products-list__column--product">Product</div>
                      <div class="products-list__column products-list__column--rating">Rating</div>
                      <div class="products-list__column products-list__column--price">Price</div>
                    </div>
                    <div v-if="isLoadingProduct" class="products-list__content">
                      <?php include(__DIR__ . '/../backend/pages/category_no_car/products_snippets.php')
                      ?>
                    </div>
                  </div>
                  <div class="products-view__pagination">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item" <?= ($current_page == 1) ? 'disabled' : '' ?>>
                          <a class="page-link page-link--with-arrow" href="<?= $previous_page_url ?>" aria-label="Previous">
                            <span class="page-link__arrow page-link__arrow--left" aria-hidden="true"><svg width="7" height="11">
                                <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                              </svg>
                            </span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="/category/<?= $get_category ?>/">1</a></li>
                        <?php if ($current_page != 1) : ?>
                          <li class="page-item"><a class="page-link" href="/category/<?= $get_category ?>/?page=<?= $current_page - 1 ?>"><?= $current_page - 1 ?></a></li>
                          <li class="page-item active" aria-current="page">
                            <span class="page-link">
                              <?= $current_page ?>
                              <span class="sr-only">(current)</span>
                            </span>
                          </li>
                        <?php endif ?>
                        <li class="page-item"><a class="page-link" href="<?= $page_root_url ?>/?page=<?= $current_page + 1 ?>"><?= $current_page + 1 ?></a></li>
                        <li class="page-item"><a class="page-link" href="<?= $page_root_url ?>/?page=<?= $current_page + 2 ?>"><?= $current_page + 2 ?></a></li>
                        <li class="page-item page-item--dots">
                          <div class="pagination__dots"></div>
                        </li>
                        <li class="page-item"><a class="page-link" href=""><?= $total_pages ?></a></li>
                        <li class="page-item">
                          <a href="<?= $next_page_url ?>" id="pagination-next" class="page-link page-link--with-arrow" aria-label="Next">
                            <span class="page-link__arrow page-link__arrow--right" aria-hidden="true"><svg width="7" height="11">
                                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                              </svg>
                            </span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                    <div class="products-view__pagination-legend">
                      Показано <?= count($products) ?> из <?= $products_total_count ?> продуктов
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="block-space block-space--layout--before-footer"></div>
        </div>
      </div>
    </div>
    <!-- site__body / end -->
    <!-- site__footer -->
    <?php include __DIR__ . '/../backend/includes/footer/footer.php' ?>
    <!-- site__footer / end -->
  </div>
  <!-- site / end -->
  <!-- mobile-menu / start -->
  <!-- mobile-menu / end -->
  <!-- quickview-modal -->
  <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
  <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php'; ?>
</body>

</html>