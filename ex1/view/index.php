<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <base href ="http://localhost/ex1/" />
        <meta charset="UTF-8">
        <title>Chung</title>
        <link rel="stylesheet" type="text/css" href="view/css/base.css">
        <link rel="stylesheet" type="text/css" href="view/css/index.css">
    </head>
    <body>

        <?php
        include_once '../controller/Router.php';
        $router = new Router(__DIR__);
        $router->router();

        if (array_key_exists('admin', $_POST)) {
            $router->redirect('../controller/view-list/');
        } else if (array_key_exists('user', $_POST)) {
            $router->redirect('../user/view-list/');
        }
        ?> 
        <div class='selectUser'>
            <form method="post"> 
                <input type="submit" name="admin" class="btn" value ="admin" /> 
                <input type="submit" name="user" class="btn" value = "user"/> 
            </form> 
        </div>
    </body>
</html>
