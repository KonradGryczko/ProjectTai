<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-19
 * Time: 11:33
 */

class MainController
{
    public function __construct($where)
    {
        if(empty($_POST)){//Czy wciśnieto jakiś przycisk
            include_once 'isLogedService.php';
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