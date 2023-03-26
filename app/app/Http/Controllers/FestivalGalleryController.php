<?php

namespace App\Http\Controllers;

use App\Models\FestivalGallery;
use App\Models\Files;
use App\Services\FilesService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class FestivalGalleryController extends Controller
{
    public function festival(): View {

        $elements = FestivalGallery::query()
            ->with('file')
            ->orderBy('sorting', 'asc')
            ->get();

        return \view('pages.festival.list', compact('elements'));
    }

    public function festivalForm(): View {
        return \view('pages.festival.form');
    }

    public function festivalCreate(
        Request      $request,
        FilesService $filesService
    ): RedirectResponse {

        $image = $request->file('image');
        $files = null;
        if ($image instanceof UploadedFile) {
            $files = $filesService->make('festival', $image);
        }

        $element = new FestivalGallery();
        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting') ?? 100;
        $element->file_id = $files?->id;

        $element->save();
        return redirect()
            ->route('panel.gallery.festival');
    }

    public function festivalRemove(
        int $id,
        FilesService $filesService,
    ): RedirectResponse {

        $element = FestivalGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof FestivalGallery === false) {
            return redirect()
                ->route('panel.gallery.festival');
        }

        $file = $element->file;
        if ($file instanceof Files) {
            $filesService->remove($file->path);
            $file->delete();
        }

        $element->delete();

        return redirect()
            ->route('panel.gallery.festival');

    }

    public function festivalView(
        int $id
    ): View|RedirectResponse {

        $element = FestivalGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof FestivalGallery === false) {
            return redirect()
                ->route('panel.gallery.festival');
        }
        return \view('pages.festival.view', compact('element'));

    }

    public function festivalEdit(
        int $id,
        Request $request
    ): RedirectResponse {

        $element = FestivalGallery::find($id);
        if ($element instanceof FestivalGallery === false) {
            return redirect()
                ->route('panel.gallery.festival');
        }

        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting');
        $element->save();

        return redirect()
            ->route('panel.gallery.festival');

    }
}
