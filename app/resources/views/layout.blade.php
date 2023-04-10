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

@yield('content')

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
                <li><a href="https://t.me/africandays"><img src="/images/social/telegram.svg" alt=""></a></li>
                <li><a href=""><img src="/images/social/vk.svg" alt=""></a></li>
                <li><a href=""><img src="/images/social/youtube.svg" alt=""></a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/main.js"></script>

</body>
</html>
