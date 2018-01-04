<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-28
 * Time: 15:38
 */

class FilterService
{

    //event

    public function checkPlaceIsCorrect($place)
    {
        if(preg_match('/^([A-Za-z]{3,30})$/D', $place))
            return $place;
        else return null;
    }

    public function checkTitleIsCorrect($title)
    {
        if(preg_match('/^([A-Za-z]{1})([A-Za-z0-9]{1-30})$/D', $title))
            return $title;
        else return null;
    }
    public function checkDateIsCorrect($date)
    {
        if(preg_match('/^([A-Za-z]{3,30})$/D',$date))
            return $date;
        else return null;
    }

    //rejestracja
    public function checkLoginIsCorrect($login){
        if(preg_match('/^([A-Za-z]{1})([A-Za-z0-9]{1,30})$/D', $login))
            return $login;
        else return null;
    }

    public function checkEmailIsCorrect($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        else return null;
    }

    public function checkPasswordIsCorrect($password)
    {
        if (preg_match('/^([A-Za-z0-9]{6,24})/D', $password)) {
            return $password;
        }
        else return null;
    }

    //logowanie
    public function checkLoginIsCorrectLogin($login){
        if(preg_match('/^([A-Za-z]{1})([A-Za-z0-9]{1,30})$/D', $login))
            return true;
        else return false;
    }



    public function checkPasswordIsCorrectLogIn($password)
    {
        if (preg_match('/^([A-Za-z0-9]{6,24})/D', $password)) {
            return true;
        }
        else return false;
    }
}