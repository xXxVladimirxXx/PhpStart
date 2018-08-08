<?php 

class ContactsController {

    public function actionIndex(){

        require_once(ROOT . '/views/contacts/contacts.php');

        return true;
    }
}