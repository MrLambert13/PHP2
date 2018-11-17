<?php

require 'vendor/autoload.php';

use App\View\Page;

$page = new Page('home');

echo $page->render([
    'currentDate' => date('d-m-Y'),
    'error' => false,
    'users' => [
        [
            'login' => 'admin',
            'email' => 'admin@com.com'
        ],
        [
            'login' => 'admin2',
            'email' => 'admin2@com.com'
        ],
        [
            'login' => 'admin3',
            'email' => 'admin3@com.com'
        ],
    ],
]);