<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once 'PostBLL.php';
include_once './Router.php';
include_once 'UploadImage.php';
$d=strtotime("now");
if (isset($_POST)) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $update_at = date("Y-m-d h:i:s", $d);
    if(isset($_FILES['file']) && $_FILES['file']['name'] != ""){      
        $image = $_FILES['file']['name'];
        $key = ['title', 'description', 'image', 'status', 'update_at'];
        $value = [$title, $description, $image, $status, $update_at];
    }else {
        $key = ['title', 'description', 'status', 'update_at'];
        $value = [$title, $description, $status, $update_at];
    }    
    $a = new PostBLL();
    $a->updateById($id, $key, $value);
}
$b = new Router();
$b->redirect('view-list/');
?>


