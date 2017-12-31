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


}