let  windowLoad = () => {

    const swiper = new Swiper('.festival__swiper', {
        slidesPerView: "auto",
        spaceBetween: 32,
    });

    const swiper_mission = new Swiper('.mission__gallery', {
        slidesPerView: 1,
        loop: true,
    });

    const program_festival_movies = new Swiper('.program_festival__gallery.movies', {
        slidesPerView: 5,
        spaceBetween: 30,
        loop: true,
        loopedSlides: 3,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    const program_festival_music = new Swiper('.program_festival__gallery.music', {
        slidesPerView: 5,
        spaceBetween: 30,
        loop: true,
        loopedSlides: 3,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
}

window.addEventListener('load', windowLoad);