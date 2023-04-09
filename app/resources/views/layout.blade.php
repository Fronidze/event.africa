<?php

use App\Models\FestivalGallery;
use App\Models\MoviesGallery;
use App\Models\MusicGallery;
use App\Models\NewsGallery;
use App\Models\PhotoGallery;
use App\Models\Team;

/**
 * @var FestivalGallery[] $festivalElements
 * @var NewsGallery[] $newsElements
 * @var MoviesGallery[] $moviesElements
 * @var MusicGallery[] $musicElements
 * @var PhotoGallery[] $photoElements
 * @var Team[] $teams
 */
?>
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фестиваль: Дни Африканской культуры и кино</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="/style/main.css">
</head>
<body>

<header>
    <div class="container menu">

        <div class="main_logo">
            <img src="/images/logo.svg" alt="">
        </div>

        <div class="partners_logo">
            <a href="https://alfavitproduction.ru" target="_blank">
                <img src="/images/logo_partner.svg" alt="">
            </a>
        </div>

        <ul class="menu__list">
            <li><a href="#festival">{!! trans('menu.about') !!}</a></li>
            <li><a href="#news">{!! trans('menu.news') !!}</a></li>
            <li><a href="#program">{!! trans('menu.program') !!}</a></li>
            <li><a href="#participant">{!! trans('menu.participant') !!}</a></li>
        </ul>

        <ul class="language">
            @if(App::getLocale() == 'ru')
                <li><a href="/en/">en</a></li>
            @else
                <li><a href="/">ru</a></li>
            @endif
        </ul>

        <div class="mobil_action">
            <div class="mobil_action__wrapper">
                <div class="lang">
                    @if(App::getLocale() == 'ru')
                        <a href="/en/">en</a>
                    @else
                        <a href="/">ru</a>
                    @endif
                </div>
                <div data-menu-toggle class="open_menu"></div>
            </div>
        </div>

    </div>

    <div class="mobile_menu">
        <ul class="mobile_menu__list">
            <li><a data-close-menu href="#festival">{{ trans('menu.about') }}</a></li>
            <li><a data-close-menu href="#news">{{ trans('menu.news') }}</a></li>
            <li><a data-close-menu href="#program">{{ trans('menu.program') }}</a></li>
            <li><a data-close-menu href="#participant">{!! trans('menu.participant') !!}</a></li>
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
            <div class="invite__form">
                <form action="" onsubmit="return false;">
                    <div data-register-tooltip id="tooltip">
                        Регистрация на фестиваль откроется 1 мая 2023 года.
                        <div id="arrow" data-popper-arrow></div>
                    </div>
                    <button data-register-button
                            class="btn btn-md registration">{!! trans('content.participant_register') !!}</button>
                </form>
            </div>
        </div>
    </div>

    <div class="africa"></div>
    <div class="green_blur"></div>

</section>

<section class="festival" id="festival">

    <div class="festival__left_first_background">
        <img src="/images/festival_left_first.png" alt="">
    </div>

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
                        @foreach($festivalElements as $element)
                            <div class="swiper-slide">
                                <img src="{{ $element->file?->filePath() }}" alt="{{ $element->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
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
            <h3>{!! trans('content.title_mission') !!}</h3>
            <p>{!! trans('content.description_mission') !!}</p>
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

<section class="mission">

    <div class="container">
        <div class="red_square"></div>
        <div class="red_icon"><img src="/images/mission_red.svg" alt=""></div>
        <h3 class="news_title">{!! trans('content.mission_title_news') !!}</h3>
    </div>

    <div id="news" class="mission__gallery__wrapper">
        <div class="swiper mission__gallery">
            <div class="swiper-wrapper">
                @foreach($newsElements as $element)
                    <div class="swiper-slide">
                        <div class="mission__element">

                            <div class="mission__element__image">
                                <img src="{{ $element->file?->filePath() }}" alt="{{ $element->title }}">
                            </div>

                            <div class="mission__element__describe">
                                <h3>{{ $element->getTitle() }}</h3>
                                <p>{!! $element->getDescription() !!}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="program__top_image">
        <img src="/images/program_top_image.svg" alt="">
    </div>

