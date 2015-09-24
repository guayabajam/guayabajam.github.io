<!DOCTYPE html>
<html>
<body>

	<?php
		$servername = "db4free.net";
		$username = "admiguayaba";
		$password = "GJadmi2015";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=guayabajam2015", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    echo "Connected ssuccessfully"; 
		    }
		catch(PDOException $e)
		    {
		    echo "Connection failed: " . $e->getMessage();
		    }
	?>

</body>
</html>