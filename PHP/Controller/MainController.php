<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-19
 * Time: 11:33
 */

class MainController
{

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
        include_once __DIR__."/../Service/MainService.php";
        $leftService=new LeftService();
        $mainService=new MainService();

        switch (true) {
            //przed Zalogowaniem

            //wciśnięto przycisk zaloguj
            case isset($_POST['log']):
                if ($leftService->LogIn(($_POST['login']), ($_POST['password']))) {
                    $_SESSION['login'] = strip_tags($_POST['login']);
                    $this->left = $left->Logged($_SESSION['login']);
                    $this->main = $main->Logged();
                } else {
                    $this->left = $left->NotLogged(($_POST['login']));
                    $this->main = $main->NotLoggedError();
                }
                break;
            //Wciśnięto chce się zarejstrować
            case isset($_POST['signUp']):
                $this->left = $left->Registered();
                $this->main = $main->SignUp($mainService->rules());
                break;
            //Wciśnięto przycisk rejestruj
            case isset($_POST['reg']):
                switch ($leftService->SignUp()) {
                    case 1://error zły login
                        $this->left = $left->Registered();
                        $this->main = $main->SignUpErrorLoginOrPassword($mainService->rules());
                        break;
                    case 2://Konto istnieje
                        $this->left = $left->Registered();
                        $this->main = $main->SignUpErrorAccountExist($mainService->rules());
                        break;
                    default:
                        $this->left = $left->NotLogged();
                        $this->main = $main->SignUpNoError($mainService->rules());
                        $leftService->AddUser();
                }
                break;

            //Po zalogowaniu
            //Wciśnieto Event
            case isset($_POST['event']):
                $this->left = $left->Logged($_SESSION['login']);
                $this->main = $main->LoggedAllEvent($mainService->getMyEvent($_SESSION['login']));
                break;
            //wciśnięto chęć dodania Eventu
            case isset($_POST['add']):
                $this->left = $left->Logged($_SESSION['login']);
                $this->main = $main->LoggedAddEvent();
                break;
            //dodaj event
            case isset($_POST['new']):
                switch ($mainService->checkEvent()) {
                    case "place":
                        $this->left = $left->Logged($_SESSION['login']);
                        $this->main = $main->LoggedAddEvent("place");
                        break;
                    case "name":
                        $this->left = $left->Logged($_SESSION['login']);
                        $this->main = $main->LoggedAddEvent("name");
                        break;
                    default:
                        $mainService->addEvent();
                        $this->left = $left->Logged($_SESSION['login']);
                        $this->main = $main->LoggedAllEvent($mainService->getMyEvent($_SESSION['login']));
                }
                break;
            //szczeguły
            case isset($_POST['detail']):
                if (isset($_POST['element'])) {
                    $this->left = $left->Logged($_SESSION['login']);
                    $this->main = $main->LoggedExactEvent($mainService->getMyOneEventDb($_POST['element']), $mainService->getMyOneEventFile($_POST['element']));
                } else {
                    $this->left = $left->Logged($_SESSION['login']);
                    $this->main = $main->nothingToShow();
                }
                break;
            //edytuj Event
            case isset($_POST['edit']):
                if (isset($_POST['element'])) {
                    $this->left = $left->Logged($_SESSION['login']);
                    $this->main = $main->LoggedExactEventForEdit($mainService->getMyOneEventDb($_POST['element']), $mainService->getMyOneEventFile($_POST['element']));
                }else {
                    $this->left=$left->Logged($_SESSION['login']);
                    $this->main=$main->nothingToShow();
                }
                break;
                //zatwierdź edycje
            case isset($_POST['accept']):
                switch ($mainService->checkEvent()){
                    case "place":
                        $this->left=$left->Logged($_SESSION['login']);
                        $this->main=$main->LoggedAcceptEvent("place");
                        break;
                    case "name":
                        $this->left=$left->Logged($_SESSION['login']);
                        $this->main=$main->LoggedAcceptEvent("name");
                        break;
                    default:
                        $mainService->updateEvent();
                        $this->left=$left->Logged($_SESSION['login']);
                        $this->main=$main->LoggedAllEvent($mainService->getMyEvent($_SESSION['login']));
                }
                break;
                //kasuj edycje
            case isset($_POST['delete']):
                if (isset($_POST['element'])) {
                    $mainService->deleteEvent($_POST['element']);
                    $this->left=$left->Logged($_SESSION['login']);
                    $this->main=$main->LoggedAllEvent($mainService->getMyEvent($_SESSION['login']));}
                else {
                    $this->left=$left->Logged($_SESSION['login']);
                    $this->main=$main->nothingToShow();
                }
                break;

                //Wciśnieto wylogój
            case isset($_POST['logOff']):
                $this->left=$left->NotLogged();
                $this->main=$main->NotLogged();
                $_SESSION=null;
                session_destroy();
                session_start();
                break;
            default:
                if(session_status()==PHP_SESSION_NONE){
                    $this->left=$left->NotLogged(isset($_POST['login']));
                    $this->main=$main->NotLogged();
                }
                else {
                    $this->left = $left->Logged($_SESSION['login']);
                    $this->main=$main->Logged();
                }
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