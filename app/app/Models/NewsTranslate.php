<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewsTranslate
 *
 * @property int $id
 * @property int $news_id
 * @property string $lang
 * @property string $code
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTranslate whereValue($value)
 * @mixin \Eloquent
 */
class NewsTranslate extends Model
{
    use HasFactory;
}
