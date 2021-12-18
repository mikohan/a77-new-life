<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <link rel="icon" type="image/png" href="/assets/images/favicon.png" />
  <title><?= $post['title'] ?> - Ангара77 Запчасти</title>
  <meta name="description" content="<?= mb_ucfirst($post['title']) ?>. Всегда 97% запчастей в наличии на складе. ☎ <?= TELEPHONE_FREE ?>">
  <!-- fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
</head>

<body>
  <!-- site -->
  <div class="site">
    <?php include __DIR__ . '/../backend/includes/header/header.php'; ?>
    <!-- site__header / end -->
    <!-- site__body -->
    <div class="site__body">
      <div class="block post-view">
        <div class="post-view__header post-header post-header--has-image">
          <div class="post-header__image" style="background-image: url('/assets/images/posts/post-default-1903x500.jpg');"></div>
          <div class="post-header__body">
            <div class="post-header__categories">
              <ul class="post-header__categories-list">
                <li class="post-header__categories-item">
                  <a href="<?= $u->blog() ?>" class="post-header__categories-link">Последние Новости</a>
                </li>
              </ul>
            </div>
            <h1 class="post-header__title"><?= $post['title'] ?></h1>
            <div class="post-header__meta">
              <ul class="post-header__meta-list">
                <li class="post-header__meta-item">Автор <a href="" class="post-header__meta-link"><?= $post['author'] ?? 'Angara Parts' ?></a></li>
                <li class="post-header__meta-item"><?= $post_date ?></li>
                <li class="post-header__meta-item"><a href="" class="post-header__meta-link"><?= $post['view'] ?> Просмотров</a></li>
              </ul>
            </div>
          </div>
          <div class="decor post-header__decor decor--type--bottom">
            <div class="decor__body">
              <div class="decor__start"></div>
              <div class="decor__end"></div>
              <div class="decor__center"></div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="post-view__body">
            <div class="post-view__item post-view__item-post">
              <div class="post-view__card post">
                <div class="post__body typography">
                  <?= $post['text'] ?>
                </div>
                <div class="post__pagination">
                  <div class="post__pagination-title">
                    Pages
                  </div>
                  <div class="post__pagination-list">
                    <ul>
                      <li><span class="post__pagination-link post__pagination-link--current">1</span></li>
                      <li><a href="" class="post__pagination-link">2</a></li>
                      <li><a href="" class="post__pagination-link">3</a></li>
                    </ul>
                  </div>
                </div>
                <div class="post__footer">
                  <div class="post__tags tags tags--sm">
                    <div class="tags__list">
                      <?php foreach ($tags as $tag) : ?>
                        <a href="">Promotion</a>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="post__share-links share-links">
                    <ul class="share-links__list">
                      <li class="share-links__item share-links__item--type--like"><a href="">Like</a></li>
                      <li class="share-links__item share-links__item--type--tweet"><a href="">Tweet</a></li>
                      <li class="share-links__item share-links__item--type--pin"><a href="">Pin It</a></li>
                      <li class="share-links__item share-links__item--type--counter"><a href="">4K</a></li>
                    </ul>
                  </div>
                </div>
                <div class="post__author">
                  <div class="post__author-avatar">
                    <img src="/assets/images/avatars/avatar-4-70x70.jpg" alt="">
                  </div>
                  <div class="post__author-info">
                    <div class="post__author-name">
                      <?= $post['author'] ?>
                    </div>
                    <div class="post__author-about">
                      <?= $post['title'] ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="post-view__card post-navigation">
                <div class="post-navigation__body">
                  <a class="post-navigation__item post-navigation__item--prev" href="<?= $prev_link ?>">
                    <div class="post-navigation__item-image">
                      <img src="/assets/images/posts/post-2-80x80.jpg" alt="<?= $prev_title ?>">
                    </div>
                    <div class="post-navigation__item-info">
                      <div class="post-navigation__direction">
                        <div class="post-navigation__direction-arrow">
                          <svg width="7" height="11">
                            <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                          </svg>
                        </div>
                        <div class="post-navigation__direction-title">
                          Предыдущий пост
                        </div>
                      </div>
                      <div class="post-navigation__item-title">
                        <?= $prev_title ?>
                      </div>
                    </div>
                  </a>
                  <a class="post-navigation__item post-navigation__item--next" href="<?= $next_link ?>">
                    <div class="post-navigation__item-info">
                      <div class="post-navigation__direction">
                        <div class="post-navigation__direction-title">
                          Следущий пост
                        </div>
                        <div class="post-navigation__direction-arrow">
                          <svg width="7" height="11">
                            <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                          </svg>
                        </div>
                      </div>
                      <div class="post-navigation__item-title">
                        <?= $next_title ?>
                      </div>
                    </div>
                    <div class="post-navigation__item-image">
                      <img src="/assets/images/posts/post-3-80x80.jpg" alt="<?= $next_title ?>">
                    </div>
                  </a>
                </div>
              </div>
              <div class="post-view__card">
                <h2 class="post-view__card-title">Comments (4)</h2>
                <div class="post-view__card-body comments-view">
                  <ol class="comments-list comments-list--level--0 comments-view__list">
                    <li class="comments-list__item">
                      <div class="comment">
                        <div class="comment__body">
                          <div class="comment__avatar">
                            <img src="/assets/images/avatars/avatar-1-38x38.jpg" alt="">
                          </div>
                          <div class="comment__meta">
                            <div class="comment__author">
                              Jessica Moore
                            </div>
                            <div class="comment__date">
                              November 30, 2018
                            </div>
                          </div>
                          <div class="comment__reply">
                            <button type="button" class="btn btn-xs btn-light">Reply</button>
                          </div>
                          <div class="comment__content typography">
                            Aliquam ullamcorper elementum sagittis. Etiam lacus lacus, mollis in mattis in, vehicula eu nulla. Nulla nec tellus pellentesque.
                          </div>
                        </div>
                      </div>
                      <div class="comments-list__children">
                        <ol class="comments-list comments-list--level--1">
                          <li class="comments-list__item">
                            <div class="comment">
                              <div class="comment__body">
                                <div class="comment__avatar">
                                  <img src="/assets/images/avatars/avatar-2-38x38.jpg" alt="">
                                </div>
                                <div class="comment__meta">
                                  <div class="comment__author">
                                    Adam Taylor
                                  </div>
                                  <div class="comment__date">
                                    December 4, 2018
                                  </div>
                                </div>
                                <div class="comment__reply">
                                  <button type="button" class="btn btn-xs btn-light">Reply</button>
                                </div>
                                <div class="comment__content typography">
                                  Ut vitae finibus nisl, suscipit porttitor urna. Integer efficitur efficitur velit non pulvinar. Aliquam blandit volutpat arcu vel tristique. Integer commodo ligula id augue tincidunt faucibus.
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="comments-list__item">
                            <div class="comment">
                              <div class="comment__body">
                                <div class="comment__avatar">
                                  <img src="/assets/images/avatars/avatar-3-38x38.jpg" alt="">
                                </div>
                                <div class="comment__meta">
                                  <div class="comment__author">
                                    Helena Garcia
                                  </div>
                                  <div class="comment__date">
                                    December 12, 2018
                                  </div>
                                </div>
                                <div class="comment__reply">
                                  <button type="button" class="btn btn-xs btn-light">Reply</button>
                                </div>
                                <div class="comment__content typography">
                                  Suspendisse dignissim luctus metus vitae aliquam. Vestibulum sem odio, ullamcorper a imperdiet a, tincidunt sed lacus. Sed magna felis, consequat a erat ut, rutrum finibus odio.
                                </div>
                              </div>
                            </div>
                          </li>
                        </ol>
                      </div>
                    </li>
                    <li class="comments-list__item">
                      <div class="comment">
                        <div class="comment__body">
                          <div class="comment__avatar">
                            <img src="/assets/images/avatars/avatar-4-38x38.jpg" alt="">
                          </div>
                          <div class="comment__meta">
                            <div class="comment__author">
                              Ryan Ford
                            </div>
                            <div class="comment__date">
                              December 5, 2018
                            </div>
                          </div>
                          <div class="comment__reply">
                            <button type="button" class="btn btn-xs btn-light">Reply</button>
                          </div>
                          <div class="comment__content typography">
                            Nullam at varius sapien. Sed sit amet condimentum elit.
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="comments-list__item">
                      <div class="comment">
                        <div class="comment__body">
                          <div class="comment__avatar">
                            <img src="/assets/images/avatars/avatar-3-38x38.jpg" alt="">
                          </div>
                          <div class="comment__meta">
                            <div class="comment__author">
                              Helena Garcia
                            </div>
                            <div class="comment__date">
                              December 12, 2018
                            </div>
                          </div>
                          <div class="comment__reply">
                            <button type="button" class="btn btn-xs btn-light">Reply</button>
                          </div>
                          <div class="comment__content typography">
                            Suspendisse dignissim luctus metus vitae aliquam. Vestibulum sem odio, ullamcorper a imperdiet a, tincidunt sed lacus. Sed magna felis, consequat a erat ut, rutrum finibus odio.
                          </div>
                        </div>
                      </div>
                    </li>
                  </ol>
                  <div class="comments-view__pagination">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link page-link--with-arrow" href="" aria-label="Previous">
                          <span class="page-link__arrow page-link__arrow--left" aria-hidden="true"><svg width="7" height="11">
                              <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                            </svg>
                          </span>
                        </a>
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
                  </div>
                </div>
              </div>
              <div class="post-view__card">
                <h2 class="post-view__card-title">Комментарии отключены</h2>
                <form class="post-view__card-body">
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="comment-first-name">Имя</label>
                      <input type="text" class="form-control" id="comment-first-name" placeholder="Имя">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="comment-last-name">Фамилия</label>
                      <input type="text" class="form-control" id="comment-last-name" placeholder="Фамилия">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="comment-email">Email Address</label>
                      <input type="email" class="form-control" id="comment-email" placeholder="Email Address">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="comment-content">Комментарий</label>
                    <textarea class="form-control" id="comment-content" rows="6"></textarea>
                  </div>
                  <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary mt-md-4 mt-2">Комментировать</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="block-space block-space--layout--before-footer"></div>
    </div>
    <!-- site__body / end -->
    <!-- site__footer -->
    <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php'; ?>
</body>

</html>