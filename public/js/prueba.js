let tl = gsap.timeline({
    repeat: 0
})

tl.from('.prueba_1', {
    duration: 3,
    ease: "expo.out",
    x: -1000
});

tl.from('.prueba_2', {
        duration: 3,
        ease: "expo.out",
        x: 1000
    },
    '-=3');

tl.from('.login', {
        duration: 2,
        ease: "power4.out",
        y: 500
    },
    '-=2');

tl.from('.nombre', {
        duration: 2.5,
        ease: "bounce.out",
        y: -500
    },
    '-=2');

tl.from('.sub_login', {
        duration: 2.5,
        ease: "elastic.out(1, 0.3)",
        x: 500
    },
    '-=2');