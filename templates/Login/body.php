<main>
    <h1>Login.</h1>
    <div class="login-form">
        <?php if (! $loginStatus) {
            echo "<p>Złe hasło lub user!</p>";
        } ?>
        <form method="POST" action="/login-submit">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <p>Dont have an account? <a href="register.html">Register</a></p>
    </div>
</main>