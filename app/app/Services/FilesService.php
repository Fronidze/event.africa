<?php

namespace App\Services;

use App\Models\Files;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;

class FilesService
{
    protected function storage(): FilesystemAdapter {
        return \Storage::disk('local');
    }

    public function make(
        string       $prefix,
        UploadedFile $file,
    ): Files {

        $files = new Files();
        $files->filename = $file->getClientOriginalName();
        $files->mimetype = $file->getMimeType();
        $files->size = $file->getSize();
        $files->path = "{$prefix}/{$file->getClientOriginalName()}";

        $this->storage()
            ->put("public/{$files->path}", fopen($file->getPathname(), 'r+'), 'public');

        $files->save();
        return $files;
    }

    public function path(
        string $path
    ): string {
        return $this->storage()
            ->url($path);
    }

    public function remove(
        string $path
    ): void {
        $this->storage()
            ->delete("public/{$path}");
    }
}
