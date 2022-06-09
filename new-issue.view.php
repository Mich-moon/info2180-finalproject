    <script src="app.js"></script>

    <div class="container">
        <div class="newissue">
            <h2>Create Issue</h2>
            <form name="new-issue-form" id="new-issue-form" action="" method="post" onsubmit="return false">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="text" name="description" id="description" class="form-control" rows="3" cols="50"
                        required></textarea>
                </div>
                <div class="form-group">
                    <label for="assignedto">Assigned To</label>
                    <select class="form-control" name="assignedto" id="assignedto" required>
                        <?php foreach ($users as $user): ?>
                        <?= "<option value=".$user['id'].">".$user['firstname']." ".$user['lastname']."</option>" ; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" name="type" id="type" required>
                        <option value="Bug">Bug</option>
                        <option value="Proposal">Proposal</option>
                        <option value="Task">Task</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select class="form-control" name="priority" id="priority" required>
                        <option value="Major">Major</option>
                        <option value="Minor">Minor</option>
                        <option value="Critical">Critical</option>
                    </select>
                </div>
                <div class="form-group">
                    <button id="new-issue-btn" type="submit" name="new-issue-btn">Submit</button>
                </div>
            </form>
            <div id="issue-msg"></div>
        </div>
    </div>