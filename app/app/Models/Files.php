<?php

namespace App\Models;

use App\Services\FilesService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Files
 *
 * @property int $id
 * @property string $filename
 * @property string|null $mimetype
 * @property int $size
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Files newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Files newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Files query()
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereMimetype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Files extends Model
{
    use HasFactory;

    public function filePath(bool $isFull = false): string {
        $relatifPath = (new FilesService())
            ->path($this->path);

        return $isFull ? asset($relatifPath) : $relatifPath;
    }
}
