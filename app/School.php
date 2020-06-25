<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\School
 *
 * @property int $id
 * @property string $school_name
 * @property string $school_name_y
 * @property string $school_name_slug
 * @property string $description
 * @property string $document
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School whereSchoolName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School whereSchoolNameSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School whereSchoolNameY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class School extends Model
{
    protected $table = 'schools';
}
