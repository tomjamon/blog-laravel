<?php

namespace App;

use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Comment
 * @package App
 */
class Comment extends Model
{
    /**
     * @var string[]
     */
    public $appends = ['author'];

    /**
     * @return HigherOrderBuilderProxy|mixed
     */
    public function getAuthorAttribute()
    {
        return $this->user->name;
    }
    /**
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
