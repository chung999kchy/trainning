
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
        <title>Manage Page</title>
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
                <div class="namePage">Manage</div>
                <div>
                    <a href ="controller/add"/><div class="btn">New</div></a>
                    <button onclick="goBack()" class='btn'> Back </button>

                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                </div>
            </div>

        </header>

        <div class ='department' ></div>

        <div class = 'container'>
            <div>
                <table class = "table-view table-view__manage">
                    <tr>
                        <th>ID</th>
                        <th>Thumb</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($data as $new) {
                        ?>
                        <tr>
                            <td><?= $new->getId() ?></td>
                            <td><img class = 'thumb' src = "<?= Configs::IMG_PATH . $new->getImage() ?>" alt = "thumb's photo"></td>
                            <td><?= $new->getTitle() ?></td>
                            <td><?= $new->getStatus() ? "Enabled" : "Disabled" ?></td>
                            <td><a href="post/<?= $new->getId() ?>" >Show</a> | 
                                <a href="controller/edit/<?= $new->getId() ?>" >Edit</a> | 
                                <a href="controller/delete/<?= $new->getId() ?>" > Delete</a>
                            </td>
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
                                    <option value="controller/view-list/<?= $i ?>">  <?= $i ?> </option>
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
                            <a class ="canSelect" href="controller/view-list/<?= $currentPage - 1 ?>"/><span > << </span></a>
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
                                <a class ="canSelect" href="controller/view-list/<?= $i ?>"/><span > <?= $i ?></span></a>
                                <?php
                            }
                        }
                        ?>
                        <?php
                        if ($currentPage < $allNumberOfPage) {
                            ?>
                            <a class ="canSelect" href="controller/view-list/<?= $currentPage + 1 ?>"/><span> >> </span></a>
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
