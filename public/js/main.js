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

    const addHuisdierForm = document.getElementById('js--addHuisdierForm');
    const addHuisdierOverlay = document.getElementById("js--addHuisdierOverlay");
    const addHuisdierBtnSubmit = document.getElementById("js--addHuisdierBtnSubmit");
    const addHuisdierBtn = document.getElementById("js--addHuisdierBtn");
    const cancelAddHuisdierBtn = document.getElementById("js--cancelAddHuisdier");

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

    
}
    