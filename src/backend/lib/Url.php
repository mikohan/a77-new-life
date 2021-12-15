<?php

class Url
{
  private $root_url = '';
  public function blog()
  {
    return '/blog/';
  }
  public function blogPost($slug)
  {
    return "/blog/{$slug}/";
  }
  public function category($slug)
  {
    return "/category/{$slug}/";
  }
  public function categoryCar($model, $slug)
  {
    return "/car/{$model}/{$slug}/";
  }
}
