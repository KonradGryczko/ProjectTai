<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-28
 * Time: 19:13
 */

class AddUserServices
{
    private $login;
    private $email;
    private $password;
    private $anyError;

    private $filter;
    private $db;
    private $path;

    public function __construct($where)
    {

        include_once 'FilterService.php';
        $this->filter=new FilterService();
        //widok
        //generowanie widok
        $this->path= __DIR__ . '/../View/AnyView.php';
        include_once $this->path;
        $this->path=__DIR__."/DbService.php";
        include_once $this->path;
        $form=new AnyView();
        $this->db=new DbService("tai");
        switch ($where){
            case 1:
                echo $form->getBannerForm();

                break;
            case 2:
                $this->fackEmall();
                if($this->anyError>0)
                    echo $form->getErrorLeftForm();
                else
                    echo $form->getLeftForm();
                break;
            case 3:
                $this->fackEmallAndAddIfGood();
                switch ($this->anyError) {
                    case 0:
                        echo $form->getMainForm();
                        break;
                    case 1:
                        echo $form->getMainError1();
                        break;
                    case 2:
                        echo $form->getMainError2();
                        break;
                }
                break;
            case 4:
                echo $form->getBottomForm();
                break;
        }

    }

    private function fackEmall(){
        //pobranie danych
        $this->anyError=0;
        $login=$_POST['login'];
        $email=$_POST['email'];
        $password=$_POST['pass'];

        //sprawdzenie poprawności
        $this->login=$this->checkLogin($login);
        $this->email=$this->checkEmail($email);
        $this->password=$this->checkPassword($password);


        if((is_null($this->login) or is_null($this->password)) or !$this->db->isLoginTaken($this->login)){
            $this->anyError= 1;
        }
        else{
            $this->password=md5($this->password);
            if(is_null($this->email) or !$this->db->isMailTaken($this->email)){
                $this->anyError=2;
            }
        }
    }

    private function checkLogin($login){
        $login=strip_tags($login);
        if(!is_null($this->filter->checkLoginIsCorrect($login))){
            return $login;
        }
        else return null;

    }

    private function checkEmail($email){
        $email=strip_tags($email);
        if(!is_null($this->filter->checkEmailIsCorrect($email))){
            return $email;
        }
        else return null;
    }

    private function checkPassword($password)
    {
        if(!is_null($this->filter->checkPasswordIsCorrect($password)))
            return $password;
        else return null;
    }

    private function fackEmallAndAddIfGood()
    {
        $this->fackEmall();
        if($this->anyError==0){
            $this->db->addUser($this->login,$this->email,$this->password);
        }
    }


}