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
}
