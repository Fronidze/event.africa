<?php

use App\Models\MusicGallery;

/**
 * @var MusicGallery $element
 */
?>
@extends('template')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    Форма редактирование <small>музыки</small>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('panel.gallery.music.edit', ['id' => $element->id]) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="">Название</label>
                            <input class="form-control" type="text" name="title"
                                   value="{{ old('title', $element->title) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Сортировка</label>
                            <input class="form-control" type="text" name="sorting"
                                   value="{{ old('sorting', $element->sorting) }}">
                        </div>
                        <div class="form-group">
                            <a href="{{ route('panel.gallery.music') }}" class="btn btn-xs btn-white">К списку</a>
                            <button type="submit" class="btn btn-xs btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
