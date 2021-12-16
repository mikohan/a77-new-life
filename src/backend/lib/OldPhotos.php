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
    return ['img150' => '/assets/images/products/product-default-160.jpg', 'img245' => '/assets/images/products/product-default-245.jpg', 'img500' => '/assets/images/products/product-default-500.jpg', 'img800' => '/assets/images/products/product-default-800.jpg', 'image' => '/assets/images/products/product-default-800.jpg'];
  }


  function resize_image_max($image, $max_width, $max_height)
  {
    /**
     * Got this function from internet
     * Needs to be checked tomorrow
     */
    $w = imagesx($image); //current width
    $h = imagesy($image); //current height
    if ((!$w) || (!$h)) {
      $GLOBALS['errors'][] = 'Image could not be resized because it was not a valid image.';
      return false;
    }

    if (($w <= $max_width) && ($h <= $max_height)) {
      return $image;
    } //no resizing needed

    //try max width first...
    $ratio = $max_width / $w;
    $new_w = $max_width;
    $new_h = $h * $ratio;

    //if that didn't work
    if ($new_h > $max_height) {
      $ratio = $max_height / $h;
      $new_h = $max_height;
      $new_w = $w * $ratio;
    }

    $new_image = imagecreatetruecolor($new_w, $new_h);
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_w, $new_h, $w, $h);
    return $new_image;
  }
}
