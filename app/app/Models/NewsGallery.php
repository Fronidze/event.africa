<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\NewsGallery
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $file_id
 * @property int $sorting
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Files|null $file
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery whereSorting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsGallery extends Model
{
    use HasFactory;

    public function file(): HasOne {
        return $this->hasOne(Files::class, 'id', 'file_id');
    }
}
