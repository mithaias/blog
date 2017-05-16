<?php
    $routes['/articles'] = array("class"=>"Articles", "method"=>"getAll");
    $routes['/articles/add'] = array("class"=>"Articles", "method"=>"createItem");
    $routes['/articles/delete'] = array("class"=>"Articles", "method"=>"deleteItem");
    $routes['/articles/edit'] = array("class"=>"Articles", "method"=>"editItem");
    $routes['/articles/byid'] = array("class"=>"Articles", "method"=>"getItem");

    $routes['/'] = array("class"=>"Articles", "method"=>"getAll", "view" => 'index.html', 'scripts' => 'index.scripts.html');
    $routes['/acasa'] = array("class"=>"Articles", "method"=>"getAll", "view" => 'index.html', 'scripts' => 'index.scripts.html');
    $routes['/about.html'] = array("class"=>"Articles", "method"=>"getItem", "view" => "about.html", 'scripts' => 'about.scripts.html');
    $routes['/article.html'] = array("class"=>"Articles", "method"=>"getItem", "view" => "article.html", 'scripts' => 'article.scripts.html');
    $routes['/articles.html'] = array("class"=>"Articles", "method"=>"getAll", "view" => 'articles.html', 'scripts' => 'articles.scripts.html');
    $routes['/login.html'] = array("class"=>"Articles", "method"=>"getItem", "view" => "login.html", 'scripts' => 'login.scripts.html');
    $routes['/newart.html'] = array("class"=>"Articles", "method"=>"getItem", "view" => "NA.html", 'scripts' => 'NA.scripts.html');
    $routes['/newu.html'] = array("class"=>"Articles", "method"=>"getItem", "view" => "NU.html", 'scripts' => 'NU.scripts.html');

    $routes['/comments'] = array("class"=>"Comments", "method"=>"getAll");
    $routes['/comments/add'] = array("class"=>"Comments", "method"=>"createItem");
    $routes['/comments/delete'] = array("class"=>"Comments", "method"=>"deleteItem");

    $routes['/signup'] = array ("class"=>"Signup", "method"=>"signUser");
    $routes['/login'] = array("class"=>"Account", "method"=>"login");
    $routes['/logout'] = array("class"=>"Account", "method"=>"logout");

    $routes['/api/articles'] = array("class"=>"Articles", "method"=>"getAll", 'type' => 'json');

?>