
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
        <title>List Post</title>
        <link rel="stylesheet" type="text/css" href="view/css/base.css">
        <link rel="stylesheet" type="text/css" href="view/css/index.css">
    </head>
    <body>
        <?php
//        echo ("Chao em");
        include_once '../utils/Config.php';
        include_once '../controller/Manage.php';
        $a = new Manage();
        $data = $a->getPostNews()[0];
        $currentPage = $a->getPostNews()[1];
        $allNumberOfPage = $a->getAllOfPage();
        ?>
        <header>
            <div class ='headPage'>
                <div class="namePage">List Post</div>
                <button onclick="goBack()" class='btn'> Back </button>

                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
            </div>
        </header>

        <div class ='department' ></div>

        <div class = 'container'>
            <div>
                <table class = "table-view table-view__list">
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 20%">Thumb</th>
                        <th style="width: 70%">Title</th>
                    </tr>
                    <?php
                    foreach ($data as $new) {
                        ?> 
                        <tr>
                            <td><a href ="post/<?= $new->getId() ?>" ><?= $new->getId() ?></a></td>
                            <td><a href ="post/<?= $new->getId() ?>" ><img class = 'thumb' src = "<?= Configs::IMG_PATH . $new->getImage() ?>" alt = "thumb's photo"></a></td>
                            <td style = "text-align: left;padding-left: 10px;"><?= $new->getTitle() ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

                <div class="sera">
                    <div class="selectPage">
                        Page :
                        <select name="select" onchange="window.location = this.value">
                            <option value="">-- Chọn --</option>
                            <?php
                            $minPageView = min(5, $allNumberOfPage);
                            for ($i = 1; $i <= $minPageView; $i++) {
                                if ($i != $currentPage) {
                                    ?>
                                    <option value="user/view-list/<?= $i ?>">  <?= $i ?> </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class = "table-view__pag" >
                        <?php
                        if ($currentPage != 1) {
                            ?>
                            <a href="user/view-list/<?= $currentPage - 1 ?>"/><span class ="canSelect" >  << </span></a>
                            <?php
                        } else {
                            ?>
                            <a><span> << </span></a>
                        <?php } ?>
                        <?php
                        $minPageView = min(5, $allNumberOfPage);
                        for ($i = 1; $i <= $minPageView; $i++) {
                            if ($i == $currentPage) {
                                ?>
                                <a><span> <?= $i ?> </span></a>
                                <?php
                            } else {
                                ?>
                                <a href="user/view-list/<?= $i ?>"/><span class ="canSelect"> <?= $i ?> </span></a>
                                <?php
                            }
                        }
                        ?>
                        <?php
                        if ($currentPage < $allNumberOfPage) {
                            ?>
                            <a href="user/view-list/<?= $currentPage + 1 ?>"/><span class ="canSelect"> >> </span></a>
                            <?php
                        } else {
                            ?>
                            <a><span> >> </span></a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
