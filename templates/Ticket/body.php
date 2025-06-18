
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
            <div class="ticket-box">
                <h2><?= $ticket["title"]?></h2>
                <p class="self-p" id="description"><?= $ticket["description"]?></p>
                <p class="self-p">Assigned to: <?= $ticket["assigned_to"] ?></p>
                <p class="self-p">Status: <?= $ticket["status"] ?></p>
                <p class="self-p">Reported by: <?= $ticket["reported_by"] ?></p>
                <p class="self-p">Created at: <?= $ticket["created_at"] ?></p>

            </div>
            <section class="comments-section">
                <h2>Comments</h2>
                <section class="comments-box">
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment">
                                <div class="comment-head">
                                    <p class="author"><?= htmlspecialchars($comment["author"]) ?></p>
                                    <p class="date"><?= htmlspecialchars($comment["created_at"]) ?></p>
                                </div>
                                <p class="text"><?= nl2br(htmlspecialchars($comment["content"])) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </section>
                <section class="comment">
                    <form id="new-comment" method="POST" action="/create-comment?id=<?= $ticket["id"] ?>">
                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                        <input type="submit" value="Submit">
                    </form>
                </section>
            </section>
        </section>


    </main>
</div>