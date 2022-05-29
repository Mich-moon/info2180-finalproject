<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="app.js"></script>

    <title>Bugme</title>
</head>

<body>

    <div class="login">
        <div class="logo-home">
            <span class="iconify" data-icon="ic:round-bug-report"></span>
            <p>BugMe</p>
        </div>

        <h2>Log in to BugMe</h2>

        <form id="login-form" action="" method="post" onsubmit="return false">
            <div class="form-group">
                <label for="email">Email</label>
                <span class="iconify" data-icon="eva:email-outline"></span>
                <input type="email" name="email" id="email" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <span class="iconify" data-icon="akar-icons:lock-on"></span>
                <input type="password" name="password" id="password" class="form-control" required />
            </div>
            <div class="form-group">
                <button id="login" type="submit" name="login">Login</button>
            </div>
        </form>

        <hr />
        <p> &#64; 2022 BugMe.com</p>
    </div>

    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>