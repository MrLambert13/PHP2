<?php
//Обработка post запроса

require '../../engine/core.php';

//получаем с какого места продолжать запросы в БД
$startFrom = $_POST['startFrom'];
//получаем номер категории товара
$id = $_POST['id'];
//получаем массив данных из БД
$res = getItemArray(
    "select * from products where id_category={$id} LIMIT {$startFrom}, 2"
  );
//возвращаем в ajax запрос
echo json_encode($res);
