<?php

class SearchModel extends Connection
{
  /**
   * Function performs search from api
   */
  public  function getSearchFromAPI($search, $page_from, $page_size, $params)
  {

    //  Initiate curl
    $ch = curl_init();
    $search = curl_escape($ch, $search);
    $config_url = PHOTO_API_URL;
    $add_params = '';
    foreach ($params as $key => $value) {
      $add_params .= "&{$key}={$value}";
    }
    $url = "{$config_url}/api/product/searchapi?page_size={$page_size}&page_from={$page_from}&search=" . $search;
    if ($add_params) {
      $url = $url . $add_params;
    }
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
