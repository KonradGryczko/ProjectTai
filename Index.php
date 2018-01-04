<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-18
 * Time: 21:27
 */
session_start();

include_once 'PHP/Controller/MainController.php';
$whatToShow=new MainController();
echo    '<Html>
        <head>
            <title>tytół</title>
            <link rel="stylesheet" href="Style/main.css">
        </head>';
echo    '<body><div class="contener"> ';
echo    '<div class="baner">';
    $whatToShow->getBanner();

echo    '</div>
        <div class="left">';
    $whatToShow->getLeft();

echo    '</div>
        <div class="main">';
    $whatToShow->getMain();

echo    '</div>
        <div class="bottom">';
    $whatToShow->getBottom();

echo    '</div>
        </div>
        </body>
        </Html>';




?>