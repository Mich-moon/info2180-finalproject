<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    // Check if the user is logged in, if not then redirect to login page
    if(!isset($_SESSION["loggedin"])){
        //header("location: index.php");
        //exit;
    }
}
?>

<script src="app.js"></script>

<div id="dashboard">
    <header>
        <div>
            <span class="iconify" data-icon="ic:baseline-bug-report" style="color: white;"></span>
            <h1 class="logo-text"> BugMe Issue Tracker </h1>
        </div>
        <span class="text"><?php echo htmlspecialchars($_SESSION["firstname"]." ".$_SESSION["lastname"] ); ?></span>
    </header>
    <nav>
        <ul>
            <li>
                <a href="" id="home">
                    <span class="iconify" data-icon="ci:home-alt-fill" style="color: white;"></span>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="" id="add-user">
                    <span class="iconify" data-icon="zondicons:user-add" style="color: white;"></span>
                    <span class="text">Add User</span>
                </a>
            </li>
            <li>
                <a href="" id="new-issue">
                    <span class="iconify" data-icon="akar-icons:circle-plus-fill" style="color: white;"></span>
                    <span class="text">New Issue</span>
                </a>
            </li>
            <li>
                <a href="" id="logout">
                    <span class="iconify" data-icon="ri:logout-circle-line" style="color: white;"></span>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>

    </nav>
    <main id="main">
        <?php require_once 'issues.php'; ?>
    </main>
</div>