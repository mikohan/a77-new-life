<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="UTF-8">
  <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>Доставка и Оплата <?= COMPANY_INFO['company_name'] ?></title>
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
                <div class="container container--max--xl">
                    <div class="row">
                        <div class="col-12 col-lg-3 d-flex">
                            <div class="account-nav flex-grow-1">
                                <h4 class="account-nav__title">Navigation</h4>
                                <ul class="account-nav__list">
                                    <li class="account-nav__item ">
                                        <a href="account-dashboard.html">Dashboard</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-garage.html">Garage</a>
                                    </li>
                                    <li class="account-nav__item  account-nav__item--active ">
                                        <a href="account-profile.html">Edit Profile</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-orders.html">Order History</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-order-details.html">Order Details</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-addresses.html">Addresses</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-edit-address.html">Edit Address</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-password.html">Password</a>
                                    </li>
                                    <li class="account-nav__divider" role="presentation"></li>
                                    <li class="account-nav__item ">
                                        <a href="account-login.html">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Profile</h5>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-body card-body--padding--2">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-lg-7 col-xl-6">
                                            <div class="form-group">
                                                <label for="profile-first-name">First Name</label>
                                                <input type="text" class="form-control" id="profile-first-name" placeholder="First Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="profile-last-name">Last Name</label>
                                                <input type="text" class="form-control" id="profile-last-name" placeholder="Last Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="profile-email">Email Address</label>
                                                <input type="email" class="form-control" id="profile-email" placeholder="Email Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="profile-phone">Phone Number</label>
                                                <input type="text" class="form-control" id="profile-phone" placeholder="Phone Number">
                                            </div>
                                            <div class="form-group mb-0">
                                                <button class="btn btn-primary mt-3">Save</button>
                                            </div>
                                        </div>
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