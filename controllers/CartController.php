<?php

class CartController {

    public function actionIndex() {

        $categories = array();
        $categories = Category::getCatedoryesList();

        $productsCart = false;

        $productsCart = Cart::getProducts();

        if ($productsCart) {

            //Полная информация о товарах находящихся в корзине
            $idsArray = array_keys($productsCart);
            $products = Product::getProductsIds($idsArray);

            //Получаем общую сумму всех товаров в корзине
            $totalPrice = Cart::getTotalPrice($products);
        }

    
        require_once (ROOT. '/views/cart/index.php');
        return true;
    }

    public function actionDeletes() {

        //Удалаем товар из корзины
        Cart::clear();
        header("Location: /cart/");
    }

    public function actionAdd($id) {

        //Добавляем товар в корзину
        Cart::addProduct($id);

        //Реврайтим пользователя в корзину
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax($id) {

        //Добавляем товар в корзину
        echo Cart::addProduct($id);

        return true;
    }

    public function actionDelete($id) {

        //Удалаем товар из корзины
        Cart::delete($id);
        header("Location: /cart");
    }

    public function actionCheckout() {
        
        $categories = array();
        $categories = Category::getCatedoryesList();

        $result = false;

        if (isset($_POST['submit'])) {

            // Если форма отправлена
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment  =$_POST['userComment'];

            $errors = false;
            if (!User::checkName($userName)) {

                $errors[] = 'Имя должно содержать минимум 2 символа';
            }
            if (!User::checkPhone($userPhone)) {

                $errors[] = 'Телефон должен быть не менее 8 символов';
            }

            if($errors == false) {

                $productsCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }

                // Сохраняем заказ в БД 
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsCart);

                if ($result) {
                    // Отправляем сообщение админу
                    $adminEmail = 'dva9001@gmail.com';
                    $message = 'http://phpstart/cart/checkout';
                    $subjet = 'Новый заказ';
                    mail($adminEmail, $subjet, $message);

                    // Очищаем корзину
                    Cart::clear();

                    $errors = '1';
                }
            } else {

                $productsCart = Cart::getProducts();
                $productsIds = array_keys($productsCart);
                $products = Product::getProductsIds($idsArray);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }

        } else {

            // Если НЕ форма отправлена
            $productsCart = Cart::getProducts();

            if ($productsCart == false) {

                header("Location: /");
            } else {

                //Полная информация о товарах находящихся в корзине
                $idsArray = array_keys($productsCart);
                $products = Product::getProductsIds($idsArray);

                //Получаем общую сумму всех товаров в корзине
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment  = false;

                if (User::isGuest()) {
                    // Пользователь не авторизован, оставляем формы пустыми
                } else {
                    // Пользователь авторизован, заполянем формы имеющимися данными
                    $userID = User::checkLogged();
                    $user = User::getUserID($userID);
                    // Записываем в форму
                    $userName = $user['name'];
                }
            }
        }

        require_once (ROOT. '/views/cart/checkout.php');

        return true;
    }
}