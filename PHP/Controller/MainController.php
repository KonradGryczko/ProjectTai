<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-19
 * Time: 11:33
 */

class MainController
{

    private $path;
    private $post;
    //elementy widoku
    private $baner;
    private $left;
    private $main;
    private $bottom;


    public function __construct()
    {
        include __DIR__.'/../View/Baner.php';
        include __DIR__.'/../View/Left.php';
        include __DIR__.'/../View/Main.php';
        include __DIR__.'/../View/Bottom.php';
        $baner=new Baner();
        $left=new Left();
        $main=new Main();
        $bottom=new Bottom();

        include_once __DIR__ . "/../Service/LeftService.php";
        $leftService=new LeftService();

        switch (true){
            //wciśnięto przycisk zaloguj
            case isset($_POST['log']):
                if($leftService->LogIn(($_POST['login']),($_POST['password']))){
                    $_SESSION['login']=strip_tags($_POST['login']);
                    $this->left=$left->Logged($_SESSION['login']);
                    $this->main=$main->Logged();
                }
                else{
                    $this->left=$left->NotLogged(($_POST['login']));
                    $this->main=$main->NotLoggedError();
                }
                break;
                //Wciśnięto rejestracja
            case isset($_POST['signUp']):
                $this->left=$left->Registered();
                $this->main=$main->SignUp();
                break;
                //Wciśnięto przycisk rejestruj
            case isset($_POST['reg']):
                switch ($leftService->SignUp()){
                    case 1://error zły login
                        $this->left=$left->Registered();
                        $this->main=$main->SignUpErrorLoginOrPassword();
                        break;
                    case 2://Konto istnieje
                        $this->left=$left->Registered();
                        $this->main=$main->SignUpErrorAccountExist();
                        break;
                    default:
                        $this->left=$left->NotLogged();
                        $this->main=$main->SignUpNoError();
                        $leftService->AddUser();

                }
                break;


            default:
                $this->left=$left->NotLogged(isset($_POST['login']));
        }


        $this->baner=$baner->Banner();
        $this->bottom=(string)$bottom->Bottom();
    }

    public function getBanner(){
        echo $this->baner;
    }

    public function getLeft(){
        echo $this->left;
    }

    public function getMain(){
        echo $this->main;
    }

    public function getBottom(){
        echo $this->bottom;
    }
}