<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-28
 * Time: 13:52
 */

class EventModel
{

    private $user;
    private $place;
    private $date;

    private $db;
    private $result;
    private $file;
    private $content;

    private $filtr;

    public function __construct($login=null)
    {
        $this->user=$login;
        include_once '../Service/DbService.php';
        include_once '../Service/FileManagerService.php';

        $this->db=new DbService("tai");



    }


    public  function getAllEvent(){
        $this->result=$this->db->getMyEvent($this->user);
    }

    public function getOneEvent($id){
        $this->result=$this->db->getEventById($id);
        $this->place=$this->result['miejsce'];
        $this->date=$this->result['date'];
        $this->file=new FileManagerService($this->user);
        $this->content=$this->file->readFile($id);
        $array=array(
            "name"=>$this->user,
            "place"=>$this->place,
            "date"=>$this->date,
            "content"=>$this->content
        );
        return $array;
    }

    public function setEvent($title,$data,$place,$content){
        include_once '../Service/FilterService.php';
        $this->filtr=new FilterService();
        $this->place=$this->filtr->checkPlaceIsCorrect($place);

    }


}