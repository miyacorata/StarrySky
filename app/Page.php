<?php

namespace App;

use cebe\markdown\GithubMarkdown;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $category
 * @property int $cw
 * @property string|null $color
 * @property string $document
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereCw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Page extends Model
{
    protected $table = 'pages';

    /**
     * @return string
     */
    public function getDocumentAsHtml(){
        $parser = new GithubMarkdown();
        $parser->enableNewlines = true;
        return $parser->parse($this->document);
    }
}
