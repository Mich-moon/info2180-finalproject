<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

require 'dbConfig.php';

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


require_once 'issues.view.php';