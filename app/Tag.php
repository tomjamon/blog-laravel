<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Tag
 * @package App
 */
class Tag extends Model
{
    /**
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
