<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TeamTranslate
 *
 * @property int $id
 * @property int $team_id
 * @property string $lang
 * @property string $code
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslate whereValue($value)
 * @mixin \Eloquent
 */
class TeamTranslate extends Model
{
    use HasFactory;
}
