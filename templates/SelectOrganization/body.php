<main>
    <h1>Organization.</h1>
    <div class="select-wrapper">
            <div class="select-box">
                <div class="selectHead">
                    <h3>Select</h3>
                </div>
                <div class="select-form">
                    <form method="GET" action="/select-organization">
                        <img id="org-logo" src="/assets/img/placeholder500x500.png" style="display: none;">
                        <select name="org" id="org">
                            <?php foreach ($orgs as $org): ?>
                            <option value="<?= $org->getId();?>" data-logo="<?= str_replace('#', '%23', $org->getLogoPath());?>"><?=$org->getIdentifier();?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Select Organization">
                    </form>
                </div>
                <div class="login-footer">
                    <p>Need a new organization? <a href="/create-organization">Create one!</a></p>
                </div>
            </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const select = document.getElementById("org");
        const logo = document.getElementById("org-logo");

        function updateLogo() {
            const selectedOption = select.options[select.selectedIndex];
            const logoPath = selectedOption.getAttribute("data-logo");

            if (logoPath) {
                logo.src = '/'+logoPath;
                logo.style.display = "block";
            } else {
                logo.style.display = "none";
            }
        }

        select.addEventListener("change", updateLogo);

        // Show logo if initially chosen
        updateLogo();
    });
</script>
