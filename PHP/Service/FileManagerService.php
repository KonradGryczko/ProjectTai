<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-21
 * Time: 12:14
 */

class FileManagerService
{

    private $login;

    /**
     * FileManagerService constructor.
     * @param $login
     */
    public function __construct($login=null)
    {
        $this->login = $login;
    }


    public function readFile($id)
    {
        $result=null;
        $file=fopen(__DIR__."/../../Resource/".$this->login."/".$id.".txt","r");
        while (!feof($file))
            $result.=fgets($file);

        fclose($file);

        return $result;
    }

    function deleteFile($id){
        unlink(__DIR__."/../../Resource/".$this->login."/".$id.".txt");
    }

    public function rules()
    {
        $result=null;
        $file=fopen(__DIR__ . "/../../Resource/rules.txt","r");
        while (!feof($file))
            $result.=fgets($file);

        fclose($file);

        return $result;
    }

    public function addDirection(){
        if(!is_dir(__DIR__."/../../Resource/$this->login"))
        $a=mkdir(__DIR__."/../../Resource/$this->login",0777,true);
    }

    public function coppyAvatar(){
        if(!file_exists(__DIR__."/../../Resource/$this->login/download.png"))
            copy(__DIR__."/../../Resource/img/download.png",__DIR__."/../../Resource/$this->login/download.png");
    }

    public function createEventFile($id){
        $file=fopen(__DIR__."/../../Resource/".$this->login."/".$id.".txt","w");
        fwrite($file,$_POST['describe']);
        fclose($file);
    }

}