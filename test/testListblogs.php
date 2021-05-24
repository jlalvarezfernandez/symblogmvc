<?php
require_once('../app/config/parameters.php');
require_once('../app/controller/BlogController.php');
require_once('../app/models/Blog.php');

$ObjectBlogController = new BlogController();

$ObjectBlogController->actionListBlog();