document.addEventListener('DOMContentLoaded', function () {


    // function toggleDropdown() {
    //     event.preventDefault();
    //     var dropdown = document.querySelector('.dropdown');
    //     dropdown.classList.toggle('open');
    // }

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
});
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
        document.getElementById('geenAanvragenTekst').style.display = 'none';
        return;
    }

    var aanvragenMetSoorten = 0;
    aanvragen.forEach(function (aanvraag) {
        var huisdierSoort = aanvraag.getAttribute('data-huisdier-soort');
        if (soorten.includes(huisdierSoort)) {
            aanvraag.style.display = 'block';
            aanvragenMetSoorten++;
        } else {
            aanvraag.style.display = 'none';
        }
    });

    if (aanvragenMetSoorten === 0) {
        document.getElementById('geenAanvragenTekst').style.display = 'block';
    } else {
        document.getElementById('geenAanvragenTekst').style.display = 'none';
    }
}