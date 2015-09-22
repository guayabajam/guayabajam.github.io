<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * @name table.php
 * @description prints all the inventary items inside a table
 */

require('../classes/ItemsClass.php');

// instace of the items
$items = new Items();

$album = $items->all('album');
$mercaderia = $items->all('mercaderia');
$perfiles = $items->all('perfiles');
$bandas = $items->all('bandas');

// arrays of tables
$datos = array(
	"perfiles" => $perfiles,
    "bandas" => $bandas,
    "album" => $album,
    "mercaderia" => $mercaderia
);

// $datos array => json
echo json_encode($datos);
