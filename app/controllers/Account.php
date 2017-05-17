<?php

    require "app/models/UsersModel.php";

class Account {
    function login(){
        if(!empty($_POST["email"]) && !empty($_POST["pass"])){
            $suppliedEmail = $_POST["email"];
            $suppliedPass = $_POST["pass"];

            if(empty($suppliedEmail)){
                   return array("isLogged"=>FALSE,'message'=>"Empty email!");
            }

            if(!filter_var($suppliedEmail,FILTER_VALIDATE_EMAIL)){
                return array("isLogged"=>FALSE,'message'=>"Email not valid!");
            }

            if(empty($suppliedPass)){
                  return array("isLogged"=>FALSE,'message'=>"Empty password!");
            }

            $pass = crypt($_POST["pass"], PASS_SALT);
            $user = $this->userModel->authUser($_POST["email"],$pass);

            if(is_array($user) and count($user) > 0){

                $this->userModel->updateDateColumns($user['id'],array('last_login'=>date("Y-m-d H:i:s")));

                $_SESSION['isLogged'] = true;
                $_SESSION['Name'] = trim($user['first_name']) . " " . trim($user['last_name']);
                $_SESSION['userId'] = trim($user['id']);
                $_SESSION['role'] = trim($user['role']);
                return array("isLogged"=>$_SESSION['isLogged'], "message"=>"Logged in", "name"=>$_SESSION['Name'], "ID"=>$_SESSION['userId'],"email"=>trim($user['email']),"role"=>trim($user['role']));
            }
            else{
                return array("isLogged"=>FALSE,'message'=>"Invalid credentials!");
            }
        }
        else{
                return array("isLogged"=>FALSE,'message'=>"Empty credentials");
        }

    }

    function logout() {
        unset($_SESSION["isLogged"]);
        unset($_SESSION["name"]);
        session_destroy();

        return array("success"=>TRUE);
    }
}