<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class BlogModel extends Connection
{

  private function incrementView($slug)
  {
    /**
     * Increment veiws count on select from table
     */
    $m = $this->db();
    $q = "UPDATE ang_blog_articles SET view = view + 1 WHERE slug = ?";
    $t = $m->prepare($q);
    $t->execute(array($slug));
    $count = $t->rowCount();
    if ($count) {
      return true;
    } else {
      return false;
    }
  }
  public function getArticle($slug)
  {
    /**
     * Increment veiws count on select from table
     */
    $m = $this->db();
    $q = "SELECT id, view, `date`, author, mini_img, title, search_frase, `description`, slug FROM ang_blog_articles WHERE slug = ?";
    $t = $m->prepare($q);
    $t->execute(array($slug));
    $res = $t->fetch(PDO::FETCH_ASSOC);
    return $res;
  }

  public function getAllArticles()
  {
    /**
     * Getting all articled from db
     */

    $m = $this->db();
    $q = "SELECT id, view, `date`, author, mini_img, title, search_frase, `description`, slug FROM ang_blog_articles ORDER BY date DESC";
    $t = $m->prepare($q);
    $t->execute();
    $result = $t->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
