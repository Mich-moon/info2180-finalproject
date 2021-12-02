<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>

<body>
    <div class="container">
        <div class="adduser">
            <h2>Add User</h2>

            <form action="" method="post">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="addpassword">Password</label>
                    <input type="text" name="addpassword" id="addpassword" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="addemail">Email</label>
                    <input type="text" name="addemail" id="addemail" class="form-control" />
                </div>
                <button id="add-user-btn" type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

</body>

</html>