<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class BlogModel extends Connection
{

  public function incrementView($slug)
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
    $q = "SELECT id, view, `date`, author, mini_img, title, search_frase, `description`, slug ,`text`, meta_k FROM ang_blog_articles WHERE slug = ?";
    $t = $m->prepare($q);
    $t->execute(array($slug));
    $res = $t->fetch(PDO::FETCH_ASSOC);

    $q_next = "SELECT * FROM ang_blog_articles WHERE id = (SELECT MIN(id) from ang_blog_articles WHERE id > ?)";
    $q_prev = "SELECT * FROM ang_blog_articles WHERE id = (SELECT MAX(id) from ang_blog_articles WHERE id < ?)";

    $n = $m->prepare($q_next);

    $p = $m->prepare($q_prev);

    $n->execute(array($res['id']));
    $next = $n->fetch(PDO::FETCH_ASSOC);
    $p->execute(array($res['id']));
    $previous = $p->fetch(PDO::FETCH_ASSOC);

    $ret = array($res, $previous, $next);
    return $ret;
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
