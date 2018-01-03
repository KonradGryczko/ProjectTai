<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-31
 * Time: 12:19
 */

class LogMeInServices
{
//sprawdzić poprawność danych
    private $login;
    private $password;//zrobić by było md5
    private $level;

    private $path;
    private $db;
    public function __construct($where)
    {
        $this->path= __DIR__ . '/../View/NotLoggedView.php';
        include_once $this->path;
        $this->path= __DIR__ . '/../View/LoggedFormUser.php';
        include_once $this->path;

        switch ($where){
            case 1:
                $this->startLogin();
                if(!session_id()=="")
                    $form=new LoggedFormUser();
                else $form=new NotLoggedView();
                echo $form->getBannerForm();
                break;
            case 2:
                if(!session_id()=="")
                    $form=new LoggedFormUser();
                else $form=new NotLoggedView();
                echo $form->getLeftForm();
                break;
            case 3:
                if(!session_id()=="")
                    $form=new LoggedFormUser();
                else $form=new NotLoggedView();
                echo $form->getMainForm();
                break;
            case 4:
                if(!session_id()=="")
                    $form=new LoggedFormUser();
                else $form=new NotLoggedView();
                echo $form->getBottomForm();
                break;
        }
    }

    public function startLogin(){

        $this->login=$_POST['login'];
        $this->password=$_POST['pass'];
        $this->password=md5($this->password);
        $this->path=__DIR__."/DbService.php";
        include_once $this->path;

        $this->db=new DbService("tai");
        $this->level=$this->db->checkUser($this->login,$this->password);
        if($this->level!=0) {
            session_start();
            $_SESSION['login']=$this->login;
        }
    }



}