</section>

<section id="program" class="program">
    <div class="program__bottom_image">
        <img src="/images/program_bottom_image.svg" alt="">
    </div>

    <div class="container">
        <div class="program__information">
            <h3>{!! trans('content.title_program') !!}</h3>

            <div class="program__information__row">
                <div class="program__header"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="program__title">{!! trans('content.title_deal_program') !!}</p>

                <div class="program__subsection">
                    <p class="program__title_sub">Круглый стол “Африканская культура в 21 веке”</p>
                    <p class="program__curator"><b>Куратор:</b> Юрате Гураускайте (editor-in-chief «U magazine» Russia)
                    </p>
                    <p class="program__description">Идея заключается в том, чтобы устранить катастрофическую нехватку
                        информации в современной африканской культуре, объединить и сблизить наши страны посредством
                        культурного диалога.</p>
                    <p class="program__members">
                        <span class="program__members__title">Участники мероприятия:</span>
                    </p>
                    <ul class="program__members__list">
                        <li>Oumi Ndour (journalist, filmmaker)</li>
                        <li>Didier Awadi ( musician, producer)</li>
                        <li>Iain Macdonald (Joburg ballet art director)</li>
                    </ul>
                </div>

                <div class="program__subsection">
                    <p class="program__title_sub">Круглый стол «Киноиндустрия России и Африки»</p>
                    <p class="program__description">Круглый стол по сотрудничеству в производстве ТВ-продукции, кино и анимаций даст возможность познакомить представителей африканского аудиовизуального бизнеса с российским и наоборот.</p>
                    <p class="program__members">
                        <span class="program__members__title">Участники мероприятия:</span>
                    </p>
                    <ul class="program__members__list">
                        <li>Ibra Kane - emedia senegal (tv, radio, web)</li>
                        <li>Timothy Odhiamo Owase (CEO Kenya Film Comission)</li>
                        <li>Wanuri Kahiu (Kenya, film director & producer)</li>
                        <li>Mo Abudu (Nigeria, film director, co founder EbonyLife TV)</li>
                        <li>Amjad Abu Alala (Sudan, filmmakerproducer)</li>
                        <li>David ‘tosh’ Gitonga (Kenya, filmmaker and producer)</li>
                        <li>Shirley Frimpong-manso (Ghana, filmmaker, producer, founder of Sparrow Productions)</li>
                        <li>Ousman Samassekou (Mali, filmmaker)</li>
                        <li>Moses Babatope (Nigeria, director filmhouse group)</li>
                        <li>Ferdy Adimefe (CEO Magic Carpet Studios, Nigeria, animation)</li>
                    </ul>
                </div>

            </div>


            <div class="program__information__row">
                <p class="program__title">{!! trans('content.title_culture_program') !!}</p>
                <p class="program__description">{!! trans('content.description_culture_program') !!}</p>
                <ul class="program__list">
                    <li><a href="#movie"><p>{!! trans('content.list_culture_program_cinema') !!}</p></a></li>
                    <li><a href="#lecture"><p>{!! trans('content.list_culture_program_lecture') !!}</p></a></li>
                    <li><a href="#music"><p>{!! trans('content.list_culture_program_music') !!}</p></a></li>
                    <li><a href="#fairy_tail"><p>{!! trans('content.list_culture_program_fairy') !!}</p></a></li>
                    <li><a href="#photo"><p>{!! trans('content.list_culture_program_photo') !!}</p></a></li>
                </ul>

            </div>

        </div>
    </div>

</section>

