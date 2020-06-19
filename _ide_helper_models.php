<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Star
 *
 * @property int $id
 * @property string $name
 * @property string $name_y
 * @property string $name_r
 * @property int $name_separate
 * @property int $name_y_separate
 * @property int $name_r_separate
 * @property int|null $name_r_separate_secondary
 * @property string|null $birthday
 * @property string|null $cv
 * @property string|null $school
 * @property string|null $department
 * @property int|null $grade
 * @property int|null $class_no
 * @property string|null $act_like
 * @property string|null $act_not_good
 * @property string|null $food_like
 * @property string|null $food_dislike
 * @property string|null $weapon_name
 * @property string|null $weapon_category
 * @property string $document
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereActLike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereActNotGood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereClassNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereFoodDislike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereFoodLike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereNameR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereNameRSeparate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereNameRSeparateSecondary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereNameSeparate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereNameY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereNameYSeparate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereWeaponCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereWeaponName($value)
 */
	class Star extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

