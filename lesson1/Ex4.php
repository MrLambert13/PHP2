<?php

require_once 'Product.php';

$good1 = new Product(1, 123456, "Товар 1", "Описание товара 1", 10, 123, "Группа 1");
$good2 = new Product(2, 123457, "Товар 2", "Описание товара 2", 3, 421, "Группа 1");
$good3 = new Product(3, 152312, "Товар 3", "Описание товара 3", 32, 42, "Группа 2");

$good1->getInfo();
$good2->getInfo();
$good3->getInfo();
