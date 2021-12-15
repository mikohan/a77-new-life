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
              <h5 class="footer-contacts__title">Контакы</h5>
              <div class="footer-contacts__text">
                Ангара - Запчасти для Коммерческого Транспорта
              </div>
              <address class="footer-contacts__contacts">
                <dl>
                  <dt>Телефон</dt>
                  <dd><?= TELEPHONE_FREE ?></dd>
                </dl>
                <dl>
                  <dt>Email</dt>
                  <dd>angara77@gmail.com</dd>
                </dl>
                <dl>
                  <dt>Адрес</dt>
                  <dd>Москва, ул. Соловьиная Роща д 8 корпус 2</dd>
                </dl>
                <dl>
                  <dt>Рабочие часы</dt>
                  <dd>Каждый день 9:00am - 7:00pm</dd>
                </dl>
              </address>
            </div>
          </div>
          <div class="col-6 col-md-3 col-xl-2">
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
          <div class="col-6 col-md-3 col-xl-2">
            <div class="site-footer__widget footer-links">
              <h5 class="footer-links__title">Каталоги</h5>
              <ul class="footer-links__list">
                <li class="footer-links__item"><a href="/porter1/1/" class="footer-links__link">Портер</a></li>
                <li class="footer-links__item"><a href="/porter1/2/" class="footer-links__link">Портер 2</a></li>
                <li class="footer-links__item"><a href="/porter1/3/" class="footer-links__link">HD</a></li>
                <li class="footer-links__item"><a href="/porter1/5/" class="footer-links__link">Старекс</a></li>
                <li class="footer-links__item"><a href="/carcatalog/7/" class="footer-links__link">Соната</a></li>
                <li class="footer-links__item"><a href="/carcatalog/11/" class="footer-links__link">Оптима</a></li>
                <li class="footer-links__item"><a href="/carcatalog/6/" class="footer-links__link">Соренто</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-md-6 col-xl-4">
            <div class="site-footer__widget footer-newsletter">
              <h5 class="footer-newsletter__title">Подписаться на новости</h5>
              <div class="footer-newsletter__text">
                Подписаться на рассылку
              </div>
              <form action="" class="footer-newsletter__form">
                <label class="sr-only" for="footer-newsletter-address">Email</label>
                <input type="text" class="footer-newsletter__form-input" id="footer-newsletter-address" placeholder="Емейл адрес...">
                <button class="footer-newsletter__form-button">Подписаться</button>
              </form>
              <div class="footer-newsletter__text footer-newsletter__text--social">
                Мы в Соцсетях
              </div>
              <div class="footer-newsletter__social-links social-links">
                <ul class="social-links__list">
                  <li class="social-links__item social-links__item--facebook"><a href="https://www.facebook.com/groups/angara77/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="social-links__item social-links__item--twitter"><a href="https://vk.com/angara772018" target="_blank"><i class="fab fa-vk"></i></a>
                  </li>
                  <li class="social-links__item social-links__item--youtube"><a href="http://www.youtube.com/channel/UCJ97RljnqyAdKKmAc8mvHZw" target="_blank"><i class="fab fa-youtube"></i></a>
                  </li>
                  <li class="social-links__item social-links__item--instagram"><a href="https://www.ok.ru/group/52962919973041" target="_blank"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li class="social-links__item social-links__item--rss"><a href="https://www.instagram.com/" target="_blank"><i class="fas fa-rss"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-footer__bottom">
      <div class="container">
        <div class="site-footer__bottom-row">
          <div class="site-footer__copyright">
            <!-- copyright -->
            Angara Ltd. <a href="https://angara77.com" target="_blank">Angara Ltd.</a>
            <!-- copyright / end -->
          </div>
          <div class="site-footer__payments">
            <img src="/assets/images/payments.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>