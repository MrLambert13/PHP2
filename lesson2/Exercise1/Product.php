<?php

abstract class Product {
  public $article;
  public $name;
  public $count;
  public $price;

  public function __construct(int $article, string $name) {
    $this->article = $article;
    $this->name = $name;
  }

  public function totalPrice() {
    return $this->price;
  }

  public function revenue() {
    $message = 'Выручка составила: ';
    return $message . ($this->totalPrice() - $this->price);
  }

}