<?php
    // $routes['/articles'] = array("class"=>"Articles", "method"=>"getAll");
    $routes['/articles/add'] = array("class"=>"Articles", "method"=>"createItem");
    $routes['/articles/delete'] = array("class"=>"Articles", "method"=>"deleteItem");
    $routes['/articles/edit'] = array("class"=>"Articles", "method"=>"editItem");
    $routes['/articles/byid'] = array("class"=>"Articles", "method"=>"getItem");

    $routes['/'] = array("class"=>"Articles", "method"=>"getAll", "view" => 'index.html', 'scripts' => 'index.scripts.html');
    $routes['/acasa'] = array("class"=>"Articles", "method"=>"getAll", "view" => 'index.html', 'scripts' => 'index.scripts.html');
    $routes['/about'] = array("class"=>"Articles", "method"=>"getItem", "view" => "about.html", 'scripts' => 'about.scripts.html');
    $routes['/article'] = array("class"=>"Articles", "method"=>"getItem", "view" => "article.html", 'scripts' => 'article.scripts.html');
    $routes['/articles'] = array("class"=>"Articles", "method"=>"getAll", "view" => 'articles.html', 'scripts' => 'articles.scripts.html');
    $routes['/login'] = array("class"=>"Articles", "method"=>"getAll", "view" => "login.html", 'scripts' => 'login.scripts.html');
    $routes['/newart'] = array("class"=>"Articles", "method"=>"getItem", "view" => "NA.html", 'scripts' => 'NA.scripts.html');
    $routes['/newu'] = array("class"=>"Articles", "method"=>"getItem", "view" => "NU.html", 'scripts' => 'NU.scripts.html');
    $routes['/undefined'] = array("class"=>"Articles", "method"=>"getItem", "view" => "undefined.html");

    $routes['/api/comments'] = array("class"=>"Comments", "method"=>"getAll");
    $routes['/api/comments/add'] = array("class"=>"Comments", "method"=>"createItem");
    $routes['/api/comments/delete'] = array("class"=>"Comments", "method"=>"deleteItem");

    $routes['/api/signup'] = array ("class"=>"Signup", "method"=>"signUser");
    $routes['/api/login'] = array("class"=>"Account", "method"=>"login");
    $routes['/api/logout'] = array("class"=>"Account", "method"=>"logout");

    $routes['/api/articles'] = array("class"=>"Articles", "method"=>"getAll", 'type' => 'json');

?>