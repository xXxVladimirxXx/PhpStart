<?php

class ProductController {

    public static function actionView($productId){

        $categories = array();
        $categories = Category::getCatedoryesList();

        $product = Product::getProductId($productId);

        require_once(ROOT . '/views/product/view.php');

        return true;
    }
}