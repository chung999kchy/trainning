<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connectDB
 *
 * @author CHUNG
 */
include_once '../utils/Config.php';

class ConnectDB {

    protected $tableName = 'post';
    protected static $queryParams = [];
    protected static $connectInstanse = null;

    public function connectDB() {
        if (self::$connectInstanse == null) {
            try {
                self::$connectInstanse = new PDO('mysql:host=' . Configs::DB_HOST . ';dbname=' . Configs::DB_NAME,
                        Configs::DB_USER, Configs::DB_PASSWORD);
                self::$connectInstanse->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                echo "Connected database successfully";
            } catch (Exception $ex) {
                echo 'ERROR ' . $ex . getMessage();
                die();
            }
        }return self::$connectInstanse;
    }

}

?>
