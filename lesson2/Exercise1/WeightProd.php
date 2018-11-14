<?php

require_once 'config.php';

class WeightProd extends Product {
  private $result;
  function totalPrice(float $weight) {
    $this->result = parent::totalPrice() * $weight;
    return $this->result;
  }

  function revenue() {
    $message = 'Выручка составила: ';
    return $message . ($this->result - $this->price);
  }

}