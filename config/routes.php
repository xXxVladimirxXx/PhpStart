<?php

return array(

    // Просмотр товара
    'product/([0-9]+)' => 'product/view/$1',
    
    // Каталог товаров
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index',

    // Категории товаров
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

    // Корзина
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/checkout' => 'cart/checkout',
    'cart/deletes' => 'cart/deletes',
    'cart' => 'cart/index',

    // User
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    // Кабинет user
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    /**
     * Админка
     */
    // Редактирование товаров
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    // Редактирование категорий товаров
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    //Редактирование заказов
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',

    // Админ-панель
    'admin' => 'admin/index',

    // Страница о нас и контакты
    'about' => 'about/index',
    'contacts' => 'contacts/index',

    // Форма обратной связи
    'contact' => 'site/contact',

    '' => 'site/index', // Rewrite на главную 
);