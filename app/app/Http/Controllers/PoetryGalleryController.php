<?php

namespace App\Http\Controllers;

use App\Models\FestivalGallery;
use App\Models\Files;
use App\Models\NewsGallery;
use App\Models\PoetryGallery;
use App\Services\FilesService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PoetryGalleryController extends Controller
{
    public function poetry(): View {

        $elements = PoetryGallery::query()
            ->with('file')
            ->orderBy('sorting', 'asc')
            ->get();

        return \view('pages.poetry.list', compact('elements'));
    }

    public function poetryForm(): View {
        return \view('pages.poetry.form');
    }

    public function poetryCreate(
        Request      $request,
        FilesService $filesService
    ): RedirectResponse {

        $image = $request->file('image');
        $files = null;
        if ($image instanceof UploadedFile) {
            $files = $filesService->make('poetry', $image);
        }

        $element = new PoetryGallery();
        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting') ?? 100;
        $element->file_id = $files?->id;

        $element->save();
        return redirect()
            ->route('panel.gallery.poetry');
    }

    public function poetryRemove(
        int $id,
        FilesService $filesService,
    ): RedirectResponse {

        $element = PoetryGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof PoetryGallery === false) {
            return redirect()
                ->route('panel.gallery.poetry');
        }

        $file = $element->file;
        if ($file instanceof Files) {
            $filesService->remove($file->path);
            $file->delete();
        }

        $element->delete();

        return redirect()
            ->route('panel.gallery.poetry');

    }

    public function poetryView(
        int $id
    ): View|RedirectResponse {

        $element = PoetryGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof PoetryGallery === false) {
            return redirect()
                ->route('panel.gallery.poetry');
        }
        return \view('pages.poetry.view', compact('element'));

    }

    public function poetryEdit(
        int $id,
        Request $request
    ): RedirectResponse {

        $element = PoetryGallery::find($id);
        if ($element instanceof PoetryGallery === false) {
            return redirect()
                ->route('panel.gallery.poetry');
        }

        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting');
        $element->save();

        return redirect()
            ->route('panel.gallery.poetry');

    }
}
