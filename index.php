<?php
session_start();

// define('PATH_DIR', 'https://e9040356.webdev.cmaisonneuve.qc.ca/php2-tp3/');
define('PATH_DIR', 'http://localhost/cours-PHP2/TRAVAUX/PHP2-tp3-copie2/');

// define('IMG_DIR', __DIR__ . '\assets\img\uploads\\');
define('IMG_DIR', __DIR__ . '/assets/img/uploads/');
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/controller/Controller.php');
require_once(__DIR__ . '/library/RequirePage.php');
require_once(__DIR__ . '/library/Twig.php');
require_once(__DIR__ . '/library/CheckSession.php');
require_once(__DIR__ . '/model/Logbook.php');


//Logbook
$dataLogbook = [
    'ip_address' => $_SERVER['REMOTE_ADDR'],
    'date' => date('Y-m-d H:i:s'), 
    'username' => '', 
    'visited_url' => $_SERVER['REQUEST_URI']
];

if (isset($_SESSION['user_name'])) {
    $dataLogbook['username'] = $_SESSION['user_name'];
} else {
    $dataLogbook['username'] = 'guest';
}

$logbook = new Logbook;
$insert = $logbook->insert($dataLogbook);




//$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';
$url = isset($_GET["url"]) ? explode('/', ltrim($_GET["url"], '/')) : '/';



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
