<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="app.js"></script>

    <title>Add User</title>
</head>

<body>
    <div class="container">
        <div class="adduser">
            <h2>Add User</h2>

            <form name="add-user-form" id="add-user-form" action="" method="post" onsubmit="return false">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="addpassword">Password</label>
                    <input type="text" name="addpassword" id="addpassword" class="form-control"
                        pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                        title="minumum 8 characters including lowercase, uppercase, digit" required />
                </div>
                <div class="form-group">
                    <label for="addemail">Email</label>
                    <input type="email" name="addemail" id="addemail" placeholder="e.g. something@email.com"
                        class="form-control" required />
                </div>
                <div class="form-group">
                    <button id="add-user-btn" type="submit" name="add-user-btn">Submit</button>
                </div>
            </form>
            <div id="user-msg"></div>
        </div>
    </div>
</body>

</html>