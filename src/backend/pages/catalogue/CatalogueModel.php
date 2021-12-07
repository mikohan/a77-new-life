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
  public function getCatalogueSubcat($car_slug, $parent)
  {
    /**
     * Getting second level of catalogues
     */
    $m = $this->db();
    $table = "ang_catalogue_" . $car_slug . "_h3";
    $q = "SELECT * FROM " . $table . " WHERE id_h2 = ?";
    $t = $m->prepare($q);
    $t->execute(array($parent));
    $result = $t->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function getSchemaTitle($car_slug, $id)
  {
    /**
     * Getting title from h3 for tilte page schem and breadcrumbs
     */

    $m = $this->db();
    $table = "ang_catalogue_" . $car_slug . "_h3";
    $q = "SELECT * FROM " . $table . " WHERE id = ?";
    $t = $m->prepare($q);
    $t->execute(array($id));
    $result = $t->fetch(PDO::FETCH_ASSOC);
    p($result);
    return $result;
  }
  public function getCatalogueSchema($car_slug, $schema)
  {
    /**
     * Getting second level of catalogues
     */
    $m = $this->db();
    $table = "ang_catalogue_" . $car_slug . "_h4";
    $table_h5 = "ang_catalogue_" . $car_slug . "_h5";

    $q = "SELECT h4.id as h4_id, h4.coords, h4.id_h3, h4.img, h4.title as h4_title, h5.id as h5_id, h5.numer as h5_cat_number, h5.count FROM " . $table . " as h4
    LEFT JOIN {$table_h5} as h5
    
    ON h4.id = h5.id_h4
    WHERE id_h3 = ?";
    $t = $m->prepare($q);
    $t->execute(array($schema));
    $result = $t->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
