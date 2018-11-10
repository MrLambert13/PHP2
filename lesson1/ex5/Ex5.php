<?php

class A
{
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}