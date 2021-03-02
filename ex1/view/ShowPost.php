
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
        <title>Show Post</title>
        <link rel="stylesheet" type="text/css" href="view/css/base.css">
        <link rel="stylesheet" type="text/css" href="view/css/index.css">
    </head>
    <body>
        <?php
//        echo ("Chao em");
        include_once '../utils/Config.php';
        include_once '../controller/PostBLL.php';
        $a = new PostBLL();
        $id = $_GET['id'];
        $data = $a->findById($id);
//        var_dump($data);die();
        ?>
        <header>
            <div class ='headPage'>
                <div class="namePage"><?=$data->getTitle()?></div>
                <button onclick="goBack()" class='btn'> Back </button>

                <script>
                function goBack() {
                  window.history.back();
                }
                </script>
               
            </div>
        </header>

        <div class ='department' ></div>

        <div class = "show">
            <div class="show__img">
                <img style =  "width: 300px" src = "<?= Configs::IMG_PATH . $data->getImage() ?>" alt = "thumb's photo">
            </div>
            <div class = "show_des">
                <h2>Description</h2>
                <span><?=$data->getDescription() ?></span>
            </div>
        </div>
    </body>
</html>
