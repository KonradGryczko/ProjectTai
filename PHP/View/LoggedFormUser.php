<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-19
 * Time: 00:11
 */

class LoggedFormUser
{

    private $bannerForm;
    private $leftForm;
    private $mainForm;
    private $bottomForm;
    private $login;
    public function __construct($whatShow=0)
    {
        $this->login=$_SESSION['login'];
        $this->setBanner();
        $this->setLeft();
        switch ($whatShow) {
            case 1:
                $this->setMainAsTable();
                break;
            case 2:
                $this->addEvent();
                break;
            default:
                $this->setMain();

        }
        $this->setBottom();

    }

    //seter

    private function setBanner()
    {
        $this->bannerForm = "
            <p>Jakiś tam baner</p>
        ".session_status();
    }

    private function setLeft()
    {
        $this->leftForm = "        
            <table>
                <tr>
                    <td>
                        <img src='Resource/".$this->login."/download.png' alt='Awatar' height='40' width='40'>
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
                            <input type='submit' value='Dodaj Wydażenie' name='add'>
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
        ".session_status();
    }

    private function setMainAsTable()
    {
        include_once __DIR__.'/../Model/EventModel.php';
        $mod=new EventModel($this->login);
        $result=$mod->getAllEvent();
        $this->mainForm="
            <table border='1'>
                <tr>
                    <td>
                        Nazwa
                    </td>
                    <td>
                        Data
                    </td>
                    <td>
                        Miejsce
                    </td>
                    <td>
                        Wybierz
                    </td>
                </tr>";
                foreach ($result as $row){
                    $this->mainForm.="
                        <tr>
                            <td>".$row["Name"]."</td>
                            <td>".$row["Date"]."</td>
                            <td>".$row["Place"]."</td>
                            <td><input type='radio' name='option' value='.".$row["id"]."'></td></tr>";
                }
            $this->mainForm.="<tr><form action='' method='post'>
                <td>
                    <input type='submit' name='edit'>
                </td><td>
                    <input type='submit' name='detail'> 
    
                </td></form></tr></table>
        ";
    }

    private function setBottom(){
        $this->bottomForm="
            <p>
            Stopka nigdy nie wiem co tu ma być
            </p>
        ";
    }

    private function addEvent(){
        $this->mainForm="
        <form action='' method='post'>
        Nazwa:<br>
        <input type='text' name='name' value='Tytół wydażenia'><br>
        Data:<br>
        <input type='date' name='date' value='2017-07-07'><br>
        Miejsce:<br>
        <input type='text' name='address' value='middle of nowhere'><br>
        Opis:<br>
        <textarea rows='5' cols='50' name='describe'>Podaj opis wydaraenia</textarea><br>
        <input type='submit' name='SaveEvent' value='Zapisz'><br>
        </form>
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