<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bugme';

try {
	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
} catch (Exception $e) {
	die($e->getMessage());
}

if(isset($_GET['iid'])) {
	$iid = $_GET["iid"]; 

	$statement = $conn->query("SELECT * FROM issues where iid = '$iid' ");
	$issue = $statement->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($issue);

}

//require 'issue-details.view.php';