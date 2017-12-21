<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-19
 * Time: 18:21
 */

class UserModel
{

    private $nick;
    private $email;
    private $passwd;
    private $servername;
    private $username;
    private $password;

    public function __construct($who)
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";

        try {
            //połączenie
            $conn = new PDO("mysql:host=$this->servername;dbname=tai", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql="Select * from User WHERE nick like'$who'";
            $stm=$conn->prepare($sql);
            $stm->execute();
            $result = $stm->setFetchMode(PDO::FETCH_ASSOC);
            $val=$stm->fetchAll();

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }



        $conn=null;
    }
    function show(){
        echo "ahjafhfk".$this->nick->count();
    }
}