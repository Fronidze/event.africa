<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\PoetryGallery
 *
 * @property int $id
 * @property string $title
 * @property int $file_id
 * @property int $sorting
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Files|null $file
 * @method static \Illuminate\Database\Eloquent\Builder|PoetryGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PoetryGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PoetryGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|PoetryGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoetryGallery whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoetryGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoetryGallery whereSorting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoetryGallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoetryGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PoetryGallery extends Model
{
    use HasFactory;

    public function file(): HasOne {
        return $this->hasOne(Files::class, 'id', 'file_id');
    }
}
