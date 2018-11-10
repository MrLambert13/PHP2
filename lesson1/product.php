<?php
/**
 * Created by PhpStorm.
 * User: mrlambert13
 * Date: 09.11.18
 * Time: 14:17
 */

class product
{
  public static $id = 0;
  private $article;
  private $group;
  private $name;
  private $description;
  private $count;
  private $price;
  private $discount;

  public function __construct(int $id, string $article, string $name, string $description, int $count, int $price, string $group) {
    $this->article = $article;
    $this->name = $name;
    $this->description = $description;
    $this->group = $group;
    $this->count = $count;
    $this->price = $price;
    self::$id += 1;
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
}