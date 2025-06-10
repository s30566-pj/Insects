<main>
    <h1>Organization.</h1>
    <div class="organization-wrapper">
        <div class="organization-box">
            <div class="organizationHead">
                <h3>Create Organization</h3>
            </div>
            <div class="login-form">
                <form method="POST" action="/login-submit">
                    <?= $loginStatus === false ? "<p id='invalid'>Invalid email or password!</p>" : '';?>
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Email" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Login">
                </form>
            </div>
            <div class="login-footer">
                <p>Dont have an account? <a href="/register">Register</a></p>
            </div>
        </div>
    </div>
</main>