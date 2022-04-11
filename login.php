<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bugme';

try {
	//Get Heroku ClearDB connection information
	$cleardb_url = parse_url(getenv("mysql://bdd23740ccccdc:ea70adf6@us-cdbr-east-05.cleardb.net/heroku_e01853a0aaacef2?reconnect=true"));
	$cleardb_server = $cleardb_url["host"];
	$cleardb_username = $cleardb_url["user"];
	$cleardb_password = $cleardb_url["pass"];
	$cleardb_db = substr($cleardb_url["path"],1);
	$active_group = 'default';
	$query_builder = TRUE;
	// Connect to DB
	$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
	
	//$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
} catch (Exception $e) {
	die($e->getMessage());
}

$go = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// storing and sanitizing form inputs
	$eml = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$pswd = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

	// Check if 'email' or 'password' is set in the $_POST Super Global
	if ( isset($_POST['email']) && isset($_POST['password']) ) {

		$hashed_password = password_hash($pswd, PASSWORD_DEFAULT);
		
		// retrieve user infrom the database
		$stmt = $conn->query("SELECT * FROM users WHERE email = '$eml'");

		// if query was created, user exists and password is correct
		if ( $stmt ) {
			$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($user_data 	&&	password_verify($user_data[0]['password'], $hashed_password)) {
										
				// Store data in session variables
				$_SESSION["loggedin"] = true;
				$_SESSION["id"] = $user_data[0]['id'];
				$_SESSION["firstname"] = $user_data[0]['firstname'];  
				$_SESSION["lastname"] = $user_data[0]['lastname'];                          
								
				$go = 1;
			}	
		}
	}
}
echo $go;
//if ($go) {
//	require 'dashboard.php';
//} else {
//	require 'index.php';
//}