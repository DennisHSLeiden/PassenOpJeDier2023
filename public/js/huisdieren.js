document.addEventListener('DOMContentLoaded', function () {


    const openOverlay = (el) => {
        el.style.display = "flex";
        setTimeout(() => {
            el.style.opacity = "1";
            el.style.top = "0";
        }, 1);
        setTimeout(() => {
            el.style.background = "rgba(0, 0, 0, 0.7)";
        }, 75);
    };

    const closeOverlay = (el) => {
        el.style.background = "none";
        setTimeout(() => {
            el.style.opacity = "0";
            el.style.top = "-2vh";
        }, 10);
        setTimeout(() => {
            el.style.display = "none";
        }, 200);
    };

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

    // showSlide(currentSlide);
    const cards = document.querySelectorAll('.card');

    cards.forEach((card) => {
        const slides = card.querySelectorAll('.photo-container');
        const prevBtn = card.querySelector('.prev');
        const nextBtn = card.querySelector('.next');
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
            currentSlide--;
            if (currentSlide < 0) {
                currentSlide = slides.length - 1;
            }
            showSlide(currentSlide);
        }

        function nextSlide() {
            currentSlide++;
            if (currentSlide === slides.length) {
                currentSlide = 0;
            }
            showSlide(currentSlide);
        }

        prevBtn.addEventListener('click', prevSlide);
        nextBtn.addEventListener('click', nextSlide);

        showSlide(currentSlide);


    });

    const toggleReviewButtons = document.querySelectorAll('.js__toggleReview');
    const reviewsContainers = document.getElementsByClassName('js__reviewsContainer');

    for (let i = 0; i < reviewsContainers.length; i++) {
        reviewsContainers[i].style.display = 'none';
    }


    toggleReviewButtons.forEach((button) => {
        const huisdierId = button.id.replace('js__toggleReview', '');
        const reviewsContainer = document.getElementById(`js__reviewsContainer${huisdierId}`);


        button.addEventListener('click', function () {
            if (reviewsContainer.style.display === 'none') {
                reviewsContainer.style.display = 'block';
                // button.textContent = 'Hide Reviews ^';
            } else {
                reviewsContainer.style.display = 'none';
                // button.textContent = 'Show Reviews V';
            }
        });
    });


});




