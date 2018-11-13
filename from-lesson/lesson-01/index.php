<?php

//require 'User.php';
require 'Student.php';

$john = new User('John');
//$john->password = '123123';
$john->setPassword('123123');
$john->userType = User::USER_TYPE_ADMIN;

$artur = new User('Artur');
//$john->login = 'John';
$john->showHello();
//$artur->showHello();
//var_dump($john);
//print_r($john);
//var_dump($john->validatePassword('1231232'));
//echo $john->password;

//$artur->showTypes();

//User::showTypes();
//$artur->showCounter();
//User::showCounter();

$testStudent = new Student('Jimmy', 10);
$testStudent->showHello();