let windowLoad = () => {

    const swiper = new Swiper('.festival__swiper', {
        slidesPerView: "auto",
        spaceBetween: 10,
    });

    const swiper_mission = new Swiper('.mission__gallery', {
        slidesPerView: 1,
        loop: true,
    });

    const program_festival_movies = new Swiper('.program_festival__gallery.movies', {
        slidesPerView: 5,
        spaceBetween: 3,
        pagination: {el: '.swiper-pagination.movies', clickable: true},
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 5
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 5,
                spaceBetween: 3,
            }
        }
    });

    const program_festival_music = new Swiper('.program_festival__gallery.music', {
        slidesPerView: 4,
        spaceBetween: 5,
        pagination: {el: '.swiper-pagination.music', clickable: true},
    });

    const program_festival_photos = new Swiper('.program_festival__gallery.photos', {
        slidesPerView: 'auto',
        spaceBetween: 10,
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: false,
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 'auto',
                spaceBetween: 10,
            }
        }
    });

    let menuToggle = document.querySelector('[data-menu-toggle]');
    if (menuToggle !== null) {
        menuToggle.addEventListener('click', function (event) {
            const target = event.target.closest('[data-menu-toggle]');
            target.closest('header').classList.toggle('open');
        });
    }

    let closeMenuElements = document.querySelectorAll('[data-close-menu]');
    closeMenuElements.forEach(element => {
        element.addEventListener('click', function (event) {
            const target = event.target.closest('[data-close-menu]');
            if (target === null) {
                return null;
            }

            target.closest('header').classList.remove('open');
        });
    });

    $("[data-toggle=popover]").popover();
    // registerPopover();
}
const registerPopover = () => {
    const button = document.querySelector('[data-register-button]');
    const tooltip = document.querySelector('[data-register-tooltip]');
    //
    const popperInstance = Popper.createPopper(button, tooltip, {
        modifiers: [
            {
                name: 'offset',
                options: {
                    offset: [0, 8],
                },
            },
        ],
    });
    function show() {
        tooltip.setAttribute('data-show', '');
        popperInstance.update();
    }

    function hide() {
        tooltip.removeAttribute('data-show');
    }

    const showEvents = ['mouseenter', 'focus'];
    const hideEvents = ['mouseleave', 'blur'];

    showEvents.forEach((event) => {
        button.addEventListener(event, show);
    });

    hideEvents.forEach((event) => {
        button.addEventListener(event, hide);
    });
};
window.addEventListener('load', windowLoad);

