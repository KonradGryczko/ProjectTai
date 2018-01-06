<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2018-01-03
 * Time: 17:39
 */

class Left
{

    private $leftForm;

    //nie zalogowany
    public function NotLogged($login=null){
        $this->leftForm = "        
            <form action='' method='post'> 
                Loggin:<br>
                <input name='login' value='$login'><br>
                Hasło<br>
                <input type='password' name='password'><br>
                <input type='submit' name='log' value='Log_In'><br> 
                <input type='submit' name='signUp' value='sign'><br>            
            </form>
        ";
        return $this->leftForm;
    }

    //zalogowany
    public function Logged($login){
        $this->leftForm = "        
            <table>
                <tr>
                    <td>
                        <img src='Resource/".$login."/download.png' alt='Awatar' height='40' width='40'>
                    </td>
                    <td>
                        <p>
                            Login:<br>
                            ".$login."                            
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
        return $this->leftForm;
    }

    //zalogowany
    public function Registered(){
        $this->leftForm = "        
            <form action='' method='post'> 
            Loggin:<br>
            <input name='login' value=''><br>
            Hasło<br>
            <input type='password' name='password'><br>
            E-Mail<br>
            <input type='email' name='email'><br>
            <input type='submit' name='reg' value='reg'><br> 
            </form>            
        ";
        return $this->leftForm;
    }

}