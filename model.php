<?php

class ModalOperations {
		public function addUserData($name, $email, $password) {
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}

		$sql = "SELECT * From `users` where `userEmail`= '".$email."'";
		if ($conn->query($sql) -> num_rows > 0) {
			return "Error!";
		}
		
		// prepare and bind 
		$stmt = $conn -> prepare("INSERT INTO `users`(`userName`,`userEmail`, `userPassword`) VALUES (?,?,?)");
		$stmt -> bind_param("sss", $name, $email, $password);
		$stmt -> execute();

		$id = $conn -> insert_id;
		$stmt -> close();
		$conn -> close();
		return $id;
	}

	public function AuthUser($email, $password) {
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		
		$sql = "SELECT * From `users` where `userEmail`= '".$email."' AND `userPassword`='".$password."'";
		$result = $conn -> query($sql);
		$conn -> close();
		return $result;
	}

	public function GetAllUsers() {
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		
		$sql = "SELECT * From `users`";
		$result = $conn -> query($sql);
		$conn -> close();
		return $result;
	}

	public function GetAllItems($user) {
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		
		$sql = "SELECT * From `products` where `userID`= '".$user."'";
		$result = $conn -> query($sql);
		$conn -> close();
		return $result;


	}

	public function addItems($pName, $pDesc, $pQty, $price, $user) {
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		
		// prepare and bind 
		$stmt = $conn -> prepare("INSERT INTO `products`(`userID`,`productName`, `productDescription`, `productQTY`, `productPrice`) VALUES (?,?,?,?,?)");
		$stmt -> bind_param("sssss",$user, $pName, $pDesc, $pQty, $price);
		$stmt -> execute();

		$id = $conn -> insert_id;
		$stmt -> close();
		$conn -> close();
		return $id;
	}

	public function getUserCount() {
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		
		$sql = "SELECT COUNT(*) as Count FROM `users` WHERE 1";
		$result = $conn -> query($sql);
		$conn -> close();
		return $result;
	}

	public function deleteUser($userName) {
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}

		// prepare and bind 
		$stmt = $conn -> prepare("DELETE FROM `users` WHERE `userName`=?");
		$stmt -> bind_param("s",$userName);
		$stmt -> execute();

	}

	public function updateUserInfo($userName, $role)
	{
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}

		// prepare and bind 
		$stmt = $conn -> prepare("UPDATE `users` SET `is_admin`=? WHERE `userName`=?");
		$stmt -> bind_param("ss",$role, $userName);
		$stmt -> execute();
	}

	function updateProductQTY($product, $qty, $user)
	{
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}

		// prepare and bind 
		$stmt = $conn -> prepare("UPDATE `products` SET `productQTY`=`productQTY` - ? WHERE `userID`=? AND `productName`=?");
		$stmt -> bind_param("sss",$qty, $user, $product);
		$stmt -> execute();
	}

	function deleteProduct($product, $user)
	{
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/Estore/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}

		// prepare and bind 
		$stmt = $conn -> prepare("DELETE FROM `products` WHERE `userID`=? AND `productName`=?");
		$stmt -> bind_param("ss", $user, $product);
		$stmt -> execute();
	}
}

?>