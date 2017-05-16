<?php
        require 'app/models/UsersModel.php';
class Signup {

    private $usersModel;
        
    function __construct() {
        $this->usersModel = new UsersModel();   
    }

    function signUser() {
    
        if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === TRUE ) {
            return array("isLogged" => $_SESSION["isLogged"]);
        }

        if (isset($_POST["email"], $_POST["pass"], $_POST["repass"]) ) {
            $error = "";

            if(empty($_POST["email"]) || empty($_POST["pass"])) {
                    return array("error"=>"Empty credentials.");
            }
            elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    // $error = "Email invalid";
                    return array("error"=>"Email invalid."); 
            }
            elseif ($_POST["pass"] !== $_POST["repass"]) {
                    return array("error"=>"Passwords don't match!");
            }
            elseif(strlen($_POST["pass"]) < 6 || strlen($_POST["repass"]) <6){
                    return array("error"=>"Password must be at least 6 characters long!");
            } 

                $pass = crypt($_POST["pass"], PASS_SALT);
                $_POST["pass"] = $pass;

                $result = $this->usersModel ->saveUser($_POST);
           
            if ($result > 0) {
                return ( "User with email ". $_POST['email'] ."was successfully created");
            } else {
                return ("Unable to create");
                }
   
        }else {
            return array("error"=>"All fields are required!");
        }
    } 
}