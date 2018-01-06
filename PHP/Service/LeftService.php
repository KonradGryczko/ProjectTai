<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2018-01-04
 * Time: 11:04
 */

class LeftService
{

    public function LogIn($login,$passwd){
        include_once 'FilterService.php';
        include_once 'DbService.php';

        $filter=new FilterService();
        $db=new DbService("tai");

        $login=strip_tags($login);
        $passwd=strip_tags($passwd);
        if($filter->checkLoginIsCorrectLogin($login) And $filter->checkPasswordIsCorrectLogIn($passwd)AND $db->checkUser($login,md5($passwd))>0 )
            return true;
        else
            return false;
    }

    public function SignUp()
    {
        include_once 'FilterService.php';
        include_once 'DbService.php';
        $filter = new FilterService();
        $db = new DbService("tai");

        $login = strip_tags($_POST['login']);
        $password = strip_tags($_POST['password']);
        if ($filter->checkLoginIsCorrect($login) AND $filter->checkPasswordIsCorrect($password)) {

            if ($db->isLoginTaken($login)){
                return 0;
            }
            else return 2;
        }
        else return 1;
    }

    public function AddUser(){
        include_once 'DbService.php';
        include_once 'FileManagerService.php';

        $db = new DbService("tai");
        $login = strip_tags($_POST['login']);
        $password = strip_tags($_POST['password']);
        $db->addUser($login,$_POST['email'],md5($password));
        $file=new FileManagerService($_POST['login']);
        $file->addDirection();
        $file->coppyAvatar();
    }


}