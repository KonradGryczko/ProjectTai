<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2018-01-04
 * Time: 18:39
 */

class MainService
{
    private $db;
    private $filter;
    private $file;

    public function __construct()
    {

        include_once 'FilterService.php';
        include_once 'DbService.php';
        include_once 'FileManagerService.php';
        $this->filter = new FilterService();
        $this->db = new DbService("tai");
        $this->file=new FileManagerService($_SESSION['login']);
    }

    function getMyEvent($login){
        $result=$this->db->getMyEvent($login);
        return $result;
    }

    function getMyOneEvent($id){
        $result=$this->db->getEventById();
        return $result;
    }




}