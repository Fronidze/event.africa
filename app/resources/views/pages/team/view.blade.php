<?php

use App\Models\Team;

/**
 * @var Team $element
 * @var array $translates
 */
?>
@extends('template')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    Форма редактирование <small>команда</small>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('panel.gallery.team.edit', ['id' => $element->id]) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="">Название</label>
                            <input class="form-control" type="text" name="title"
                                   value="{{ old('title', $element->title) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">[EN] Название</label>
                            <input class="form-control" type="text" name="title_en"
                                   value="{{ old('title', Arr::get($translates, 'en.title')) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Описание</label>
                            <textarea class="form-control" name="description" cols="30"
                                      rows="5">{{ old('description', $element->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">[EN] Описание</label>
                            <textarea class="form-control" name="description_en" cols="30"
                                      rows="5">{{ old('description', Arr::get($translates, 'en.description')) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Сортировка</label>
                            <input class="form-control" type="text" name="sorting"
                                   value="{{ old('sorting', $element->sorting) }}">
                        </div>
                        <div class="form-group">
                            <a href="{{ route('panel.gallery.team') }}" class="btn btn-xs btn-white">К списку</a>
                            <button type="submit" class="btn btn-xs btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
