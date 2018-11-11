<?php

require_once 'Product.php';

class Shoes extends Product {

  public $group = "Обувь";

  public function __construct(int $id, string $article, string $name, string $description, int $count, int $price) {
    $this->id = $id;
    $this->article = $article;
    $this->name = $name;
    $this->description = $description;
    $this->count = $count;
    $this->price = $price;
  }
}

$good1 = new Product(1, 123456, "Товар 1", "Описание товара 1", 10, 123, "Группа 1");
$good2 = new Product(2, 123457, "Товар 2", "Описание товара 2", 3, 421, "Группа 1");
$good3 = new Shoes(3, 152312, "Товар 3", "Описание товара 3", 32, 42);

$good1->getInfo();
$good2->getInfo();
$good3->getInfo();
