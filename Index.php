<?php
/**
 * Created by PhpStorm.
 * User: Zjava
 * Date: 2017-12-18
 * Time: 21:27
 */

echo    '<Html>
        <head>
            <title>tytół</title>
            <link rel="stylesheet" href="Style/main.css">
        </head>';
echo    '<body><div class="contener"> ';
echo    '<div class="baner">';

echo    '</div>
        <div class="main">';
    order66();
    echo "miał";
echo    '</div>
        <div class="left">';
    include_once 'PHP/Controller/Login.php';
    $LogControl=new Login();
echo    '</div>
        <div class="bottom">';

echo    '</div>
        </div>
        </body>
        </Html>';

function order66(){
    echo '<h1><p style="color: darkviolet">execute ordert 66</p></h1>';

}
?>