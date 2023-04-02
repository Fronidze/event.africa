<?php

namespace App\Http\Controllers;

use App\Models\FestivalGallery;
use App\Models\Files;
use App\Models\NewsGallery;
use App\Models\PhotoGallery;
use App\Services\FilesService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PhotoGalleryController extends Controller
{
    public function photo(): View {

        $elements = PhotoGallery::query()
            ->with('file')
            ->orderBy('sorting', 'asc')
            ->get();

        return \view('pages.photo.list', compact('elements'));
    }

    public function photoForm(): View {
        return \view('pages.photo.form');
    }

    public function photoCreate(
        Request      $request,
        FilesService $filesService
    ): RedirectResponse {

        $image = $request->file('image');
        $files = null;
        if ($image instanceof UploadedFile) {
            $files = $filesService->make('photo', $image);
        }

        $element = new PhotoGallery();
        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting') ?? 100;
        $element->file_id = $files?->id;

        $element->save();
        return redirect()
            ->route('panel.gallery.photo');
    }

    public function photoRemove(
        int $id,
        FilesService $filesService,
    ): RedirectResponse {

        $element = PhotoGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof PhotoGallery === false) {
            return redirect()
                ->route('panel.gallery.photo');
        }

        $file = $element->file;
        if ($file instanceof Files) {
            $filesService->remove($file->path);
            $file->delete();
        }

        $element->delete();

        return redirect()
            ->route('panel.gallery.photo');

    }

    public function photoView(
        int $id
    ): View|RedirectResponse {

        $element = PhotoGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof PhotoGallery === false) {
            return redirect()
                ->route('panel.gallery.photo');
        }
        return \view('pages.photo.view', compact('element'));

    }

    public function photoEdit(
        int $id,
        Request $request
    ): RedirectResponse {

        $element = PhotoGallery::find($id);
        if ($element instanceof PhotoGallery === false) {
            return redirect()
                ->route('panel.gallery.photo');
        }

        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting');
        $element->save();

        return redirect()
            ->route('panel.gallery.photo');

    }
}
