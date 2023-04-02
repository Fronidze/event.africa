<?php

namespace App\Http\Controllers;

use App\Models\FestivalGallery;
use App\Models\Files;
use App\Models\NewsGallery;
use App\Models\PhotoGallery;
use App\Models\Team;
use App\Services\FilesService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TeamController extends Controller
{
    public function team(): View {

        $elements = Team::query()
            ->with('file')
            ->orderBy('sorting', 'asc')
            ->get();

        return \view('pages.team.list', compact('elements'));
    }

    public function teamForm(): View {
        return \view('pages.team.form');
    }

    public function teamCreate(
        Request      $request,
        FilesService $filesService
    ): RedirectResponse {

        $image = $request->file('image');
        $files = null;
        if ($image instanceof UploadedFile) {
            $files = $filesService->make('team', $image);
        }

        $element = new Team();
        $element->title = $request->input('title');
        $element->description = $request->input('description');
        $element->sorting = $request->input('sorting') ?? 100;
        $element->file_id = $files?->id;

        $element->save();
        return redirect()
            ->route('panel.gallery.team');
    }

    public function teamRemove(
        int $id,
        FilesService $filesService,
    ): RedirectResponse {

        $element = Team::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof Team === false) {
            return redirect()
                ->route('panel.gallery.team');
        }

        $file = $element->file;
        if ($file instanceof Files) {
            $filesService->remove($file->path);
            $file->delete();
        }

        $element->delete();

        return redirect()
            ->route('panel.gallery.team');

    }

    public function teamView(
        int $id
    ): View|RedirectResponse {

        $element = Team::query()
            ->with('file')
            ->where('id', $id)
            ->first();

        if ($element instanceof PhotoGallery === false) {
            return redirect()
                ->route('panel.gallery.team');
        }
        return \view('pages.team.view', compact('element'));

    }

    public function teamEdit(
        int $id,
        Request $request
    ): RedirectResponse {

        $element = Team::find($id);
        if ($element instanceof Team === false) {
            return redirect()
                ->route('panel.gallery.team');
        }

        $element->title = $request->input('title');
        $element->description = $request->input('description');
        $element->sorting = $request->input('sorting');
        $element->save();

        return redirect()
            ->route('panel.gallery.team');

    }
}
