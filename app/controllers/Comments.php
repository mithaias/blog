<?php
    require "app/models/CommentsModel.php";
    
class Comments {
    private $commentsModel;

    function __construct() {
        $this->commentsModel = new CommentsModel();
    }

    function getAll() {
        return $this->commentsModel ->selectAll();
    }

    function createItem() {
        return $this->commentsModel->createComment($_POST);    
    }
    
    function deleteItem() {
        parse_str(file_get_contents("php://input"), $DELETE);
        return $this->commentsModel->deleteItem($DELETE['id']);
    }
}