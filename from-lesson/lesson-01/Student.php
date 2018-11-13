<?php

require 'User.php';

class Student extends User
{
    public $currentLevel;

    public function __construct(string $login, int $currentLevel) {
        parent::__construct($login);

        $this->currentLevel = $currentLevel;
    }

    public function showHello()
    {
        if (!is_null($this->login)) {
            echo "Hello, {$this->login}. My level is {$this->currentLevel} \n";
        } else {
            echo "User login is empty! \n";
        }
    }
}