<?php

class CatalogController {

    public static function actionIndex($page = 1) {

        $categories = array();
        $categories = Category::getCatedoryesList();


        $productsList = array();
        $productsList = Product::getLatestProducts(9, $page);

        $total = Product::getTotalProductsCatatalog();

        //Пагинация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public static function actionCategory($categoryId, $page = 1) {

        $categories = array();
        $categories = Category::getCatedoryesList();


        $productsList = array();
        $productsList = Product::getProductsListCategory($categoryId, $page);

        $total = Product::getTotalProductsCatagory($categoryId);

        //Пагинация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }
}