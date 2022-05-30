<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

require 'dbConfig.php';

if(isset($_GET['iid'])) {
	$iid = $_GET["iid"]; 

	$statement = $conn->query("SELECT * FROM issues where iid = '$iid' ");
	$issue = $statement->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($issue);

}

//require 'issue-details.view.php';