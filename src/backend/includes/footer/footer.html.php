<footer class="site__footer">
  <div class="site-footer">
    <div class="decor site-footer__decor decor--type--bottom">
      <div class="decor__body">
        <div class="decor__start"></div>
        <div class="decor__end"></div>
        <div class="decor__center"></div>
      </div>
    </div>
    <div class="site-footer__widgets">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-4">
            <div class="site-footer__widget footer-contacts">
              <h5 class="footer-contacts__title">Контакты</h5>
              <div class="footer-contacts__text">
                Ангара - Запчасти для Коммерческого Транспорта
              </div>
              <address class="footer-contacts__contacts">
                <dl>
                  <dt>Телефон</dt>
                  <dd class="footer_phone"><a href="tel: <?= TELEPHONE_FREE_LINK ?>"><?= TELEPHONE_FREE ?></a></dd>
                </dl>
                <dl class="d-sm-block d-none">
                  <dt>Email</dt>
                  <dd><?= COMPANY_INFO['email'] ?></dd>
                </dl>
                <dl>
                  <dt>Адрес</dt>
                  <dd><?= COMPANY_INFO['address'] ?></dd>
                </dl>
                <dl>
                  <dt>Рабочие часы</dt>
                  <dd>Каждый день <?= COMPANY_INFO['working_hours_weekdays'][0] ?> - <?= COMPANY_INFO['working_hours_weekdays'][1] ?></dd>
                </dl>
              </address>
            </div>

            <div style="padding-top: 2rem;" class="site-footer__widget footer-contacts d-sm-block d-none">
              Реквизиты:
              <?= COMPANY_INFO['company_details'] ?>
            </div>

          </div>
          <div class="col-6 col-md-3 col-xl-2 d-sm-block d-none">
            <div class="site-footer__widget footer-links">
              <h5 class="footer-links__title">Информация</h5>
              <ul class="footer-links__list">
                <li class="footer-links__item"><a href="<?= $u->about() ?>" class="footer-links__link">О Нас</a></li>
                <li class="footer-links__item"><a href="<?= $u->delivery() ?>" class="footer-links__link">Доставка</a></li>
                <li class="footer-links__item"><a href="<?= $u->policy() ?>" class="footer-links__link">Политика Конфиденциальности</a></li>
                <li class="footer-links__item"><a href="<?= $u->garranty() ?>" class="footer-links__link">Гарантия</a></li>
                <li class="footer-links__item"><a href="<?= $u->contacts() ?>" class="footer-links__link">Контакты</a></li>
                <li class="footer-links__item"><a href="<?= $u->delivery() ?>" class="footer-links__link">Оплата</a></li>
                <li class="footer-links__item"><a href="<?= $u->blog() ?>" class="footer-links__link">Блог</a></li>
              </ul>
            </div>
          </div>
          <div class="col-6 col-md-3 col-xl-2 d-sm-block d-none">
            <div class="site-footer__widget footer-links">
              <h5 class="footer-links__title">Каталоги</h5>
              <ul class="footer-links__list">
                <li class="footer-links__item"><a href="<?= $u->catalogue('porter1') ?>" class="footer-links__link">Портер</a></li>
                <li class="footer-links__item"><a href="<?= $u->catalogue('porter2') ?>" class="footer-links__link">Портер 2</a></li>
                <li class="footer-links__item"><a href="<?= $u->catalogue('hd') ?>" class="footer-links__link">HD</a></li>
                <li class="footer-links__item"><a href="<?= $u->catalogue('starex') ?>" class="footer-links__link">Старекс</a></li>
                <li class="footer-links__item"><a href="<?= $u->catalogue('sonata') ?>" class="footer-links__link">Соната</a></li>
                <li class="footer-links__item"><a href="<?= $u->catalogue('optima') ?>" class="footer-links__link">Оптима</a></li>
                <li class="footer-links__item"><a href="<?= $u->catalogue('sorento') ?>" class="footer-links__link">Соренто</a></li>
              </ul>
            </div>
          </div>
          <!--<div class="col-12 col-md-6 col-xl-4">
            <div class="site-footer__widget footer-newsletter">
              <h5 class="footer-newsletter__title">Подписаться на новости</h5>
              <div class="footer-newsletter__text">
                Подписаться на рассылку
              </div>
              <form action="/subscribe.php" class="footer-newsletter__form">
                <label class="sr-only" for="footer-newsletter-address">Email</label>
                <input type="text" class="footer-newsletter__form-input" id="footer-newsletter-address" placeholder="Емейл адрес...">
                <button class="footer-newsletter__form-button">Подписаться</button>
              </form>
            </div>
          </div>-->

          <div class="col-12 col-md-6 col-xl-4">
            <div class="site-footer__widget footer-newsletter">
              <h5 class="footer-newsletter__title">
                Мы в Соцсетях
              </h5>
            </div>
            <div class="footer-newsletter__social-links social-links">
              <ul class="social-links__list">
                <!--<li class="social-links__item social-links__item--facebook"><a href="https://www.facebook.com/groups/angara77/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  </li>-->
                <li class="social-links__item social-links__item--twitter"><a href="https://vk.com/angara772018" target="_blank"><i class="fab fa-vk"></i></a>
                </li>
                <li class="social-links__item social-links__item--youtube"><a href="http://www.youtube.com/channel/UCJ97RljnqyAdKKmAc8mvHZw" target="_blank"><i class="fab fa-youtube"></i></a>
                </li>
                <li class="social-links__item social-links__item--instagram"><a href="https://www.ok.ru/group/52962919973041" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="social-links__item social-links__item--rss"><iframe src="https://yandex.ru/sprav/widget/rating-badge/1616530362" width="150" height="50"></iframe></li>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="site-footer__bottom d-sm-block d-none">
      <div class="container">
        <div class="site-footer__bottom-row">
          <div class="site-footer__copyright">
            <!-- copyright -->
            <a href="https://angara77.com" target="_blank">ООО "Ангара"</a>
            <!-- copyright / end -->
          </div>
          <div class="site-footer__payments">
            <img src="/assets/images/payments.png" alt="Методы оплаты" title="Методы оплаты">
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
