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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // storing and sanitizing form inputs
	$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $assignedto = filter_input(INPUT_POST, 'assignedto', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $priority = filter_input(INPUT_POST, 'priority', FILTER_SANITIZE_STRING);

    $isValid = true;

    if (empty($title)) {
        $isValid = false;
    }

    if (empty($description)) {
        $isValid = false;
    }

    if (empty($assignedto)) {
        $isValid = false;
    }

     // insert into database
    if($isValid) {
        $created = date('Y-m-d H:i:s');
        $updated = date('Y-m-d H:i:s');
        $created_by = $_SESSION['id']; 
        $status = 'open';
        
        $sql = "INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES('{$title}', '{$description}', '{$type}', '{$priority}', '{$status}', '{$assignedto}', '{$created_by}', '{$created}', '{$updated}')";
        $conn->exec($sql);
    }

}


// users for the dropdown

$statement = $conn->query("SELECT * FROM users");
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

require 'new-issue.view.php';