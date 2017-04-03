<?php
require  __DIR__ . '/vendor/autoload.php';


if ($_POST['address']) {
  $api = new \Yandex\Geo\Api();


  $api->setQuery($_POST['address']);


  $api
      ->setLang(\Yandex\Geo\Api::LANG_RU)
      ->load();

  $response = $api->getResponse();
  $response->getFoundCount();
  $response->getQuery();
  $response->getLatitude();
  $response->getLongitude();


  $collection = $response->getList();
  echo "<ul>";
  foreach ($collection as $item) {
      echo "<li>";
      echo $item->getLatitude(). ' ' .$item->getLongitude();
      echo "</li>";
  }
  echo "</ul>";

}
?>


!<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="POST">
      <input type="text" name="address" />
      <button>найти</button>
    </form>
  </body>
</html>
