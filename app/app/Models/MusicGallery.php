<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\MusicGallery
 *
 * @property int $id
 * @property string $title
 * @property int $file_id
 * @property int $sorting
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Files|null $file
 * @method static \Illuminate\Database\Eloquent\Builder|MusicGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MusicGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MusicGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|MusicGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicGallery whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicGallery whereSorting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicGallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MusicGallery extends Model
{
    use HasFactory;

    public function file(): HasOne {
        return $this->hasOne(Files::class, 'id', 'file_id');
    }
}
