<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of postBLL
 *
 * @author CHUNG
 */
include_once 'ConnectDB.php';
include_once '../model/Post.php';

class PostBLL {

    protected static $conn;   

    public function __construct() {
        $a = new ConnectDB();
        self::$conn = $a->connectDB();
    }

    public function getSQL($sql) {
        $data = self::$conn->query($sql)->fetchAll();
        $result = array();
        foreach ($data as $row) {
            $r = new Post();
            $r->setId($row['id']);
            $r->setTitle($row['title']);
            $r->setStatus($row['status']);
            $r->setDescription($row['description']);
            $r->setCreate_at($row['create_at']);
            $r->setUpdate_at($row['update_at']);
            $r->setImage($row['image']);
            array_push($result, $r);
        }
        return $result;
    }
    
    public function selectPage($offset, $noOfRecords){
        $sql = "select SQL_CALC_FOUND_ROWS * from post limit ".$offset.', '.$noOfRecords;
        $result = $this->getSQL($sql);
        return $result;
    }

    public function getNoOfRecords(){
        $sql = 'select count(*) from post';
        $noOfRecords = self::$conn->query($sql)->fetch();
        return $noOfRecords[0];
        
    }
    public function selectAll() {
        $sql = 'select * from post';
        $result = $this->getSQL($sql);
        return $result;
    }

    public function findById($id) {
        $sql = 'select * from post where id = ' . $id;
        $result = $this->getSQL($sql);
        return $result[0];
    }

    public function updateById($id, $key, $value) {
        $sql = 'update post set ';
        try{
            for ($i=0;$i<count($key);++$i){
                if($key[$i] == 'status'){
                    $sql = $sql.$key[$i].' = '.$value[$i].', ';
                }else {
                    $sql = $sql.$key[$i]." = '".$value[$i]."', ";
                }
            }
            $sql = substr($sql, 0, -2);
            $sql = $sql.' where id = '.$id;
//            var_dump($sql);die();
            $stmt = self::$conn->prepare($sql);
            self::$conn->beginTransaction();
            $stmt->execute();
            self::$conn->commit();
        } catch (Exception $ex) {
            self::$conn->rollback();
            throw $ex;
        }
    }

    public function insert($newPost) {
        $sql = 'insert into post(title, description, image, status,create_at) values ( ?, ?, ?, ?, ?)';
        $stmt = self::$conn->prepare($sql);
        try {
            self::$conn->beginTransaction();
            $stmt->execute($newPost);
            self::$conn->commit();
        } catch (Exception $e) {
            self::$conn->rollback();
            throw $e;
        }
    }
    
    public function deleteById($id){
        $sql = 'delete from post where id = '.$id;
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }
}
