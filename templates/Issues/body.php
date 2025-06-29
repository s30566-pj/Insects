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
            <div class="issues-list">
                <div class="box-header">Issues</div>
                <div class="box-body">
                    <table id="issues-table">
                        <tr>
                            <th>Title</th> <th>Status</th> <th>Reported by</th> <th>Reported on</th> <th>Assigned_to</th>
                        </tr>
                        <?php foreach ($issues as $issue):?>
                            <?= "<tr class='clickable-row' data-href='/ticket?id=".$issue["id"]."'>"
                            . "<td>".htmlspecialchars($issue["title"])."</td>" . "<td>".htmlspecialchars($issue["status"])."</td>". "<td>".htmlspecialchars($issue["reported_by"])."</td>" . "<td>".htmlspecialchars($issue["created_at"])."</td>" . "<td>".htmlspecialchars($issue["assigned_to"])."</td>" .
                            "</tr>"?>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".clickable-row").forEach(function (row) {
            row.style.cursor = "pointer";
            row.addEventListener("click", function () {
                window.location.href = row.getAttribute("data-href");
            });
        });
    });
</script>
