<main>
    <h1>Login.</h1>
    <div class="select-wrapper">
        <?php foreach ($orgs as $org) ?>
        <a href="/select-organization?org_id=<?= urldecode($org->getId()) ?>" class="button">Select Organization
            <div class="select-box">
                <div class="selectHead">
                    <h3>Select.</h3>
                </div>
                <div class="select-main">
                    <img src="<?= htmlspecialchars($org->getLogoPath()) ?>">
                    <p><?= htmlspecialchars($org->getIdentifier()) ?></p>
                </div>
                <div class="login-footer">
                    <p>Dont have an account? <a href="/register">Register</a></p>
                </div>
            </div>
        </a>
    </div>
</main>