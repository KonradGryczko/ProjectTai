<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-20
 * Time: 19:39
 */
//Działa 20.12.2017
class DbService
{
    private $dbName;
    private $serverName;
    private $username;
    private $password;
    private $conn;

    public function __construct($dbname)
    {
        $this->dbName=$dbname;
        $this->serverName = "localhost";
        $this->username = "root";
        $this->password = "";

        try {
            //połączenie
            $this->conn = new PDO("mysql:host=$this->serverName;dbname=".$this->dbName, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //sprawdź czy istnieje użytkownik
    public function checkUser($who,$pass){
        $sql="Select * from User WHERE nick like'$who' AND password='$pass' ";
        $stm=$this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->setFetchMode(PDO::FETCH_ASSOC);
        $val=$stm->fetchAll();
        if(empty($val)){
            return 0;
        }
        else
            foreach($val as $row)
            {
               return $row['level'];
            }
    }
    //sprawdź czy login zajęty
    public function isLoginTaken($login){
        $sql="Select * from User WHERE nick like'$login'";
        $stm=$this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->setFetchMode(PDO::FETCH_ASSOC);
        $val=$stm->fetchAll();
        if(empty($val)){
            return true;
        }
        else
            return false;
    }

    public function isMailTaken($email){
        $sql="Select * from User WHERE email like'$email'";
        $stm=$this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->setFetchMode(PDO::FETCH_ASSOC);
        $val=$stm->fetchAll();
        if(empty($val)){
            return true;
        }
        else
            return false;
    }

    //dodaj użytkownika
    public function addUser($login,$email,$password){
        $level=2;

        $sql="INSERT INTO `user` (`Id`, `nick`, `email`, `password`, `level`) VALUES (NULL, '$login', '$email', '$password', '$level')";
        $stm=$this->conn->prepare($sql);
        $stm->execute();
    }

    //pobież liste wydażeń
    public function getMyEvent($login)
    {
        $sql="Select * from event JOIN user ON user.Id=event.`id_user` WHERE user.nick like'$login'";
        $stm=$this->conn->prepare($sql);
        $stm->execute();
        $val=$stm->fetchAll();
        return $val;
    }

    //pobież jedno wydażenie
    public function getEventById($id)
    {
        $sql="Select * from event WHERE id=$id";
        $stm=$this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->setFetchMode(PDO::FETCH_ASSOC);
        $val=$stm->fetchAll();
        return $val;
    }

    public function creatEvent()
    {

    }
}