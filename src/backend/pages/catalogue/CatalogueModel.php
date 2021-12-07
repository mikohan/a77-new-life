<?php

class CatalogueModel extends Connection
{
  public function getCatalogue($car_slug)
  {
    /**
     * Getting catalogue by car
     */
    $m = $this->db();
    $table = "ang_catalogue_" . $car_slug . "_h2";
    $q = "SELECT * FROM " . $table . "";
    $t = $m->prepare($q);
    $t->execute();
    $result = $t->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
