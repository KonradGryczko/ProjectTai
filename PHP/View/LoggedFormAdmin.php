<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-21
 * Time: 09:55
 */

class LoggedFormAdmin
{

    private $bannerForm;
    private $leftForm;
    private $mainForm;
    private $bottomForm;
    private $login;
    public function __construct()
    {
        $this->login=$_SESSION['login'];
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
            <table>
                <tr>
                    <td>
                        <img src='/Resorce/".$this->login."/download.png' alt='Awatar' height='40' width='40'>
                    </td>
                    <td>
                        <p>
                            Login:<br>
                            ".$this->login."                            
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <form action='' method='post'>
                            <input type='submit' value='Wydażenia' name='event'>
                            <br>
                            <input type='submit' value='Lista Użytkowników' name='list'>
                            <br>
                            <input type='submit' value='Wylogój' name='logOff'>
                        </form>
                    </td>                    
                </tr>
            </table>
        ";
    }

    private function setMain()
    {
        $this->mainForm = "
            <H1>Witaj</H1>
            <p>
                Cieszę się że znowu się zalogowałeś 
                Mam nadzieje że ci się tu podoba
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