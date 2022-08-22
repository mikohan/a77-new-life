<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
  <title>Статьи и мануалы компании Ангара.</title>
  <!-- fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
  <!-- css -->
</head>

<body>
  <!-- site -->
  <div class="site">
    <!-- site__mobile-header -->
    <?php include __DIR__ . '/../backend/includes/header/header.php'; ?>
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
                  <a href="index.html" class="breadcrumb__item-link">Главная</a>
                </li>
                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                  <span class="breadcrumb__item-link">Блог</span>
                </li>
                <li class="breadcrumb__title-safe-area" role="presentation"></li>
              </ol>
            </nav>
            <h1 class="block-header__title">Полезная информация</h1>
          </div>
        </div>
      </div>
      <div class="block blog-view blog-view--layout--grid">
        <div class="container">
          <div class="blog-view__body">
            <div class="blog-view__item blog-view__item-posts">
              <div class="block posts-view">
                <div class="posts-view__list posts-list posts-list--layout--grid-2">
                  <div class="posts-list__body">
                    <?php foreach ($articles as $article) : ?>
                      <?php
                      $date_obj = new DateTime($article['date']);
                      $date = $date_obj->format('Y F d');
                      $mark = 'Запчасти';
                      if ($article['search_frase']) {
                        $mark = mb_strtoupper($article['search_frase']);
                      }
                      $article_title = $article['title']['rendered'];
                      $article_img = $article['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['large']['source_url'];

                      $post_author_name = $article['_embedded']['author'][0]['name'];
                      $post_author_avatar = $article['_embedded']['author'][0]['avatar_urls'][96];
                      $category_name = $article['_embedded']['wp:term'][0][0]['name'];

                      ?>
                      <div class="posts-list__item">
                        <div class="post-card post-card--layout--grid-sm">
                          <div class="post-card__image">
                            <a href="/blog/<?= $article['id'] ?>/">
                              <img src="<?= $article_img ?>" alt="<?= $article_title ?>">
                            </a>
                          </div>
                          <div class="post-card__content">
                            <div class="post-card__category">
                              <a href="/search/?search=<?= $category_name ?>"><?= $category_name ?></a>
                            </div>
                            <div class="post-card__title">
                              <h2><a href="/blog/<?= $article['id'] ?>/"><?= $article_title ?></a></h2>
                            </div>
                            <div class="post-card__date">
                              Автор <a href=""><?= $post_author_name ?></a> on <?= $date ?>
                            </div>
                            <div class="post-card__excerpt">
                              <div class="typography">
                                <!-- tilte goes herer -->
                              </div>
                            </div>
                            <div class="post-card__more">
                              <a href="/blog/<?= $article['id'] ?>/" class="btn btn-secondary btn-sm">Читать далее...</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>
                <?php
                // pagination
                $total_posts = $articles[0]['page_info']['X-WP-Total'];
                $total_pages = $articles[0]['page_info']['X-WP-TotalPages'];
                $current_page = intval($_GET['page_number']) ?? null;
                $pages_array = [];
                if ($current_page > 3 and $total_pages >= 6) {
                  $pages_array[] = $current_page - 2;
                  $pages_array[] = $current_page - 1;
                  $pages_array[] = $current_page;
                  if ($current_page <= $total_pages - 1) {
                    $pages_array[] = $current_page + 1;
                  }
                  if ($current_page <= $total_pages - 2) {
                    $pages_array[] = $current_page + 2;
                  }
                } else {
                  $pages_array = range(1, $total_pages);
                }
                if ($pages_array === 1) {
                  unset($pages_array);
                }
                p($pages_array);




                ?>
                <div class="posts-view__pagination">
                  <ul class="pagination">
                    <li class="page-item <?= (intval($current_page)) <= 1 ? 'disabled' : '' ?>">
                      <a class="page-link page-link--with-arrow" href="<?= ($current_page >= 2) ? '/blog/?page_number=' . strval($current_page - 1)  : '' ?>" aria-label="Previous">
                        <span class="page-link__arrow page-link__arrow--left" aria-hidden="true"><svg width="7" height="11">
                            <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                          </svg>
                        </span>
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="/blog/?page_number=1">1</a></li>
                    <?php foreach ($pages_array as $p) : ?>
                      <li class="page-item">
                        <?php $check_current = intval($current_page) == intval($p); ?>
                        <?php if ($check_current) : ?>
                      <li class="page-item active" aria-current="page">
                        <span class="page-link">
                          <?= $p ?>
                          <span class="sr-only">(current)</span>
                        </span>
                      </li>
                    <?php else : ?>
                      <a class="page-link" href="/blog/?page_number=<?= $p ?>"><?= $p ?></a>
                    <?php endif ?>

                    </li>
                  <?php endforeach ?>
                  <li class="page-item page-item--dots">
                    <div class="pagination__dots"></div>
                  </li>
                  <li class="page-item"><a class="page-link" href="/blog/?page_number=<?= $total_pages ?>"><?= $total_pages ?></a></li>
                  <li class="page-item <?= (intval($current_page) === intval($total_pages)) ? 'disabled' : '' ?>">
                    <a class="page-link page-link--with-arrow" href="<?= ($current_page !== intval($total_pages)) ? '/blog/?page_number=' . strval($current_page + 1)  : '' ?>" aria-label="Next">
                      <span class="page-link__arrow page-link__arrow--right" aria-hidden="true"><svg width="7" height="11">
                          <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                        </svg>
                      </span>
                    </a>
                  </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="blog-view__item blog-view__item-sidebar">
              <div class="card widget widget-search">
                <form action="" class="widget-search__form">
                  <input class="widget-search__input" type="search" placeholder="Blog search...">
                  <button class="widget-search__button"><svg width="20" height="20">
                      <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                    </svg>
                  </button>
                  <div class="widget-search__field"></div>
                </form>
              </div>
              <div class="card widget widget-about-us">
                <div class="widget__header">
                  <h4>О Блоге</h4>
                </div>
                <div class="widget-about-us__body">
                  <div class="widget-about-us__text">
                    В нашем блоге мы публикуем статьи по ремонту и эксплуатации автомобилей а так же руководства по ремонту и полезные советы для автовладельцев.
                  </div>
                  <div class="widget-about-us__social-links social-links">
                    <ul class="social-links__list">
                      <li class="social-links__item social-links__item--youtube">
                        <a href="http://www.youtube.com/channel/UCJ97RljnqyAdKKmAc8mvHZw" target="_blank">
                          <i class="widget-social__icon fab fa-youtube"></i>
                        </a>
                      </li>
                      <!--<li class="social-links__item social-links__item--facebook">
                        <a href="https://www.facebook.com/groups/angara77/media/" target="_blank">
                          <i class="widget-social__icon fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <li class="social-links__item social-links__item--twitter">
                        <a href="https://twitter.com/angara_digital" target="_blank">
                          <i class="widget-social__icon fab fa-twitter"></i>
                        </a>
                      </li>-->
                      <li class="social-links__item social-links__item--instagram">
                        <a href="https://vk.com/angara772018" target="_blank">
                          <i class="widget-social__icon fab fa-vk"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card widget widget-categories">
                <div class="widget__header">
                  <h4>Категории</h4>
                </div>
                <ul class="widget-categories__list widget-categories__list--root" data-collapse data-collapse-opened-class="widget-categories__item--open">
                  <?php foreach ($categories as $cat) : ?>
                    <li class="widget-categories__item" data-collapse-item>
                      <a href="/blog/?category_id=<?= $cat['id'] ?>" class="widget-categories__link">
                        <?= mb_strtoupper($cat['name']) ?>
                      </a>
                    </li>
                  <?php endforeach ?>
                </ul>
              </div>
              <div class="card widget widget-posts">
                <div class="widget__header">
                  <h4>Последние посты</h4>
                </div>
                <ul class="widget-posts__list">
                  <?php foreach ($latest_posts as $latest_post) : ?>
                    <?php
                    $lp_date_obj = new DateTime($latest_post['date']);
                    $lp_date = $lp_date_obj->format('Y F d');
                    $main_image = $latest_post['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['thumbnail']['source_url'];
                    ?>
                    <li class="widget-posts__item">
                      <div class="widget-posts__image">
                        <a href="/blog/<?= $latest_post['id'] ?>/">
                          <img style="width: 70px; height: auto;" src="<?= $main_image ?>" alt="<?= $latest_post['title']['rendered'] ?>">
                        </a>
                      </div>
                      <div class="widget-posts__info">
                        <div class="widget-posts__name">
                          <a href="/blog/<?= $latest_post['id'] ?>/"><?= $latest_post['title']['rendered'] ?></a>
                        </div>
                        <div class="widget-posts__date"><?= $lp_date ?></div>
                      </div>
                    </li>
                  <?php endforeach ?>

                </ul>
              </div>
              <div class="widget widget-newsletter">
                <div class="widget-newsletter__title">
                  <h4>Подписка</h4>
                </div>
                <div class="widget-newsletter__form">
                  <form action="">
                    <div class="widget-newsletter__text">
                      Устаревшая тема, оставим для красоты
                    </div>
                    <input type="text" class="widget-newsletter__email" placeholder="Мыло...">
                    <button type="button" class="widget-newsletter__button">Подписаться</button>
                  </form>
                </div>
              </div>
              <div class="card widget widget-comments">
                <div class="widget__header">
                  <h4>Последние комментарии</h4>
                </div>
                <div class="widget-comments__body">
                  <ul class="widget-comments__list">
                    <li class="widget-comments__item">
                      <div class="widget-comments__author"><a href="">Брюс Вилис</a></div>
                      <div class="widget-comments__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge...</div>
                      <div class="widget-comments__meta">
                        <div class="widget-comments__date">3 minutes ago</div>
                        <div class="widget-comments__name">On <a href="" title="Nullam at varius sapien sed sit amet condimentum elit">Nullam at varius sapien sed sit amet condimentum elit</a></div>
                      </div>
                    </li>
                    <li class="widget-comments__item">
                      <div class="widget-comments__author"><a href="">Анжелина Джоли</a></div>
                      <div class="widget-comments__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge...</div>
                      <div class="widget-comments__meta">
                        <div class="widget-comments__date">25 minutes ago</div>
                        <div class="widget-comments__name">On <a href="" title="Integer efficitur efficitur velit non pulvinar pellentesque dictum viverra">Integer efficitur efficitur velit non pulvinar pellentesque dictum viverra</a></div>
                      </div>
                    </li>
                    <li class="widget-comments__item">
                      <div class="widget-comments__author"><a href="">Джони Деп</a></div>
                      <div class="widget-comments__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge...</div>
                      <div class="widget-comments__meta">
                        <div class="widget-comments__date">2 hours ago</div>
                        <div class="widget-comments__name">On <a href="" title="Curabitur quam augue vestibulum in mauris fermentum pellentesque libero">Curabitur quam augue vestibulum in mauris fermentum pellentesque libero</a></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card widget-tags widget">
                <div class="widget__header">
                  <h4>Облако тегов</h4>
                </div>
                <div class="widget-tags__body tags">
                  <div class="tags__list">
                    <?php foreach ($tags as $tag) : ?>
                      <a href=""><?= $tag ?></a>
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
    <!-- site__footer -->
    <?php include __DIR__ . '/../backend/includes/footer/footer.php'; ?>

    <!-- site__footer / end -->
  </div>
  <!-- site / end -->
  <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php'; ?>

</body>

</html>
