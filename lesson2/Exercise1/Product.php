<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.11.2018
 * Time: 16:48
 */

abstract class Product {
  public $article;
  public $name;

  public function __construct(int $article, string $name) {
    $this->article = $article;
    $this->name = $name;
  }

}