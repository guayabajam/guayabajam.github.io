<?php 

/**
* Connect to the database
*/
class Database{	
	// private variables
	private $username = 	'sql590801';
	private $password = 	'nN1*rI5%';
	private $host = 	'sql5.freesqldatabase.com';
	private $database = 	'sql590801';
	private $charset = array(
		'charset' => 'utf8'
	);
	protected $connection =  NULL;

	/**
	* Connect to the database
	*/
	function __construct(){
		try{
			// create the connection
			$this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->username, $this->password);

			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connection->query("SET CHARACTER SET utf8");
		}catch(PDOException $erorr){
			echo '<hr>Connection Failed: '.$erorr->getMessage().'<hr>';
			die();
		}
		echo '<hr>Connection<hr>';
	}

	function __destruct(){
		$this->connection = NULL;
	}
}
