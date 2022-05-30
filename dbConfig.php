<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bugme';

try {
	//Get Heroku ClearDB connection information
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$cleardb_server = $cleardb_url["host"];
	$cleardb_username = $cleardb_url["user"];
	$cleardb_password = $cleardb_url["pass"];
	$cleardb_db = substr($cleardb_url["path"],1);
	
	// Connect to Heroku DB
	$conn = new PDO("mysql:host=$cleardb_server;dbname=$cleardb_db;charset=utf8mb4", $cleardb_username, $cleardb_password);
	
	// Connect to mySQL DB
	//$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
} catch (Exception $e) {
	die($e->getMessage());
}