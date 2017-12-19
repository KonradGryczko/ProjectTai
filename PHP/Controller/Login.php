<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-18
 * Time: 23:06
 *
 * przerobić
 * najlepiej napisać od nowa
 */

class Login
{
    private $isLogged;
    private $path;
    public function __construct()
    {
        if(session_status()==PHP_SESSION_NONE){
            $this->path= __DIR__ . '/../View/NotLoggedView.php';
            include_once $this->path;
            $form=new NotLoggedView();
            $this->isLogged="false";
            echo $form->makeForm();
        }
        else{
            $this->path=__DIR__.'/../View/LeftLogged.php';
            include_once $this->path;
            $form=new LeftLogged();
            $this->isLogged="true";
            echo $form->makeForm($_SESSION['id']);
        }
    }
    function isLogged(){
        return $this->isLogged;
    }
}