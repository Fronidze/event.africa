<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\MoviesGallery
 *
 * @property int $id
 * @property string $title
 * @property int $file_id
 * @property int $sorting
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Files|null $file
 * @method static \Illuminate\Database\Eloquent\Builder|MoviesGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MoviesGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MoviesGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|MoviesGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MoviesGallery whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MoviesGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MoviesGallery whereSorting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MoviesGallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MoviesGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MoviesGallery extends Model
{
    use HasFactory;

    public function file(): HasOne {
        return $this->hasOne(Files::class, 'id', 'file_id');
    }
}
