<?php

abstract class BaseCreature implements ICreature
{

}

interface ICreature
{
    public function say();

    public function die();

    public function sleep();
}

class Human extends BaseCreature
{
    public function die()
    {
        echo 'die...';
    }

    public function sleep()
    {
        echo 'sleep...';
    }

    public function say()
    {
        die();
    }
}

class Animal
{

}