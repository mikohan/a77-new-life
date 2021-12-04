<?php
// require_once __DIR__ .  '/../../lib/init.php';

class CategoryModel extends Connection
{

  public function getDataFromAPILocal($url)
  {
    //  Initiate curl
    $ch = curl_init();
    // $search = curl_escape($ch, $search);
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

  public function getCar($model_slug)
  {
    $m = $this->db();
    $q = "SELECT car_json from ang_cars_api WHERE slug = ?";
    $t = $m->prepare($q);
    $t->execute(array($model_slug));
    $data = $t->fetch(PDO::FETCH_ASSOC);
    return json_decode($data['car_json']);
  }
}
