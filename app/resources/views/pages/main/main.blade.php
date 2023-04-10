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


@extends('layout')
@section('content')
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
                            {!! trans('content.register_will_open') !!}
                            <div id="arrow" data-popper-arrow></div>
                        </div>
                        <button data-register-button
                                class="btn btn-md registration">{!! trans('content.participant_register') !!}</button>
                        <p class="invite__form__about">{!! trans('content.participant_about') !!}</p>
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

        <div id="news" class="news_list container">
            <div class="news_list__wrapper">
                @foreach($newsElements as $news)
                    <div class="news_list__element news">
                        <a class="news__link"
                           href="{{ route('news.detail', ['id' => $news->id, 'lang' => app()->getLocale()]) }}">
                            <div class="news__date">17 мая 2023</div>
                            <div class="news__description">{{$news->getTitle()}}</div>
                            <div class="news__image"><img src="{{$news->file?->filePath()}}" alt=""></div>
                        </a>
                    </div>
                @endforeach
                <div class="news_list__more">
                    <a class="btn show_more"
                       href="{{ route('news.list', ['lang' => app()->getLocale()]) }}">{!! trans('content.all_news') !!}</a>
                </div>
            </div>
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
                        <p class="program__title_sub">{!! trans('content.culture_21_age') !!}</p>
                        <p class="program__curator"><b>{!! trans('content.curator') !!}
                                :</b> {!! trans('content.culture_21_age_curator') !!}</p>
                        <p class="program__description">{!! trans('content.culture_21_age_description') !!}</p>
                        <p class="program__members">
                            <span class="program__members__title">{!! trans('content.members_event') !!}:</span>
                        </p>
                        <ul class="program__members__list">
                            <li>{!! trans('content.oumi_ndour') !!}</li>
                            <li>{!! trans('content.didier_awadi') !!}</li>
                            <li>{!! trans('content.iain_macdonald') !!}</li>
                        </ul>
                        <div class="event_action">
                            <a href="javascript: void(0)"
                               class="btn event_register">{!! trans('content.event_register') !!}</a>
                        </div>
                    </div>

                    <div class="program__subsection">
                        <p class="program__title_sub">{!! trans('content.cinema_industry') !!}</p>
                        <p class="program__description">{!! trans('content.cinema_industry_description') !!}</p>
                        <p class="program__members">
                            <span class="program__members__title">{!! trans('content.members_event') !!}:</span>
                        </p>
                        <ul class="program__members__list">
                            <li>{!! trans('content.ibra_kane') !!}</li>
                            <li>{!! trans('content.timothy_odhiamo_owase') !!}</li>
                            <li>{!! trans('content.wanuri_kahiu') !!}</li>
                            <li>{!! trans('content.mo_abudu') !!}</li>
                            <li>{!! trans('content.amjad_abu_alala') !!}</li>
                            <li>{!! trans('content.david_gitonga') !!}</li>
                            <li>{!! trans('content.shirley_frimpong_manso') !!}</li>
                            <li>{!! trans('content.ousman_samassekou') !!}</li>
                            <li>{!! trans('content.moses_babatope') !!}</li>
                            <li>{!! trans('content.ferdy_adimefe') !!}</li>
                        </ul>
                        <div class="event_action">
                            <a href="javascript: void(0)"
                               class="btn event_register">{!! trans('content.event_register') !!}</a>
                        </div>
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
                    <div class="event_action">
                        <a href="javascript: void(0)"
                           class="btn event_register">{!! trans('content.event_register') !!}</a>
                    </div>
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
                    <p class="element__title">{!! trans('content.cinema_program') !!}</p>
                    <p class="element__event_data"><b>{!! trans('content.event_date') !!}:</b>
                        26-28 {!! trans('content.july') !!}</p>
                    <p class="element__curator"><b>{!! trans('content.curator') !!}
                            :</b> {!! trans('content.evgeniy_aizukovich') !!}</p>
                    <p class="element__description">{!! trans('content.cinema_program_description') !!}</p>
                    <p class="element__list__title">{!! trans('content.cinema_curator_in_lecture') !!}:</p>
                    <ul class="element__list">
                        <li>{!! trans('content.cinema_curator_in_lecture_wave') !!}</li>
                        <li>{!! trans('content.cinema_curator_in_lecture_colonization') !!}</li>
                        <li>{!! trans('content.cinema_curator_in_lecture_cinematography_south_africa') !!}</li>
                        <li>{!! trans('content.cinema_curator_in_lecture_one_and_a_half_thousand_a_year') !!}</li>
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

                <div class="event_action">
                    <a href="javascript: void(0)" class="btn event_register">{!! trans('content.event_register') !!}</a>
                </div>

            </div>

            <div id="lecture" class="program_festival__element">
                <div class="container element">
                    <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                    <p class="element__title">{!! trans('content.lectures_public_curator') !!}</p>
                    <p class="element__event_data"><b>{!! trans('content.event_date') !!}:</b>
                        26-28 {!! trans('content.july') !!}</p>

                    <p class="element__description">
                        <b class="text-orange">{!! trans('content.lectures_african_and_contemporary_art') !!}</b><br>
                        {!! trans('content.lectures_african_and_contemporary_art_description') !!}
                    </p>

                    <p class="element__description">
                        <b class="text-orange">{!! trans('content.lectures_russia_and_egypt') !!}</b> <br>
                        {!! trans('content.lectures_russia_and_egypt_description') !!}
                    </p>

                    <p class="element__description">
                        <b class="text-orange">{!! trans('content.lectures_african_photo_archive') !!}</b><br>
                        {!! trans('content.lectures_african_photo_archive_description') !!}
                    </p>

                    <p class="element__description">
                        <b class="text-orange">{!! trans('content.lecture_meet_with_photographer') !!}</b><br>
                        {!! trans('content.lecture_meet_with_photographer_description') !!}
                    </p>

                </div>

                <div class="event_action">
                    <a href="javascript: void(0)" class="btn event_register">{!! trans('content.event_register') !!}</a>
                </div>

            </div>

            <div id="music" class="program_festival__element">
                <div class="container element">
                    <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                    <p class="element__title">{!! trans('content.music_program') !!}</p>
                    <p class="element__event_data"><b>{!! trans('content.event_date_once') !!}:</b>
                        27 {!! trans('content.july') !!}</p>
                    <p class="element__durations"><b>{!! trans('content.duration') !!}:</b>
                        2-2,5 {!! trans('content.hours') !!}</p>
                    <p class="element__description">{!! trans('content.music_program_description') !!}</p>

                    <p class="element__list__title text-orange no_margin__bottom">Salif Keita (Mali)</p>
                    <p class="element__description no_margin__top">{!! trans('content.salif_keita_description') !!}</p>

                    <p class="element__list__title text-orange no_margin__bottom">Ismael LO (Senegal)</p>
                    <p class="element__description no_margin__top">{!! trans('content.ismael_lo_description') !!}</p>

                    <p class="element__list__title text-orange no_margin__bottom">Didier Awadi (Senegal)</p>
                    <p class="element__description no_margin__top">{!! trans('content.didier_awadi_description') !!}</p>

                    <p class="element__list__title text-orange no_margin__bottom">Iemi Alade (Nigeria)</p>
                    <p class="element__description no_margin__top">{!! trans('content.iemi_alade_description') !!}</p>

                    <p class="element__curator">
                        <b>{!! trans('content.didier_awadi_name') !!}</b>,{!! trans('content.didier_awadi_description_two') !!}
                    </p>

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

                <div class="event_action">
                    <a href="javascript: void(0)" class="btn event_register">{!! trans('content.event_register') !!}</a>
                </div>

            </div>

            <div id="fairy_tail" class="program_festival__element">
                <div class="container element">
                    <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                    <p class="element__title">{!! trans('content.fairy_tails') !!}</p>
                    <p class="element__event_data"><b>{!! trans('content.event_date_once') !!}:</b>
                        26 {!! trans('content.july') !!}</p>
                    <p class="element__durations"><b>{!! trans('content.duration') !!}:</b>
                        60 {!! trans('content.min') !!}</p>
                    <p class="element__description">{!! trans('content.fairy_tails_description_one') !!}</p>
                    <p class="element__description">{!! trans('content.fairy_tails_description_two') !!}</p>
                    <p class="element__description">{!! trans('content.fairy_tails_description_three') !!}</p>
                </div>

                <div class="event_action">
                    <a href="javascript: void(0)" class="btn event_register">{!! trans('content.event_register') !!}</a>
                </div>

            </div>

            <div id="photo" class="program_festival__element">
                <div class="container element">
                    <div class="program_festival__border"><img src="/images/program_header_line.svg" alt=""></div>
                    <p class="element__title">{!! trans('content.photo_program_title') !!}</p>

                    <div class="element_subsection">
                        <p class="element__title__sub text-orange">{!! trans('content.photo_program_title_subtitle_one') !!}</p>
                        <p class="element__description">{!! trans('content.photo_program_description_subtitle_one') !!}</p>
                        <p class="element__curator"><b>{!! trans('content.photograther') !!}
                                :</b> {!! trans('content.photograther_list') !!}</p>
                        <p class="element__curator"><b>{!! trans('content.curator') !!}
                                :</b> {!! trans('content.anastasia_loktaeva') !!}</p>
                        <p class="element__description no_margin__top">{!! trans('content.photograther_description') !!}</p>
                    </div>

                    <div class="element_subsection">

                        <p class="element__title__sub text-orange">
                            {!! trans('content.african_photo_archive') !!}
                            <span class="no_bold">{!! trans('content.lumiere_gallery') !!}</span>
                        </p>

                        <p class="element__description">{!! trans('content.african_photo_archive_description') !!}</p>
                        <p class="element__curator"><b>{!! trans('content.curator') !!}
                                :</b>{!! trans('content.natalia_litvinskaya') !!}.</p>
                        <p class="element__description no_margin__top">{!! trans('content.natalia_litvinskaya_description') !!}</p>
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

                <div class="event_action">
                    <a href="javascript: void(0)" class="btn event_register">{!! trans('content.event_register') !!}</a>
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
@endsection
