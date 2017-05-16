<?php

    require "app/models/UsersModel.php";
    
class Account {
    function login() {
        if (!empty($_POST["email"]) && !empty($_POST["pass"])) {
            $pass = crypt($_POST["pass"], PASS_SALT);
            $usersModel =  new UsersModel();
            $user = $usersModel->checkUser($_POST["email"], $pass);

            if (is_array($user)) {
                $_SESSION["isLogged"] = TRUE;
                $_SESSION["name"] = 
                    $user["first_name"] . " " . $user["last_name"];
                return array("isLogged" => $_SESSION["isLogged"]);
            } else {
                return array("error" => "Invalid credentials.");
            }
            
        } else{
            return array("error" => "Empty credentials."); 
        }
    }
    
    function logout() {
        unset($_SESSION["isLogged"]);
        unset($_SESSION["name"]);
        session_destroy();
            
        return array("success"=>TRUE);
    }
}