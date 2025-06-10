<main>
    <h1>Register.</h1>
    <div class="register-wrapper">
        <div class="register-box">
            <div class="registerHead">
                <h3>Register</h3>
            </div>
            <div class="register-form">
                <form method="POST" action="/register-submit">
                    <?= isset($message) ? "<p id='invalid'>$message</p>" : '';?>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="register_name" placeholder="Name" required>
                    <label for="surname">Surname</label>
                    <input type="text" id="surname" name="register_surname" placeholder="Surname" required>
                    <label for="email">Email</label>
                    <input type="text" name="register_email" placeholder="Email" required>
                    <label for="password">Password</label>
                    <input type="password" name="register_password" placeholder="Password" required>
                    <input type="submit" value="Register">
                </form>
            </div>
            <div class="login-footer">
                <p>Already got an account? <a href="/login">Login</a></p>
            </div>
        </div>
    </div>
</main>