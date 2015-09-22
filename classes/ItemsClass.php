<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('DatabaseClass.php');

/**
* @class Items
* @description class for items
*/
class Items extends Database{

	/**
	* Get all items
	* @return {array} items getted from the database
	*/
	function all($table){

		// get all items 
		$query = $this->connection->prepare('SELECT * FROM '.$table);

		// execute the query
		if($query->execute()){

			// return the query result
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	

	/**
	* Get an item
	* @param {int} id
	* @return {array|boolean} data or false in case fails
	*/
	function getUser($usuario, $contrasena){

		// get the item
		$query = $this->connection->prepare('SELECT usuario, foto, descripcion, album_favoritos, banda FROM perfiles WHERE usuario = "'.$usuario.'" AND contrasena = "'.$contrasena.'"');


		// execute the query
		if($query->execute()){

			// return the query result
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	/**
	* Get an item
	* @param {int} id
	* @return {array|boolean} data or false in case fails
	*/
	function getSell($order){

		// get the item
		$query = $this->connection->prepare('SELECT nombre, img, cant_vendidos, costo, descripcion, fecha_ingreso FROM album UNION SELECT nombre, img, cant_vendidos, costo, descripcion, fecha_ingreso FROM mercaderia ORDER BY '.$order.' DESC');


		// execute the query
		if($query->execute()){

			// return the query result
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	/**
	* Create an item
	* @param {string} name
	*/
	function createUser($usuario, $contrasena, $foto, $descripcion, $album_favoritos, $banda){
		
		// create the query
		$query = $this->connection->prepare('INSERT INTO perfiles (usuario, contrasena, foto, descripcion, album_favoritos, banda) VALUES ("'.$usuario.'", "'.$contrasena.'", "'.$foto.'", "'.$descripcion.'", "'.$album_favoritos.'", "'.$banda.'")');
		

		// bind data to be inserted
		$bind = array(
			':usuario' => $usuario,
			':contraseña' => $contrasena,
			':foto' => 	$foto,
			':descripcion'=> $descripcion,
			':album_favoritos'=> $album_favoritos,
			':banda' => $banda
		);

		if($query->execute()){
			return true;
		}
		return false;
	}

	/**
	* Update an item
	* @param {int} id
	* @param {string} name
	*/
	function update($id, $name){

		// update an item
		$query = $this->connection->prepare('UPDATE items SET name = :name, updated = :updated WHERE id = :id');

		// updated date time
		$updated = $this->now();

		// bind data
		$bind = array(
			':id' => 		$id, 
			':name' => 		$name,
			':updated' => 	$updated
		);

		if($query->execute($bind)){
			return true;
		}
		return false;
	}

	/**
	* Delete an item
	* @param {int} id
	*/
	function delete($id){

		// delete the item
		$query = $this->connection->prepare('DELETE FROM items WHERE id = :id');

		$bind = array(':id' => $id);

		if($query->execute($bind)){
			return true;
		}
		return false;
	}

	/**
	* Get the now date time
	* @return {string} date time
	*/
	private function now(){
		
		// create the date time
		$now = new DateTime('now');
		$now = $now->format('Y-m-d H:i:s');

		return $now;
	}
}