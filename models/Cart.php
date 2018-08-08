<?php 

class Cart {

    // Записываем в массив id товаров добаленных в корзину
    public static function addProduct($id) {

        $id = intval($id);

        $productsCart = array();

        // Записываем товар в массив
        if (isset($_SESSION['products'])) {

            $productsCart = $_SESSION['products'];
        }

        // Прорверяем наличие товаров в массиве
        if (array_key_exists($id, $productsCart)) {

            $productsCart[$id] ++;
        } else {

            $productsCart[$id] = 1;
        }

        $_SESSION['products'] = $productsCart;
        
        return self::countItems();
    }

    // Считаем количество товаров добавленных в корзину
    public static function countItems() {

        // Прорверяем наличие товаров в массиве
        if (isset($_SESSION['products'])) {

            $count = 0;

            // Считаем количество товаров
            foreach($_SESSION['products'] as $id => $quantity) {

                $count = $count + $quantity;
            }

            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts() {

        if (isset($_SESSION['products'])) {

            return $_SESSION['products'];
        }

        return false;
    }

    // Считаем сумму всех товаров в корзине
    public static function getTotalPrice($products) {

        $productsCart = self::getProducts();

        $total = 0;

        if ($productsCart) {

            foreach ($products as $item) {
                $total += $item['price'] * $productsCart[$item['id']];
            }
        }

        return $total;
    }

    // Очищаем корзину
    public static function clear() {

        if (isset($_SESSION['products'])) {

            unset($_SESSION['products']);
        }
    }

    // Очищаем корзину
    public static function delete($id) {
        
        $productsCart = self::getProducts();

        unset($productsCart[$id]);

        $_SESSION['products'] = $productsCart;
        
    }
}