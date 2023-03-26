<?php

namespace App\Http\Controllers;

use App\Models\FestivalGallery;
use App\Models\Files;
use App\Models\NewsGallery;
use App\Services\FilesService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class NewsGalleryController extends Controller
{
    public function news(): View {

        $elements = NewsGallery::query()
            ->with('file')
            ->orderBy('sorting', 'asc')
            ->get();

        return \view('pages.news.list', compact('elements'));
    }

    public function newsForm(): View {
        return \view('pages.news.form');
    }

    public function newsCreate(
        Request      $request,
        FilesService $filesService
    ): RedirectResponse {

        $image = $request->file('image');
        $files = null;
        if ($image instanceof UploadedFile) {
            $files = $filesService->make('news', $image);
        }

        $element = new NewsGallery();
        $element->title = $request->input('title');
        $element->description = $request->input('description');
        $element->sorting = $request->input('sorting') ?? 100;
        $element->file_id = $files?->id;

        $element->save();
        return redirect()
            ->route('panel.gallery.news');
    }

    public function newsRemove(
        int $id,
        FilesService $filesService,
    ): RedirectResponse {

        $element = NewsGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof NewsGallery === false) {
            return redirect()
                ->route('panel.gallery.news');
        }

        $file = $element->file;
        if ($file instanceof Files) {
            $filesService->remove($file->path);
            $file->delete();
        }

        $element->delete();

        return redirect()
            ->route('panel.gallery.news');

    }

    public function newsView(
        int $id
    ): View|RedirectResponse {

        $element = NewsGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof NewsGallery === false) {
            return redirect()
                ->route('panel.gallery.news');
        }
        return \view('pages.news.view', compact('element'));

    }

    public function newsEdit(
        int $id,
        Request $request
    ): RedirectResponse {

        $element = NewsGallery::find($id);
        if ($element instanceof NewsGallery === false) {
            return redirect()
                ->route('panel.gallery.news');
        }

        $element->title = $request->input('title');
        $element->description = $request->input('description');
        $element->sorting = $request->input('sorting');
        $element->save();

        return redirect()
            ->route('panel.gallery.news');

    }
}
