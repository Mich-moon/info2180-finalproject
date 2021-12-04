<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bugme';

try {
	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
} catch (Exception $e) {
	die($e->getMessage());
}

$go = false;

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
				session_start();
								
				// Store data in session variables
				$_SESSION["loggedin"] = true;
				$_SESSION["id"] = $user_data[0]['id'];
				$_SESSION["firstname"] = $user_data[0]['firstname'];  
				$_SESSION["lastname"] = $user_data[0]['lastname'];                          
					
				$go = true;
			}	
		}
	}
}

if ($go) {
	require 'dashboard.php';
} else {
	require 'index.php';
}