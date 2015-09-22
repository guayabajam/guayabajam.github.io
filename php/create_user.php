<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);	
// load the items class 

$_SESSION['usuario'] = $_POST['usuario'];
$_SESSION['contrasena'] = $_POST['contrasena'];
$_SESSION['foto'] = $_POST['foto'],
$_SESSION['descripcion'] = $_POST['descripcion'],
$_SESSION['albumFavoritos'] = $_POST['albumF'],
$_SESSION['banda'] = $_POST['banda'],
// load the items class 

require('../pages/template.php');


	$required = array('usuario', 'contraseña', 'foto', 'descripcion', 'albumF', 'banda');

	$error = false;

	foreach($required as $field) {
	  if (empty($_POST[$field])) {
	    $error = true;
	    $input = $field;
	  }
	}

	if ($error) {
		$thanksPageContents = array(
			array(
				'title' => "Ups.. :(",
				'subTitle' => "All fields are required.",
				'link' => "index.php",
				'input' => $input,
				'error' => true
			)
		);
	} else {
		$thanksPageContents = array(
			array(
				'title' => "Thank You",
				'subTitle' => "Your message has been successfully sent. We will contact you very soon!",
				'error' => false
				)
		);
	}
	$thanksPage = new Template('"new_user.php"', $thanksPageContents);
	$thanksPage->printPage();













