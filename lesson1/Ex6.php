<?php

class A {
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}

class B extends A {
}

$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2
//здесь а1 и b1 экземпляры разных классов, поэтому у каждого своя переменная х, и увеличивается для каждого экземпляра отдельно