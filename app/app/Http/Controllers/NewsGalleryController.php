<?php

namespace App\Http\Controllers;

use App\Enums\Translate;
use App\Helpers\NewsDateFormatter;
use App\Models\FestivalGallery;
use App\Models\Files;
use App\Models\NewsGallery;
use App\Models\NewsTranslate;
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
        $element->publish_at = (new \DateTime($request->input('publish_at')))->format(DATE_ATOM);
        $element->save();

        $english_title = new NewsTranslate();
        $english_title->lang = Translate::EN->value;
        $english_title->code = 'title';
        $english_title->news_id = $element->id;
        $english_title->value = $request->input('title_en');
        $english_title->save();

        $english_description = new NewsTranslate();
        $english_description->lang = Translate::EN->value;
        $english_description->code = 'description';
        $english_description->news_id = $element->id;
        $english_description->value = $request->input('description_en');
        $english_description->save();

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
            ->with('file', 'translates')
            ->where('id', $id)
            ->first();

        if ($element instanceof NewsGallery === false) {
            return redirect()
                ->route('panel.gallery.news');
        }

        $translates = [];
        /** @var NewsTranslate $translate */
        foreach ($element->translates as $translate) {
            $translates[$translate->lang][$translate->code] = $translate->value;
        }

        return \view('pages.news.view', compact('element', 'translates'));

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
        $element->publish_at = $request->input('publish_at');

        /** @var NewsTranslate $translate */
        foreach ($element->translates as $translate) {
            $key = "{$translate->code}_{$translate->lang}";
            $translate->value = $request->input($key);
            $translate->save();
        }

        $element->save();

        return redirect()
            ->route('panel.gallery.news');

    }
}
