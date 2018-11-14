<?php

include_once 'Singleton.php';

//-----------------------------------------------
// Реализация базового класса Our,
// родителя для My и Your
//-----------------------------------------------
class Our extends Pattern_Singleton {

  use Trait_Singleton;

  public $class_name = 'Our';
  public $instance_id;

  // Реализация конструктора для класса Our
  protected function __construct() {
    parent::__construct();
    $this->instance_id = rand();
  }

  // Метод для отображения содержимого класса Our и его потомков
  public function showMe() {
    echo '<h2>'.$this->class_name.'</h2><pre>';
    print_r($this);
    echo '</pre>';
  }

}

//-----------------------------------------------
// Реализация класса Your
//
// Этот класс просто расширяет функциональность
// родителя, добавлением свойства $msg и его
// инициализацией в конструкторе
//-----------------------------------------------
class Your extends Our {

  use Trait_Singleton;

  public $class_name = 'Your';
  public $mgs = '';

  // Реализация конструктора для класса Your
  protected function __construct() {
    parent::__construct();
    $this->mgs = 'Your random id is '.$this->instance_id;
  }

}

//-----------------------------------------------
// Реализация класса My
//
// Этот класс расширяет функциональность родителя,
// добавлением свойств $msg и $my_val.
// При этом $my_val должен инициализироваться из
// параметра конструктора. В связи с этим
// необходимо переопределить фабричный метод
// непосредственно в данном классе.
//-----------------------------------------------
class My extends Our {

  //    use Trait_Singleton; // Не обязательно указывать, так как
  // единственный метод трэйта переопределен
  // в классе

  public $class_name = 'My';
  public $mgs = '';
  public $my_val;

  // Перекрываем фабричный метод трэйта, так как
  // надо передать параметр
  public static function getInstance($val=null) {
    static $_instance;
    if ($_instance === null) {
      $_instance = new self($val);
    }
    return $_instance;
  }

  // Реализация конструктора для класса My
  protected function __construct($val=null) {
    parent::__construct();
    $this->mgs = 'My random id is '.$this->instance_id;
    $this->my_val = $val;
  }

}

//===============================================
// Пример использования
//===============================================
// Создаем экземпляр Your
$O1 = Your::getInstance('1st Your');
$O1->showMe();
$O2 = Your::getInstance('2nd Your');
$O2->showMe();

// Создаем экземпляр My
$O3 = My::getInstance('My Value !!!');
$O3->showMe();
$O4 = My::getInstance();
$O4->showMe();

// Создаем экземпляр Our
$O5 = Our::getInstance();
$O5->showMe();
$O6 = Our::getInstance();
$O6->showMe();

?>