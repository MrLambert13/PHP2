<?php
/**
 * Created by Artem Manchenkov
 * artyom@manchenkoff.me
 * manchenkoff.me © 2018
 */

use app\controllers\HomeController;
use app\controllers\LoginController;

/**
 * Настройки маршрутов приложения
 */
return [
    'routes' => [
        //'website/path' => ['ControllerClass', 'actionName'],

        '/' => [HomeController::class, 'page'],
        'account' => [LoginController::class, 'account'],
        'login' => [LoginController::class, 'login'],
    ],
];