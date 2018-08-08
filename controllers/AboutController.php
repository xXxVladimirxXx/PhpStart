<?php 

class AboutController {

    public function actionIndex(){

        require_once(ROOT . '/views/about/about.php');

        return true;
    }
}