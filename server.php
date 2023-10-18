<?php
// match any number
function route_request() {
    $route = $_SERVER['REQUEST_URI'];

    if ($route === "/") {

        require_once './controllers/DatabaseController.php';
        $controller = new DatabaseController();
        $controller->index();
    } 
    else if ($route === "/add") {
        require_once './controllers/DatabaseController.php';
        $controller = new DatabaseController();
        $controller->add();
    }
    else if (preg_match('/^\/delete\?id=\d+$/', $route)) {
        require_once './controllers/DatabaseController.php';
        $controller = new DatabaseController();
        $controller->delete();    }
    
    else if ($route === "/colorChart") {
        require_once './controllers/RVBController.php';
        $controller = new RVBController();
        $controller->indexRVB();
    }
    else if (preg_match('/^\/addRVB\?rvb=(red|blue|green)$/', $route)) {
        require_once './controllers/RVBController.php';
        $controller = new RVBController();
        $controller->addRVB();
    }
    else {
        echo "<h1>404 NOT FOUND</h1>";
    }
}

route_request();