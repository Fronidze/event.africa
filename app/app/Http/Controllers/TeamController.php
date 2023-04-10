<?php

namespace App\Http\Controllers;

use App\Enums\Translate;
use App\Models\FestivalGallery;
use App\Models\Files;
use App\Models\NewsGallery;
use App\Models\PhotoGallery;
use App\Models\Team;
use App\Models\TeamTranslate;
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

        $english_title = new TeamTranslate();
        $english_title->lang = Translate::EN->value;
        $english_title->team_id = $element->id;
        $english_title->code = 'title';
        $english_title->value = $request->input('title_en');
        $english_title->save();

        $english_description = new TeamTranslate();
        $english_description->lang = Translate::EN->value;
        $english_description->team_id = $element->id;
        $english_description->code = 'description';
        $english_description->value = $request->input('description_en');
        $english_description->save();

        return redirect()
            ->route('panel.gallery.team');
    }

    public function teamRemove(
        int          $id,
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
            ->with('file', 'translates')
            ->where('id', $id)
            ->first();

        if ($element instanceof Team === false) {
            return redirect()
                ->route('panel.gallery.team');
        }

        $translates = [];
        /** @var TeamTranslate $translate */
        foreach ($element->translates as $translate) {
            $translates[$translate->lang][$translate->code] = $translate->value;
        }

        return \view('pages.team.view', compact('element', 'translates'));

    }

    public function teamEdit(
        int     $id,
        Request $request
    ): RedirectResponse {

        $element = Team::query()
            ->with('translates')
            ->where('id', $id)
            ->first();

        if ($element instanceof Team === false) {
            return redirect()
                ->route('panel.gallery.team');
        }

        $element->title = $request->input('title');
        $element->description = $request->input('description');
        $element->sorting = $request->input('sorting');

        /** @var TeamTranslate $translate */
        foreach ($element->translates as $translate) {
            $key = "{$translate->code}_{$translate->lang}";
            $translate->value = $request->input($key);
            $translate->save();
        }
        $element->save();

        return redirect()
            ->route('panel.gallery.team');

    }
}
