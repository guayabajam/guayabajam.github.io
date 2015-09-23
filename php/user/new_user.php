<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$usuario = $_SESSION["usuario"];
$contrasena = $_SESSION["contrasena"];
$foto = $_SESSION["foto"];
$descripcion = $_SESSION["descripcion"];
$albumFavoritos = $_SESSION["albumFavoritos"];
$banda = $_SESSION["banda"];

require('../classes/ItemsClass.php');

	// instace of the items
	$items = new Items();

	// create the new item
	if($data = $items->createUser($usuario, $contrasena, $foto, $descripcion, $albumFavoritos, $banda)){
		$response['user'] = $data;
	}else{
		$response['message'] = 'Could not create the new item';
	}
//request response in json format
$userData = json_encode($response);
echo $userData;

