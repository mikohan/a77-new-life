<!-- <div class="widget-filters__list"> -->
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
                <a href="/category/<?= $par_cat['slug'] ?>/"><?= $par_cat['name'] ?></a>
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
                <a id="drils" href="/category/<?= $ct['slug'] ?>/"><?= mb_ucfirst($ct['name']) ?></a>
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
<?php if (count($car_models['buckets'])) : ?>
  <div class="widget-filters__item">
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
              <?php foreach ($car_models['buckets'] as  $model) : ?>
                <label class="filter-list__item ">
                  <span class="input-check filter-list__input">
                    <span class="input-check__body">
                      <input class="input-check__input my-filter" name="car_model" value="<?= $model['key'] ?>" type="checkbox">
                      <span class="input-check__box"></span>
                      <span class="input-check__icon"><svg width="9px" height="7px">
                          <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                        </svg>
                      </span>
                    </span>
                  </span>
                  <span class="filter-list__title">
                    <?= mb_strtoupper($model['key']) ?>
                  </span>
                  <span class="filter-list__counter"><?= $model['doc_count'] ?></span>
                </label>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>
<?php if (count($brands['buckets'])) : ?>
  <div class="widget-filters__item">
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
              <?php foreach ($brands['buckets'] as  $brand) : ?>
                <label class="filter-list__item ">
                  <span class="input-check filter-list__input">
                    <span class="input-check__body">
                      <input class="input-check__input my-filter" name="brand" value="<?= $brand['key'] ?>" type="checkbox">
                      <span class="input-check__box"></span>
                      <span class="input-check__icon"><svg width="9px" height="7px">
                          <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                        </svg>
                      </span>
                    </span>
                  </span>
                  <span class="filter-list__title">
                    <?= mb_strtoupper($brand['key']) ?>
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
<?php endif ?>
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
            <?php foreach ($has_photo['buckets'] as $photo) : ?>
              <label class="filter-list__item ">
                <span class="filter-list__input input-radio">
                  <span class="input-radio__body">
                    <input class="input-radio__input my-filter" name="has_photo" value="<?= $photo['key'] ?>" type="radio">
                    <span class="input-radio__circle"></span>
                  </span>
                </span>
                <span class="filter-list__title">
                  <?= $photo['key'] ? 'Есть фото' : 'Нет фото' ?>
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
<?php if (count($engines['buckets'])) : ?>
  <div class="widget-filters__item">
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
              <?php foreach ($engines['buckets'] as $engine) : ?>
                <label class="filter-list__item ">
                  <span class="filter-list__input input-radio">
                    <span class="input-radio__body">
                      <input class="input-radio__input my-filter" name="engine" value="<?= $engine['key'] ?>" type="radio">
                      <span class="input-radio__circle"></span>
                    </span>
                  </span>
                  <span class="filter-list__title">
                    <?= mb_strtoupper($engine['key']) ?>
                  </span>
                  <span class="filter-list__counter"><?= $engine['doc_count'] ?></span>
                </label>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>
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
        <div class="filter-price" data-min="<?= $min_price ?>" data-max="<?= $max_price ?>" data-from="690" data-to="9000">
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

<!-- </div> -->