<?php
/**
 * Created by Artem Manchenkov
 * artyom@manchenkoff.me
 * manchenkoff.me © 2018
 */

namespace core;

use core\traits\Singleton;

/**
 * Класс приложения, который содержит всю логику
 * инициализации подключения компонентов, сервисов и базы данных
 *
 * @package core
 */
class Application
{
    use Singleton;
}