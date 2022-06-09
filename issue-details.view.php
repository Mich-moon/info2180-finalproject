    <script src="app.js"></script>

    <div class="container">
        <h2 id="insert-issue-title">Issue Title</h2>
        <div>
            <span id="issue-pre-num">Issue # </span><span id="insert-issue-num"></span>
        </div>

        <div class="container-2">
            <div class="issue-main">
                <p id="insert-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Cupiditate deserunt expedita quidem minus est, ea eos quae,
                    sunt soluta excepturi, dolor consectetur fuga! Ullam quae
                    corporis perferendis delectus, dolorum harum!
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Temporibus, dicta consequuntur sunt quis pariatur voluptas
                    accusamus recusandae eius maiores voluptates, reprehenderit
                    at accusantium consequatur unde nemo, sed amet minima minus?
                </p>
                </br>
                <ul>
                    <li id="detail-created">
                        <span>Issue created on</span>
                        <span id="insert-create-date"> November 1, 2019 at 4:30PM</span>
                        <span> by </span><span id="insert-created-by">Marsha Brady</span>
                    </li>
                    <li id="detail-updated">
                        <span>Last updated on </span>
                        <span id="insert-update-time">November 8, 2019 at 10:00AM</span>
                    </li>
                </ul>
            </div>
            <div class="issue-side">
                <div class="issue-side-details">
                    <div class="issue-detail-group">
                        <label for="issue-assigned">Assigned To:</label>
                        <span name="issue-assigned" id="issue-assigned">Tom Brady</span>
                    </div>
                    <div class="issue-detail-group">
                        <label for="issue-type">Type:</label>
                        <span name="issue-type" id="issue-type"> </span>
                    </div>
                    <div class="issue-detail-group">
                        <label for="issue-priority">Priority:</label>
                        <span name="issue-priority" id="issue-priority"> </span>
                    </div>
                    <div class="issue-detail-group">
                        <label for="issue-status">Status</label>
                        <span name="issue-status" id="issue-status"> </span>
                    </div>
                </div>
                <button id="issue-close-btn" type="button" name="issue-close-btn">Mark as Closed</button>
                <button id="issue-progress-btn" type="button" name="issue-progress-btn">Mark In Progress</button>
            </div>
        </div>
    </div>