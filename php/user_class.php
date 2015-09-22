<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);	
// load the items class 

$_SESSION['usuario'] = $_POST['usuario'];
$_SESSION['contrasena'] = $_POST['contrasena'];

require('template.php');

$thanksPage = new Template("'../php/get_user.php'");
$thanksPage->printPage();








