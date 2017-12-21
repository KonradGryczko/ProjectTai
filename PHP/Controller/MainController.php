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
            $a=new isLoggedService($where);
        }
        else {
            if(!empty($_POST['signUp'])){//Wciśnięto rejestracja

            }
            if(!empty($_POST['log'])){//Wciśnieto zalogój

            }
        }
    }
}