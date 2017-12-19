<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-19
 * Time: 12:41
 */

class LoginService
{
    private $login;
    private $password;
    public function __construct($log,$pass)
    {
        $this->login=$log;
        $this->password=$pass;
    }

    function isUserExist(){
        return false;
    }
}