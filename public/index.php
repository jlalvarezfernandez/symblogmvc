<?php
require_once('../app/config/parameters.php');
require_once('../app/controller/UserController.php');
require_once('../app/controller/BlogController.php');
require_once('../app/controller/AuthController.php');
require_once('../app/controller/AboutController.php');
require_once('../app/controller/AdminController.php');
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
    'auth' => array('admin')
));

// array para el login

$route->addRoute(array(
    'name' => 'UserLogin',
    'path' => '/^\/login$/',
    'action' => [UserController::class, 'actionLogin'],
    'auth' => array('invitado','admin','usuario')
));

// array para la lista de blogs
$route->addRoute(array(
    'name' => 'BlogList',
    'path' => '/^\/blog\/list$/',
    'action' => [BlogController::class, 'actionListBlog'],
    'auth' => array('usuario','invitado','admin')
));

// ruta cierre sesion
$route->addRoute(array(
    'name' => 'Logout',
    'path' => '/^\/user\/logout$/',
    'action' => [AuthController::class, 'actionLogout'],
    'auth' => array('usuario','admin')
));

// ruta login
$route->addRoute(array(
    'name' => 'Login',
    'path' => '/^\/user\/login$/',
    'action' => [AuthController::class, 'actionLogin'],
    'auth' => array('invitado','usuario')
));

// ruta about
$route->addRoute(array(
    'name' => 'About',
    'path' => '/^\/about$/',
    'action' => [AboutController::class, 'actionAbout'],
    'auth' => array('invitado','admin','usuario')
));

// ruta opciones administrador
$route->addRoute(array(
    'name' => 'Admin',
    'path' => '/^\/admin$/',
    'action' => [AdminController::class, 'actionAdmin'],
    'auth' => array('usuario')
));

// recoger lo que devuelve la url

$url = str_replace(DIRURL, '', $_SERVER['REQUEST_URI']);

$ruta = $route->match($url);
if ($ruta) {
    if (in_array($_SESSION['perfil'],$ruta['auth'])) {
        $nameController = $ruta['action'][0];
        $nameAction = $ruta['action'][1];
    
        $controller = new $nameController();
        $controller->$nameAction();
    }else{
        echo "Acceso no autorizado";
    }
   
} else {
    echo "no ruta";
}
