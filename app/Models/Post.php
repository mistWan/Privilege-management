<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    use Searchable;

    /**
     * @return string
     */
    public function searchableAs()
    {
        return "post";
    }

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];
    }

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope("status", function (Builder $builder) {
            $builder->whereIn("status", [0, 1]);
        });
    }

    /**
     * @param $value
     * @return int
     */
    public function setStatusAttribute($value)
    {
        return $this->attributes['status'] = 0;
    }

}
