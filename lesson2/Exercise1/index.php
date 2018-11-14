<?php
require_once 'config.php';

$obj1 = new DigitalProd(1, "Prod1");
$obj2 = new PhysicalProd(2, "Prod2");
$obj3 = new WeightProd(3, "Prod3");

echo $obj1->totalPrice() ."\n";
echo $obj1->revenue() ."\n";
echo $obj2->totalPrice() ."\n";
echo $obj2->revenue() ."\n";
echo $obj3->totalPrice(0.56) ."\n";
echo $obj3->revenue() ."\n";



?>