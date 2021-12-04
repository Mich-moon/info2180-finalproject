<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css" rel="stylesheet" type="text/css" />

    <title>Issues</title>
</head>

<body>
    <div class="container">
        <div class="issues">
            <div class="issues-top">
                <h2>Issues</h2>
                <button class="btn-small" id="issue-create-btn">Create New Issue</button>
            </div>
            <div class="issue-controls">
                <span class="text">Filter by: </span>
                <button class="btn-small" id="issues-all-btn">ALL</button>
                <button class="btn-small" id="issues-open-btn">OPEN</button>
                <button class="btn-small" id="issues-my-tickets-btn">MY TICKETS</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody id="issues-rows">
                    <?php foreach ($issues as $issue): ?>
                    <tr>
                        <td>#<span><?= $issue['iid']; ?></span><a href='#' class='issue-link'>
                                <?= $issue['title']; ?></a>
                        </td>
                        <td><?= $issue['type']; ?></td>
                        <td><?= $issue['status']; ?></td>
                        <td><?= $issue['firstname']." ".$issue['lastname']; ?></td>
                        <td><?= $issue['created']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="app.js"></script>

</html>