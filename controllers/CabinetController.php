<?php

class CabinetController {

    public static function actionIndex() {

        $userId = User::checkLogged();

        $user = User::getUserID($userId);
        
        require_once ROOT . '/views/cabinet/index.php';

        return true;
    }

    public static function actionEdit() {

        $userId = User::checkLogged();

        $user = User::getUserID($userId);
        
        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
    
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            /**
             * Проверям данные на их верность
             */
            if (!User::checkName($name)) {

                $errors[] = 'Имя должно содержать минимум 2 символа';
            }

            if (!User::checkPassword($password)) {

                $errors[] = 'Пароль должен содержать минимум 6 символов';
            }

            //Если всё удачно выводить сообщение и изменяем данные в БД
            if($errors == false){
                $result = User::edit($userId, $name, $password);
            }
        }

        
        require_once ROOT . '/views/cabinet/edit.php';

        return true;
    }
}