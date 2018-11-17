<?php

require 'vendor/autoload.php';

use App\Exceptions\InvalidAgeException;

$age = 70;

/**
 * @param int $age
 *
 * @throws Exception
 */
function checkAge(int $age) {
    if ($age < 16) {
        throw new Exception('Invalid age');
    } else {
        echo 'OK '.PHP_EOL;
    }
}

try {
    checkAge($age);
} catch (Exception $exception) {
    echo "Oooops, " . $exception->getMessage();
}

echo 'TESTETSET';