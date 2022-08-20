<?php

class BlogModelHTTP
{

  public $url;

  function __construct($url)
  {
    $this->url = $url;
  }



  public function getAllArticlesBackend()
  {
    //  Initiate curl
    $ch = curl_init();
    // $search = curl_escape($ch, $search);
    $options = array(
      CURLOPT_URL => $this->url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array('Content-type: application/json')
    );
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    // $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $mydata = json_decode($result, true);
    curl_close($ch);
    return $mydata;
  }

  public function getAllCategories()
  {
    $ch = curl_init();
    $url = BLOG_API_URL . '/wp/v2/categories';
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array('Content-type: application/json')
    );
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    // $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $mydata = json_decode($result, true);
    curl_close($ch);
    return $mydata;
  }
}
