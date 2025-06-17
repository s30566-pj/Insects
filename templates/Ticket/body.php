
<div class="homeSection">
    <nav>
        <ul>
            <li><a href="/">Dashboard</a></li>
            <li><a href="/issues">Issues</a></li>
            <li><a href="/create-ticket">New Issue</a></li>
        </ul>
    </nav>
    <main>
        <section class="box">
            <div class="ticket-box">
                <h2><?= $ticketTitle?></h2>
                <p class="self-p">Description</p>
                <p><?= $ticketDescription?></p>
                <p class="self-p">Assigned to: <?= $assigned_to ?></p>
                <p class="self-p">Status: <?= $status ?></p>
                <p class="self-p">Reported by: <?= $reported_by ?></p>
                <p class="self-p">Created at: <?= $created_at ?></p>
            </div>
            <div class="comments-section">

            </div>
        </section>
        <section class="box">
            <form method="POST" action="/create-comment">
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                <input type="submit" value="Submit">
            </form>
        </section>

    </main>
</div>