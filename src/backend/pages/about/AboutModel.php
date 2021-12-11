<?php


class AboutModel extends Connection
{


  /**
   * Class for about 
   */

  public function getStaff()
  {
    /**
     * Getting all people from people table wich currently working
     * enabled 1 
     */

    $m = $this->db();
    $q = "SELECT id, lastname, firstname, img206, `enabled`, `position` FROM ang_staff WHERE enabled = 1 AND id !=18 ";
    $t = $m->prepare($q);
    $t->execute();
    $res = $t->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }
}
