<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\PhotoGallery
 *
 * @property int $id
 * @property string $title
 * @property int $file_id
 * @property int $sorting
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Files|null $file
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereSorting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PhotoGallery extends Model
{
    use HasFactory;

    public function file(): HasOne {
        return $this->hasOne(Files::class, 'id', 'file_id');
    }
}
