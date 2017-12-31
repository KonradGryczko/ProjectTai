<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-28
 * Time: 19:02
 */

class SignUpService
{
    private $path;

    public function __construct($where)
    {
        $this->path= __DIR__ . '/../View/SignUpView.php';
            include_once $this->path;
            $form=new SignUpView();
            switch ($where){
                case 1:
                    echo $form->getBannerForm();
                    break;
                case 2:
                    echo $form->getLeftForm();
                    break;
                case 3:
                    echo $form->getMainForm();
                    break;
                case 4:
                    echo $form->getBottomForm();
                    break;
            }


    }

}