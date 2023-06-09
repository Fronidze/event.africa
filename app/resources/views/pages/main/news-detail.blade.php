<?php

use App\Models\NewsGallery;

/**
 * @var NewsGallery $news
 */
?>
@extends('layout')
@section('content')

    <div class="news_navigation">
        <ul class="news_navigation__list container">
            <li><a href="{{ route('news.list', ['lang' => app()->getLocale()]) }}"><i class="icon icon-arrow-left"></i>все новости</a></li>
            <li><a href="{{ route('main', ['lang' => app()->getLocale()]) }}">на главную</a></li>
        </ul>
    </div>

    <div class="news_detail">
        <div class="news_detail__wrapper container">
            <div class="news_detail__images">
                <img src="{{ $news->file?->filePath() }}" alt="{{ $news->title }}">
            </div>
            <div class="news_detail__content">
                <div class="news_detail__content__date">{!! $news->getPublishAt() !!}</div>
                <div class="news_detail__content__description">{!! $news->getDescription() !!}</div>
            </div>

        </div>

    </div>
@endsection
