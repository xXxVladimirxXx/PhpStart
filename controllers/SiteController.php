<?php

class SiteController {

    public static function actionIndex(){

         // Список категорий для левого меню
         $categories = Category::getCatedoryesList();

         // Список последних товаров
         $productsList = Product::getLatestProducts(6);
 
         // Список товаров для слайдера
         $sliderProducts = Product::getRecommendedProducts(3);
 
         // Подключаем вид
         require_once(ROOT . '/views/site/index.php');
         return true;
    }


    public static function actionContact(){

        $userEmail = '';
        $userText = '';
        $result = false;
        
        if (isset($_POST['submit'])) {
            
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
    
            $errors = false;
                        
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            
            if ($errors == false) {
                $adminEmail = 'dva9001@gmail.com';
                $subject = 'Тема письма';    
                $message = "Текст: {$userText}";
                $userEmail = "От {$userEmail}";
                $result = mail($adminEmail, $subject, $message, $userEmail);
                $result = true;
            }

        }
        
        require_once(ROOT . '/views/site/contact.php');
        
        return true;
    }
}