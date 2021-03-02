<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of post
 *
 * @author CHUNG
 */
class Post {

    private $id;
    private $title;
    private $description;
    private $status;
    private $create_at;
    private $update_at;
    private $image;
    
    function __construct(){
    }

//    function __construct($id, $title, $description, $status, $create_at, $update_at, $image) {
//        $this->id = $id;
//        $this->title = $title;
//        $this->description = $description;
//        $this->status = $status;
//        $this->create_at = $create_at;
//        $this->update_at = $update_at;
//        $this->image = $image;
//    }

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getStatus() {
        return $this->status;
    }

    function getCreate_at() {
        return $this->create_at;
    }

    function getUpdate_at() {
        return $this->update_at;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setCreate_at($create_at) {
        $this->create_at = $create_at;
    }

    function setUpdate_at($update_at) {
        $this->update_at = $update_at;
    }

    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }

}

?>
