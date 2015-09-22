<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$usuario = $_SESSION["usuario"];
$contrasena = $_SESSION["contrasena"];

require('../classes/ItemsClass.php');

	// instace of the items
	$items = new Items();

	// create the new item
	if($data = $items->getUser($usuario, $contrasena)){
		$response['user'] = $data;
	}else{
		$response['message'] = 'Could not create the new item';
	}
//request response in json format
echo json_encode($response);
