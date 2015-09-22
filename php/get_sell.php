<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../classes/ItemsClass.php');

	// instace of the items
	$items = new Items();

	$fechaIngreso = $items->getSell('fecha_ingreso');
	$cantVendidos = $items->getSell('cant_vendidos');
	// create the new item
	$datos = array(
		"fechaIngreso" => $fechaIngreso,
	    "cantVendidos" => $cantVendidos
	);
//request response in json format
echo json_encode($datos);