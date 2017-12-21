<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-21
 * Time: 09:58
 */

class SignUpView
{
    private $bannerForm;
    private $leftForm;
    private $mainForm;
    private $bottomForm;
    public function __construct()
    {
        $this->setBanner();
        $this->setLeft();
        $this->setMain();
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
            <input type='submit' name='log' value='Log_In'><br> 
            </form>            
        ";
    }

    private function setMain()
    {
        $this->mainForm = "
            <H1>Witaj</H1>
            <p>
                Stromna realizuje zażądzanie zdarzeniami
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

    function getMainForm(){
        return $this->mainForm;
    }

    function getBottomForm(){
        return $this->bottomForm;
    }

}