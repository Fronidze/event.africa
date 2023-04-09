@extends('layout')
@section('content')
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
                        <a class="news__link" href="{{ route('news.detail', ['id' => $news->id]) }}">
                            <div class="news__date">17 мая 2023</div>
                            <div class="news__description">{{$news->getTitle()}}</div>
                            <div class="news__image"><img src="{{$news->file?->filePath()}}" alt=""></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
