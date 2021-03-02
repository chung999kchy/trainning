<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manage
 *
 * @author CHUNG
 */
include_once 'PostBLL.php';

class Manage {
    protected $recordsPerPage = 5;
    public function getPostNews() {
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $a = new PostBLL();
        $listPost = $a->selectPage(($page -1)*$this->recordsPerPage, $this->recordsPerPage);
        return [$listPost,$page];
    }
    
    public function getAllOfPage(){
        $a = new PostBLL();
        $noOfRecords = (int)$a->getNoOfRecords();
        $noOfPages = ceil($noOfRecords * 1.0 / $this->recordsPerPage);
        return $noOfPages;
    }

    //put your code here
}
