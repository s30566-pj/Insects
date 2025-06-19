<div class="homeSection">
    <nav>
        <ul>
            <li><a href="/">Dashboard</a></li>
            <li><a href="/issues">Issues</a></li>
            <li><a href="/create-ticket">New Issue</a></li>
        </ul>
    </nav>
<main>
    <!--- Assigned to me --->
    <section class="box">
        <div class="issues-list" id="assigned-to-me">
            <div class="box-header">Assigned to me</div>
            <div class="box-body">
                <table id="assigned-to-me-table" class="issues-table">
                    <tr>
                        <th>Title</th><th>Status</th>
                    </tr>
                    <?php foreach ($assToMeIssue as $issue):?>
                        <?= "<tr class='clickable-row' data-href='/ticket?id=".$issue["id"]."'>"
                        . "<td>".$issue["title"]."</td>" . "<td>".$issue["status"]."</td>".
                        "</tr>"?>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <div class="comments">
            <div class="box-header">Comments</div>
            <div class="box-body"></div>
        </div>
    </section>

    <!--- Unassigned --->
    <section class="box">
        <div class="issues-list" id="unassigned">
            <div class="box-header">Unassigned</div>
            <div class="box-body">
                <table id="unassigned-table" class="issues-table">
                    <tr>
                        <th>Title</th><th>Status</th>
                    </tr>
                    <?php foreach ($unassigned as $issue):?>
                        <?php if($issue['assigned_to']===$_SESSION['user']->getFullName()){
                            continue;
                        }?>
                        <?= "<tr class='clickable-row' data-href='/ticket?id=".$issue["id"]."'>"
                        . "<td>".$issue["title"]."</td>" . "<td>".$issue["status"]."</td>".
                        "</tr>"?>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <div class="comments">
            <div class="box-header">Comments</div>
            <div class="box-body"></div>
        </div>

    </section>

    <!--- Reported by me --->
    <section class="box">
        <div class="issues-list" id="reported-by-me">
            <div class="box-header">Reported by Me</div>
            <div class="box-body">
                <table id="reported-by-me-table" class="issues-table">
                    <tr>
                        <th>Title</th><th>Status</th>
                    </tr>
                    <?php foreach ($reportedByMe as $issue):?>
                        <?= "<tr class='clickable-row' data-href='/ticket?id=".$issue["id"]."'>"
                        . "<td>".$issue["title"]."</td>" . "<td>".$issue["status"]."</td>".
                        "</tr>"?>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <div class="comments">
            <div class="box-header">Comments</div>
            <div class="box-body"></div>
        </div>
    </section>

    <!--- Recently resolved --->
    <section class="box">
        <div class="issues-list" id="reported-by-me">
            <div class="box-header">Recently resolved</div>
            <div class="box-body">
                <table id="recently-resolved-table" class="issues-table">
                    <tr>
                        <th>Title</th><th>Status</th>
                    </tr>
                    <?php foreach ($recentlyResolved as $issue):?>
                        <?= "<tr class='clickable-row' data-href='/ticket?id=".$issue["id"]."'>"
                        . "<td>".$issue["title"]."</td>" . "<td>".$issue["status"]."</td>".
                        "</tr>"?>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <div class="comments">
            <div class="box-header">Comments</div>
            <div class="box-body"></div>
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
