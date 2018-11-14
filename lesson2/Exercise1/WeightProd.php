<?php

require_once 'config.php';

class WeightProd extends Product {

  function revenue(float $count) {
    $message = 'Выручка составила: ';
    return $message . ($this->totalPrice() * $count);
  }

}