<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-31
 * Time: 12:19
 */

class LogMeInServices
{
//sprawdzić poprawność danych
    private $login;
    private $password;//zrobić by było md5
    private $level;


    private $db;
    public function __construct($where)
    {
        $this->login=$_POST['login'];
        $this->password=$_POST['pass'];
        $this->path=__DIR__."/DbService.php";
        include_once $this->path;

        $this->db=new DbService("tai");
        $this->level=$this->db->checkUser($this->login,$this->password);
        if($this->level==0) {
            session_start();
            $_SESSION['login']=$this->login;
        }
    }



}