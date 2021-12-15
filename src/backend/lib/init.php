<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require __DIR__ . '/../config.php';
require __DIR__ . '/Connection.php';
require __DIR__ . '/Url.php';

$u = new Url;

function p($array)
{
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}

function rus2translit($string)
/**
 * Slug helper function
 */
{

  //$string = preg_replace('~[^-a-z0-9_]+~u', '-', $string);

  $converter = array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'y', 'ъ' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch', 'Ь' => '\-', 'Ы' => 'Y', 'Ъ' => '\-', 'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya', ' ' => '-');

  return strtr($string, $converter);
}
function mb_ucfirst($string, $encoding = 'utf-8')
{
  /**
   * Capilazing fifst letter russian
   */
  $strlen = mb_strlen($string, $encoding);
  $firstChar = mb_substr($string, 0, 1, $encoding);
  $then = mb_substr($string, 1, $strlen - 1, $encoding);
  return mb_strtoupper($firstChar, $encoding) . $then;
}
