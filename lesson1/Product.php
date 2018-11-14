<?php

class Product {
  public $id;
  public $article;
  public $group;
  public $name;
  public $description;
  public $count;
  public $price;
  public $discount;

  public function __construct(int $id, string $article, string $name, string $description, int $count, int $price, string $group) {
    $this->id = $id;
    $this->article = $article;
    $this->name = $name;
    $this->description = $description;
    $this->group = $group;
    $this->count = $count;
    $this->price = $price;
  }

  function deleteProduct($id) {
    $sql = "DELETE * FROM `database_name` WHERE id = {$id}";

    //TODO SQL запрос
  }

  function setDiscount(int $discount) {
    $this->discount = $discount;
    $sql = "UPDATE `database_name` SET discount = {$discount} WHERE id = {$this->id}";

    //TODO SQL запрос
  }

  function deleteDiscount() {
    $this->discount = 0;
    $sql = "UPDATE `database_name` SET discount = {$this->discount} WHERE id = {$this->id}";

    //TODO SQL запрос
  }

  function getInfo() {
    echo "<h1>{$this->name}</h1>"
      . "<h2>{$this->price} руб.</h2>"
      . "<h3>{$this->group}</h3>"
      . "<h3>Осталось: {$this->count} шт.</h3>"
      . "<p>{$this->discount}</p>";
  }
}