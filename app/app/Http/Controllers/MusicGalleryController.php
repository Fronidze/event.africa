<?php

namespace App\Http\Controllers;

use App\Models\FestivalGallery;
use App\Models\Files;
use App\Models\MusicGallery;
use App\Models\NewsGallery;
use App\Services\FilesService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MusicGalleryController extends Controller
{
    public function music(): View {

        $elements = MusicGallery::query()
            ->with('file')
            ->orderBy('sorting', 'asc')
            ->get();

        return \view('pages.music.list', compact('elements'));
    }

    public function musicForm(): View {
        return \view('pages.music.form');
    }

    public function musicCreate(
        Request      $request,
        FilesService $filesService
    ): RedirectResponse {

        $image = $request->file('image');
        $files = null;
        if ($image instanceof UploadedFile) {
            $files = $filesService->make('music', $image);
        }

        $element = new MusicGallery();
        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting') ?? 100;
        $element->file_id = $files?->id;

        $element->save();
        return redirect()
            ->route('panel.gallery.music');
    }

    public function musicRemove(
        int $id,
        FilesService $filesService,
    ): RedirectResponse {

        $element = MusicGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof MusicGallery === false) {
            return redirect()
                ->route('panel.gallery.music');
        }

        $file = $element->file;
        if ($file instanceof Files) {
            $filesService->remove($file->path);
            $file->delete();
        }

        $element->delete();

        return redirect()
            ->route('panel.gallery.music');

    }

    public function musicView(
        int $id
    ): View|RedirectResponse {

        $element = MusicGallery::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof MusicGallery === false) {
            return redirect()
                ->route('panel.gallery.music');
        }
        return \view('pages.music.view', compact('element'));

    }

    public function musicEdit(
        int $id,
        Request $request
    ): RedirectResponse {

        $element = MusicGallery::find($id);
        if ($element instanceof MusicGallery === false) {
            return redirect()
                ->route('panel.gallery.music');
        }

        $element->title = $request->input('title');
        $element->sorting = $request->input('sorting');
        $element->save();

        return redirect()
            ->route('panel.gallery.music');

    }
}
