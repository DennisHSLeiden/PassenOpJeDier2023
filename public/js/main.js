window.onload = () => {
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

    // Straight up coppy van SHADEY, om een overlay te plaatsen en verwijderen

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
