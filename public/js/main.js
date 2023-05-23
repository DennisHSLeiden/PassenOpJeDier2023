window.onload = () => {


    // Straight up coppy van SHADEY, om een overlay te plaatsen en verwijderen
    const openOverlay = (el) => {
        el.style.display = "flex"
        setTimeout(() => {
            el.style.opacity = "1";
            el.style.top = "0";
        }, 1)
        setTimeout(() => {
            el.style.background = "rgba(0, 0, 0, 0.7)"
        }, 75);
    }

    const closeOverlay = (el) => {
        el.style.background = "none";
        setTimeout(() => {
            el.style.opacity = "0";
            el.style.top = "-2vh";
        }, 10)
        setTimeout(() => {
            el.style.display = "none"
        }, 200);
    }

    const addHuisdierBtn = document.getElementById("js--addHuisdierBtn");
    const addHuisdierOverlay = document.getElementById("js--addHuisdierOverlay");
    const cancelAddHuisdierBtn = document.getElementById("js--cancelAddHuisdier");
    const addHuisdierBtnSubmit = document.getElementById("js--addHuisdierBtnSubmit");
    const addHuisdierForm = document.getElementById('js--addHuisdierForm');

    addHuisdierBtn.addEventListener("click", () => {

        openOverlay(addHuisdierOverlay);
    });

    cancelAddHuisdierBtn.addEventListener("click", () => {
        closeOverlay(addHuisdierOverlay);
    });

    addHuisdierBtnSubmit.addEventListener("click", (e) => {
        e.preventDefault();

        closeOverlay(addHuisdierOverlay);
        addHuisdierForm.submit();
    });



    const addAanvraagBtn = document.getElementById("js--addAanvraagBtn");
    const addAanvraagOverlay = document.getElementById("js--addAanvraagOverlay");
    const cancelAddAanvraagBtn = document.getElementById("js--cancelAddAanvraag");
    const addAanvraagBtnSubmit = document.getElementById("js--addAanvraagBtnSubmit");
    const addAanvraagForm = document.getElementById('js--addAanvraagForm');

    addAanvraagBtn.addEventListener("click", () => {
        console.log('hi');
        openOverlay(addAanvraagOverlay);
    });

    cancelAddAanvraagBtn.addEventListener("click", () => {
        closeOverlay(addAanvraagOverlay);
    });

    addAanvraagBtnSubmit.addEventListener("click", (e) => {
        e.preventDefault();

        closeOverlay(addAanvraagOverlay);
        addAanvraagForm.submit();
    });


    const roleValue = document.getElementById("js--adminButton");
    var role = roleValue.dataset.role;
    if (role === 'admin') {
        roleValue.style.display = "block"
    }


}

function filterAanvragen() {
    var checkboxes = document.querySelectorAll('#filterForm input[type="checkbox"]:checked');
    var soorten = Array.from(checkboxes).map(function (checkbox) {
        return checkbox.value;
    });

    var aanvragen = document.querySelectorAll('.reactie-card');

    if (soorten.length === 0) {
        aanvragen.forEach(function (aanvraag) {
            aanvraag.style.display = 'block';
        });
        return;
    }

    aanvragen.forEach(function (aanvraag) {
        var huisdierSoort = aanvraag.getAttribute('data-huisdier-soort');
        if (soorten.includes(huisdierSoort)) {
            aanvraag.style.display = 'block';
        } else {
            aanvraag.style.display = 'none';
        }
    });
}

function toggleDropdown() {
    event.preventDefault();
    var dropdown = document.querySelector('.dropdown');
    dropdown.classList.toggle('open');
}
