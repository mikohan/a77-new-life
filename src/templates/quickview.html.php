<?php

$name = $_GET['name'];
$images = $_GET['images'];
$images = explode(',', $_GET['images']);
$images = count($images) ? $images : ['/assets/images/products/' . PRODUCT_DEFAULT_IMAGE_800];
// Tmb stuff
$tmbs = explode(',', $_GET['tmbs']);
$tmbs = count($tmbs) ? $tmbs : ['/assets/images/products/' . PRODUCT_DEFAULT_IMAGE_150];
$catNubmer = $_GET['catNumber'];
$rating = $_GET['rating'];
$price = $_GET['price'];
$brand = $_GET['brand'];
$country = $_GET['country'];
$sku = $_GET['sku'];
$tmb = count($tmbs) ? $tmbs[0] : '/assets/images/products/' . PRODUCT_DEFAULT_IMAGE_150;
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>



	<div class="quickview modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<button type="button" class="quickview__close">
				<svg width="12" height="12">
					<path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
				</svg>
			</button>
			<div class="quickview__body">
				<div class="
					product-gallery product-gallery--layout--quickview
					quickview__gallery
				" data-layout="quickview">
					<div class="product-gallery__featured">
						<button type="button" class="product-gallery__zoom">
							<svg width="24" height="24">
								<path d="M15,18c-2,0-3.8-0.6-5.2-1.7c-1,1.3-2.1,2.8-3.5,4.6c-2.2,2.8-3.4,1.9-3.4,1.9s-0.6-0.3-1.1-0.7
	c-0.4-0.4-0.7-1-0.7-1s-0.9-1.2,1.9-3.3c1.8-1.4,3.3-2.5,4.6-3.5C6.6,12.8,6,11,6,9c0-5,4-9,9-9s9,4,9,9S20,18,15,18z M15,2
	c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S18.9,2,15,2z M16,13h-2v-3h-3V8h3V5h2v3h3v2h-3V13z" />
							</svg>
						</button>
						<div class="owl-carousel">
							<?php foreach ($images as $image) : ?>
								<!--
                The data-width and data-height attributes must contain the size of a larger version
                of the product image.

                If you do not know the image size, you can remove the data-width and data-height
                attribute, in which case the width and height will be obtained from the naturalWidth
                and naturalHeight property of img.image__tag.
                -->
								<a class="image image--type--product" href="<?= $image ?>" target="_blank" data-width="900" data-height="600">
									<div class="image__body">
										<img class="image__tag" src="<?= $image ?>" alt="<?= $name ?>" title="<?= $name ?>" />
									</div>
								</a>
							<?php endforeach ?>
						</div>
					</div>
					<div class="product-gallery__thumbnails">
						<div class="owl-carousel">
							<?php foreach ($tmbs as $tmb) : ?>
								<div class="
								product-gallery__thumbnails-item
								image image--type--product
							">
									<div class="image__body">
										<img class="image__tag" src="<?= $tmb ?>" alt="<?= $name ?>" title="<?= $name ?>" />
									</div>
								</div>
							<?php endforeach ?>

						</div>
					</div>
				</div>
				<div class="quickview__product">
					<div class="quickview__product-name">
						<?= $name ?>
					</div>
					<div class="quickview__product-rating">
						<div class="quickview__product-rating-stars">
							<div class="rating">
								<div class="rating__body">
									<?php foreach (range(1, $rating) as $rate) : ?>
										<div class="rating__star rating__star--active"></div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
						<div class="quickview__product-rating-title">
							14 reviews
						</div>
					</div>
					<div class="quickview__product-meta">
						<table>
							<tr>
								<th>SKU</th>
								<td><?= $sku ?></td>
							</tr>
							<tr>
								<th>Бренд</th>
								<td><?= mb_strtoupper($brand) ?></td>
							</tr>
							<tr>
								<th>Страна</th>
								<td><?= $country ?></td>
							</tr>
							<tr>
								<th>Каталожный номер</th>
								<td><?= $catNubmer ?></td>
							</tr>
						</table>
					</div>
					<div class="quickview__product-description">Вы можете купить запчасти в нашем интернет магазине, а так же заказать доставку.</div>
					<div class="quickview__product-prices-stock">
						<div class="quickview__product-prices">
							<div class="quickview__product-price">&#8381; <?= $price ?></div>
						</div>
						<div class="
							status-badge status-badge--style--success
							quickview__product-stock
							status-badge--has-text
						">
							<div class="status-badge__body">
								<div class="status-badge__text">In Stock</div>
							</div>
						</div>
					</div>
					<div class="product-form quickview__product-form">
						<div class="product-form__body">
							<div class="product-form__row">
								<div class="product-form__title">Material</div>
								<div class="product-form__control">
									<div class="input-radio-label">
										<div class="input-radio-label__list">
											<label class="input-radio-label__item">
												<input type="radio" name="material" class="input-radio-label__input" />
												<span class="input-radio-label__title">Steel</span>
											</label>
											<label class="input-radio-label__item">
												<input type="radio" name="material" class="input-radio-label__input" />
												<span class="input-radio-label__title">Aluminium</span>
											</label>
											<label class="input-radio-label__item">
												<input type="radio" name="material" class="input-radio-label__input" disabled />
												<span class="input-radio-label__title">Thorium</span>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="product-form__row">
								<div class="product-form__title">Color</div>
								<div class="product-form__control">
									<div class="input-radio-color">
										<div class="input-radio-color__list">
											<label class="
												input-radio-color__item
												input-radio-color__item--white
											" style="color: #fff" data-toggle="tooltip" title="White">
												<input type="radio" name="color" />
												<span></span>
											</label>
											<label class="input-radio-color__item" style="color: #ffd333" data-toggle="tooltip" title="Yellow">
												<input type="radio" name="color" />
												<span></span>
											</label>
											<label class="input-radio-color__item" style="color: #ff4040" data-toggle="tooltip" title="Red">
												<input type="radio" name="color" />
												<span></span>
											</label>
											<label class="
												input-radio-color__item
												input-radio-color__item--disabled
											" style="color: #4080ff" data-toggle="tooltip" title="Blue">
												<input type="radio" name="color" disabled />
												<span></span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="quickview__product-actions">
						<div class="
							quickview__product-actions-item
							quickview__product-actions-item--quantity
						">
							<div class="input-number">
								<input class="input-number__input form-control" type="number" min="1" value="1" disabled />
								<div class="input-number__add"></div>
								<div class="input-number__sub"></div>
							</div>
						</div>
						<div class="
							quickview__product-actions-item
							quickview__product-actions-item--addtocart
						">
							<button class="btn btn-primary btn-block add-to-cart" id="add_to_cart_GA" data-price="<?= $price ?>" data-name="<?= $name ?>" data-sku=<?= $sku ?> data-image="<?= $tmb ?>">
								Добавить в корзину
							</button>
						</div>
						<div class="
							quickview__product-actions-item
							quickview__product-actions-item--wishlist
						">
							<button class="btn btn-muted btn-icon" type="button">
								<svg width="16" height="16">
									<path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
								</svg>
							</button>
						</div>
						<div class="
							quickview__product-actions-item
							quickview__product-actions-item--compare
						">
							<button class="btn btn-muted btn-icon" type="button">
								<svg width="16" height="16">
									<path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
									<path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
									<path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
								</svg>
							</button>
						</div>
					</div>
				</div>
			</div>
			<a href="" class="quickview__see-details">See full details</a>
		</div>
	</div>
</body>

</html>