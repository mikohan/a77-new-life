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
                                    <li class="account-nav__item  account-nav__item--active ">
                                        <a href="account-dashboard.html">Dashboard</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-garage.html">Garage</a>
                                    </li>
                                    <li class="account-nav__item ">
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
                            <div class="dashboard">
                                <div class="dashboard__profile card profile-card">
                                    <div class="card-body profile-card__body">
                                        <div class="profile-card__avatar">
                                            <img src="images/avatars/avatar-4.jpg" alt="Аватар" title="Аватар">
                                        </div>
                                        <div class="profile-card__name">Helena Garcia</div>
                                        <div class="profile-card__email">red-parts@example.com</div>
                                        <div class="profile-card__edit">
                                            <a href="account-profile.html" class="btn btn-secondary btn-sm">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard__address card address-card address-card--featured">
                                    <div class="address-card__badge tag-badge tag-badge--theme">Default</div>
                                    <div class="address-card__body">
                                        <div class="address-card__name">Helena Garcia</div>
                                        <div class="address-card__row">
                                            Random Federation<br>
                                            115302, Moscow<br>
                                            ul. Varshavskaya, 15-2-178
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Phone Number</div>
                                            <div class="address-card__row-content">38 972 588-42-36</div>
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Email Address</div>
                                            <div class="address-card__row-content">helena@example.com</div>
                                        </div>
                                        <div class="address-card__footer">
                                            <a href="">Edit Address</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard__orders card">
                                    <div class="card-header">
                                        <h5>Recent Orders</h5>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href="account-order-details.html">#8132</a></td>
                                                        <td>02 April, 2019</td>
                                                        <td>Pending</td>
                                                        <td>$2,719.00 for 5 item(s)</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="account-order-details.html">#7592</a></td>
                                                        <td>28 March, 2019</td>
                                                        <td>Pending</td>
                                                        <td>$374.00 for 3 item(s)</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="account-order-details.html">#7192</a></td>
                                                        <td>15 March, 2019</td>
                                                        <td>Shipped</td>
                                                        <td>$791.00 for 4 item(s)</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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