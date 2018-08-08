<?php

class Db {

    public static function getConnection() {

    $papamsPath = ROOT . '/config/db_params.php';
    $params = include($papamsPath);

    $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
    $db = new PDO($dsn, $params['user'], $params['password']);

    return $db;
    }
}
