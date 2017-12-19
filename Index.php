<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-18
 * Time: 21:27
 */
include_once 'PHP/Controller/MainController.php';
echo    '<Html>
        <head>
            <title>tytół</title>
            <link rel="stylesheet" href="Style/main.css">
        </head>';
echo    '<body><div class="contener"> ';
echo    '<div class="baner">';
    $LogControl=new MainController(1);
echo    '</div>
        <div class="left">';
$LogControl=new MainController(2);
echo    '</div>
        <div class="main">';
    $LogControl=new MainController(3);
echo    '</div>
        <div class="bottom">';
    $LogControl=new MainController(4);
echo    '</div>
        </div>
        </body>
        </Html>';




?>