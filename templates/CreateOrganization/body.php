<main>
    <h1>Organization.</h1>
    <div class="createOrganization-wrapper">
        <div class="createOrganization-box">
            <div class="createOrganizationHead">
                <h3>Create Organization</h3>
            </div>
            <div class="createOrganization-form">
                <form method="POST" action="/create-organization-submit" enctype="multipart/form-data">
                    <label for="Logo">Organization Picture</label>
                    <img id="organizationPicturePreview" src="/assets/img/placeholder500x500.png" alt="Organization Picture">
                    <input type="file" id="organizationPicture" name="organizationPicture" placeholder="organizationPicture" accept="image/*" required>
                    <label for="name">OrganizationName</label>
                    <input type="text" id="organizationName" name="organizationName" placeholder="Organization Name" required>
                    <label for="organizationIdentifier">Identifier</label>
                    <input type="text" id="organizationIdentifier" name="organizationIdentifier" readonly>
                    <input type="submit" value="CreateOrganization">
                </form>
            </div>
            <div class="login-footer">
                <p>Ask your co-worker to invite you to their organization.</a></p>
            </div>
        </div>
    </div>
</main>

<script>
    const nameInput = document.getElementById('organizationName');
    const idenInput = document.getElementById('organizationIdentifier');
    function randomFourDigit() {
        return Math.floor(Math.random() * 9000) + 1000;
    }
    const suffix = randomFourDigit();

    nameInput.addEventListener('input', () => {
        // remove strange characters
        let iden = nameInput.value
            .trim()
            .toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '')  //diacritical
            .replace(/\s+/g, '-')
            .replace(/[^a-z0-9-]/g, '')  // disallowed
            .replace(/-+/g, '-');  // only one '-'
        idenInput.value = `${iden} #${suffix}`;
    });


    const picInput = document.getElementById('organizationPicture');
    const preview  = document.getElementById('organizationPicturePreview');
    const placeholderSrc = preview.src;

    picInput.addEventListener('change', () => {
        const file = picInput.files[0];
        if (!file) {
            preview.src = placeholderSrc;
            return;
        }
        const reader = new FileReader();
        reader.onload = () => preview.src = reader.result;
        reader.readAsDataURL(file);
    });
</script>