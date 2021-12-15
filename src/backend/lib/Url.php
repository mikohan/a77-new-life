<?php

class Url
{
  /**
   * Class to keep urls in one place
   * Also will be usefull for creating xml sitemaps
   * And redirection from old pages to new ones
   */
  private $root_url = '';
  // Blog Section
  public function blog()
  {
    return '/blog/';
  }
  public function blogPost($slug)
  {
    return "/blog/{$slug}/";
  }
  // Category Section
  public function category($slug)
  {
    return "/category/{$slug}/";
  }
  public function categoryCar($model, $slug)
  {
    return "/car/{$model}/{$slug}/";
  }
  // Product Section 
  public function product($slug)
  {
    return "/product/{$slug}/";
  }
  // Cars section
  public function car($make, $model)
  {
    return "/cars/{$make}/{$model}/";
  }
  // Static pages section
  public function delivery()
  {
    return "/delivery/";
  }
  public function contacts()
  {
    return "/contacts/";
  }
  public function policy()
  {
    return "/policy/";
  }
  public function about()
  {
    return "/about/";
  }
  public function garranty()
  {
    return "/garranty/";
  }
  // Sale page
  public function sale()
  {
    return "/sale/";
  }
}

// Declaring abstract class for fun
abstract class OldUrlAbstract
{
  abstract protected function product($cat_number, $one_c_id);

  abstract protected function car($car);
}

// Declaring class for old redircts
class OldUrl extends OldUrlAbstract
{

  public function product($cat_number, $one_c_id)
  {
    return "/porter-{$cat_number}-{$one_c_id}/";
  }
  public function car($car)
  {
    return "/somestring-/{$car}";
  }
}
