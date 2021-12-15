<?php
class QuickView
{
  private $product;
  public function __construct($product)
  {
    $this->product = $product;
  }
  public function makeData(): string
  {
    /**
     * Makes data for quick view
     */
    // p($this->product);
    // $img = count($this->product['images']) ? $this->product['images'][0]['img245'] : "/assets/images/products/product-default-245.jpg";
    $model = count($this->product['model']) ? $this->product['model'][0]['name'] : '';
    $make = count($this->product['model']) ? $this->product['model'][0]['make'] : '';
    $name = $this->product['name'] . " " . mb_ucfirst($make) . " " . mb_ucfirst($model);
    $sku = $this->product['one_c_id'];

    $rating = $this->product['rating']['ratingAvg'] ??  5;
    $price = $this->product['price'] ?? 'Звоните!';
    $cat_number = $this->product['cat_number'] ??  '/';

    $brand = $this->product['brand']['brand'] ?? '';
    $country = $this->product['brand']['country'] ?? '';
    $data_array = '';
    if (count($this->product['product_image'])) {
      foreach ($this->product['product_image'] as $image) {
        $lnk =  $image['img800'] . ",";
        $data_array .= $lnk;
      }
    }
    $d_arr = rtrim($data_array, ',');
    // Tmb array
    $tmb_array = '';
    if (count($this->product['product_image'])) {
      foreach ($this->product['product_image'] as $image) {
        $lnk =  $image['img150'] . ",";
        $tmb_array .= $lnk;
      }
    }
    $t_arr = rtrim($tmb_array, ',');
    return <<<EOD
data-name="$name" data-price="$price" data-images="$d_arr" data-tmbs="$t_arr" data-sku="$sku" data-catnumber="$cat_number" data-rating="$rating" data-brand="$brand" data-country="$country"
EOD;
  }
}
