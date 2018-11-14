<?php

// Трэйт с реализацией фабричного метода
trait Trait_Singleton {

  // Фабричный метод
  public static function getInstance() {
    static $_instance;
    if ($_instance === null) {
      $_instance = new self();
    }
    return $_instance;
  }

}

// Реализация паттерна Singleton
class Pattern_Singleton {

  use Trait_Singleton;

  // Запрещаем внешний вызов __clone
  protected function __clone() {}

  // Запрещаем внешний вызов __wakeup()
  protected function __wakeup() {}

  // Запрещаем внешний вызов __construct
  protected function __construct() {}

}

?>