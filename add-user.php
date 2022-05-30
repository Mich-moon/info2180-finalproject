<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

require 'dbConfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // storing and sanitizing form inputs
	$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
	$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $pswd = filter_input(INPUT_POST, 'addpassword', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'addemail', FILTER_VALIDATE_EMAIL);

    $pswd_hashed = "";
    $isValid = true;

    if (!preg_match("/^[a-z ,.'-]+$/i", $firstname)) {
        $isValid = false;
    }

    if (!preg_match("/^[a-z ,.'-]+$/i", $lastname)) {
        $isValid = false;
    }

    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", $pswd)) {
        $isValid = false;
    } else {
        $pswd_hashed = password_hash($pswd, PASSWORD_DEFAULT);
    }

    if (!preg_match("/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/", $email)) {
        $isValid = false;
    }

    // insert into database
    if($isValid) {
        $createdAt = date('Y-m-d H:i:s');
        $sql = "INSERT INTO users (firstname, lastname, password, email, date_joined) VALUES('{$firstname}', '{$lastname}', '{$pswd_hashed}', '{$email}', '{$createdAt}')";
        $conn->exec($sql);
    }

}
//require 'add-user.view.php';