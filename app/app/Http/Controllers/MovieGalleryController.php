<?php

namespace App\Http\Controllers;

use App\Models\FestivalGallery;
use App\Models\Files;
use App\Models\MoviesGallery;
use App\Models\NewsGallery;
use App\Services\FilesService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MovieGalleryController extends Controller
{
    public function list(): View {

        $elements = MoviesGallery::query()
            ->with('file')
            ->orderBy('sorting', 'asc')
            ->get();

        return \view('pages.movie.list', compact('elements'));
    }

    public function movieForm(): View {
        return \view('pages.movie.form');
    }

    public function movieCreate(
        Request      $request,
        FilesService $filesService
    ): RedirectResponse {

        $image = $request->file('image');
        $files = null;
        if ($image instanceof UploadedFile) {
            $files = $filesService->make('movie', $image);
        }

        $element = new MoviesGallery();
        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting') ?? 100;
        $element->file_id = $files?->id;

        $element->save();
        return redirect()
            ->route('panel.gallery.movie');
    }

    public function movieRemove(
        int $id,
        FilesService $filesService,
    ): RedirectResponse {

        $element = MoviesGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof MoviesGallery === false) {
            return redirect()
                ->route('panel.gallery.movie');
        }

        $file = $element->file;
        if ($file instanceof Files) {
            $filesService->remove($file->path);
            $file->delete();
        }

        $element->delete();

        return redirect()
            ->route('panel.gallery.movie');

    }

    public function movieView(
        int $id
    ): View|RedirectResponse {

        $element = MoviesGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof MoviesGallery === false) {
            return redirect()
                ->route('panel.gallery.movie');
        }
        return \view('pages.movie.view', compact('element'));

    }

    public function movieEdit(
        int $id,
        Request $request
    ): RedirectResponse {

        $element = MoviesGallery::find($id);
        if ($element instanceof MoviesGallery === false) {
            return redirect()
                ->route('panel.gallery.movie');
        }

        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting');
        $element->save();

        return redirect()
            ->route('panel.gallery.movie');

    }
}
