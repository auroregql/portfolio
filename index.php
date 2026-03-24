<?php

session_start();

require "config/autoload.php";
require 'controllers/AuthController.php';
require 'controllers/AdminController.php'; // Profites-en pour ajouter celui-ci aussi !

// Ensuite vient le code du Router
$router = new Router();
$router->handleRequest();

?>