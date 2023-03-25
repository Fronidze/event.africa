<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фестиваль: Дни Африканской культуры и кино</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<header>
    <div class="container menu">

        <div class="main_logo">
            <a class="icon icon__link" href="">
                <img src="/images/logo.svg" alt="">
            </a>
        </div>

        <div class="partners_logo">
            <a class="icon icon__link" href="">
                <img src="/images/logo_partner.svg" alt="">
            </a>
        </div>

        <ul class="menu__list">
            <li><a href="#festival">{{ trans('menu.about') }}</a></li>
            <li><a href="#news">{{ trans('menu.news') }}</a></li>
            <li><a href="#program">{{ trans('menu.program') }}</a></li>
            <li><a href="#participant">{{ trans('menu.participant') }}</a></li>
        </ul>

    </div>
</header>

<section class="about">
    <div class="about__description">
        <div class="container">
            <h1>{{ trans('content.africa') }}</h1>
            <h2>{!! trans('content.cradle_civilization') !!}</h2>
            <div class="date">25-30 <small>/{!! trans('content.july') !!}/</small></div>
            <div class="city">{!! trans('content.st_petersburg') !!}</div>
        </div>
    </div>

    <div class="africa">
        <img src="/images/africa.png" alt="">
    </div>

    <div class="green_blur"></div>

</section>

<section class="festival" id="festival">
    <div class="festival__left_background">
        <img src="/images/festival_left_background.png" alt="">
    </div>
    <div class="festival__container">
        <div class="festival__description">
            <h3>{!! trans('content.title_about_festival') !!}</h3>
            <p>{!! trans('content.description_about_festival') !!}</p>

            <div class="gallery_wrapper">
                <div class="swiper festival__swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="/images/mocks/festival.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/images/mocks/festival.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/images/mocks/festival.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/images/mocks/festival.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="/images/mocks/festival.png" alt="">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</section>

<section class="mission">

    <div class="red_square"></div>
    <div class="red_icon">
        <img src="/images/mission_red.svg" alt="">
    </div>

    <div class="mission__description">
        <div class="container">
            <h3>{!! trans('content.title_mission') !!}</h3>
            <p>{!! trans('content.description_mission') !!}</p>
        </div>
    </div>

    <div id="news" class="mission__gallery__wrapper">
        <div class="swiper mission__gallery">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="mission__element">

                        <div class="mission__element__image">
                            <img src="/images/mocks/mission.png" alt="">
                        </div>

                        <div class="mission__element__describe">
                            <h3>новости</h3>
                            <p>Московский международный кинофестиваль начал прием картин на участие в конкурсе.</p>
                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="mission__element">

                        <div class="mission__element__image">
                            <img src="/images/mocks/mission.png" alt="">
                        </div>

                        <div class="mission__element__describe">
                            <h3>новости</h3>
                            <p>Московский международный кинофестиваль начал прием картин на участие в конкурсе.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<section id="program" class="program">

    <div class="program__top_image">
        <img src="/images/program_top_image.svg" alt="">
    </div>
    <div class="program__bottom_image">
        <img src="/images/program_bottom_image.svg" alt="">
    </div>

    <div class="container">
        <div class="program__information">
            <h3>{!! trans('content.title_program') !!}</h3>

            <div class="program__information__row">
                <div class="program__header"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="program__title">{!! trans('content.title_deal_program') !!}</p>
                <p class="program__description">{!! trans('content.description_deal_program') !!}</p>
            </div>

            <div class="program__information__row">
                <div class="program__header"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="program__title">{!! trans('content.title_culture_program') !!}</p>
                <p class="program__description">{!! trans('content.description_culture_program') !!}</p>
                <ul class="program__list">
                    <li><p>{!! trans('content.list_culture_program_cinema') !!}</p></li>
                    <li><p>{!! trans('content.list_culture_program_music') !!}</p></li>
                    <li><p>{!! trans('content.list_culture_program_fairy') !!}</p></li>
                    <li><p>{!! trans('content.list_culture_program_photo') !!}</p></li>
                </ul>
            </div>

        </div>
    </div>

</section>

<section class="about_festival">

    <div class="top_left_bg">
        <img src="/images/about_festival_top_bg.svg" alt="">
    </div>

    <div class="about_festival__description">
        <div class="container">
            <h3>{!! trans('content.title_about_festival') !!}</h3>
            <p>{!! trans('content.description_about_festival') !!}</p>
        </div>
    </div>

    <div class="about_festival__images">
        <div class="container">
            <div class="images__wrapper">
                <div class="images__wrapper__left">
                    <img src="/images/bout_festival_one.jpg" alt="">
                </div>
                <div class="images__wrapper__right">
                    <img src="/images/bout_festival_two.jpg" alt="">
                    <img src="/images/bout_festival_three.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

</section>

