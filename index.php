<?php

// Front controller

    // 1. Общие настройи сайта
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    session_start();

    // 2. Поключение файлов системы
    define('ROOT', dirname(__FILE__));
    require_once(ROOT . '/components/Autoload.php');

    // 4. Вызов Router
    $router = new Router();
    $router->run();