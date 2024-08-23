document.addEventListener('DOMContentLoaded', () => {
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const images = document.querySelector('.slides').children;
    const indicators = document.querySelectorAll('.indicator');
    const totalImages = images.length;
    let index = 0;
    let autoplayInterval;

    prev.addEventListener('click', () => {
        changeImage('prev');
        resetAutoplay();
    });

    next.addEventListener('click', () => {
        changeImage('next');
        resetAutoplay();
    });

    indicators.forEach((indicator, i) => {
        indicator.addEventListener('click', () => {
            index = i;
            updateIndicators();
            showImage(index);
            resetAutoplay();
        });
    });

    function changeImage(direction) {
        if (direction === 'next') {
            index++;
            if (index === totalImages) {
                index = 0;
            }
        } else {
            if (index === 0) {
                index = totalImages - 1;
            } else {
                index--;
            }
        }
        updateIndicators();
        showImage(index);
    }

    function showImage(index) {
        for (let i = 0; i < images.length; i++) {
            images[i].classList.remove('main');
        }
        images[index].classList.add('main');
    }

    function updateIndicators() {
        indicators.forEach((indicator, i) => {
            indicator.classList.toggle('active', i === index);
        });
    }

    function startAutoplay() {
        autoplayInterval = setInterval(() => {
            changeImage('next');
        }, 3000); // Change slide every 3 seconds
    }

    function resetAutoplay() {
        clearInterval(autoplayInterval);
        startAutoplay();
    }

    // Pause autoplay on hover
    document.querySelector('.slide-container').addEventListener('mouseover', () => {
        clearInterval(autoplayInterval);
    });

    // Resume autoplay on mouse leave
    document.querySelector('.slide-container').addEventListener('mouseleave', () => {
        startAutoplay();
    });

    showImage(index); // Show the initial image
    startAutoplay(); // Start autoplay
});
