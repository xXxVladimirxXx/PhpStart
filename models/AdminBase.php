<?php

abstract class AdminBase {

    public static function checkAdmin() {

        // Проверяем авторизировали пользователь
        $userId = User::checkLogged();

        // Получаем информацию о нём
        $user = User::getUserID($userId);

        // Если это админ, пускаем его в админ панель
        if ($user['role'] == 'admin') {
            return true;
        } else {

            // Если он не админ завершаем работу и уведомляем об ошибке прав
            die('Access denid');
        }
    }
}