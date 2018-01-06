<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2018-01-03
 * Time: 17:39
 */

class Baner
{
    private $bannerForm;

    function Banner()
    {
        $this->bannerForm = "
            <p>Jakiś tam baner</p>
        ";

        return $this->bannerForm;
    }

}