<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>Контакты Компании Angara Parts</title>
  <link rel="icon" type="image/png" href="/assets/images/favicon.png">
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
      <div class="block-map block">
        <div class="block-map__body">
          <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d940.6870088332372!2d37.40267952214013!3d55.89140407547924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b5389430b4de03%3A0x9bc8057d70bedbb5!2z0JDQvdCz0LDRgNCwINCX0LDQv9GH0LDRgdGC0Lg!5e0!3m2!1sru!2sru!4v1517403237916' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
        </div>
      </div>
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
                  <span class="breadcrumb__item-link">Контакты</span>
                </li>
                <li class="breadcrumb__title-safe-area" role="presentation"></li>
              </ol>
            </nav>
            <h1 class="block-header__title">Контакты компании <?= COMPANY_INFO['company_name'] ?></h1>
          </div>
        </div>
      </div>
      <div class="block">
        <div class="container container--max--lg">
          <div class="card">
            <div class="card-body card-body--padding--2">
              <div class="row">
                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                  <div class="mr-1">
                    <h4 class="contact-us__header card-title">Наш адрес</h4>
                    <div class="contact-us__address">
                      <p>
                        <?= COMPANY_INFO['address'] ?>
                      </p>
                      <p>
                        <strong>Часы работы</strong><br>
                        Понедельник - Пятница: <?= COMPANY_INFO['working_hours_weekdays'][0] ?> - <?= COMPANY_INFO['working_hours_weekdays'][1] ?><br>
                        Суббота: <?= COMPANY_INFO['working_hours_weekends'][0] ?> - <?= COMPANY_INFO['working_hours_weekends'][1] ?><br>
                        Воскресенье: <?= COMPANY_INFO['working_hours_weekends'][0] ?> - <?= COMPANY_INFO['working_hours_weekends'][1] ?>
                      </p>
                      <p>
                        <strong>Comment</strong><br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit suscipit mi, non
                        tempor nulla finibus eget. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="ml-1">
                    <h4 class="contact-us__header card-title">Leave us a Message</h4>
                    <form>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="form-name">Your Name</label>
                          <input type="text" id="form-name" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="form-email">Email</label>
                          <input type="email" id="form-email" class="form-control" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="form-subject">Subject</label>
                        <input type="text" id="form-subject" class="form-control" placeholder="Subject">
                      </div>
                      <div class="form-group">
                        <label for="form-message">Message</label>
                        <textarea id="form-message" class="form-control" rows="4"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
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
    <?php include __DIR__ . '/../backend/includes/footer/footer.php' ?>
    <!-- site__footer / end -->
  </div>
  <!-- site / end -->
  <!-- mobile-menu -->
  <?php include __DIR__ . '/../backend/includes/header/mobileMenu.html.php' ?>
  <!-- mobile-menu / end -->

</body>

</html>