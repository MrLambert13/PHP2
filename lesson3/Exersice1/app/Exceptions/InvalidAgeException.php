<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class InvalidAgeException extends Exception
{
    private $age;

    public function __construct(string $message = "", int $code = 0, Throwable $previous = null, int $age) {
        parent::__construct($message, $code, $previous);
        $this->age = $age;
    }
}