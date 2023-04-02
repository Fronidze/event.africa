@php
    $menus = [
        ['label' => 'Галерея фестиваля', 'route' => route('panel.gallery.festival'), 'active' => 'panel/gallery/festival*'],
        ['label' => 'Новости', 'route' => route('panel.gallery.news'), 'active' => 'panel/gallery/news*'],
        ['label' => 'Фильмы', 'route' => route('panel.gallery.movie'), 'active' => 'panel/gallery/movie*'],
        ['label' => 'Музыка', 'route' => route('panel.gallery.music'), 'active' => 'panel/gallery/music*'],
        ['label' => 'Стихи', 'route' => route('panel.gallery.poetry'), 'active' => 'panel/gallery/poetry*'],
        ['label' => 'Фотографии', 'route' => route('panel.gallery.photo'), 'active' => 'panel/gallery/photo*'],
        ['label' => 'Команда', 'route' => route('panel.gallery.team'), 'active' => 'panel/gallery/team*'],
    ];
@endphp

<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">

        <li class="nav-header">
            <div class="dropdown profile-element">
                <span class="block m-t-xs" style="color: white">Администратор</span>
                <span class="text-muted text-xs block">Хорошего дня 🥳</span>
            </div>
        </li>

        @foreach($menus as $menu)
            <li @class(['active' => request()->is($menu['active'])])>
                <a href="{{$menu['route']}}">
                    <i class="fa fa-bars"></i>
                    <span class="nav-label">{{$menu['label']}}</span>
                </a>
            </li>
        @endforeach

    </ul>
</div>
