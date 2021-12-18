<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8">
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>Страница не найдена - Angara Parts</title>
  <link rel="icon" type="image/png" href="/assets/images/favicon.png">
  <!-- fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
  <!-- css -->
</head>

<body>
  <!-- site -->
  <div class="site">
    <?php include __DIR__ . '/../backend/includes/header/header.html.php'; ?>
    <!-- site__header / end -->
    <!-- site__body -->
    <div class="site__body">
      <div class="block-space block-space--layout--spaceship-ledge-height"></div>
      <div class="block">
        <div class="container">
          <div class="not-found">
            <div class="not-found__404">
              Oops! Error <?= $error['status_code'] ?>
            </div>
            <div class="not-found__content">
              <h1 class="not-found__title"><?= $error['error'] ?></h1>
              <p class="not-found__text">
                <?= $error['error'] ?><br>
                Воспользуйтесь поиском!
              </p>
              <form method="GET" action="/search/" class="not-found__search">
                <input type="text" class="not-found__search-input form-control" name="search" placeholder="Номер или название запчасти...">
                <button type="submit" class="not-found__search-button btn btn-primary">Поиск</button>
              </form>
              <p class="not-found__text">
                Или попробуйте Вернутся на главную!
              </p>
              <a class="btn btn-secondary btn-sm" href="/">Вернутся на главную</a>
            </div>
          </div>
        </div>
      </div>
      <div class="block-space block-space--layout--before-footer"></div>
    </div>
    <!-- site__body / end -->
    <!-- site__footer -->
    <?php include __DIR__ . '/../backend/includes/footer/footer.php' ?>

</body>

</html>