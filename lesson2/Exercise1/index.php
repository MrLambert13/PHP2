<?php
require_once 'config.php';

$obj1 = new DigitalProd(1, "Prod1");
$obj2 = new PhysicalProd(2, "Prod2");
$obj3 = new WeightProd(3, "Prod3");

echo $obj1->revenue(3) ."\n";
echo $obj2->revenue(3) ."\n";
echo $obj3->revenue(3.56) ."\n";



?>