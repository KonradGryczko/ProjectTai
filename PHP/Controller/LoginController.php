<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-19
 * Time: 12:39
 *
 * Sprawdzenie czy użytkownik zalogowany
 */

class LoginController
{
    private $login;
    private $password;
    private $loginServices;
    public function __construct($login,$password)
    {
        $this->login=$login;
        $this->password=$password;
        include_once __DIR__.'../Service/LoginService.php';
        $this->loginServices=new LoginService($this->login,$this->password);
        if($this->loginServices->isUserExist()){
            include __DIR__.'../View/ErrorLoginDataView.php';
            $view=new ErrorLoginDataView();
        }
        else{
            include_once __DIR__.'../Service/LogMeService.php';
            $LogMeService=new LogMeService();
        }
    }
}