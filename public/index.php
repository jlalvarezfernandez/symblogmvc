<?php
require_once('../app/config/parameters.php');
require_once('../app/controller/UserController.php');
require_once('../app/controller/BlogController.php');
require_once('../app/controller/AuthController.php');
require_once('../app/controller/AboutController.php');
require_once('../app/models/Router.php');


// Iniciamos la sesion

session_start();

//Creamos la sesion
if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = 'invitado';
}

// Creamos un enrutador para indicar que controlador debe responder a la peticiones

$route = new Router();

// Añadimos rutas
// array para la lista de usuarios
$route->addRoute(array(
    'name' => 'UserList',
    'path' => '/^\/user\/list$/',
    'action' => [UserController::class, 'actionListUser'],
    'auth' => false
));

// array para el login

$route->addRoute(array(
    'name' => 'UserLogin',
    'path' => '/^\/login$/',
    'action' => [UserController::class, 'actionLogin'],
    'auth' => false
));

// array para la lista de blogs
$route->addRoute(array(
    'name' => 'BlogList',
    'path' => '/^\/blog\/list$/',
    'action' => [BlogController::class, 'actionListBlog'],
    'auth' => false
));

// ruta cierre sesion
$route->addRoute(array(
    'name' => 'Logout',
    'path' => '/^\/user\/logout$/',
    'action' => [AuthController::class, 'actionLogout'],
    'auth' => false
));

// ruta login
$route->addRoute(array(
    'name' => 'Login',
    'path' => '/^\/user\/login$/',
    'action' => [AuthController::class, 'actionLogin'],
    'auth' => false
));

// ruta about
$route->addRoute(array(
    'name' => 'About',
    'path' => '/^\/about$/',
    'action' => [AboutController::class, 'actionAbout'],
    'auth' => false
));

// recoger lo que devuelve la url

$url = str_replace(DIRURL, '', $_SERVER['REQUEST_URI']);

$ruta = $route->match($url);
if ($ruta) {
    $nameController = $ruta['action'][0];
    $nameAction = $ruta['action'][1];

    $controller = new $nameController();
    $controller->$nameAction();
} else {
    echo "no ruta";
}