<section class="program_festival">
    <div class="red_icon">
        <img src="/images/mission_red.svg" alt="">
    </div>

    <div class="program_festival__description">
        <div id="movie" class="program_festival__element">
            <div class="container element">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="element__title">КИНОПРОГРАММА<br>«ЗНАКОМЬТЕСЬ, АФРИКА!»</p>
                <p class="element__event_data"><b>Даты проведения:</b> 26-28 июля</p>
                <p class="element__curator"><b>Куратор:</b> Евгений Айзикович</p>
                <p class="element__description">
                    Евгений Айзикович - продюсер, сценарист, телеведущий. <br>
                    Окончил ВГИК (сценарно-киноведческий факультет, мастерская В. Утилова).
                    Ведущий программы «Панорама с Евгением Айзиковичем», выходившая на телеканале ТРО и один из авторов программы «Матадор» на телеканале ОРТ.
                    Креативный продюсер «Студии ВоенФильм». Член Союза кинематографистов России. Член   Международной Академии телевидения и радиовещания.
                </p>
                <p class="element__list__title">
                    В программу фестиваля входят лекции кураторов:
                </p>
                <ul class="element__list">
                    <li>“Сембен Усман и новая африканская волна”</li>
                    <li>“Кино против колониализма”</li>
                    <li>“Нил Блокамп и кинематограф ЮАР”</li>
                    <li>“Искусство производить полторы тысячи фильмов в год”</li>
                </ul>
            </div>

            <div class="movies_wrapper">
                <div class="program_festival__gallery movies swiper">
                    <div class="swiper-wrapper">
                        @foreach($moviesElements as $element)
                            <div class="swiper-slide">
                                <img src="{{ $element->file?->filePath() }}" alt="{{ $element->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination movies"></div>
            </div>
        </div>

        <div id="lecture" class="program_festival__element">
            <div class="container element">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="element__title">ЛЕКЦИИ, ПАБЛИК-ТОКИ,<br>КУРАТОРСКИЕ ПОКАЗЫ</p>
                <p class="element__event_data"><b>Даты проведения:</b> 26-28 июля</p>
                <p class="element__description"><b class="text-orange">Лекция по “Африканскому и современному искусству”</b><br>
                    будет посвящена влиянию африканского искусства на творчество художников начала XX века,
                    в связи с активным распространением «негритянского искусства» в Европе, а также современных художников.</p>
                <p class="element__description"><b class="text-orange">«Россия и Египет близки как никогда».</b> <br>
                    Паблик-ток с Михаилом Орловым, внуком последнего короля Египта Фарука, Председатель Российско-Египетского делового совета при ТПП РФ.</p>
                <p class="element__description"><b class="text-orange">Кураторский показ выставки “История Африканского фотоархива”.</b><br>Наталия Литвинская</p>
                <p class="element__description"><b class="text-orange">Творческая встреча с фотографом Сергеем Горшковым и Дэйвом Варти</b><br>
                    основателем и совладельцем экопарка “ londolozi private game reserve” в ЮАР.
                    Сергей Горшков – российский фотограф, известный своими снимками дикой природы Камчатки, Африки и крайнего Севера.
                    Лауреат многочисленных премий, как в России, так и за рубежом, в том числе - Wildlife photographer of the year, Shell Wildlife Photographer of the Year,
                    а также международного конкурса «Золотая черепаха». Участник выставки фестиваля “Африканская мечта”</p>
            </div>
        </div>

        <div id="music" class="program_festival__element">
            <div class="container element">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="element__title">МУЗЫКАЛЬНАЯ ПРОГРАММА<br>“URBAN AFRICA”</p>
                <p class="element__event_data"><b>Дата проведения:</b> 27 июля</p>
                <p class="element__durations"><b>Продолжительность:</b> 2-2,5 часа</p>
                <p class="element__description">Музыкальный концерт с участием знаковых африканских исполнителей перенесет зрителей в мир яркой музыкальной Африки и даст почувствовать вкус богатой и необыкновенной земли.</p>

                <p class="element__list__title">Salif Keita (Mali)</p>
                <p class="element__description">Салиф Кейта - всемирно известный автор и исполнитель направления афро-поп из Мали. Салиф известен тем, что его считают золотым голосом Африки, а также тем, что он является прямым потомком основателя империи Мали, Сундьяты Кейта.</p>

                <p class="element__list__title">Ismael LO (Senegal)</p>
                <p class="element__description">Исмаэль Ло — автор неофициального гимна Африканского союза «Джамму Африка / Мир Африке». Исмаэль Ло играл в составе группы Super Diamond. В начале 80-х он начал сольную карьеру, а в 1981 г. записал дебютный альбом "Gor Sayina". В Африке Исмаэля Ло называют сенегальским Бобом Диланом, за его манеру игры на гитаре и губной гармошке, а также за глубокомысленную лирику.</p>

                <p class="element__list__title">Didier Awadi (Senegal)</p>
                <p class="element__description">Музыкант и продюсер, Дидье Авади является одним из главных звезд сенегальского и западноафриканского хип-хоп движения.</p>

                <p class="element__list__title">Iemi Alade (Nigeria)</p>
                <p class="element__description">Певица, композитор, актриса и активистка. Йеми считается одним из величайших артистов Африки. Она выделяется своими творческими выступлениями на сцене, своими модными и музыкальными клипами. Аладе является второй нигерийской и афробитской артисткой и первой женщиной, которая набрала 100 миллионов просмотров за одно видео на YouTube.</p>

                <p class="element__curator"><b>Куратор: Didier Awadi,</b> директор Studio Sankara, музыкант и продюсер. Дидье Авади является одним из пионеров  и звезд сенегальского и западноафриканского хип-хоп движения.</p>

            </div>

            <div class="music_wrapper">
                <div class="program_festival__gallery music swiper">
                    <div class="swiper-wrapper">
                        @foreach($musicElements as $element)
                            <div class="swiper-slide">
                                <img src="{{ $element->file?->filePath() }}" alt="{{ $element->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination music"></div>
            </div>
        </div>

        <div id="fairy_tail" class="program_festival__element">
            <div class="container element">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="element__title">Поэтический вечер<br>«Слово Африки»</p>
                <p class="element__event_data"><b>Дата проведения:</b> 26 июля</p>
                <p class="element__durations"><b>Продолжительность:</b> 60 мин</p>
                <p class="element__description">Самым известным популяризатором Африки в русской литературе был Николай Гумилёв, трижды побывавший на жарком континенте и многократно использовавший эти образы в своём творчестве. Но что мы знаем об африканской поэзии?</p>
                <p class="element__description">Артисты поэтического вечера исполнят произведения знаковых поэтов африканского континента (таких как Леопольд Седар Сенгор, Давид Диоп, Зехор Зерари и др.) и познакомят зрителя с уникальной поэзией свободы и любви.</p>
                <p class="element__description">Чтение поэзии в аудиовизуальном сопровождении.</p>
            </div>
        </div>

        <div id="photo" class="program_festival__element">
            <div class="container element">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                <p class="element__title">ВЫСТАВОЧНАЯ ПРОГРАММА<br>«АФРИКАНСКАЯ МЕЧТА»</p>

                <div class="element_subsection">
                    <p class="element__title__sub">Фотовыставка “Африканская мечта”</p>
                    <p class="element__description">Фотовыставка объединит фотографов разных поколений и жанров и будет посвящена тому, как фотография способна перемещать нас в пространстве и времени. Выставка  поможет представить зрителю разнообразие культуры Африки в новом ключе. Используя темы духовности, идентичности, урбанизма и уникальной природы, выставка проведет зрителя через африканские мечты российских фотохудожников</p>
                    <p class="element__curator"><b>Фотографы:</b> С.Горшков, А. Дафтари, Д.Кох, А. Нисходимов, М. Финогенов, К.Макеева, А.Белков.</p>
                    <p class="element__curator"><b>Куратор:</b> Анастасия Локтаева.</p>
                    <p class="element__description no_margin__top">Родилась в 1984 году в Санкт Петербурге. По окончанию школы переехала в Великобританию, где закончила University of the Art London. После университета вернулась в Москву. Анастасия занимается поддержкой современных художников и обращается к различным направлениям искусства среди которых живопись, графика и фотография.  Анастасия курирует проведение различных выставок и лекций.
                        Последние из которых, выставка и лекция  фотографа Дмитрия Коха, лекция о ДНК профессора Анатолия Алексеевича Клесова, выставка фотографа Андрея Белкова. </p>
                </div>

                <div class="element_subsection">
                    <p class="element__title__sub">“История Африканского фотоархива” <span class="no_bold">от галереи Люмьер</span></p>
                    <p class="element__description">Архивные фотографии 1957-х годов советских фотографов-репортеров из Африки. 
                        Уникальная фотохроника из архивов галереи Люмьер.</p>
                    <p class="element__curator"><b>Куратор:</b> Наталья Литвинская.</p>
                    <p class="element__description no_margin__top">Основатель и куратор галереи Люмьер - первой российской галереи, занимающейся классической черно-белой фотографией, а также главный куратор музейно-выставочной организации - центра фотографии имени братьев Люмьер.</p>
                </div>

            </div>

            <div class="photos_wrapper">
                <div class="program_festival__gallery photos swiper">
                    <div class="swiper-wrapper">
                        @foreach($photoElements as $element)
                            <div class="swiper-slide">
                                <img src="{{ $element->file?->filePath() }}" alt="{{ $element->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
            </div>
        </div>

    </div>

