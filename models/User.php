<?php

class User {

    public static function register($name, $email, $password) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function edit($userId, $name, $password) {

        $db = Db::getConnection();

        $sql = "UPDATE user
                SET name = :name, password = :password
                WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkUserData($email, $password) {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    //Записываем id пользователя в сессию
    public static function auth($userId) {

        $_SESSION['user'] = $userId;
    }

    //Проверям на факт авторизации
    public static function checkLogged() {

        if (isset($_SESSION['user'])) {

            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest() {

        if (isset($_SESSION['user'])) {

            return false;
        }
        return true;
    }

    //Имя должно быть не меньше чем 2 символа
    public static function checkName($name) {

        if (strlen($name) >= 2) {

            return true;
        }

        return false;
    }

    //Email должен соответсвовать стандартам
    public static function checkEmail($email) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            return true;
        }

        return false;
    }

    //Пароль должен быть не меньше чем 6 символов
    public static function checkPassword($password) {

        if (strlen($password) >= 6) {
            
            return true;
        }

        return false;
    }

    //Прорка телефона на длинну
    public static function checkPhone($userPhone) {

        if (strlen($userPhone) >= 8) {
            
            return true;
        }

        return false;
    }

    //Проверка на существование похожих email
    public static function checkEmailExists($email) {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }

    //Запрашиваем информацию о пользователе по id
    public static function getUserID($userId) {

        if ($userId) {

            $db = Db::getConnection();

            $sql = 'SELECT * FROM user WHERE id = :id';
    
            $result = $db->prepare($sql);
            $result->bindParam(':id', $userId, PDO::PARAM_INT);

            $result->setFEtchMode(PDO::FETCH_ASSOC);
            $result->execute();
    
            return $result->fetch();
        }
    }
}