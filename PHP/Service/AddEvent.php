<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-21
 * Time: 17:01
 */

class AddEvent
{
    private $name;
    private $date;
    private $address;
    private $describe;
    private $login;
    public function __construct()
    {
        $this->login=$_SESSION['login'];
        include_once 'DbService.php';
        include_once 'FileManagerService.php';

        $db=new DbService("tai");
        $f=new FileManagerService($this->login);
        $this->name=$_POST['name'];
        $this->date=$_POST['date'];
        $this->describe=$_POST['describe'];
        $this->address=$_POST['address'];
        $this->dataFilter();
        $db->creatEvent();

    }
    //sprawdzenie danych
    private function dataFilter()
    {

    }

}