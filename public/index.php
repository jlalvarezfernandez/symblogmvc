<?php
require_once('../app/config/parameters.php');
require_once('../app/controller/UserController.php');
require_once('../app/controller/BlogController.php');
require_once('../app/controller/AuthController.php');
require_once('../app/controller/AboutController.php');
require_once('../app/controller/AdminController.php');
require_once('../app/controller/MensajeController.php');
require_once('../app/controller/RegistroController.php');
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
    'auth' => array('administrador')
));

// array para el login

$route->addRoute(array(
    'name' => 'UserLogin',
    'path' => '/^\/login$/',
    'action' => [UserController::class, 'actionLogin'],
    'auth' => array('invitado','administrador','usuario','editor')
));

// array para la lista de blogs
$route->addRoute(array(
    'name' => 'BlogList',
    'path' => '/^\/blog\/list$/',
    'action' => [BlogController::class, 'actionListBlog'],
    'auth' => array('usuario','invitado','administrador','editor')
));

// ruta cierre sesion
$route->addRoute(array(
    'name' => 'Logout',
    'path' => '/^\/user\/logout$/',
    'action' => [AuthController::class, 'actionLogout'],
    'auth' => array('usuario','administrador','editor')
));

// ruta login
$route->addRoute(array(
    'name' => 'Login',
    'path' => '/^\/user\/login$/',
    'action' => [AuthController::class, 'actionLogin'],
    'auth' => array('invitado','usuario','administrador','editor')
));

// ruta about
$route->addRoute(array(
    'name' => 'About',
    'path' => '/^\/about$/',
    'action' => [AboutController::class, 'actionAbout'],
    'auth' => array('invitado','administrador','usuario','editor')
));

// ruta opciones administrador
$route->addRoute(array(
    'name' => 'Dashboard',
    'path' => '/^\/admin$/',
    'action' => [AdminController::class, 'actionShowAllUsers'],
    'auth' => array('administrador')
));

// ruta mensaje
$route->addRoute(array(
    'name' => 'Mensaje',
    'path' => '/^\/mensaje$/',
    'action' => [MensajeController::class, 'actionMensaje'],
    'auth' => array('usuario','editor','administrador','invitado')
));

// ruta registro
$route->addRoute(array(
    'name' => 'Registro',
    'path' => '/^\/registro$/',
    'action' => [UserController::class, 'actionRegistro'],
    'auth' => array('invitado')
));

// ruta crear blog
$route->addRoute(array(
    'name' => 'CrearBlog',
    'path' => '/^\/blog\/create$/',
    'action' => [BlogController::class, 'actionCreateBlog'],
    'auth' => array('editor')
));

// mostrar un blog
$route->addRoute(array(
    'name' => 'MostrarBlog',
    'path' => '/^\/blog\/\d+$/',
    'action' => [BlogController::class, 'actionShowOneBlog'],
    'auth' => array('editor','invitado','usuario','administrador')
));


// recoger lo que devuelve la url

$url = str_replace(DIRURL, '', $_SERVER['REQUEST_URI']);

$ruta = $route->match($url);
if ($ruta) {
    if (in_array($_SESSION['perfil'],$ruta['auth'])) {
        $nameController = $ruta['action'][0];
        $nameAction = $ruta['action'][1];
    
        $controller = new $nameController();
        $controller->$nameAction($url);
    }else{
        echo "Acceso no autorizado";
    }
   
} else {
    echo "no ruta";
}
