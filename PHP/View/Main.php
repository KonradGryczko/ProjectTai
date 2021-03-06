<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2018-01-03
 * Time: 17:39
 */

class Main
{

    private $mainForm;
    //nie Zalogowany
    public function NotLogged(){
        $this->mainForm="<h1>Witaj</h1>
                            <br>
                            <br>
                            <p>
                            Zalogój się by mieć dostęp do pełnej zawartości strony
</p>";
        return $this->mainForm;
    }

    public function NotLoggedError(){
        $this->mainForm="<h1>Witaj</h1>
                            <br>
                            <br>
                            <p>
                            Zalogój się by mieć dostęp do pełnej zawartości strony
                            <br>
                            Podano zły login lub hasło
</p>";
        return $this->mainForm;
    }

    //Zalogowany
    public function Logged(){
        $this->mainForm="<h1>Witaj</h1>
                            <br>
                            <br>
                            <p>
                            Właśnie się zalogowałeś
</p>";

        return $this->mainForm;
    }

    public function LoggedAllEvent($event){
        $this->mainForm="<h1>Witaj</h1>
                            <br>
                            <br>
                            <table border='1'>
                                <thead>
                                    <tr>
                                        <td>
                                         Nazwa
                                        </td>
                                        <td>
                                         Miejsce
                                        </td>
                                        <td>
                                         Data
                                        </td>
                                        <td>
                                         Wybierz
                                        </td>
                                    </tr>
                                </thead>
                                <tbody><form action='' method='POST'>";
                                foreach ($event as $row)
                                    $this->mainForm.="<tr>
                                        <td>
                                         ".$row["Name"]."
                                        </td>
                                        <td>
                                         ".$row["Place"]."
                                        </td>
                                        <td>
                                         ".$row["Date"]."
                                        </td>
                                        <td>
                                         <input type='radio' name='element' value='".$row["id"]."'>
                                        </td>
                                    </tr>";
                                $this->mainForm.="</tbody> 
                                <tr>
                                    <td>
                                        <input type='submit' name='detail' value='Szczegóły'>
                                    </td>
                                    <td>
                                        <input type='submit' name='edit' value='Edytuj'>
                                    </td>
                                    <td>
                                        <input type='submit' name='delete' value='Usuń'>
                                    </td>
                                </form></tr>  
                            </table>";
        return $this->mainForm;
    }

    public function LoggedExactEvent($result,$describe){
        $this->mainForm="
            <form action='' method='post'>
                Nazwa:<BR>
                <input type='text' name='name' value='".$result[0]['Name']."'><br>
                Place:<br>
                <input type='text' name='place' value='".$result[0]['Place']."'><br>
                Date:<br>
                <input type='date' name='date' value='".date($result[0]['Date'])."'><br>
                Opis:<br>
                <textarea name='describe' rows='8' cols='50'>$describe</textarea><br>
                <input type='submit' name='event' value='Cofnij'>
            </form>
        ";
        return $this->mainForm;
    }

    public function LoggedExactEventForEdit($result,$describe)
    {
        $this->mainForm = "
            <form action='' method='post'>
            
                Nazwa:<BR>
                <input type='text' name='name' value='" . $result[0]['Name'] . "'><br>
                
                Place:<br>
                <input type='text' name='place' value='" . $result[0]['Place'] . "'><br>
                Date:<br>
                <input type='date' name='date' value='" . date($result[0]['Date']) . "'><br>
                Opis:<br>
                <textarea name='describe' rows='8' cols='50'>$describe</textarea><br>
                <input type='submit' name='accept' value='Aktualizuj'>
                <input hidden type='text'  name='id' value='" . $_POST['element'] . "'>
            </form>
        ";
        return $this->mainForm;
    }

    public function LoggedAcceptEvent($error=null){
        $this->mainForm="

            <form action='' method='post'>
            
                Nazwa:<BR>";
        if($error=="name")$this->mainForm.="
                <input type='text' name='name' value='Error'><br>";
        elseif(isset($_POST['name'])) $this->mainForm.="<input type='text' name='name' value='".$_POST['name']."'><br>";
        else $this->mainForm.="<input type='text' name='name' ><br>";
        $this->mainForm.="Place:<br>";
        if($error=="place")$this->mainForm.="
                <input type='text' name='place' value='Error'><br>";
        elseif(isset($_POST['place'])) $this->mainForm.="<input type='text' name='place' value='".$_POST['place']."'><br>";
        else $this->mainForm.="<input type='text' name='place'><br>";
        $this->mainForm.="Date:<br>";
        if(isset($_POST['date']))$this->mainForm.="
                <input type='date' name='date' value='".$_POST['date']."'><br>";
        else $this->mainForm.="<input type='date' name='date' ><br>";
        $this->mainForm.="Opis:<br>";
        if(isset($_POST['describe']))$this->mainForm.="
                <textarea name='describe' rows='8' cols='50' value=''>".$_POST['describe']."</textarea><br>";
        else $this->mainForm.="<textarea name='describe' rows='8' cols='50' value=''></textarea><br>";
                $this->mainForm.="<input type='submit' name='accept' value='Aktualizuj'>
                <input hidden type='text'  name='id' value='" . $_POST["id"] . "'>
            </form>
        ";
        return $this->mainForm;
    }

    public function LoggedAddEvent($error=null){
        $this->mainForm="
            <form action='' method='post'>
                Nazwa:<BR>";
        if($error=="name")$this->mainForm.="
                <input type='text' name='name' value='Error'><br>";
        elseif(isset($_POST['name'])) $this->mainForm.="<input type='text' name='name' value='".$_POST['name']."'><br>";
        else $this->mainForm.="<input type='text' name='name' ><br>";
                $this->mainForm.="Place:<br>";
        if($error=="place")$this->mainForm.="
                <input type='text' name='place' value='Error'><br>";
        elseif(isset($_POST['place'])) $this->mainForm.="<input type='text' name='place' value='".$_POST['place']."'><br>";
        else $this->mainForm.="<input type='text' name='place'><br>";
                $this->mainForm.="Date:<br>";
        if(isset($_POST['date']))$this->mainForm.="
                <input type='date' name='date' value='".$_POST['date']."'><br>";
        else $this->mainForm.="<input type='date' name='date' ><br>";
                $this->mainForm.="Opis:<br>";
        if(isset($_POST['describe']))$this->mainForm.="
                <textarea name='describe' rows='8' cols='50' value=''>".$_POST['describe']."</textarea><br>";
        else $this->mainForm.="<textarea name='describe' rows='8' cols='50' value=''></textarea><br>";
               $this->mainForm.="<input type='submit' name='new' value='Dodaj'>
            </form>
        ";
        return $this->mainForm;
    }

    public function nothingToShow(){
        $this->mainForm="Nothing to show";
        return $this->mainForm;
    }

    //Rejestracja
    public function SignUp($rules){
        $this->mainForm="<h1>WItaj</h1><br><br>$rules";
        return $this->mainForm;
    }

    public function SignUpErrorLoginOrPassword($rules){
        $this->mainForm="<h1>WItaj</h1><br>Login i hasło nie zgodny z zasadami<br>$rules";
        return $this->mainForm;
    }

    public function SignUpErrorAccountExist($rules){
        $this->mainForm="<h1>WItaj</h1><br>Takie konto już istnieje<br>$rules";
        return $this->mainForm;
    }

    public function SignUpNoError($rules){
        $this->mainForm="<h1>WItaj</h1><br><br>Włąśnie się zarejstrowałeś";
        return $this->mainForm;
    }

}