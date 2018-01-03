<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-19
 * Time: 11:33
 */

class MainController
{
    private $path;
    public function __construct($where)
    {

        if(empty($_POST)){//Czy wciśnieto jakiś przycisk
            $this->path=__DIR__.'/../Service/isLoggedService.php';
            include_once $this->path;
            new isLoggedService($where);
        }
        else {
            if(!empty($_POST['signUp'])){//Wciśnięto rejestracja
                $this->path=__DIR__.'/../Service/SignUpService.php';
                include_once $this->path;
                new SignUpService($where);
            }
            if(!empty($_POST['log'])){//Wciśnieto zalogój
                $this->path=__DIR__.'/../Service/LogMeInServices.php';
                include_once $this->path;
                new LogMeInServices($where);
            }
            if(!empty($_POST['event'])){
                $this->path=__DIR__.'/../Service/EventServices.php';
                include_once $this->path;
                new EventServices($where);
            }
            if(!empty($_POST['add'])){

            }
            if(!empty($_POST['logOff'])){

            }
            if(!empty($_POST['SaveEvent'])){
                $this->path=__DIR__."/../Service/AddEvent.php";
                new AddEvent();
            }
            if(!empty($_POST['edit'])){

            }
            if(!empty($_POST['detail'])){
                
            }

            if(!empty($_POST['reg'])){
                $this->path=__DIR__.'/../Service/AddUserServices.php';
                include_once $this->path;
                new AddUserServices($where);
            }
        }

    }
}