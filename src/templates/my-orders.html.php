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
                                    <li class="account-nav__item ">
                                        <a href="account-profile.html">Edit Profile</a>
                                    </li>
                                    <li class="account-nav__item  account-nav__item--active ">
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
                                    <h5>Order History</h5>
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
                                                <tr>
                                                    <td><a href="account-order-details.html">#6321</a></td>
                                                    <td>28 February, 2019</td>
                                                    <td>Completed</td>
                                                    <td>$57.00 for 1 item(s)</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="account-order-details.html">#6001</a></td>
                                                    <td>21 February, 2019</td>
                                                    <td>Completed</td>
                                                    <td>$252.00 for 2 item(s)</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="account-order-details.html">#4120</a></td>
                                                    <td>11 December, 2018</td>
                                                    <td>Completed</td>
                                                    <td>$3,978.00 for 7 item(s)</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-footer">
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