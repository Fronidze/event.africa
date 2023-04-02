<?php

use App\Models\PoetryGallery;
use App\Services\FilesService;

/**
 * @var PoetryGallery[] $elements
 */
?>


@extends('template')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    Стихи <small>список изображений</small>
                </div>
                <div class="ibox-content">
                    <p>
                        <a href="{{route('panel.gallery.poetry.form')}}" class="btn btn-primary btn-xs">Добавить
                            стихи</a>
                    </p>
                    <div class="row">
                        @foreach($elements as $element)
                            <div class="col-lg-6">
                                <div class="contact-box center-version panel_gallery">

                                    <div class="images_wrapper">
                                        <img src="{{ (new FilesService())->path($element->file->path) }}"
                                             alt="{{ $element->title }}">
                                    </div>

                                    <div class="panel_gallery_footer">
                                        <p>
                                            <b>{{ $element->title }}</b> <br>
                                            <small>сортировка: {{ $element->sorting }}</small>
                                        </p>
                                        <div class="">
                                            <a href="{{ route('panel.gallery.poetry.view', ['id' => $element->id]) }}"
                                               class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('panel.gallery.poetry.remove', ['id' => $element->id]) }}"
                                               class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
