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
            <div class="issues-list">
                <div class="box-header">Issues</div>
                <div class="box-body">
                    <table id="issues-table">
                        <tr>
                            <th>Title</th> <th>Status</th> <th>Reported by</th> <th>Reported on</th> <th>Assigned_to</th>
                        </tr>
                        <?php foreach ($issues as $issue):?>
                            <?= "<tr>"
                            . "<td>".htmlspecialchars($issue["title"])."</td>" . "<td>".htmlspecialchars($issue["status"])."</td>". "<td>".htmlspecialchars($issue["reported_by"])."</td>" . "<td>".htmlspecialchars($issue["created_at"])."</td>" . "<td>".htmlspecialchars($issue["assigned_to"])."</td>" .
                            "</tr>"?>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>