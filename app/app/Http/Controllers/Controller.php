<?php

namespace App\Http\Controllers;

use App\Models\FestivalGallery;
use App\Models\NewsGallery;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function main(): View {

        $festivalElements = FestivalGallery::query()
            ->with('file')
            ->orderBy('sorting')
            ->get();

        $newsElements = NewsGallery::query()
            ->with('file')
            ->orderBy('sorting')
            ->get();

        return view('layout', compact(
            'festivalElements',
            'newsElements',
        ));

    }
}
