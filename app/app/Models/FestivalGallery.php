<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\FestivalGallery
 *
 * @property int $id
 * @property string $title
 * @property int $file_id
 * @property int $sorting
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Files|null $file
 * @method static \Illuminate\Database\Eloquent\Builder|FestivalGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FestivalGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FestivalGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|FestivalGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FestivalGallery whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FestivalGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FestivalGallery whereSorting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FestivalGallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FestivalGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FestivalGallery extends Model
{
    use HasFactory;

    public function file(): HasOne {
        return $this->hasOne(Files::class, 'id', 'file_id');
    }
}
