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
    <section>
        <div class="home-img">
            <img id="home-img" class="login-img" src=".\img\logo-black.png" alt="bugme logo" />
        </div>
        <div class="login">
            <h2>Login</h2>

            <form id="login-form" action="" method="post" onsubmit="return false">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required />
                </div>
                <button id="login" type="submit" name="login">Login</button>
            </form>
        </div>
    </section>

</body>

</html>