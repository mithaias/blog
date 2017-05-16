<?php
require_once "DB.php";

class CommentsModel extends DB {

    function selectAll() {
        $sql = 'select * from `comments`';
        
        return $this->selectSql($sql);
    }
    
    function insertItem() {
        $sql = "insert into `comments` (`title`, `content`) values (?, ?);";
   
        $sth = $this -> dbh ->prepare ($sql);
        $sth -> execute(array($item['title'], $item['content']));
        
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function deleteItem($id) {
        $sql = "delete from `comments` where id = ?";
        
        $sth = $this ->dbh -> prepare($sql);
        $sth ->execute(array($id));
        
        return $sth->rowCount();
    }
}