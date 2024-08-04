document.addEventListener('DOMContentLoaded', () => {
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const images = document.querySelector('.slides').children;
    const indicators = document.querySelectorAll('.indicator');
    const totalImages = images.length;
    let index = 0;

    prev.addEventListener('click', () => {
        changeImage('prev');
    });

    next.addEventListener('click', () => {
        changeImage('next');
    });

    indicators.forEach((indicator, i) => {
        indicator.addEventListener('click', () => {
            index = i;
            updateIndicators();
            showImage(index);
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

    showImage(index); // Show the initial image
});