</section>

{{--<section id="participant" class="invite">--}}
{{--    <div class="invite__description">--}}
{{--        <div class="container">--}}
{{--            <h3>{!! trans('content.participant_title') !!}</h3>--}}

{{--            <div class="invite__wrapper">--}}
{{--                <div class="invite__text_how">--}}
{{--                    <p>{!! trans('content.participant_about') !!} {!! trans('content.participant_about_register') !!}</p>--}}
{{--                    <p>{!! trans('content.participant_about_time') !!}</p>--}}
{{--                </div>--}}
{{--                <div class="invite__form">--}}
{{--                    <form action="" onsubmit="return false;">--}}
{{--                        <div data-register-tooltip id="tooltip">--}}
{{--                            Регистрация на фестиваль откроется 1 мая 2023 года.--}}
{{--                            <div id="arrow" data-popper-arrow></div>--}}
{{--                        </div>--}}
{{--                        <button data-register-button--}}
{{--                                class="btn btn-md registration">{!! trans('content.participant_register') !!}</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="teams">
    <div class="container">
        <div class="teams__border">
            <img src="/images/program_header_line.svg" alt="">
        </div>
        <p class="teams__title">{!! trans('content.title_festival_team') !!}</p>

        <div class="teams__elements">
            @foreach($teams as $team)
                <div class="teams__record">
                    <div class="images">
                        <img src="{{$team->file?->filePath()}}" alt="{{$team->title}}">
                    </div>
                    <div class="title">{{$team->getTitle()}}</div>
                    <div class="description">{{$team->getDescription()}}</div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<section class="partners_block">
    <div class="container">
        <h3>{!! trans('content.partners_title') !!}</h3>
        <div class="partners_block__content">
            <div class="row official">
                <div class="official__title">{!! trans('content.partners_official') !!}</div>
                <div class="official__list">
                    <div class="official__img_wrapper">
                        <img src="/images/alrosa.svg" alt="">
                    </div>
                    <div class="official__img_wrapper">
                        <img src="/images/mkrf.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="row information">
                <div class="information__partner">
                    <div class="information__title">{!! trans('content.partners_information') !!}</div>
                    <div class="information__partner__logo_wrapper">
                        <img src="/images/information__partner.svg" alt="">
                    </div>
                </div>
                <div class="information__organization">
                    <div class="information__title">{!! trans('content.partners_organization') !!}</div>
                    <div class="information__organization__logo_wrapper">
                        <img src="/images/information__organization.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="footer_wrapper container">
        <div class="partners">
            <a class="icon icon__link" href="https://alfavitproduction.ru" target="_blank">
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
                {{--                <li><a href=""><img src="/images/social/instagram.svg" alt=""></a></li>--}}
                {{--                <li><a href=""><img src="/images/social/facebook.svg" alt=""></a></li>--}}
                <li><a href=""><img src="/images/social/telegram.svg" alt=""></a></li>
                <li><a href=""><img src="/images/social/vk.svg" alt=""></a></li>
                <li><a href=""><img src="/images/social/youtube.svg" alt=""></a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/main.js"></script>

</body>
</html>
