<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NewsTranslate> $translates
 * @property-read int|null $translates_count
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

    public function getTitle(): string {
        $title = $this->title;
        $this->translates
            ->each(function (NewsTranslate $newsTranslate) use (&$title) {
                if ($newsTranslate->lang === \App::getLocale() && $newsTranslate->code === 'title') {
                    $title = $newsTranslate->value;
                }
            });

        return $title;
    }

    public function getDescription(): string {
        $description = $this->description;
        $this->translates
            ->each(function (NewsTranslate $newsTranslate) use (&$description) {
                if ($newsTranslate->lang === \App::getLocale() && $newsTranslate->code === 'description') {
                    $description = $newsTranslate->value;
                }
            });

        return $description;
    }

    public function file(): HasOne {
        return $this->hasOne(Files::class, 'id', 'file_id');
    }

    public function translates(): HasMany {
        return $this->hasMany(NewsTranslate::class, 'news_id', 'id');
    }
}
