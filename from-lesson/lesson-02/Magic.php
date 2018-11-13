<?php

namespace lesson\tools;
//use lesson\tools\Magic;

/**
 * Class Magic
 *
 * @var $name
 * @property-read int $id
 */
class Magic
{
    private $id;
    public $name;

    public function __construct(int $id) {
        $this->id = $id;
        $this->name = 'unnamed';
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return "Object#{$this->id}, name: {$this->name}";
    }

    public function __get($name)
    {
        $method = "get".ucfirst($name); //getId

        if (method_exists($this, $method)) {
            return $this->{$method}();
        } else {
            echo "ERROR: property not found \n";
            return false;
        }
    }

    public function __set($name, $value)
    {
        $method = "set".ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->{$method}($value);
        } else {
            echo "ERROR: method not found \n";
            return false;
        }
    }

    /**
     * @return int
     */
    private function getId() {
        return $this->id;
    }

    private function getSomeText() {
        return 'testetsetet';
    }

    private function setPassword($value) {
        // md5
        // password_hash
        echo "New password was set\n";
    }

}

$obj = new Magic('aslkdjalksdj');
//echo $obj->name;
//echo $obj->id;
//echo $obj->someText;
//$obj->password = '123123';

echo $obj;