<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
</head>

<body>
    <div class="container">
        <div class="newissue">
            <h2>Create Issue</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="assignedto">Assigned To</label>
                    <select class="form-control" name="assignedto" id="assignedto">
                        <option value="Marcia Bradie">Marcia Bradie</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" name="type" id="type">
                        <option value="Bug">Bug</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select class="form-control" name="priority" id="priority">
                        <option value="Major">Major</option>
                    </select>
                </div>
                <button id="new-issue-btn" type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>