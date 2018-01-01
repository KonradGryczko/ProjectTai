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
    public function __construct($login)
    {
        $this->login = $login;
    }


    public function readFile($id)
    {
        $file=fopen("../../Resource/'$this->login'/$id","r");
        $text=fopen($file,"r");
        fclose($file);

        return $text;
    }

    public function addDirection(){
        if(!is_dir(__DIR__."/../../Resource/$this->login"))
        $a=mkdir(__DIR__."/../../Resource/$this->login",0777,true);
    }

    public function coppyAvatar(){
        if(!file_exists(__DIR__."/../../Resource/$this->login/download.png"))
            copy(__DIR__."/../../Resource/img/download.png",__DIR__."/../../Resource/$this->login/download.png");
    }

}