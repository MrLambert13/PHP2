<?php
use app\controllers\ProductController;
use app\controllers\HomeController;
use app\controllers\LoginController;
use app\controllers\PageController;
use app\controllers\SiteController;

/**
 * Настройки маршрутов приложения
 */
return [
    'routes' => [
        //'website/path' => ['ControllerClass', 'actionName'],
        //        '/' => [SiteController::class, 'index'],

        'pages' => [PageController::class, 'index'],
        'pages/new' => [PageController::class, 'add'],
        'page/{id}' => [PageController::class, 'show'],

        '/' => [HomeController::class, 'page'],
        'account' => [LoginController::class, 'account'],
        'login' => [LoginController::class, 'login'],
        'logout' => [LoginController::class, 'logout'],
        'product' => [ProductController::class, 'index' ],
        'product/add' => [ProductController::class, 'add' ],
        'product/{id}' => [ProductController::class, 'one' ],
        'cart' => [LoginController::class, 'showcart'],

    ],
];