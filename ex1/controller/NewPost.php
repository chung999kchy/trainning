<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'PostBLL.php';
include_once './Router.php';
include_once './UploadImage.php';
$d=strtotime("now");
if (isset($_POST)) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    $create_at=date("Y-m-d h:i:s", $d);
    $update_at="";
    $value = [$title, $description, $image, $status, $create_at];
    $a = new PostBLL();
    $a->insert($value);
}
$b = new Router();
$b->redirect('view-list/');
?>
