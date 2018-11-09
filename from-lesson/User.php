<?php

class User
{
    const USER_TYPE_ADMIN = 0;
    const USER_TYPE_SIMPLE = 1;

    public static $count = 0;

    public $login;
    public $userType = User::USER_TYPE_SIMPLE;
    private $password;

    public function __construct(string $login)
    {
        $this->login = $login;
        self::$count += 1;
    }

    public function showHello()
    {
        if (!is_null($this->login)) {
            echo "Hello, {$this->login} \n";
        } else {
            echo "User login is empty! \n";
        }
    }

    private function generateHash(string $value) {
        return md5(
            md5('ksjDH2G9UH8AUGDF8DIEWH') . md5($value)
        );
    }

    public function setPassword(string $password)
    {
        $this->password = $this->generateHash($password);
    }

    public function validatePassword(string $password)
    {
        return ($this->password == $this->generateHash($password));
    }

    public static function showTypes() {
        echo 'user => '.self::USER_TYPE_SIMPLE."\n";
        echo 'admin => '.self::USER_TYPE_ADMIN."\n";
    }

    public static function showCounter() {
        echo "Users: ".self::$count."\n";
    }
}