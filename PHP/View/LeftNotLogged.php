<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-18
 * Time: 23:08
 */

class LeftNotLogged
{
    private $form;
    public function makeForm(){
        $this->form="
<form action=".__DIR__."'/../Controller/isLogged.php' method='post'> 
Loggin:<br>
<input name='login' value=''><br>
Hasło<br>
<input type='password' ><br>
<button type='submit' name='log' value='Log_In'>Log IN</button><br> 
</form>
<form action=".__DIR__."'/../Controller/SignUp.php' method='post'>
<button type='submit' name='signUp' value='sign'>SignUp</button><br>
</form>";
        return $this->form;
    }

}