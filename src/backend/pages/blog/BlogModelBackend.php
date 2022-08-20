<?php

class BlogModelHTTP
{

  public $url;

  function __construct($url)
  {
    $this->url = $url;
  }



  public function getAllArticlesBackend($id = null)
  {
    //  Initiate curl
    $ch = curl_init();
    $loc_url = '';
    if ($id) {
      $loc_url = $this->url . "/" . $id . "?_embed";
    } else {
      $loc_url = $this->url . "?_embed";
    }
    // $search = curl_escape($ch, $search);
    $options = array(
      CURLOPT_URL => $loc_url,
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
