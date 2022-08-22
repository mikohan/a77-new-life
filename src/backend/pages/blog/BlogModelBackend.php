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
      CURLOPT_HTTPHEADER => array('Content-type: application/json'),
      CURLOPT_HEADER => 1
    );
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($result, 0, $header_size);
    $body = substr($result, $header_size);


    // $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $mydata = json_decode($body, true);

    $matches1 = null;
    $matches2 = null;
    preg_match('/X-WP-Total:\s+(\d+)/', $header, $matches1);
    preg_match('/X-WP-TotalPages:\s+(\d+)/', $header, $matches2);
    $pages_info = ['X-WP-Total' => $matches1[1], 'X-WP-TotalPages' => $matches2[1]];
    curl_close($ch);
    $mydata[0]['page_info'] = $pages_info;
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
