<?php

require_once 'config.php';

class WeightProd extends Product {
  function totalPrice(int $weight) {
    return parent::totalPrice() * $weight;
  }
}