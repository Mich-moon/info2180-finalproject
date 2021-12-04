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

if(isset($_GET['query'])) {
	$query = $_GET["query"]; 

	if($query == "open") {
		$statement = $conn->query("SELECT * FROM issues JOIN users on users.id = issues.assigned_to where issues.status = 'open' ");
		$issues = $statement->fetchAll(PDO::FETCH_ASSOC);

	} elseif($query == "my-tickets") {
		$id = $_SESSION["id"];
		$statement = $conn->query("SELECT * FROM issues JOIN users on users.id = issues.assigned_to where issues.created_by = '$id' ");
		$issues = $statement->fetchAll(PDO::FETCH_ASSOC);

	} elseif($query == "all")  {	
		$statement = $conn->query("SELECT * FROM issues JOIN users on users.id = issues.assigned_to");
		$issues = $statement->fetchAll(PDO::FETCH_ASSOC);
	}

} else {
	$statement = $conn->query("SELECT * FROM issues JOIN users on users.id = issues.assigned_to");
	$issues = $statement->fetchAll(PDO::FETCH_ASSOC);
}

$rows = "";
foreach ($issues as $row) {
	$rows.= "<tr><td>#<span>".$row['iid']."</span><a href='#' id='issue-link'> ".$row['title']."</a></td><td>".$row['type']."</td><td>".$row['status']."</td>";
	$rows.= "<td>".$row['firstname']." ".$row['lastname']."</td><td>".$row['created']."</td></tr>";
}

echo($rows);


require 'issues.view.php';