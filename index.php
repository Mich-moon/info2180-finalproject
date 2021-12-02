<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css" rel="stylesheet" type="text/css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <title>Login</title>
</head>

<body id="doc">
    <section>
        <div class="home-img">

        </div>
        <div class="login">
            <h2>Login</h2>

            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control" required />
                </div>
                <button id="login" type="submit" name="logintBtn" class="btn btn-primary">Login</button>
            </form>
        </div>
    </section>

</body>

</html>