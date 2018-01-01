<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-18
 * Time: 23:08
 *
 * Do przerobienia
 * forma tworzona w konstruktorze
 * zwraca widok w metodach
 */

class NotLoggedView
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

        $p=getcwd();
        $this->bannerForm = "
            <p>Jakiś tam baner</p>
        ".strip_tags($p);
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
            <input type='submit' name='signUp' value='sign'><br>
            
            </form>
        ";
    }

    private function setMain()
    {
        $this->mainForm = "
            <H1>Witaj</H1>
            <p>
               Nie Jesteś zalogowany
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