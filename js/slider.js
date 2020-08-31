let slides = document.getElementsByClassName('slide');
slides = [].slice.call(slides);

function toggleBackground() {
    slides.forEach(slide => {
        setTimeout(() => {
            slide.style.left = 0;
            slide.style.opacity = 1;
        }, 4500 * slides.indexOf(slide));
    });
}

toggleBackground();

setInterval(() => {
    slides.forEach(slide => {
        if(slides.indexOf(slide) > 0) {
            if (slides.indexOf(slide) == 1) {
                setTimeout(() => {
                    slide.style.left = "100%";
                    setTimeout(() => {
                        slide.style.opacity = 0;
                    }, 200);
                }, 500);
            } else {
                slide.style.left = "100%";
                setTimeout(() => {
                    slide.style.opacity = 0;
                }, 200);
            }
        } 
    });
    slides[0].style.opacity = 0;
    setTimeout(() => {    
        toggleBackground();
    }, 600);
}, 13500);
