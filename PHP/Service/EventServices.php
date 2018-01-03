<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2018-01-03
 * Time: 11:20
 */

class EventServices
{
    public function __construct($where)
    {
        $this->path= __DIR__ . '/../View/LoggedFormUser.php';
        include_once $this->path;
        switch ($where){
            case 1:
                $form=new LoggedFormUser();
                echo $form->getBannerForm();
                break;
            case 2:
                $form=new LoggedFormUser();
                echo $form->getLeftForm();
                break;
            case 3:
                $form=new LoggedFormUser(1);
                echo $form->getMainForm();
                break;
            case 4:
                $form=new LoggedFormUser();
                echo $form->getBottomForm();
                break;
        }
    }
}