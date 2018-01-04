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

        return $this->mainForm;
    }

    public function NotLoggedError(){

        return $this->mainForm;
    }

    //Zalogowany
    public function Logged(){

        return $this->mainForm;
    }

    public function LoggedAllEvent(){

        return $this->mainForm;
    }

    public function LoggedExactEvent(){

        return $this->mainForm;
    }

    public function LoggedAddEvent(){

        return $this->mainForm;
    }

    //Rejestracja
    public function SignUp(){

        return $this->mainForm;
    }

    public function SignUpErrorLoginOrPassword(){

        return $this->mainForm;
    }

    public function SignUpErrorAccountExist(){

        return $this->mainForm;
    }

    public function SignUpNoError(){

        return $this->mainForm;
    }

}