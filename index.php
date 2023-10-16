<?php
session_start();
define('PATH_DIR', 'http://localhost/cours-PHP2/TRAVAUX/PHP2-tp3/');
require_once(__DIR__ . '/controller/Controller.php');
require_once(__DIR__ . '/library/RequirePage.php');
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/library/Twig.php');
require_once(__DIR__ . '/library/checkSession.php');



//$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';
$url = isset($_GET["url"]) ? explode('/', ltrim($_GET["url"], '/')) : '/';

//echo $url;
//print_r($url);

if ($url == '/') {
    $controllerHome = __DIR__ . '/controller/ControllerHome.php';
    require_once $controllerHome;
    $controller = new ControllerHome;
    echo $controller->index();
} else {
    $requestURL = $url[0];
    $requestURL = ucfirst($requestURL);
    $controllerPath = __DIR__ . '/controller/Controller' . $requestURL . '.php';

    //echo $controllerPath;

    if (file_exists($controllerPath)) {
        //echo $controllerPath;
        require_once($controllerPath);
        $controllerName = 'Controller' . $requestURL;
        //echo $controllerName;
        $controller = new $controllerName;

        if (isset($url[1]) && !empty(isset($url[1]))) {
            $method = $url[1];
            if (isset($url[2])) {
                $id = $url[2];
                echo $controller->$method($id);
            } else {
                echo $controller->$method();
            }
        } else {
            echo $controller->index();
        }
    } else {
        $controllerHome = __DIR__ . '/controller/ControllerHome.php';
        require_once $controllerHome;
        $controller = new ControllerHome;
        echo $controller->error();
    }
}
