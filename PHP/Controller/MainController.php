<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-19
 * Time: 11:33
 */

class MainController
{
    public function __construct()
    {
        if(empty($_POST)){//Czy wciśnieto jakiś przycisk
            include_once 'Login.php';
            $a=new Login();
        }
        else {
            if(!empty($_POST['signUp'])){
                echo "Radio Ma ryja";
            }
            if(!empty($_POST['log'])){
                echo print_r($_POST);
            }
        }
    }
}