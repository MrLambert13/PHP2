<?php

abstract class Product {
  public $article;
  public $name;
  public $price;

  public function __construct(int $article, string $name) {
    $this->article = $article;
    $this->name = $name;
    $this->price = 100;
  }

  public function totalPrice() {
    return $this->price;
  }

  public function revenue($count) {
    $message = 'Выручка составила: ';
    return $message . ($this->totalPrice() * $count);
  }

}