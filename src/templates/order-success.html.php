<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <?php include __DIR__ . '/../backend/includes/header/ga.php'; ?>
    <title>Спасибо за заказ! | Angara Parts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <?php include __DIR__ . '/../backend/includes/header/favicon.php' ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
</head>

<body>
    <!-- site -->
    <div class="site">
        <!-- site header / start  -->
        <?php include __DIR__ . '/../backend/includes/header/header.php' ?>
        <!-- site__header / end -->
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--spaceship-ledge-height"></div>
            <div class="block order-success">
                <div class="container">
                    <div class="order-success__body">
                        <div class="order-success__header">
                            <div class="order-success__icon">
                                <svg width="100" height="100">
                                    <path d="M50,100C22.4,100,0,77.6,0,50S22.4,0,50,0s50,22.4,50,50S77.6,100,50,100z M50,2C23.5,2,2,23.5,2,50
        s21.5,48,48,48s48-21.5,48-48S76.5,2,50,2z M44.2,71L22.3,49.1l1.4-1.4l21.2,21.2l34.4-34.4l1.4,1.4L45.6,71
        C45.2,71.4,44.6,71.4,44.2,71z" />
                                </svg>
                            </div>
                            <h1 class="order-success__title">Спасибо за заказ! <?= $firstname ?></h1>
                            <div class="order-success__subtitle">Ваш заказ получен, мы свяжемся с Вами в ближайшие рабочи часы.</div>
                            <div class="order-success__actions">
                                <a href="/" class="btn btn-sm btn-secondary">Вернуться на главную</a>
                            </div>
                        </div>
                        <div class="card order-success__meta">
                            <ul class="order-success__meta-list">
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Номер Заказа:</span>
                                    <span class="order-success__meta-value">#9478</span>
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Создан:</span>
                                    <span class="order-success__meta-value"><?= date('d / m / Y') ?></span>
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Всего:</span>
                                    <span class="order-success__meta-value total">$1596.00</span>
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Способ оплаты:</span>
                                    <span class="order-success__meta-value"><?= $payment_method ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="card">
                            <div class="order-list">
                                <table>
                                    <thead class="order-list__header">
                                        <tr>
                                            <th class="order-list__column-label" colspan="2">Продукт</th>
                                            <th class="order-list__column-quantity">Количество</th>
                                            <th class="order-list__column-total">Всего</th>
                                        </tr>
                                    </thead>
                                    <tbody class="order-list__products">
                                    </tbody>
                                    <tbody class="order-list__subtotals">
                                        <tr>
                                            <th class="order-list__column-label" colspan="3">Итого</th>
                                            <td class="order-list__column-total total"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="order-list__footer">
                                        <tr>
                                            <th class="order-list__column-label" colspan="3">Всего</th>
                                            <td class="order-list__column-total total"></td>
                                        </tr>
                                    </tfoot>
                                </table>
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
        <!-- scripts -->
</body>

</html>