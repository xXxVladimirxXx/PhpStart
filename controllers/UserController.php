<?php

class UserController {

    //Регистрация пользоваетеля
    public function actionRegister() {

        $name = '';
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
    
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            /**
             * Проверям данные на их верность
             */
            if (!User::checkName($name)) {

                $errors[] = 'Имя должно содержать минимум 2 символа';
            }

            if (!User::checkEmail($email)) {

                $errors[] = 'Email должен соответствовать стандартам';
            }

            if (!User::checkPassword($password)) {

                $errors[] = 'Пароль должно содержать минимум 6 символов';
            }

            if (User::checkEmailExists($email)) {

                $errors[] = 'Такой email уже существует';
            }

            //Если всё удачно выводить сообщение и записываем данные в БД
            if($errors == false){
                $result = User::register($name, $email, $password);
            }
        }

        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    //Авторизация пользоваетеля
    public function actionLogin() {

        $email = '';
        $password = '';

        if(isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {

                $errors[] = 'Email должен соответствовать стандартам';
            }

            if (!User::checkPassword($password)) {

                $errors[] = 'Пароль должно содержать минимум 6 символов';
            }

            $userId = User::checkUserData($email, $password);
        
            if($userId == false) {

                $errors[] = 'Нерпавильный email или пароль';
            } else {

                User::auth($userId);
        
                header("Location: /cabinet"); 
            }
        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }
    
    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        
        unset($_SESSION["user"]);
        header("Location: /");
    }
}
