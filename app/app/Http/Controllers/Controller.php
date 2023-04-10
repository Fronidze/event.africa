<?php

namespace App\Http\Controllers;

use App\Models\FestivalGallery;
use App\Models\MoviesGallery;
use App\Models\MusicGallery;
use App\Models\NewsGallery;
use App\Models\PhotoGallery;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function elements(Builder $model, ?int $limit = null): Collection {
        $query = $model
            ->with('file')
            ->orderBy('sorting');

        if ($limit !== null) {
            $query->limit($limit);
        }

        return $query->get();
    }

    public function main(): View {
        $festivalElements = $this->elements(FestivalGallery::query());
        $newsElements = $this->elements(NewsGallery::query(), 3);
        $moviesElements = $this->elements(MoviesGallery::query());
        $musicElements = $this->elements(MusicGallery::query());
        $photoElements = $this->elements(PhotoGallery::query());
        $teams = $this->elements(Team::query());

        return view('pages.main.main', compact(
            'festivalElements',
            'newsElements',
            'moviesElements',
            'musicElements',
            'photoElements',
            'teams'
        ));

    }

    public function news(
        string $lang
    ): View {
        $newsElements = $this->elements(NewsGallery::query());
        return \view('pages.main.news', compact('newsElements'));
    }

    public function detail(
        string $lang,
        int $news_id
    ): View {
        $news = NewsGallery::find($news_id);
        return \view('pages.main.news-detail', compact('news'));
    }
}