<section class="teams">
    <div class="container">
        <div class="teams__border">
            <img src="/images/program_header_line.svg" alt="">
        </div>
        <p class="teams__title">{!! trans('content.title_festival_team') !!}</p>

        <div class="teams__elements">
            <div class="teams__record">
                <div class="images">
                    <img src="/images/mocks/person.jpg" alt="">
                </div>
                <div class="title">Константин Константинов</div>
                <div class="description">Регалии на несколько строк. Регалии на несколько строк</div>
            </div>

            <div class="teams__record">
                <div class="images">
                    <img src="/images/mocks/person.jpg" alt="">
                </div>
                <div class="title">Константин Константинов</div>
                <div class="description">Регалии на несколько строк. Регалии на несколько строк</div>
            </div>

            <div class="teams__record">
                <div class="images">
                    <img src="/images/mocks/person.jpg" alt="">
                </div>
                <div class="title">Константин Константинов</div>
                <div class="description">Регалии на несколько строк. Регалии на несколько строк</div>
            </div>

            <div class="teams__record">
                <div class="images">
                    <img src="/images/mocks/person.jpg" alt="">
                </div>
                <div class="title">Константин Константинов</div>
                <div class="description">Регалии на несколько строк. Регалии на несколько строк</div>
            </div>

            <div class="teams__record">
                <div class="images">
                    <img src="/images/mocks/person.jpg" alt="">
                </div>
                <div class="title">Константин Константинов</div>
                <div class="description">Регалии на несколько строк. Регалии на несколько строк</div>
            </div>

            <div class="teams__record">
                <div class="images">
                    <img src="/images/mocks/person.jpg" alt="">
                </div>
                <div class="title">Константин Константинов</div>
                <div class="description">Регалии на несколько строк. Регалии на несколько строк</div>
            </div>

            <div class="teams__record">
                <div class="images">
                    <img src="/images/mocks/person.jpg" alt="">
                </div>
                <div class="title">Константин Константинов</div>
                <div class="description">Регалии на несколько строк. Регалии на несколько строк</div>
            </div>

            <div class="teams__record">
                <div class="images">
                    <img src="/images/mocks/person.jpg" alt="">
                </div>
                <div class="title">Константин Константинов</div>
                <div class="description">Регалии на несколько строк. Регалии на несколько строк</div>
            </div>
        </div>

    </div>
</section>

<section class="program_festival">
    <div class="red_icon">
        <img src="/images/mission_red.svg" alt="">
    </div>

    <div class="program_festival__description">
        <div class="container">
            <h3>{!! trans('content.title_program') !!}</h3>
        </div>

        <div class="program_festival__element">
            <div class="container element">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="element__title">{!! trans('content.program_cinema_title') !!}</p>
                <p class="element__description">{!! trans('content.program_cinema_description_movies') !!}</p>
                <p class="element__description">{!! trans('content.program_cinema_description_famous') !!}</p>
            </div>

            <div class="movies_wrapper">
                <div class="program_festival__gallery movies swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="/images/mocks/movie_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/movie_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/movie_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/movie_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/movie_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/movie_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/movie_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/movie_mock.jpg" alt=""></div>
                    </div>
                </div>
                <div class="swiper-pagination movies"></div>
            </div>

            <div class="container">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
            </div>
        </div>

        <div class="program_festival__element">
            <div class="container element">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="element__title">{!! trans('content.program_music_title') !!}</p>
                <p class="element__description">{!! trans('content.program_music_description') !!}</p>
            </div>

            <div class="music_wrapper">
                <div class="program_festival__gallery music swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="/images/mocks/music_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/music_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/music_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/music_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/music_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/music_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/music_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/music_mock.jpg" alt=""></div>
                    </div>
                </div>
                <div class="swiper-pagination music"></div>
            </div>

            <div class="container">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
            </div>
        </div>

        <div class="program_festival__element">
            <div class="container element">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="element__title">{!! trans('content.program_photo_title') !!}</p>
                <p class="element__description">{!! trans('content.program_photo_description') !!}</p>
            </div>

            <div class="photos_wrapper">
                <div class="program_festival__gallery photos swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="/images/mocks/photo_mock.jpg" alt=""></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
            </div>
        </div>


    </div>

</section>

<section id="participant" class="invite">
    <div class="invite__description">
        <div class="container">
            <h3>{!! trans('content.participant_title') !!}</h3>
            <div class="invite__wrapper">
                <div class="invite__text_how">
                    <p>{!! trans('content.participant_about') !!} <a href="" class="btn btn-link btn-link-default">{!! trans('content.participant_about_register') !!}</a></p>
                    <p>{!! trans('content.participant_about_time') !!}</p>
                </div>
                <div class="invite__form">
                    <form action="">
                        <button class="btn btn-md registration">{!! trans('content.participant_register') !!}</button>
                    </form>
                    <a href="" class="btn btn-md btn-link btn-link-white">{!! trans('content.participant_remember') !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="footer_wrapper container">
        <div class="partners">
            <a class="icon icon__link" href="">
                <img src="/images/logo_partner.svg" alt="">
            </a>
        </div>
        <div class="title">
            2023 ALFAVIT PRODUCTION
        </div>
        <div class="email">
            <a class="btn btn-md btn-link btn-link-white" href="mailto:info@alfavitproduction.ru">info@alfavitproduction.ru</a>
        </div>
        <div class="social">
            <ul>
                <li><a href=""><img src="/images/social/whatsapp.svg" alt=""></a></li>
                <li><a href=""><img src="/images/social/instagram.svg" alt=""></a></li>
                <li><a href=""><img src="/images/social/facebook.svg" alt=""></a></li>
                <li><a href=""><img src="/images/social/vk.svg" alt=""></a></li>
                <li><a href=""><img src="/images/social/youtube.svg" alt=""></a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="/js/main.js"></script>

</body>
</html>
