<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author CHUNG
 */
class Router {

    //put your code here

    const PARAM_NAME = 'r';
    const HOME_PAGE = 'index';

    public static $sourcePath;

    public function __construct($sourcePath = "") {
        if ($sourcePath) {
            self::$sourcePath = $sourcePath;
        }
    }

    public function getGET($name = NULL) {
        if ($name != NULL) {
            return isset($_GET[$name]) ? $_GET[$name] : NULL;
        }
        return $_GET;
    }

    public function getPOST($name = NULL) {
        if ($name != NULL) {
            return isset($_POST[$name]) ? $_POST[$name] : NULL;
        }
        return $_POST;
    }

    public function router() {
        $url = $this->getGET(self::PARAM_NAME);
        if (!$url) {
            $url = self::HOME_PAGE;
        }
        $path = self::$sourcePath . '/' . $url . '.php';
        if (file_exists($path)) {
            return require_once $path;
        }
        return $this->PageError();
    }

    public function PageError() {
        echo("PAGE ERROR!!!");
        die();
    }

//    public function createUrl($url, $params=[]){
//        if($url){
//            
//        }
//    }

    public function redirect($url){
        header("Location:$url");
    }
}
