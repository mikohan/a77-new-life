<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8">
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>Авторизация в личный кабинет | Магазин Ангара 77</title>
  <meta name="description" content="Личный кабинет для получения информации о статусе заказа и доставки. Интернет магазин запчастей для коммерческих и грузовых автомобилей." />
  <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
  <!-- fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
  <!-- css -->
</head>

<body>
  <!-- site -->
  <div class="site">
    <!-- site__mobile-header -->
    <?php include __DIR__ . '/../backend/includes/header/header.php' ?>
    <!-- site__header / end -->
    <!-- site__body -->
    <div class="site__body">
      <div class="block-space block-space--layout--after-header"></div>
      <div class="block">
        <div class="container container--max--lg">
          <div class="row">
            <div class="col-md-6 d-flex">
              <div class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ml-lg-4">
                <div class="card-body card-body--padding--2">
                  <h3 class="card-title">Логин</h3>
                  <form>
                    <div class="form-group">
                      <label for="signin-email">Емайл</label>
                      <input id="signin-email" type="email" class="form-control" placeholder="customer@example.com">
                    </div>
                    <div class="form-group">
                      <label for="signin-password">Пароль</label>
                      <input id="signin-password" type="password" class="form-control" placeholder="Пароль">
                      <small class="form-text text-muted">
                        <a href="">Забыли пароль?</a>
                      </small>
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <span class="input-check form-check-input">
                          <span class="input-check__body">
                            <input class="input-check__input" type="checkbox" id="signin-remember">
                            <span class="input-check__box"></span>
                            <span class="input-check__icon"><svg width="9px" height="7px">
                                <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                              </svg>
                            </span>
                          </span>
                        </span>
                        <label class="form-check-label" for="signin-remember">Запомнить меня</label>
                      </div>
                    </div>
                    <div class="form-group mb-0">
                      <button type="submit" class="btn btn-primary mt-3">Логин</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex mt-4 mt-md-0">
              <div class="card flex-grow-1 mb-0 ml-0 ml-lg-3 mr-0 mr-lg-4">
                <div class="card-body card-body--padding--2">
                  <h3 class="card-title">Создать Аккаунт</h3>
                  <form>
                    <div class="form-group">
                      <label for="signup-email">Емайл</label>
                      <input id="signup-email" type="email" class="form-control" placeholder="customer@example.com">
                    </div>
                    <div class="form-group">
                      <label for="signup-password">Пароль</label>
                      <input id="signup-password" type="password" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                      <label for="signup-confirm">Повторить Пароль</label>
                      <input id="signup-confirm" type="password" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="form-group mb-0">
                      <button type="submit" class="btn btn-primary mt-3">Создать</button>
                    </div>
                  </form>
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
    <?php include __DIR__ . '/../backend/includes/footer/footer.php' ?>
    <!-- site__footer / end -->
  </div>
  <!-- site / end -->
  <!-- mobile-menu -->
  <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php' ?>
  <!-- mobile-menu / end -->

</body>

</html>
