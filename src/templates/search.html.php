<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
  <title>Поиск запчастей ✰ в интернет магазине Запчастей в Москве ✈ <?= $search ?> ☎ <?= TELEPHONE_FREE ?></title>
  <meta name="description" content="Всегда 97% запчастей в наличии на складе. ☎ <?= TELEPHONE_FREE ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
  <meta name="robots" content="noindex" />
  <meta name="robots" content="nofollow" />
  <style>
    .applied-filters__item {
      cursor: pointer;
    }
  </style>
</head>

<body>
  <!-- site -->
  <div class="site" id="app">
    <!-- site__header -->
    <?php include __DIR__ . '/../backend/includes/header/header.php' ?>
    <!-- site__header / end -->
    <!-- site__body -->
    <div class="site__body">
      <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
          <div class="block-header__body">
            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
              <ol class="breadcrumb__list">
                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                  <a href="/" class="breadcrumb__item-link">Главная</a>
                </li>
                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                  <span class="breadcrumb__item-link">Поиск</span>
                </li>
                <li class="breadcrumb__title-safe-area" role="presentation"></li>
              </ol>
            </nav>
            <h1 class="block-header__title">Поиск <?= $search ?? 'Что ищем?' ?></h1>
          </div>
        </div>
      </div>
      <div class="block-split">
        <div class="sidebar sidebar--offcanvas--always">
          <div class="sidebar__backdrop"></div>
          <div class="sidebar__body">
            <div class="sidebar__header">
              <div class="sidebar__title">Фильтры</div>
              <button aria-label="hide filters" class="sidebar__close" type="button"><svg width="12" height="12">
                  <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
                </svg>
              </button>
            </div>
            <form name="filter-form" id="id-filter-form" action="" method="GET">
              <div class="sidebar__content">
                <div class="widget widget-filters widget-filters--offcanvas--always" data-collapse data-collapse-opened-class="filter--opened">
                  <div class="widget-filters__actions d-flex">
                    <button aria-label="Применить фильтры" id="apply-button" class="btn btn-primary btn-sm">Применить</button>
                    <button aria-label="Сбросить фильтры" class="btn btn-secondary btn-sm reset-button">Сбросить</button>
                    <input type hidden name="search" value="<?= $search ?>" />
                  </div>
                  <div class="widget__header widget-filters__header">
                    <h4>Фильтры</h4>
                  </div>
                  <div class="widget-filters__list">
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button aria-label="Покзать фильтр машина" type="button" class="filter__title" data-collapse-trigger>
                          Машина
                          <span class="filter__arrow"><svg width="12px" height="7px">
                              <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                            </svg></span>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-list">
                              <div class="filter-list__list">
                                <?php foreach ($car_models['buckets'] as $car) : ?>
                                  <label class="filter-list__item ">
                                    <span class="input-check filter-list__input">
                                      <span class="input-check__body">
                                        <input class="input-check__input" type="checkbox" name="model" value="<?= $car['key'] ?>">
                                        <span class="input-check__box"></span>
                                        <span class="input-check__icon"><svg width="9px" height="7px">
                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                          </svg>
                                        </span>
                                      </span>
                                    </span>
                                    <span class="filter-list__title">
                                      <?= $car['key'] ? mb_strtoupper($car['key']) : '' ?>
                                    </span>
                                    <span class="filter-list__counter"><?= $car['doc_count'] ?></span>
                                  </label>
                                <?php endforeach ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button aria-label="Показать бренд" type="button" class="filter__title" data-collapse-trigger>
                          Бренд
                          <span class="filter__arrow"><svg width="12px" height="7px">
                              <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                            </svg></span>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-list">
                              <div class="filter-list__list">
                                <?php foreach ($brands['buckets'] as $brand) : ?>
                                  <label class="filter-list__item ">
                                    <span class="input-check filter-list__input">
                                      <span class="input-check__body">
                                        <input class="input-check__input" type="checkbox" name="brand" value="<?= $brand['key'] ?>">
                                        <span class="input-check__box"></span>
                                        <span class="input-check__icon"><svg width="9px" height="7px">
                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                          </svg>
                                        </span>
                                      </span>
                                    </span>
                                    <span class="filter-list__title">
                                      <?= $brand['key'] ? mb_strtoupper($brand['key']) : '' ?>
                                    </span>
                                    <span class="filter-list__counter"><?= $brand['doc_count'] ?></span>
                                  </label>
                                <?php endforeach ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button aria-label="Показать есть фото" type="button" class="filter__title" data-collapse-trigger>
                          Фото
                          <span class="filter__arrow"><svg width="12px" height="7px">
                              <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                            </svg></span>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-list">
                              <div class="filter-list__list">
                                <?php foreach ($has_photo['buckets'] as $photo) : ?>
                                  <label class="filter-list__item ">
                                    <span class="input-check filter-list__input">
                                      <span class="input-check__body">
                                        <input class="input-check__input" type="checkbox" name="has_photo" value="<?= $photo['key'] ?>">
                                        <span class="input-check__box"></span>
                                        <span class="input-check__icon"><svg width="9px" height="7px">
                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                          </svg>
                                        </span>
                                      </span>
                                    </span>
                                    <span class="filter-list__title">
                                      <?= $photo['key'] ? "Есть" : 'Нет' ?>
                                    </span>
                                    <span class="filter-list__counter"><?= $photo['doc_count'] ?></span>
                                  </label>
                                <?php endforeach ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="widget-filters__item">
                      <div class="filter filter--opened" data-collapse-item>
                        <button aria-label="Показать цвет" type="button" class="filter__title" data-collapse-trigger>
                          Цвет
                          <span class="filter__arrow"><svg width="12px" height="7px">
                              <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                            </svg></span>
                        </button>
                        <div class="filter__body" data-collapse-content>
                          <div class="filter__container">
                            <div class="filter-color">
                              <div class="filter-color__list">
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  input-check-color--white  " style="color: #fff;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color   input-check-color--light " style="color: #d9d9d9;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #b3b3b3;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #808080;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #666;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #4d4d4d;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #262626;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #ff4040;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox" checked>
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #ff8126;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color   input-check-color--light " style="color: #ffd440;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color   input-check-color--light " style="color: #becc1f;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #8fcc14;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox" checked>
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #47cc5e;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #47cca0;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #47cccc;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #40bfff;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox" disabled>
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #3d6dcc;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox" checked>
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #7766cc;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #b852cc;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                                <label class="filter-color__item">
                                  <span class="filter-color__check input-check-color  " style="color: #e53981;">
                                    <label class="input-check-color__body">
                                      <input class="input-check-color__input" type="checkbox">
                                      <span class="input-check-color__box"></span>
                                      <span class="input-check-color__icon"><svg width="12px" height="9px">
                                          <path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" />
                                        </svg></span>
                                      <span class="input-check-color__stick"></span>
                                    </label>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="container">
          <div class="block-split__row row no-gutters">
            <div class="block-split__item block-split__item-content col-auto" style="width: 100%;">
              <div class="block">
                <div class="products-view">
                  <div class="products-view__options view-options view-options--offcanvas--always">
                    <div class="view-options__body">
                      <button aria-label="Показать клеткой" type="button" class="view-options__filters-button filters-button">
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
                          <button aria-label="Показать расширенной клеткой" type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="grid" data-with-features="false">
                            <svg width="16" height="16">
                              <path d="M15.2,16H9.8C9.4,16,9,15.6,9,15.2V9.8C9,9.4,9.4,9,9.8,9h5.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
	H9.8C9.4,7,9,6.6,9,6.2V0.8C9,0.4,9.4,0,9.8,0h5.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z M6.2,16H0.8
	C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h5.4C6.6,9,7,9.4,7,9.8v5.4C7,15.6,6.6,16,6.2,16z M6.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8
	C0,0.4,0.4,0,0.8,0h5.4C6.6,0,7,0.4,7,0.8v5.4C7,6.6,6.6,7,6.2,7z" />
                            </svg>
                          </button>
                          <button aria-label="Показать сеткой" type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true">
                            <svg width="16" height="16">
                              <path d="M16,0.8v14.4c0,0.4-0.4,0.8-0.8,0.8H9.8C9.4,16,9,15.6,9,15.2V0.8C9,0.4,9.4,0,9.8,0l5.4,0C15.6,0,16,0.4,16,0.8z M7,0.8
	v14.4C7,15.6,6.6,16,6.2,16H0.8C0.4,16,0,15.6,0,15.2L0,0.8C0,0.4,0.4,0,0.8,0l5.4,0C6.6,0,7,0.4,7,0.8z" />
                            </svg>
                          </button>
                          <button aria-label="Показать расширенной сеткой" type="button" class="layout-switcher__button" data-layout="list" data-with-features="false">
                            <svg width="16" height="16">
                              <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h14.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
	H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z" />
                            </svg>
                          </button>
                          <button aria-label="Показать таблицей" type="button" class="layout-switcher__button" data-layout="table" data-with-features="false">
                            <svg width="16" height="16">
                              <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2v-2.4C0,12.4,0.4,12,0.8,12h14.4c0.4,0,0.8,0.4,0.8,0.8v2.4C16,15.6,15.6,16,15.2,16z
	 M15.2,10H0.8C0.4,10,0,9.6,0,9.2V6.8C0,6.4,0.4,6,0.8,6h14.4C15.6,6,16,6.4,16,6.8v2.4C16,9.6,15.6,10,15.2,10z M15.2,4H0.8
	C0.4,4,0,3.6,0,3.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v2.4C16,3.6,15.6,4,15.2,4z" />
                            </svg>
                          </button>
                        </div>
                      </div>
                      <div class="view-options__legend">
                        Показано <?= $products_count ?> из <?= $products_total ?> продуктов
                      </div>
                      <div class="view-options__spring"></div>
                      <div class="view-options__select">
                        <label for="view-option-sort">Сортировка:</label>
                        <select id="view-option-sort" class="form-control form-control-sm" name="">
                          <option value="">Цена</option>
                        </select>
                      </div>
                      <div class="view-options__select">
                        <label for="view-option-limit">Показать:</label>
                        <select id="view-option-limit" class="form-control form-control-sm" name="">
                          <option value="">16</option>
                        </select>
                      </div>
                    </div>
                    <div class="view-options__body view-options__body--filters">
                      <div class="view-options__label">Активные фильтры</div>
                      <div class="applied-filters">
                        <ul class="applied-filters__list">
                          <?php if (isset($_GET['model'])) : ?>
                            <li class="applied-filters__item">
                              <span class="applied-filters__button applied-filters__button--filter">
                                Машина: <?= mb_strtoupper($_GET['model']) ?>
                                <svg width="9" height="9">
                                  <path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z" />
                                </svg>
                              </span>
                            </li>
                          <?php endif ?>
                          <?php if (isset($_GET['brand'])) : ?>
                            <li class="applied-filters__item">
                              <span class="applied-filters__button applied-filters__button--filter">
                                Бренд: <?= $_GET['brand'] ?>
                                <svg width="9" height="9">
                                  <path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z" />
                                </svg>
                              </span>
                            </li>
                          <?php endif ?>
                          <?php if (isset($_GET['has_photo'])) : ?>
                            <li class="applied-filters__item">
                              <span class="applied-filters__button applied-filters__button--filter">
                                Фото: <?= $_GET['has_photo'] ? "Есть" : "Нет" ?>
                                <svg width="9" height="9">
                                  <path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z" />
                                </svg>
                              </span>
                            </li>
                          <?php endif ?>
                          <li class="applied-filters__item">
                            <button aria-label="Очистить все фильтры" type="button" class="applied-filters__button applied-filters__button--clear reset-button">Очистить Все</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="products-view__list products-list products-list--grid--6" data-layout="grid" data-with-features="false">
                    <div class="products-list__head">
                      <div class="products-list__column products-list__column--image">Image</div>
                      <div class="products-list__column products-list__column--meta">SKU</div>
                      <div class="products-list__column products-list__column--product">Product</div>
                      <div class="products-list__column products-list__column--rating">Rating</div>
                      <div class="products-list__column products-list__column--price">Price</div>
                    </div>
                    <div id="root-div" class="products-list__content" style="width: 100%;">
                      <?php foreach ($parts_array as $tmp) : ?>
                        <?php
                        $part = $tmp['_source'];
                        $img = count($part['images']) ? $part['images'][0]['img245'] : "/assets/images/products/product-default-245.jpg";
                        $model = count($part['model']) ? $part['model'][0]['name'] : '';
                        $make = count($part['model']) ? $part['model'][0]['make']['name'] : '';
                        $name = $part['full_name'] ? $part['full_name'] : $part['name'];
                        $name = $name . " " . mb_ucfirst($make) . " " . mb_ucfirst($model);
                        $sku = $part['one_c_id'];
                        $rating = $part['rating']['ratingAvg'] ??  5;
                        $attributes = $part['attributes'] ? $part['attributes'] : array();
                        $price = count($part['stocks']) ? $part['stocks'][0]['price'] : 'Звоните!';
                        $cat_number = $part['cat_number'] ? $part['cat_number'] : '/';
                        $link = "/product/{$part['slug']}/";
                        $brand = $part['brand'] ? $part['brand']['name'] : '';
                        $country = $part['brand'] ? $part['brand']['country'] : '';
                        $data_array = '';
                        if (count($part['images'])) {
                          foreach ($part['images'] as $image) {
                            $lnk =  $image['img500'] . ',';
                            $data_array .= $lnk;
                          }
                        }
                        $d_arr = rtrim($data_array, ',');
                        // Tmb array
                        $tmb_array = '';
                        if (count($part['images'])) {
                          foreach ($part['images'] as $image) {
                            $lnk =  $image['img150'] . ',';
                            $tmb_array .= $lnk;
                          }
                        }
                        $t_arr = rtrim($tmb_array, ',');
                        ?>
                        <div class="products-list__item">
                          <div class="product-card">
                            <div class="product-card__actions-list">
                              <button aria-label="Быстрый просмотр" class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view" data-name="<?= $name ?>" data-price="<?= $price ?>" data-images="<?= $d_arr ?>" data-tmbs="<?= $t_arr ?>" data-sku="<?= $sku ?>" data-catnumber="<?= $cat_number ?>" data-rating="<?= $rating ?>" data-brand="<?= $brand ?>" data-country="<?= $country ?>">
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
                                <a href="<?= $link ?>" class="image__body">
                                  <img class="image__tag" src="<?= $img ?>" alt="<?= $name ?>" title="<?= $name ?>">
                                </a>
                              </div>
                              <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                <div class="status-badge__body">
                                  <div class="status-badge__icon"><svg width="13" height="13">
                                      <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                                    </svg>
                                  </div>
                                  <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                  <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                </div>
                              </div>
                            </div>
                            <div class="product-card__info">
                              <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> <?= $sku ?></div>
                              <div class="product-card__name">
                                <div>
                                  <a style="font-size: 0.9rem;" href="<?= $u->product($part['slug']) ?>"><?= $name ?></a>
                                </div>
                              </div>
                              <div class="product-card__rating">
                                <div class="rating product-card__rating-stars">
                                  <div class="rating__body">
                                    <?php foreach (range(1, $rating) as $r) : ?>
                                      <div class="rating__star rating__star--active"></div>
                                    <?php endforeach ?>
                                  </div>
                                </div>
                                <div class="product-card__rating-label"><?= $rating ?> on many reviews</div>
                              </div>
                              <div class="product-card__features">
                                <ul>
                                  <?php foreach ($attributes as $attribute) : ?>
                                    <li><?= $attribute['name'] ?>: <?= $attribute['value'] ?></li>
                                  <?php endforeach ?>
                                </ul>
                              </div>
                            </div>
                            <div class="product-card__footer">
                              <div class="product-card__prices">
                                <div class="product-card__price product-card__price--current">&#8381; <?= $price ?></div>
                              </div>
                              <button class="product-card__addtocart-icon add-to-cart" type="button" aria-label="Add to cart" id="add_to_cart_GA" data-sku="<?= $sku ?>" data-price="<?= $price ?>" data-name="<?= $name ?>" data-image="<?= $img ?>">
                                <svg width="20" height="20">
                                  <circle cx="7" cy="17" r="2" />
                                  <circle cx="15" cy="17" r="2" />
                                  <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                                </svg>
                              </button>
                              <button aria-label="Добавить в корзину" class="product-card__addtocart-full add-to-cart" type="button" id="add_to_cart_GA" data-price="<?= $price ?>" data-name="<?= $name ?>" data-image="<?= $img ?>" data-sku="<?= $sku ?>">
                                В Корзину
                              </button>
                              <button aria-label="Добавить в избранное" class="product-card__wishlist" type="button">
                                <svg width="16" height="16">
                                  <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                                </svg>
                                <span>Добавть в избранное</span>
                              </button>
                              <button aria-label="Добавить к сравнению" class="product-card__compare" type="button">
                                <svg width="16" height="16">
                                  <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                                  <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                                  <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                                </svg>
                                <span>Добавить к сравнению</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="products-view__pagination">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item disabled">
                          <a class="page-link page-link--with-arrow" href="" aria-label="Previous">
                            <span class="page-link__arrow page-link__arrow--left" aria-hidden="true"><svg width="7" height="11">
                                <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                              </svg>
                            </span>
                          </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item" aria-current="page">
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
                      Показано <?= $products_count ?> из <?= $products_total ?>
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
  <!-- mobile-menu/start -->
  <?php include __DIR__ . '/../templates/mobileMenu.html.php'; ?>
  <!-- mobile-menu / end -->
  <!-- quickview-modal -->
  <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
  <!-- quickview-modal / end -->
  <!-- add-vehicle-modal -->
</body>

</html>
