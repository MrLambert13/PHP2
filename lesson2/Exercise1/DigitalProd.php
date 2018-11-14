<?php

require_once 'config.php';

class DigitalProd extends Product {
  function totalPrice() {
    return parent::totalPrice() / 2;
  }
}