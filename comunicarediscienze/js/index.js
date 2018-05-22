let slide = 0;
let slides;


const animate = s => slides[s].classList.add("animate");

const leave = s => slides[s].classList.remove("animate");

const tasto = ev => {
    let d = 0;
    switch (ev.key) {
        case "ArrowRight":
        case "ArrowDown":
            d = +1;
            break;
        case "ArrowLeft":
        case "ArrowUp":
            d = -1;
            break;
    }

    if (slide + d < 0 || slide + d >= slides.length) return;


    leave(slide);
    slide += d;
    animate(slide);


    window.scrollTo({
        top: slide * window.innerHeight,
        behavior: "smooth"
    });
};



document.addEventListener(
    'DOMContentLoaded',
    () => {
        const arrows = ["ArrowUp", "ArrowDown", "ArrowRight", "ArrowLeft"];

        slides = document.querySelectorAll("section");

        document.addEventListener('keyup', tasto);
        document.addEventListener('keydown', ev =>  arrows.includes(ev.key) ? ev.preventDefault() : 0);
        document.addEventListener('wheel', ev => ev.preventDefault());


        setTimeout(
            () => animate(slide),
            1000
        );
        
    }
);
