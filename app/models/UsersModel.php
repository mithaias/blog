<?php
require_once "DB.php";

class UsersModel extends DB {
        //============INSERT USER===========\\
        
        function insertUser($user){
            
            $sql = "INSERT INTO users (name,email,password,role,job,description,image) VALUES (?,?,?,?,?,?,?)";
            
            $stmt= $this->dbh->prepare($sql);
            $stmt->execute(array($user['first_name'],
                                 $user['last_name'],
                                 $user['email'],
                                 $user['password'],
                                 $user['gender'],
                                 $user['age'],
                                 $user['nick_name']
                          ));
            return $this->dbh->lastInsertId();
        }

        function checkUser($email, $pass) 
        {
            $sql = 'SELECT name,email,id FROM users where email = ? and password = ?'; 
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($email, 
                                 $pass));
            return $stmt->fetch(PDO::FETCH_ASSOC);    
        }
        
}