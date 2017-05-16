<?php
    require "app/models/ArticlesModel.php";
    
class Articles {
    private $articlesModel;
    
    function __construct() {
        $this->articlesModel = new ArticlesModel();   
    }
    
    function getAll() {
        return $this->articlesModel->selectAll();
    }

    function createItem() {
        
        //check if logged
        if (!isset($_SESSION["isLogged"]) || $_SESSION["isLogged"] !== TRUE) {
            http_response_code(401);
            return array("error"=>"Unauthorized. You have to be logged.");
        }
    
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $_POST['main_image_url'] = '';
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
                $_POST['main_image_url'] = $file["name"];
            }
               
            return $this->articlesModel->insertItem($_POST);
        } else {
            return "All fields are required";
        }
    }
    
    function editItem() {
        parse_str(file_get_contents("php://input"), $PUT);
        return $this->articlesModel->updItem($PUT);
    }
    
    function deleteItem() {
        parse_str(file_get_contents("php://input"), $DELETE);
        return $this->articlesModel->deleteItem($DELETE['id']);
    }

    function getItem(){
        return $this->articlesModel->getID($_GET);
    }
}