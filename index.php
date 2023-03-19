<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("CONTROLLERS_PATH", "controllers");
define("CONTROLLER_SUFFICS", "Controller");

//Controllers
require_once("controllers/UserController.php");
require_once("controllers/ProductController.php");


if (isset($_GET['controller']) && isset($_GET['method'])) {

    $controller = ucfirst($_GET['controller']);
    $className = $controller . CONTROLLER_SUFFICS;

    if (!class_exists($className) || !method_exists($className, $_GET['method'])) {
        require_once("404.html");
        die();
    }
    $class = new $className;
    call_user_func([$class, $_GET['method']]);
} else {
    header("Location: /?controller=user&method=loginView");
}
?>