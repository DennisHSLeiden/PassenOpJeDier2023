document.addEventListener('DOMContentLoaded', function () {


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

    const addHuisdierBtn = document.getElementById("js--addHuisdierBtn");
    const addHuisdierOverlay = document.getElementById("js--addHuisdierOverlay");
    const cancelAddHuisdierBtn = document.getElementById("js--cancelAddHuisdier");
    const addHuisdierBtnSubmit = document.getElementById("js--addHuisdierBtnSubmit");
    const addHuisdierForm = document.getElementById('js--addHuisdierForm');

    addHuisdierBtn.addEventListener("click", () => {
        console.log('hei');
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

    const slides = document.querySelectorAll('.photo-container');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });
    }

    function prevSlide() {
        const previousSlide = currentSlide === 0 ? slides.length - 1 : currentSlide - 1;
        slides[previousSlide].classList.add('previous');
        slides[currentSlide].classList.remove('active');
        slides[currentSlide].classList.add('next');
        currentSlide = previousSlide;
        setTimeout(() => {
            slides[currentSlide].classList.remove('next');
            slides[previousSlide].classList.remove('previous');
            slides[currentSlide].classList.add('active');
        }, 10);
    }

    function nextSlide() {
        const nextSlide = currentSlide === slides.length - 1 ? 0 : currentSlide + 1;
        slides[nextSlide].classList.add('next');
        slides[currentSlide].classList.remove('active');
        slides[currentSlide].classList.add('previous');
        currentSlide = nextSlide;
        setTimeout(() => {
            slides[currentSlide].classList.remove('previous');
            slides[nextSlide].classList.remove('next');
            slides[currentSlide].classList.add('active');
        }, 10);
    }


    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);

    showSlide(currentSlide);
});



