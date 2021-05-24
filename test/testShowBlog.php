<?php
require_once('../app/config/parameters.php');
require_once('../app/controller/blogController.php');
require_once('../app/models/blog.php');

$ObjectblogController = new blogController();

$ObjectblogController->showblog(32);