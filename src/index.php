<?php
session_start();
require_once "./Views/Frontend/home.php";

require './vendor/autoload.php';

$router = new App\Fram\Router();
$router->getController();

