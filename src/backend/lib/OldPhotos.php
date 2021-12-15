<?php


class OldPhotos
{
  /**
   * 1) Check if images from API is empty
   * 2) If it is: trying to find images in local folder
   * 3) If not success return defalut image
   */
  private $product;
  public function __construct($product)
  {
    $this->product = $product;
  }

  public function getImageOneC($one_c_id)
  {
    /**
     * Finding and return image by one c id 
     * Check if file exists
     */
    $dir =  '/home/manhee/sites/angara77.loc/img/parts/';
    $path = $dir . "*-" . $one_c_id .  ".{jpg, jpeg, JPEG, JPG, PNG, png}";
    $find = glob($path, GLOB_BRACE);
    if ($find) {
      p($find);
      return $find;
    } else {
      $path = $dir .  $one_c_id .  ".{jpg, jpeg, JPEG, JPG, PNG, png}";
      $find = glob($path, GLOB_BRACE);
      p($find);
      return $find;
    }
  }

  public function makePhotos(): array
  {
    /**
     * Getting product and returns array of images
     */
    // Check images array 
    if (array_key_exists('product_image', $this->product)) {
      if (count($this->product['product_image'])) {
        // Simply return that array
        return $this->product['product_image'];
      }
    }
    if (array_key_exists('images', $this->product)) {
      if (count($this->product['images'])) {
        // Simply return that array
        return $this->product['images'];
      }
    }

    $local_find = $this->getImageOneC($this->product['one_c_id']);
    if ($local_find) {
      return $local_find;
    }
    return ['/assets/images/products/product-default-800.jpg'];
  }
}
