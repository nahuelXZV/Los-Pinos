let tl = gsap.timeline({
    repeat: 0
})

tl.from('.prueba', {
    duration: 2,
    ease: "power4.out",
    y: 500
});

tl.from('.prueba1', {
    duration: 1,
    ease: "back.out(1.7)",
    y: -500
}, '-=2');
tl.from('.prueba2', {
    duration: 1,
    ease: "back.out(1.7)",
    y: -500
}, '-=1.9');
tl.from('.prueba3', {
    duration: 1,
    ease: "back.out(1.7)",
    y: -500
}, '-=1.8');
tl.from('.prueba4', {
    duration: 1,
    ease: "back.out(1.7)",
    y: -500
}, '-=1.7');
tl.from('.prueba5', {
    duration: 1,
    ease: "back.out(1.7)",
    y: -500
}, '-=1.6');
tl.from('.prueba6', {
    duration: 1,
    ease: "back.out(1.7)",
    y: -500
}, '-=1.5');
tl.from('.prueba7', {
    duration: 1,
    ease: "back.out(1.7)",
    y: -500
}, '-=1.4');