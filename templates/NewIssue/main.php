
<div class="homeSection">
    <nav>
        <ul>
            <a href="/"><li>Dashboard</li></a>
            <a href="/issues"><li>Issues</li></a>
            <a href="/create-ticket"><li>New Issue</li></a>
        </ul>
    </nav>
    <main>
            <section class="box">
                <form method="POST" action="/create-issue-submit">
                    <div class="ticket-title" id="ticket-title">
                        <label for="ticket-title" id="ticket-title-label">Title</label>
                        <input type="text" name="ticket-title" id="ticket-title" placeholder="Ticket Title">
                        <label for="assign-to" id="assign-to-label">Assign to</label>
                        <select name="assign-to" id="assign-to" id="assign-to">
                            <option value="">---</option>
                            <?php foreach ($users as $user): ?>
                            <option value='<?=htmlspecialchars($user['user_id'])?>'><?=htmlspecialchars($user["name"])?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="ticket-description" id="ticket-description">
                        <label for="ticket-description" id="ticket-description-label">Description</label>
                        <textarea name="ticket-description" id="ticket-description" placeholder="Ticket Description"></textarea>
                    </div>
                    <button type="submit" id="ticket-button">Submit</button>
                </form>
            </section>

    </main>
</div>