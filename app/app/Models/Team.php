<?php

namespace App\Models;

use App\Enums\Translate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Team
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $file_id
 * @property int $sorting
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Files|null $file
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TeamTranslate> $translates
 * @property-read int|null $translates_count
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereSorting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Team extends Model
{
    use HasFactory;

    public function getTitle(): string {
        $title = $this->title;
        $this->translates
            ->each(function (TeamTranslate $teamTranslate) use (&$title) {
                if ($teamTranslate->lang === \App::getLocale() && $teamTranslate->code === 'title') {
                    $title = $teamTranslate->value;
                }
            });

        return $title;
    }

    public function getDescription(): string {
        $description = $this->description;
        $this->translates
            ->each(function (TeamTranslate $teamTranslate) use (&$description) {
                if ($teamTranslate->lang === \App::getLocale() && $teamTranslate->code === 'description') {
                    $description = $teamTranslate->value;
                }
            });

        return $description;
    }

    public function file(): HasOne {
        return $this->hasOne(Files::class, 'id', 'file_id');
    }

    public function translates(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(TeamTranslate::class, 'team_id', 'id');
    }
}
