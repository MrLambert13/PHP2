<?php

require 'vendor/autoload.php';

use App\View\Page;

include 'vendor/twig/autoload.php';

// подключение к бд
try {
  $dbh = new PDO('mysql:dbname=gallery;host=mrlambert.ru', 'root', '123456');
} catch (PDOException $e) {
  echo "Error: Could not connect. " . $e->getMessage();
}

// установка error режима
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// выполняем запрос
try {
  // формируем SELECT запрос
  // в результате каждая строка таблицы будет объектом
  $sql = "SELECT * FROM image";
  $sth = $dbh->query($sql);
  //в массив
  while ($row = $sth->fetchAll()) {
    $data[] = $row;
  }
  // закрываем соединение
  unset($dbh);

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}

//путь и названия для работы с локальной галереей
$pathToImgFolder = 'img/gallery/';
$arrImg = array_diff(scandir($pathToImgFolder), array('..', '.'));

//$page = new Page('home');
/*echo $page->render([
    'currentDate' => date('d-m-Y'),
    'error' => false,
    'users' => [
        [
            'login' => 'admin',
            'email' => 'admin@com.com'
        ],
        [
            'login' => 'admin2',
            'email' => 'admin2@com.com'
        ],
        [
            'login' => 'admin3',
            'email' => 'admin3@com.com'
        ],
    ],
]);*/

$gallery = new Page('gallery');

echo $gallery->render([
  'arrImg' => $arrImg,
  'path' => $pathToImgFolder,
  'data' => $data[0]
]);