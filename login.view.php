    <script src="app.js"></script>

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