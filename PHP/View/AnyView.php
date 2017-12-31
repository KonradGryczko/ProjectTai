<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-31
 * Time: 09:54
 */

class AnyView
{

    private $bannerForm;
    private $leftForm;
    private $leftFormError;
    private $mainForm;
    private $mainForm1;
    private $mainForm2;
    private $bottomForm;

    public function __construct()
    {
        $this->setBanner();
        $this->setLeft();
        $this->setLeftWithAnyError();
        $this->setMain();
        $this->setMain1();
        $this->setMain2();
        $this->setBottom();

    }

    //seter

    private function setBanner()
    {
        $this->bannerForm = "
            <p>Jakiś tam baner</p>
        ";
    }

    private function setLeft()
    {
        $this->leftForm = "        
            <form action='' method='post'> 
            Loggin:<br>
            <input name='login' value=''><br>
            Hasło<br>
            <input type='password' name='pass'><br>
            E-Mail<br>
            <input type='email' name='email'><br>
            <input type='submit' name='reg' value='reg'><br> 
            </form>            
        ";
    }

    private function setLeftWithAnyError(){
        $this->leftFormError = "        
            <form action='' method='post'> 
            Loggin:<br>
            <input name='login' value='".$_POST["login"]."'><br>
            Hasło<br>
            <input type='password' name='pass'><br>
            E-Mail<br>
            <input type='email' name='email' value='".$_POST["email"]."'><br>
            <input type='submit' name='reg' value='reg'><br> 
            </form>            
        ";
    }

    private function setMain()
    {
        $this->mainForm = "
            <H1>Witaj</H1>
            <p>
                Udało ci się
            </p>
        ";
    }

    private function setMain1()
    {
        $this->mainForm1 = "
            <H1>Witaj</H1>
            <p>
                Zły login i lub chasło
            </p>
        ";
    }

    private function setMain2()
    {
        $this->mainForm2 = "
            <H1>Witaj</H1>
            <p>
                Zły email
            </p>
        ";
    }

    private function setBottom(){
        $this->bottomForm="
            <p>
            Stopka nigdy nie wiem co tu ma być
            </p>
        ";
    }

    //geter

    function getBannerForm(){
        return $this->bannerForm;
    }

    function getLeftForm(){
        return $this->leftForm;
    }

    function getErrorLeftForm(){
        return $this->leftFormError;
    }

    function getMainForm(){
        return $this->mainForm;
    }

    function getMainError1(){
        return $this->mainForm1;
    }

    function getMainError2(){
        return $this->mainForm2;
    }

    function getBottomForm(){
        return $this->bottomForm;
    }



}