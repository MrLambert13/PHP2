<?php

class Example
{
    //protected $settings = [
    //    'user' => 'root',
    //    'password' => '123123',
    //];

    protected function getSettings()
    {
        return [
            'user' => 'root',
            'password' => '123123',
        ];
    }
}

class ExampleMySQL extends Example
{
    //public $settings = parent::$settings;
    //    [
    //    'host' => 'localhost',
    //];
    public function getSettings()
    {
        $parent = parent::getSettings();
        //$parent['host'] = 'localhost';

        $self = [
            'host' => 'localhost',
        ];

        $parent = array_merge(
            $parent,
            $self
        );

        return $parent;
    }
}

$obj = new ExampleMySQL();
var_dump($obj->getSettings());