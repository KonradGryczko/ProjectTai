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
        if(isset($_SESSION['login']))$this->file=new FileManagerService($_SESSION['login']);
        else $this->file=new FileManagerService();
    }

    function getMyEvent($login){
        $result=$this->db->getMyEvent($login);
        return $result;
    }

    function getMyOneEventDb($id){
        $result=$this->db->getEventById($id);
        return $result;
    }
    function getMyOneEventFile($id){

        $result=$this->file->readFile($_POST['element']);
        return $result;

    }

    function checkEvent(){

        if($this->filter->checkTitleIsCorrect($_POST['name'])) return "name";
        if($this->filter->checkPlaceIsCorrect($_POST['place'])) return "place";
        return "something";
    }

    function addEvent(){
        $this->file->createEventFile($this->db->createEvent($_SESSION['login']));
    }

    function updateEvent(){
        $this->file->createEventFile($this->db->updateEvent($_POST['id'],$_POST['name'],$_POST['place'],$_POST['date']));
    }

    function rules(){
        $rules=$this->file->rules();
        return  $rules;
    }

    function deleteEvent($id){
        $this->db->deleteEvent($id);
        $this->file->deleteFile($id);
    }



}