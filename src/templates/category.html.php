<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
  <link rel="canonical" href="<?= $u->categoryCar($current_car->slug, $get_category) ?>" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
  <title><?= $title ?></title>
  <meta name="description" content="<?= $description ?>">
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
                  <a href="/" class="breadcrumb__item-link">Главная</a>
                </li>
                <?php foreach ($parents as $parent) : ?>
                  <li class="breadcrumb__item breadcrumb__item--parent">
                    <a href="<?= $u->categoryCar($current_car->slug, $parent['slug']) ?>" class="breadcrumb__item-link"><?= mb_ucfirst($parent['name']) ?></a>
                  <li>
                  <?php endforeach ?>
                  <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                    <span class="breadcrumb__item-link"><?= mb_ucfirst($page_category['name']) ?></span>
                  </li>
                  <li class="breadcrumb__title-safe-area" role="presentation"></li>
              </ol>
            </nav>
            <?php
            $title = isset($current_car) ? "{$page_category['name']} для {$current_car->make->name} {$current_car->name}" : "{$page_category['name']}";
            ?>
            <h1 class="block-header__title"><?= $h1 ?></h1>
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
                      <div v-if="isLoadingProduct" class="widget-filters__list">
                        <?php include(__DIR__ . '/../backend/pages/category/filters_widget.php') ?>
                      </div>
                      <div class="widget-filters__list">
                        <div class="widget-filters__item">
                          <div class="filter filter--opened" data-collapse-item>
                            <button type="button" class="filter__title" data-collapse-trigger>
                              Категории
                              <span class="filter__arrow"><svg width="12px" height="7px">
                                  <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                </svg></span>
                            </button>
                            <div class="filter__body" data-collapse-content>
                              <div class="filter__container">
                                <div class="filter-categories">
                                  <ul class="filter-categories__list">
                                    <?php foreach ($parents as $par_cat) : ?>
                                      <li class="filter-categories__item filter-categories__item--parent">
                                        <span class="filter-categories__arrow"><svg width="6" height="9">
                                            <path d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9
	C6.1,7.8,6.1,8.4,5.7,8.7z" />
                                          </svg>
                                        </span>
                                        <a href="/car/<?= $get_model ?>/<?= $par_cat['slug'] ?>/"><?= $par_cat['name'] ?></a>
                                        <div class="filter-categories__counter"><?= $par_cat['count'] ?></div>
                                      </li>
                                    <?php endforeach ?>
                                    <li class="filter-categories__item filter-categories__item--current">
                                      <a href=""><?= mb_ucfirst($page_category['name']) ?></a>
                                      <div class="filter-categories__counter"><?= $page_category['count'] ?></div>
                                    </li>
                                    <!-- Children cats start -->
                                    <?php foreach (findChildren($page_category, $categories) as $ct) : ?>
                                      <li class="filter-categories__item filter-categories__item--child">
                                        <a id="drils" href="/car/<?= $get_model ?>/<?= $ct['slug'] ?>/"><?= mb_ucfirst($ct['name']) ?></a>
                                        <div class="filter-categories__counter"><?= $ct['count'] ?></div>
                                      </li>
                                    <?php endforeach ?>
                                    <!-- Children cats end -->
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div v-if="filters.car_models.length" class="widget-filters__item">
                          <div class="filter filter--opened" data-collapse-item>
                            <button type="button" class="filter__title" data-collapse-trigger>
                              Машины
                              <span class="filter__arrow"><svg width="12px" height="7px">
                                  <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                </svg></span>
                            </button>
                            <div class="filter__body" data-collapse-content>
                              <div class="filter__container">
                                <div class="filter-list">
                                  <div class="filter-list__list">
                                    <label v-for="model in filters.car_models" :key="model.key" class="filter-list__item ">
                                      <span class="input-check filter-list__input">
                                        <span class="input-check__body">
                                          <input v-model="filtersChecked.car_models" :value="model.key" @change="updateCheckFilters('car_models')" class="input-check__input" type="checkbox">
                                          <span class="input-check__box"></span>
                                          <span class="input-check__icon"><svg width="9px" height="7px">
                                              <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                            </svg>
                                          </span>
                                        </span>
                                      </span>
                                      <span class="filter-list__title">
                                        {{model.key.toUpperCase()}}
                                      </span>
                                      <span class="filter-list__counter">{{model.doc_count}}</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div v-if="filters.brand.length" class="widget-filters__item">
                          <div class="filter filter--opened" data-collapse-item>
                            <button type="button" class="filter__title" data-collapse-trigger>
                              Бренды
                              <span class="filter__arrow"><svg width="12px" height="7px">
                                  <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                </svg></span>
                            </button>
                            <div class="filter__body" data-collapse-content>
                              <div class="filter__container">
                                <div class="filter-list">
                                  <div class="filter-list__list">
                                    <label v-for="brand in filters.brand" :key="brand.key" class="filter-list__item ">
                                      <span class="input-check filter-list__input">
                                        <span class="input-check__body">
                                          <input :value="brand.key" @change="updateCheckFilters('brand')" v-model="filtersChecked.brand" class="input-check__input" type="checkbox">
                                          <span class="input-check__box"></span>
                                          <span class="input-check__icon"><svg width="9px" height="7px">
                                              <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                            </svg>
                                          </span>
                                        </span>
                                      </span>
                                      <span class="filter-list__title">
                                        {{brand.key.toUpperCase()}}
                                      </span>
                                      <span class="filter-list__counter">{{ brand.doc_count}}</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div v-if="filters.engine.length" class="widget-filters__item">
                          <div class="filter filter--opened" data-collapse-item>
                            <button type="button" class="filter__title" data-collapse-trigger>
                              Двигатель
                              <span class="filter__arrow"><svg width="12px" height="7px">
                                  <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                </svg></span>
                            </button>
                            <div class="filter__body" data-collapse-content>
                              <div class="filter__container">
                                <div class="filter-list">
                                  <div class="filter-list__list">
                                    <label v-for="engine in filters.engine" :key="engine.key" class="filter-list__item ">
                                      <span class="input-check filter-list__input">
                                        <span class="input-check__body">
                                          <input :value="engine.key" @change="updateCheckFilters('engine')" v-model="filtersChecked.engine" class="input-check__input" type="checkbox">
                                          <span class="input-check__box"></span>
                                          <span class="input-check__icon"><svg width="9px" height="7px">
                                              <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                            </svg>
                                          </span>
                                        </span>
                                      </span>
                                      <span class="filter-list__title">
                                        {{engine.key.toUpperCase()}}
                                      </span>
                                      <span class="filter-list__counter">{{ engine.doc_count}}</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="widget-filters__item">
                          <div class="filter filter--opened" data-collapse-item>
                            <button type="button" class="filter__title" data-collapse-trigger>
                              Фото
                              <span class="filter__arrow"><svg width="12px" height="7px">
                                  <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                </svg></span>
                            </button>
                            <div class="filter__body" data-collapse-content>
                              <div class="filter__container">
                                <div class="filter-list">
                                  <div class="filter-list__list">
                                    <label class="filter-list__item ">
                                      <span @click="showAllPhotos()" class="filter-list__title 
                                                                            has-photo">Показать все</span>
                                      <span class="filter-list__counter">{{products_total_count}}</span>
                                    </label>
                                    <label v-for="photo in filters.has_photo" :key="photo.key" class="filter-list__item ">
                                      <span class="filter-list__input input-radio">
                                        <span class="input-radio__body">
                                          <input v-model="filtersChecked.has_photo" @change="updateCheckFilters('has_photo')" :value="photo.key" class="input-radio__input" name="filter_radio" type="radio">
                                          <span class="input-radio__circle"></span>
                                        </span>
                                      </span>
                                      <span class="filter-list__title">
                                        {{photo.key ? 'Есть фото' : 'Нет фото' }}
                                      </span>
                                      <span class="filter-list__counter">{{ photo.doc_count}}</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="widget-filters__item">
                          <div class="filter filter--opened" data-collapse-item>
                            <button type="button" class="filter__title" data-collapse-trigger>
                              Price
                              <span class="filter__arrow"><svg width="12px" height="7px">
                                  <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                </svg></span>
                            </button>
                            <div class="filter__body" data-collapse-content>
                              <div class="filter__container">
                                <div class="filter-price" data-min="<?= $min_price ?>" data-max="<?= $max_price ?>" data-from="<?= $min_price ?>" data-to="<?= $max_price ?>">
                                  <div class="filter-price__slider"></div>
                                  <div class="filter-price__title-button">
                                    <div class="filter-price__title">&#8381;<span class="filter-price__min-value"></span> – &#8381;<span class="filter-price__max-value"></span></div>
                                    <button type="button" class="btn btn-xs btn-secondary filter-price__button">Filter</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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
                        <select id="view-option-sort" class="form-control form-control-sm" name="price">
                          <option>Цена</option>
                        </select>
                      </div>
                      <!--<div class="view-options__select">
                        <label for="view-option-limit">Показано:</label>
                        <select id="view-option-limit" class="form-control form-control-sm" name="cuantity">
                          <option>20</option>
                        </select>
                      </div>-->
                    </div>
                    <div class="view-options__body view-options__body--filters">
                      <div class="view-options__label">Активные фильтры</div>
                      <div v-cloak class="applied-filters">
                        <ul v-show="activeFilters.length" class="applied-filters__list">
                          <li v-for="active in activeFilters" :key="active.value" class="applied-filters__item">
                            <div class="applied-filters__button applied-filters__button--filter">
                              {{ active.filter}}: {{active.value ? active.value.toUpperCase() : active.value}}
                              <svg class="c-filter-svg" @click="clearFilter(active.eng)" width="9" height="9">
                                <path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z" />
                              </svg>
                            </div>
                          </li>
                          <li class="applied-filters__item">
                            <button @click="clearFilterAll()" type="button" class="applied-filters__button applied-filters__button--clear">Очистить Фильтры</button>
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
                      <?php include(__DIR__ . '/../backend/pages/category/products_snippets.php')
                      ?>
                    </div>
                    <div class="products-list__content">
                      <!-- <div v-if="isLoadingProduct" class="fade-loader">
                                                <h3>Loading...</h3>
                                            </div> -->
                      <div v-if="!isLoadingProduct" v-for="product in products" :key="product._id" class="products-list__item">
                        <div class="product-card">
                          <div class="product-card__actions-list">
                            <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                              </svg>
                            </button>
                            <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                              <svg width="16" height="16">
                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                              </svg>
                            </button>
                            <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                              <svg width="16" height="16">
                                <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                                <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                                <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a :href="`/product/${product._source.slug}/`" class="image__body">
                                <img class="image__tag" v-bind:src="product._source.images.length ? product._source.images[0].img245 : '/assets/images/products/product-default-245.jpg'" :alt="product._source.name">
                              </a>
                            </div>
                            <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                              <div class="status-badge__body">
                                <div class="status-badge__icon"><svg width="13" height="13">
                                    <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                                  </svg>
                                </div>
                                <div class="status-badge__text" style="font-size: 0.8rem;">{{ product._source.name }}</div>
                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                              </div>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> {{product._source.one_c_id}}</div>
                            <div class="product-card__name">
                              <div>
                                <div class="product-card__badges">
                                  <div class="tag-badge tag-badge--sale">sale</div>
                                  <div class="tag-badge tag-badge--new">new</div>
                                  <div class="tag-badge tag-badge--hot">hot</div>
                                </div>
                                <a :href="`/product/${product._source.slug}/`">{{ product._source.name}}</a>
                              </div>
                            </div>
                            <div class="product-card__rating">
                              <div class="product-card__rating-label">{{ product._source.brand.name.toUpperCase()}}</div>
                            </div>
                            <div class="product-card__features">
                              <ul>
                                <!-- Attributes loop start -->
                                <li v-for="attr in product._source.attributes">{{attr.name}}: {{attr.value}}</li>
                                <!-- Attributes loop end -->
                              </ul>
                            </div>
                          </div>
                          <div class="product-card__footer">
                            <div class="product-card__prices">
                              <div v-if="show_price" class="product-card__price product-card__price--current">&#8381; {{(product._source.stocks.length ? product._source.stocks[0].price : 'Звоните!') }}</div>
                              <div v-else class="product-card__price product-card__price--current">&#8381; {{'Звоните!' }}</div>
                            </div>
                            <button class="product-card__addtocart-icon add-to-cart" @click="addToCart(product._source.name, (product._source.length ?? product._source.stocks[0].price), (product._source.images.length ? product._source.images[0].img150 : '/assets/images/products/product-default-160.jpg'), product._source.one_c_id)" type="button" aria-label="Add to cart" id="add_to_cart_GA" :data-sku="product._source.one_c_id" :data-price="product._source.price" :data-name="product._source.name" :data-image="product._source.images.length ? product._source.images[0].img150 : '/assets/images/products/product-default-160.jpg'">
                              <svg width="20" height="20">
                                <circle cx="7" cy="17" r="2" />
                                <circle cx="15" cy="17" r="2" />
                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                              </svg>
                            </button>
                            <button class="product-card__addtocart-full add-to-cart" @click="addToCart(product._source.name, (product._source.length ?? product._source.stocks[0].price), (product._source.images.length ? product._source.images[0].img150 : '/assets/images/products/product-default-160.jpg'), product._source.one_c_id)" type="button" id="add_to_cart_GA" :data-sku="product._source.sku" :data-price="product._source.price" :data-name="product._source.name" :data-image="product._source.images.length ? product._source.images[0].img150 : '/assets/images/products/product-default-160.jpg'">
                              Добавить в Корзину
                            </button>
                            <button class="product-card__wishlist" type="button">
                              <svg width="16" height="16">
                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                              </svg>
                              <span>В Избранное</span>
                            </button>
                            <button class="product-card__compare" type="button">
                              <svg width="16" height="16">
                                <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                                <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                                <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                              </svg>
                              <span>К Сравнению</span>
                            </button>
                          </div>
                        </div>
                      </div>
                      <!-- Loop end -->
                    </div>
                  </div>
                  <!--<div class="products-view__pagination">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item">
                          <button class="page-link page-link--with-arrow" aria-label="Previous" disabled>
                            <span class="page-link__arrow page-link__arrow--left" aria-hidden="true"><svg width="7" height="11">
                                <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                              </svg>
                            </span>
                          </button>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                          <span class="page-link">
                            2
                            <span class="sr-only">(current)</span>
                          </span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item page-item--dots">
                          <div class="pagination__dots"></div>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">9</a></li>
                        <li class="page-item">
                          <a class="page-link page-link--with-arrow" href="" aria-label="Next">
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
                      Showing 6 of 98 products
                    </div>
                  </div>-->

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
