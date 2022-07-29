<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

require 'dbConfig.php';


if(isset($_GET['query'])) {
	$query = $_GET["query"]; 
	$issues = [];

	if($query == "open") {
		$statement = $conn->query("SELECT * FROM issues JOIN users on users.id = issues.created_by where issues.status = 'open' ");
		$issues = $statement->fetchAll(PDO::FETCH_ASSOC);

	} elseif($query == "my-tickets") {
		$id = $_SESSION["id"];
		$statement = $conn->query("SELECT * FROM issues JOIN users on users.id = issues.created_by where issues.created_by = '$id' ");
		$issues = $statement->fetchAll(PDO::FETCH_ASSOC);

	} elseif($query == "all")  {	
		$statement = $conn->query("SELECT * FROM issues JOIN users on users.id = issues.created_by");
		$issues = $statement->fetchAll(PDO::FETCH_ASSOC);

	}

	$rows = "";
	foreach ($issues as $row) {
		$rows.= "<tr><td>#<span>".$row['iid']."</span><a href='#' id='issue-link'> ".$row['title']."</a></td><td>".$row['type']."</td><td>".$row['status']."</td>";
		$rows.= "<td>".$row['firstname']." ".$row['lastname']."</td><td>".$row['created']."</td></tr>";
	}

	echo($rows);
	
	return ;

} else {
	$statement = $conn->query("SELECT * FROM issues JOIN users on users.id = issues.created_by");
	$issues = $statement->fetchAll(PDO::FETCH_ASSOC);
}


// retrieve users info from the database
$stmt = $conn->query("SELECT * FROM users");
$users_data = $stmt->fetchAll(PDO::FETCH_ASSOC);


// filter users by id
function get_user($id, $users_data) {
	$ans = array_filter($users_data, function ($user) use ($id) {
		return ($user['id'] == (int)$id);
	});

	return $ans[0];
}

// replicate javascript console.log function
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

require_once 'issues.view.php';