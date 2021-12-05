<?php
session_start();
    // Check if the user is logged in, if not then redirect to login page
    if(!isset($_SESSION["loggedin"])){
        //header("location: index.php");
        //exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="app.js"></script>

    <title>bugme</title>
</head>

<body>
    <header>
        <div>
            <img class="logo" src=".\img\logo.png" alt="bugme logo" />
            <h1 class="logo-text">BugMe Issue Tracker</h1>
        </div>
        <span class="text"><?php echo htmlspecialchars($_SESSION["firstname"]." ".$_SESSION["lastname"] ); ?></span>
    </header>
    <nav>
        <ul>
            <li>
                <a href="" id="home">
                    <img class="icon" src=".\img\home-icon.png" alt="home icon" />
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="" id="add-user">
                    <img class="icon" src=".\img\add-user-icon.png" alt="add user icon" />
                    <span class="text">Add User</span>
                </a>
            </li>
            <li>
                <a href="" id="new-issue">
                    <img class="icon" src=".\img\plus-icon.png" alt="new issue icon" />
                    <span class="text">New Issue</span>
                </a>
            </li>
            <li>
                <a href="" id="logout">
                    <img class="icon" src=".\img\logout-icon.png" alt="logout icon" />
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>

    </nav>
    <main id="main">
        <?php require 'issues.php'; ?>
    </main>
</body>

</html>