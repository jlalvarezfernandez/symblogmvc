<?php
require_once('../app/config/parameters.php');
require_once('../app/controller/UserController.php');
require_once('../app/models/Users.php');

$ObjectUserController = new UserController();

$ObjectUserController->showUser(3);
