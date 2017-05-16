<?php
session_start();

require "app/configs/config.php";
require "app/configs/routes.php";

const BLOG = '';

if (!empty($_REQUEST['p'])) {
    $url = '/' . $_REQUEST['p'];
    $page = str_replace(BLOG,'',$url);

    //var_dump($url);

    if (array_key_exists($page, $routes)) {
        $class = $routes[$page]["class"]; // "Articles"
        $method = $routes[$page]["method"]; // "getAll"
        $type = isset($routes[$page]["type"]) ? $routes[$page]["type"] : 'html';
        $view = isset($routes[$page]["view"]) ? $routes[$page]["view"] : null;
        $scripts = isset($routes[$page]["scripts"]) ? $routes[$page]["scripts"] : null;

        $methodReq = $_SERVER["REQUEST_METHOD"];
        switch($methodReq) {
            case "POST":
                $content = file_get_contents("php://input");
                $data = json_decode($content, true);

                if ($data) {
                    $_POST = $data;
                }
                break;
            case "PUT":
            case "DELETE":
                $content = file_get_contents("php://input");
                $data = json_decode($content, true);

                if ($data) {
                    $REQUEST = $data;
                } else {
                    parse_str($content, $REQUEST);
                }
                break;
        }

        require "app/controllers/".$class.".php";
        $controller = new $class();
        $response = $controller->$method();

        if ($type == "json") {
            // RESPONSE FOR JS
            header("Content-Type: application/json");
            echo json_encode($response);
        } else {
            require "UI/pages/partials/header.php";
            if ($view) {
                require "UI/pages/" . $view;
            } else {
                http_response_code(404);
                echo "Page not found.";
            }
            require "UI/pages/partials/footer.php";
        }

    } else {
        http_response_code(404);
        require "UI/pages/404.html";
    }
} else {
    http_response_code(403);
    echo "Access Forbidden.";
}
?>