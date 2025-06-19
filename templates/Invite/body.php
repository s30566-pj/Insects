<div class="homeSection">
    <nav>
        <ul>
            <a href="/"><li>Dashboard</li></a>
            <a href="/issues"><li>Issues</li></a>
            <a href="/create-ticket"><li>New Issue</li></a>
        </ul>
    </nav>
    <h1>Invite.</h1>
<main>
    <div class="invite-wrapper">
        <div class="invite-box">
            <div class="inviteHead">
                <h3>Invite to <?=$org?></h3>
            </div>
            <div class="invite-form">
                <form method="POST" action="/send-invite">
                    <label for="email">Email</label>
                    <input type="text" name="to_email" placeholder="Email" required>
                    <input type="submit" value="Invite">
                </form>
            </div>
            <div class="invite-footer">
                <p>Want to create a new organization? <a href="/create-organization">Create it!</a></p>
            </div>
        </div>
    </div>
</main>
</div>