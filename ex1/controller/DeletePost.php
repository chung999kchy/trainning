<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'PostBLL.php';
include_once './Router.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $a = new PostBLL();
    $a->deleteById($id);
}
$b = new Router();
$b->redirect('../../controller/view-list/');
?>
