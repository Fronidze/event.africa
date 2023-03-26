@php
    $menus = [
        ['label' => 'Галлерея фестиваля', 'route' => route('panel.gallery.festival'), 'active' => 'panel/gallery/festival*'],
        ['label' => 'Новости', 'route' => route('panel.gallery.news'), 'active' => 'panel/gallery/news*'],
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
