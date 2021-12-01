<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css" rel="stylesheet" type="text/css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <title>bugme</title>
</head>

<body>
    <header>
        <img class="logo" src=".\img\logo.png" alt="bugme logo" />
        <h1 class="logo-text">BugMe Issue Tracker</h1>
    </header>
    <nav>
        <ul>
            <li>
                <a href="#" id="home">
                    <img class="icon" src=".\img\home-icon.png" alt="home icon" />
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="#" id="add-user">
                    <img class="icon" src=".\img\add-user-icon.png" alt="add user icon" />
                    <span class="text">Add User</span>
                </a>
            </li>
            <li>
                <a href="#" id="new-issue">
                    <img class="icon" src=".\img\plus-icon.png" alt="new issue icon" />
                    <span class="text">New Issue</span>
                </a>
            </li>
            <li>
                <a href="#" id="logout">
                    <img class="icon" src=".\img\logout-icon.png" alt="logout icon" />
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>

    </nav>
    <main id="main">
        <?php include_once 'issues.php'; ?>
    </main>
</body>

</html>