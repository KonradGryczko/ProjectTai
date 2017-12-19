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

class isLoggedService
{
    private $isLogged;
    private $path;
    public function __construct($where)
    {
        if(session_status()==PHP_SESSION_NONE){
            $this->path= __DIR__ . '/../View/NotLoggedView.php';
            include_once $this->path;
            $form=new NotLoggedView();
            $this->isLogged="false";
            switch ($where){
                case 1:
                    echo $form->getBannerForm();
                    break;
                case 2:
                    echo $form->getLeftForm();
                    break;
                case 3:
                    echo $form->getMainForm();
                    break;
                case 4:
                    echo $form->getBottomForm();
                    break;
            }

        }
        else{
            $this->path= __DIR__ . '/../View/LoggedFormUser.php';
            include_once $this->path;
            $form=new LoggedFormUser();
            $this->isLogged="true";
            switch ($where){
                case 1:
                    echo $form->getBannerForm();
                    break;
                case 2:
                    echo $form->getLeftForm();
                    break;
                case 3:
                    echo $form->getMainForm();
                    break;
                case 4:
                    echo $form->getBottomForm();
                    break;
            }
        }
    }
    function isLogged(){
        return $this->isLogged;
    }
}