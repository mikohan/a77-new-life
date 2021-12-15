<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('max_execution_time', 600);
class Connection
{
  public function db()
  {
    try {
      $dsn = 'mysql:dbname=' . ANG_DBNAME . ';host=' . ANG_HOST;
      $pdo = new PDO($dsn, ANG_DBUSER, ANG_DBPASS, [PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->exec("set names utf8");
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $pdo;
  }

  public function getCar($slug)
  {
    /**
     * Gegging all cars for specific make for side snippet
     */

    $m = $this->db();
    $q = "SELECT car_json FROM ang_cars_api WHERE JSON_EXTRACT(car_json, '$.slug') = ?";
    $t = $m->prepare($q);
    $t->execute(array($slug));
    $result = $t->fetch(PDO::FETCH_ASSOC);
    $i = null;
    if ($result) {
      $i = json_decode($result['car_json'], true);
      unset($i['categories']);
      unset($i['model_to']);
      unset($i['model_to']);
      unset($i['model_hostory']);
      unset($i['model_liquids']);
      unset($i['engines']);
    }
    return $i;
  }
}
