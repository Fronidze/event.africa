@extends('template')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    Форма добавление <small>новости</small>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('panel.gallery.news.create') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="" class="form-label">Дата публикации</label>
                            <input class="form-control" type="text" name="publish_at" title="">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Название</label>
                            <input class="form-control" type="text" name="title">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">[EN] Название</label>
                            <input class="form-control" type="text" name="title_en">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Описание</label>
                            <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">[EN] Описание</label>
                            <textarea class="form-control" name="description_en" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Сортировка</label>
                            <input class="form-control" type="text" name="sorting">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Файл</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <div class="form-group">
                            <a href="{{ route('panel.gallery.news') }}" class="btn btn-xs btn-white">К списку</a>
                            <button type="submit" class="btn btn-xs btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
